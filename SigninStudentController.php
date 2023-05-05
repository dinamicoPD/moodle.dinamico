<?php
    setlocale(LC_ALL, "en_US.UTF-8");
    // Initialize the session
    session_start();
    if(!isset($_SESSION["loggedinRegisterStudent"]) || $_SESSION["loggedinRegisterStudent"] != true){
    header("location: Login.php");
    exit;
    }
    include('Mailer.php');
    include('ForcePasswordChange.php');
    define('__ROOT__',dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'/config-ext.php');

    $form_err = "";
    $IdGroupFound=$_SESSION["GrpId"];
    //$IdGroupFound = 12;
    $TeacherCompleteName = "";
    $CourseName = "";
    $GroupName = "";
    $Institution = "";
    $City = "";
   
    $sql = "SELECT CONCAT(FirstName,' ',LastName,' ',SecondLastName) as FullName,CourseName, GroupCode FROM Enrolment enr  INNER JOIN User urs  ON enr.UserId = urs.UserId WHERE UserGrpId = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        $stmt->bind_param("d",$IdGroupFound);
         if(mysqli_stmt_execute($stmt)){
             mysqli_stmt_store_result($stmt);
              if(mysqli_stmt_num_rows($stmt) == 1){
                 $stmt->bind_result($TeacherCompleteName,$CourseName,$GroupName);
                $stmt->fetch();
              }else{
                $form_err=", contacte al servicio de administración";
                return;
              }
         }
    } 
    mysqli_stmt_close($stmt);

    if($_SERVER["REQUEST_METHOD"] != "POST"){
    return;
    }

    $loadedGroups ="";

    $FirstName = trim($_POST["FirstName"]);
    $MiddleName = trim($_POST["MiddleName"]);
    $LastName = trim($_POST["LastName"]);
    $SecondLastName = trim($_POST["SecondLastName"]);
    $Phone = trim($_POST["Phone"]);
    $Email = trim($_POST["Email"]);
    $Institution = trim($_POST["Institution"]);
    $City = trim($_POST["City"]);

    //Load session elements
    $IdLicenceToChange = $_SESSION["licenceId"];
    $GroupFullNamePassed=$_SESSION["GrpFullName"];
    //$IdLicenceToChange = 3;
    //Make the register
    //constructor nombre de usuario
    $patterns = array();
    $patterns[0] = '/[c|C][o|O][l|L][e|E][g|G][i|I][o|O]/';
    $patterns[1] = '/[c|C][o|O][l|L]/';

    $newinstitution=trim(preg_replace($patterns,"",strtolower($Institution)));


    $pieces = explode(" ", $newinstitution);
    $str2="";

    if(count($pieces)>1){
        foreach($pieces as $piece) 
        { 
            $str2.=$piece[0];
        }  
    }else{
        if(strlen($pieces[0])>2){
           $str2=substr($pieces[0],0,2);
        }else{
            $str2=substr($pieces[0],0,1);
        }
    }
              
    $userName = iconv('UTF-8','ASCII//TRANSLIT','col.'.$str2).'.std.'.iconv('UTF-8','ASCII//TRANSLIT',$FirstName).'.'.iconv('UTF-8','ASCII//TRANSLIT',$LastName);
    $userName = strtolower($userName);


    $userName2 = $userName;

    $verificar_usuario = mysqli_query($link, "SELECT * FROM User WHERE UserName = '$userName'");
    $a = 0;
    while (mysqli_num_rows($verificar_usuario) > 0){
        $userName2 = $userName;
        $a = $a + 1;
        $userName2 .= $a;
        $verificar_usuario = mysqli_query($link, "SELECT * FROM User WHERE UserName = '$userName2'");
    }

    $userName = $userName2;

    //Tomar el codigo de la lincenia y pasarlo como contraseña

    $sql = "SELECT Code FROM Licence WHERE LicenceId = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("d",$IdLicenceToChange);
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
             if(mysqli_stmt_num_rows($stmt) == 1){
                $stmt->bind_result($password);
                $stmt->fetch();
             }else if (mysqli_stmt_num_rows($stmt)>1){
                $form_err="Problemas con comprobacion de licencia, contacte al servicio de administración";
                return;
             }else{
                $form_err="No se encontró una licencia valida, contacte al servicio de administración ";
                return;
             }
        }else{
            $form_err="Error con la Base de Datos, contacte al administrador";
            return;
        }
    }else{
            $form_err="Error con la Base de Datos, contacte al administrador";
            return;
    }

    mysqli_stmt_close($stmt);

    $unencodedPassword = $password;
    $password=md5($password);

    $rol="Estudiante";
    $insertar = "INSERT INTO User(FirstName, MiddleName, LastName, SecondLastName, Institution, City, Email, UserName, Password, Rol, Phone) VALUES ('$FirstName', '$MiddleName', '$LastName', '$SecondLastName', '$Institution', '$City', '$Email', '$userName', '$password', '$rol','$Phone')";

    $verificar = mysqli_query($link, "SELECT * FROM User WHERE Email = '$Email'");
        if (mysqli_num_rows($verificar) > 0){
            $form_err = "El Email se encuentra ya registrado";
        return;
    }

    $resultado = mysqli_query($link, $insertar);

    if(!$resultado){
         $form_err = "Error de conexión, contacte al servicio de administración";
         return;
    }

    $IdStudent=mysqli_insert_id($link);

   if($IdStudent==0){
         $form_err = "Error al crear cuenta, contacte al servicio de administración";
         return;
    }
    $old_path = getcwd();
    chdir('/var/www/html/moodle/auth/db/cli/');
    $output=shell_exec('php sync_users.php');
    chdir($old_path); 
    //Get current enrolment based on group key


    //Insertar Enrolment

    $sql = "INSERT INTO Classroom (UserId,UserGrpId,MdlActive) VALUES (?,?,1)";

    if($stmt = mysqli_prepare($link, $sql)){
       $stmt->bind_param("ii",$IdStudent,$IdGroupFound);
       if(!mysqli_stmt_execute($stmt)){
            mysqli_stmt_close($stmt);
            $form_err = "Error al vincular al curso, contacte al servicio de administración";
            return;
       }
    }
    mysqli_stmt_close($stmt);

    //Enrole student into the Group
     $sql = "SELECT FirstName as firstname, MiddleName as middlename, LastName as lastname, SecondLastName as alternatename, Institution as institution, City as city, Phone as phone1,Email as email, Address as address, Username as username, crs.ShortName as course1, grp.GrpName as group1, grp.EnrolmentKey as enrolmentkey1,  '1' as Type1, 'student' as 'role1', '0' as 'enrolstatus1' FROM User usr INNER JOIN Classroom clsrm ON usr.UserId = clsrm.UserId INNER JOIN UserGrp grp ON clsrm.UserGrpId = grp.UserGrpId INNER JOIN Course crs ON grp.CourseId = crs.CourseId WHERE usr.UserId =$IdStudent";

      $file=fopen("../admin/tool/uploadusercli/cli/PlantillaEstudiante".$IdStudent.".csv","w+");
    try {
            if ($result = $link->query($sql)) {
                $header = true;
                while ($row = $result->fetch_assoc()) {
                    if($header){
                        fputcsv($file, array_keys($row));
                        $header = false;
                    }
                    fputcsv($file,$row);
                }
            }
        }catch(Extepction $e){
            $form_err = "Error: ".$e->getMessage();
            fclose($file);
            return;
        }finally {
            fclose($file);
        }
    //Change the licence status to A and update the UserId
    $sql = "UPDATE Licence SET  UserId = ?, Status = 'A' WHERE LicenceId = ?";


    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ii", $IdStudent ,$IdLicenceToChange);
        if(!mysqli_stmt_execute($stmt)){
             $form_err = "Error al actualizar la licencia, contacte al servicio de administración";
            return;
        }
    }
    mysqli_stmt_close($stmt);

    $old_path = getcwd();
    chdir('/var/www/html/moodle/admin/tool/uploadusercli/cli/');
    $output=shell_exec('php uploadusercli.php --mode=update --updatemode=missingonly --forcepasswordchange=all --file=PlantillaEstudiante'.$IdStudent.'.csv');
    sleep(3);
    unlink("PlantillaEstudiante".$IdStudent.'.csv');
    chdir($old_path);
    

    $mailSender = new MailDispatcher(); 
    
    $mailSender->sendEmailToStudent($Email,$userName, $CourseName,$GroupName,$TeacherCompleteName,$unencodedPassword);

    //Force password change
    forcePasswordChange($Email);


    mysqli_close($link);
    mysqli_close($link2);
    session_destroy();
    session_start();
    $_SESSION["loginStudentSummary"] = true;
    $_SESSION["studentId"] = $IdStudent;
    header("location: SummaryStudent.php");
    //header("Location: http://".$_SERVER['HTTP_HOST']);
?>