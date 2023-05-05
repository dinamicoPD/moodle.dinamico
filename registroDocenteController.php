<?php
    setlocale(LC_ALL, "en_US.UTF-8");
    // Initialize the session
    session_start();
    include('ForcePasswordChange.php');
    include('SuspendAccount.php');
    include('Mailer.php');
    define('__ROOT__',dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'/config-ext.php');

    $varcloseecho=1;
    require_once('CourseController.php');

    //$loadedGroups = "<div><select name=\"field_name[]\" id=\"curso\" required class=\"inputD\"><option disabled selected>Curso*</option><option value=\"1\">Primero</option><option value=\"2\">Segundo</option><option value=\"3\">Tercero</option><option value=\"4\">Cuarto</option><option value=\"5\">Quinto</option><option value=\"6\">Sexto</option><option value=\"7\">Septimo</option><option value=\"8\">Octavo</option><option value=\"9\">Noveno</option><option value=\"10\">Decimo</option><option value=\"11\">Once</option></select><input type=\"text\" placeholder=\"sigla\" name=\"field_name2[]\" class=\"inputI\"><a href=\"javascript:void(0);\" class=\"add_button\" title=\"Add field\"><img src=\"img/add-icon.png\" /></a></div>";
    $optionsHTML="";
    $rowsToBeStored=array();
    if(!empty($rows)){
        foreach ($rows as $courseToStore) {
            $rowsToBeStored[$courseToStore->name] = $courseToStore->id;
        }
        $_SESSION["IdCoursesFound"] = $rowsToBeStored;
    }
    
    foreach($rows as $tmpValeCourse){
        $optionsHTML.= "<option value=\"".$tmpValeCourse->id."\">".$tmpValeCourse->name."</option>";
    }

    $loadedGroups = "<div><select name=\"field_name[]\" id=\"curso\" required class=\"inputD\"><option disabled selected>Curso*</option>".$optionsHTML."</select><input type=\"text\" placeholder=\"sigla\" name=\"field_name2[]\" class=\"inputI\"><a href=\"javascript:void(0);\" class=\"add_button\" title=\"Add field\"><img src=\"img/add-icon.png\" /></a></div>";

    $lockbutton = false;

    if(!isset($_SESSION["loggedinRegister"]) || $_SESSION["loggedinRegister"] != true){
    header("location: Login.php");
    exit;
    }


    $form_err = "";
    if($_SERVER["REQUEST_METHOD"] != "POST"){
    return;
    }

    $lockbutton = true;

    $IdLicenceToChange=$_SESSION["licenceId"];

    $loadedGroups ="";

    $FirstName = trim($_POST["FirstName"]);
    $MiddleName = trim($_POST["MiddleName"]);
    $LastName = trim($_POST["LastName"]);
    $SecondLastName = trim($_POST["SecondLastName"]);
    $Phone = trim($_POST["Phone"]);
    $Email = trim($_POST["Email"]);
    //$Institution = $_POST["Institution"];
    $City = trim($_POST["City"]);
    $Curso = $_POST['field_name'];
    $Sigla = $_POST['field_name2'];
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!#$%&/)+=*";
    $password = "";
    $password2 = "";

    $htmlgenerator = "";

    $rowsCourses=$_SESSION["IdCoursesFound"];


    for ($i=0;$i<=count($Curso);$i++){
        $coursesavailable="";
        $htmlgenerator="<div><select name=\"field_name[]\" id=\"curso\" required class=\"inputD\"><option disabled selected>Curso*</option>";

        foreach($rowsCourses as $key=>$value){
            if($value == $Curso[$i]){
                 $htmlgenerator .= "<option value=\"".$value."\" selected>".$key."</option>";
             }else{
                 $htmlgenerator .= "<option value=\"".$value."\">".$key."</option>";
             }
        }
        //$htmlgenerator.=$coursesavailable;
        $htmlgenerator.="</select>";
        if($i==0){
            $htmlgenerator.="<input type=\"text\" placeholder=\"sigla\" name=\"field_name2[]\" value=\"".$Sigla[$i]."\" class=\"inputI\"><a href=\"javascript:void(0);\" class=\"add_button\" title=\"Add field\"><img src=\"img/add-icon.png\" /></a></div>";  
        }else{
            $htmlgenerator.="<input type=\"text\" placeholder=\"sigla\" name=\"field_name2[]\" value=\"".$Sigla[$i]."\" class=\"inputI\"><a href=\"javascript:void(0);\" class=\"remove_button\"title=\"Remove field\"><img src=\"img/remove-icon.png\"/></a></div>";
        }

        $loadedGroups.=$htmlgenerator;
    }


    if(empty(trim($Curso[0]))){
        $form_err = "Debe asignar por lo menos un Grupo para impartir sus clases";
        $lockbutton = false;
        return;
    }


    for($j=0;$j<8;$j++) {
      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
      $password .= substr($str,rand(0,62),1);
    }
      $password .= substr($str,rand(63,72),1);

    //constructor nombre de usuario
        /*$pieces = explode(" ", $Institution);
        $str2="";
        
        foreach($pieces as $piece) 
        { 
            $str2.=$piece[0];
        }  */
              
    $userName = iconv('UTF-8','ASCII//TRANSLIT',"prf.".substr($City, 0, 3)).'.'.iconv('UTF-8','ASCII//TRANSLIT',$FirstName).'.'.iconv('UTF-8','ASCII//TRANSLIT',$LastName);

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
                $lockbutton = false;
                return;
             }else{
                $form_err="No se encontró una licencia valida, contacte al servicio de administración ";
                $lockbutton = false;
                return;
             }
        }else{
            $form_err="Error con la Base de Datos, contacte al administrador";
            $lockbutton = false;
            return;
        }
    }else{
            $form_err="Error con la Base de Datos, contacte al administrador";
            $lockbutton = false;
            return;
    }

    mysqli_stmt_close($stmt);

    //md5 gets applied to the password change feature.
    $passwordWithoutEncoding = $password;
    $password = md5($password);

    $insertar = "INSERT INTO User(FirstName, MiddleName, LastName, SecondLastName, City, Email, UserName, Password, Phone) VALUES ('$FirstName', '$MiddleName', '$LastName', '$SecondLastName', '$City', '$Email', '$userName', '$password', '$Phone')";


    //Verificación de cursos.
    for ($i=0;$i<count($Curso);$i++){
        $verificar_cursos =  mysqli_query($link, "SELECT * FROM Course WHERE CourseId = $Curso[$i]");
        if(mysqli_num_rows($verificar_cursos)==0){
                $form_err = "Algunos de los cursos seleccionados no son validos, por favor actualice la página";
                $lockbutton = false;
            return;
        }
    }


    $verificar = mysqli_query($link, "SELECT * FROM User WHERE Email = '$Email'");
        if (mysqli_num_rows($verificar) > 0){
            $form_err = "El Email se encuentra ya registrado";
            $lockbutton = false;
        return;
        }

    $resultado = mysqli_query($link, $insertar);

    if(!$resultado){
         $form_err = "Error de conexión, contacte al servicio de administración";
         $lockbutton = false;
         return;
    }
    $idTeacher=mysqli_insert_id($link);

    if($idTeacher==0){
         $form_err = "Error al crear cuenta, contacte al servicio de administración";
         $lockbutton = false;
         return;
    }
    $old_path = getcwd();
    chdir('/var/www/html/moodle/auth/db/cli/');
    $output=shell_exec('php sync_users.php');
    chdir($old_path); 


    //Insertar Enrolment
    for ($i=0;$i<count($Curso);$i++){
            
            for($j=0;$j<8;$j++) {
            //obtenemos un caracter aleatorio escogido de la cadena de caracteres
            $password2 .= substr($str,rand(0,62),1);
            }
            $password2 .= substr($str,rand(63,72),1);

            $courseNameFound="";
            foreach ($rowsCourses as $key => $value) {
                if($value == $Curso[$i]){
                   $courseNameFound = $key;
                }

            }
            if(empty($courseNameFound)){
                $form_err = "Error al intentar enlazar cursos, contacte al servicio de administración";
                $lockbutton = false;
                return;
            }
            $sql = "INSERT INTO Enrolment (UserId,CourseId,CourseName,GroupCode,GroupFullName,GroupKey) VALUES (?,?,?,?,?,?)";

            if($stmt = mysqli_prepare($link, $sql)){
                $fullnamegroup=$courseNameFound.".".$Sigla[$i].".".$userName;
               $stmt->bind_param("iissss",$idTeacher,$Curso[$i],$courseNameFound,$Sigla[$i],$fullnamegroup,$password2);
               if(!mysqli_stmt_execute($stmt)){
                    //mysqli_stmt_close($stmt);
                    error_log("Error: se esta intentando de ingresar el mismo grupo".$stmt->error_list[0]);
                    error_log("Nombre del grupo:".$fullnamegroup);
               }else{
                   mysqli_stmt_store_result($stmt);
               }
            }
            $password2 = "";
    }
    //sqlsrv_commit($link);

    mysqli_stmt_close($stmt);

    //Crear el CSV con los valores provistos.

    $sql = "SELECT FirstName as firstname, MiddleName as middlename, LastName as lastname, SecondLastName as alternatename, 'N/A' as 'Institution', City as city, Phone as phone1,Email as email, Address as address, Username as username, enr.CourseName as course1, enr.GroupFullName as group1, enr.GroupKey as enrolmentkey1,  '1' as Type1, 'teacher' as 'role1', '0' as 'enrolstatus1' FROM User usr INNER JOIN Enrolment enr ON usr.UserId = enr.UserId WHERE usr.UserId=$idTeacher";

    $file=fopen("../admin/tool/uploadusercli/cli/PlantillaProfesor".$idTeacher.".csv","w+");
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
         $lockbutton = false;
        return;
    }finally {
        fclose($file);
    }



  //Change the licence status to A and update the UserId

    $sql = "UPDATE Licence SET  UserId = ?, Status = 'A' WHERE LicenceId = ?";


    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ii", $idTeacher ,$IdLicenceToChange);
        if(!mysqli_stmt_execute($stmt)){
             $form_err = "Error al actualizar la licencia, contacte al servicio de administración";
             $lockbutton = false;
            return;
        }
    }
    mysqli_stmt_close($stmt);

    $old_path = getcwd();
    chdir('/var/www/html/moodle/admin/tool/uploadusercli/cli/');
    $output=shell_exec('php uploadusercli.php --mode=update --updatemode=missingonly --forcepasswordchange=all --file=PlantillaProfesor'.$idTeacher.'.csv');
    sleep(3);
    unlink("PlantillaProfesor".$idTeacher.'.csv');
    chdir($old_path);

    $mailSender = new MailDispatcher(); 
    $mailSender->sendEmaiToTeacher($Email, $idTeacher,$userName,$passwordWithoutEncoding);

    forcePasswordChange($Email);
    ActivateAccount($Email);
    mysqli_close($link);
    mysqli_close($link2);
    session_destroy();
    session_start();
    $_SESSION["loginGroupsSummary"] = true;
    $_SESSION["teacherId"] = $idTeacher;
    //$_SESSION["IdLicenceToChange"]=$IdLicenceToChange;
     //Redirect user to Register Student.
    header("location: GroupSummary.php");
?>