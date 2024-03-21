<?php
// Include config file
include('SuspendAccount.php');
//define('__ROOT__',dirname(dirname(dirname(__FILE__))));
//require_once(__ROOT__.'/config-ext.php');

require_once('../../config-ext.php');

if(isset($_GET['d1n4m1c0'])){
    $variable1 = $_GET['d1n4m1c0'];
} else {
    // Manejo del caso cuando las variables están vacías
    $variable1 = "";
}

$licencecode = $form_err = $licenceidfound = $statusfound = $typefound = $codlicence_err = $codgroup_err = $groupcode= "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] != "POST"){
    return;
}

$groupidfound = $groupnamefound = $useridfound = "";

$typeofoperation=0;

$licencecode  = trim($_POST["licencecode"]);

$groupcode = trim($_POST["groupcode"]);
// Check if username is empty
if(empty(trim($licencecode))){
    $form_err = "Por favor ingrese el Código de la cartilla.";
    return;
}

//Check the type of licence provided is for a new user.

$sql = "SELECT LicenceId,UserId,Type,Status FROM Licence WHERE Code = ?";


if($stmt = mysqli_prepare($link, $sql)){
     // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $licencecode);
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
         if(mysqli_stmt_num_rows($stmt) == 1){
            $stmt->bind_result($licenceidfound,$useridfound,$typefound,$statusfound);
            $stmt->fetch();
         }else if (mysqli_stmt_num_rows($stmt)>1){
            $form_err="Problemas de verifcación de Licencia, contacte al administrador";
            return;
         }else{
            $form_err="Verifique el pin de acceso de su cartilla";
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


//Verify if the lincence that has been provided is matching with an user already registered, but the licence key hasn't been updated.
if($statusfound == "I"){
        $form_err="El codigo de la Cartilla ha expirado por favor contacte a su proveedor";
        return;
}


//If the status is O (Start registering Teacher or Student depending on the Type (E=Student, P= Teacher)
if($typefound === "P"){
    //Registro de profesor
    $typeofoperation = 1;
}else if($typefound  === "E"){
        $typeofoperation = 2;
}

//Verify that the group has been provided.
if($typeofoperation == 2 && empty(trim($groupcode))){
        $form_err = "Por favor ingrese el Código del Grupo.";
    return;
}

$groupcode=trim($groupcode);

//Verify if the Group provided does exist
if(($typeofoperation == 2 && $statusfound == "O") || ($typeofoperation == 2 && $statusfound == "W")){
    $sql = "SELECT UserGrpId, GrpName FROM UserGrp WHERE EnrolmentKey = ?";
    if($stmt = mysqli_prepare($link, $sql)){
         // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $groupcode);
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
             if(mysqli_stmt_num_rows($stmt) == 1){
                $stmt->bind_result($groupidfound,$groupnamefound);
                $stmt->fetch();
             }else if (mysqli_stmt_num_rows($stmt)>1){
                $form_err="Problemas de verifcación de Grupo, contacte al administrador";
                return;
             }else{
                $form_err="Verifique el código de Grupo suministrado";
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

}else if ($typeofoperation == 2 && $statusfound == "A"){
    $sql = "SELECT grp.UserGrpId, grp.GrpName FROM UserGrp grp
            INNER JOIN Classroom cls ON grp.UserGrpId = cls.UserGrpId
            WHERE grp.EnrolmentKey = ? AND cls.UserId = ?";
    if($stmt = mysqli_prepare($link, $sql)){
         // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "si", $groupcode,$useridfound);
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
             if(mysqli_stmt_num_rows($stmt) == 1){
                $stmt->bind_result($groupidfound,$groupnamefound);
                $stmt->fetch();
             }else if (mysqli_stmt_num_rows($stmt)>1){
                $form_err="Problemas de verifcación de Grupo, contacte al administrador";
                return;
             }else{
                $form_err="Verifique el código de Grupo suministrado";
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
}

//Verify that the group matches with the provided.
if($typeofoperation == 2 && empty(trim($groupidfound))){
        $form_err = "Por favor ingrese un Código de grupo vigente.";
    return;
}

session_start();
$_SESSION["licenceId"] = $licenceidfound;
$_SESSION["UserId"] = $useridfound;
$_SESSION["Type"] = $typeofoperation;
$_SESSION["GrpFullName"] = $groupnamefound;
$_SESSION["GrpId"] = $groupidfound;
$_SESSION["groupcode"] = $groupcode;

if($statusfound == "O"){
    //A licence for a new user has been provided, so let's redirect to Register a new user.
    if($typeofoperation == 1){
        $_SESSION["loggedinRegister"] = true;
        // Redirect user to Register Teacher
        header("location: PreRegistroDocente.php");
    }else if ($typeofoperation == 2){
        // Redirect user to Register Stundent
        
        //$form_err="Go and Register new Student";
        //return;
        //Redirect user to Register Student.
        $_SESSION["loggedinRegisterStudent"] = true;
        header("location: SigninStudent.php");
    }
}

//Take the user's data...
//The licence is waiting to be renewed
if($statusfound == "W"){

    if($typeofoperation == 1){

        $form_err = "Error al actualizar la licencia, contacte al servicio de administración1";
                    return;
        //$form_err="Teacher must be redirected to Group creation form";
        //return;
    }
   else if($typeofoperation == 2){
        //Create CSV and update the both lincence and Stundent enrolment to Group.
        //We to change the flag suspended = 1 to 0 allowing the user to access again to the platform.
        //Get Student's email
    $IdStudent = $useridfound;
    $IdGroupFound = $groupidfound;
    //$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $sql = "SELECT FirstName,MiddleName,LastName,SecondLastName,Phone,Email,Institution,City,UserName FROM User WHERE UserId = ".$useridfound;
            if ($result = $link->query($sql)) {
                if ($row = $result->fetch_assoc()) {
                    $FirstName = $row["FirstName"];
                    $MiddleName = $row["MiddleName"];
                    $LastName = $row["LastName"];
                    $SecondLastName = $row["SecondLastName"];
                    $Phone = $row["Phone"];
                    $Email = $row["Email"];
                    $Institution = $row["Institution"];
                    $City = $row["City"];
                    $Username = $row["UserName"];
                 }
            }else{
                error_log("No se pudo establecer conexión con la base de datos al intentar actualizar licencia del estudiante.");
            }

            $sql = "DELETE FROM Classroom WHERE UserId = ?";

            if($stmt = mysqli_prepare($link, $sql)){
               $stmt->bind_param("i",$IdStudent);
               if(!mysqli_stmt_execute($stmt)){
                    mysqli_stmt_close($stmt);
                    error_log("al intentar Borrar al estudiante : ".$IdStudent ." de la tabla Classroom");
                    $form_err = "Error al eliminar la vinculaciòn a grupos anteriores";
                    return;
               }
            }
            mysqli_stmt_close($stmt);

            //Insertar Enrolment
            $sql = "INSERT INTO Classroom (UserId,UserGrpId,MdlActive) VALUES (?,?,1)";

            if($stmt = mysqli_prepare($link, $sql)){
               $stmt->bind_param("ii",$IdStudent,$IdGroupFound);
               if(!mysqli_stmt_execute($stmt)){
                    mysqli_stmt_close($stmt);
                    error_log("Error al intentar vincular el estudiante : ".$IdStudent ." Con el grupo: ". $IdGroupFound." en tabla Classroom");
                    $form_err = "Error al vincular al curso, contacte al servicio de administración";
                    return;
               }
            }
            mysqli_stmt_close($stmt);

            //Enrole student into the Group
             $sql = "SELECT FirstName as firstname, MiddleName as middlename, LastName as lastname, SecondLastName as alternatename, Institution as institution, City as city, Phone as phone1,Email as email, Address as address, Username as username, crs.ShortName as course1, grp.GrpName as group1, grp.EnrolmentKey as enrolmentkey1,  '1' as Type1, 'student' as 'role1' FROM User usr INNER JOIN Classroom clsrm ON usr.UserId = clsrm.UserId INNER JOIN UserGrp grp ON clsrm.UserGrpId = grp.UserGrpId INNER JOIN Course crs ON grp.CourseId = crs.CourseId WHERE usr.UserId =$IdStudent";

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
                mysqli_stmt_bind_param($stmt, "ii", $IdStudent ,$licenceidfound);
                if(!mysqli_stmt_execute($stmt)){
                     $form_err = "Error al actualizar la licencia, contacte al servicio de administración2";
                    return;
                }
            }
            mysqli_stmt_close($stmt);

            $old_path = getcwd();
            chdir('/var/www/html/moodle/moodle/admin/tool/uploadusercli/cli/');
            $output=shell_exec('php uploadusercli.php --mode=update --updatemode=missingonly --forcepasswordchange=all --file=PlantillaEstudiante'.$IdStudent.'.csv');
            sleep(3);
            unlink("PlantillaEstudiante".$IdStudent.'.csv');
            chdir($old_path);
            
            ActivateAccount($Email);

            $form_err = "La licencia que estás intentando utilizar ya ha sido utilizada por otra persona. Por favor, ponte en contacto con el servicio de administración para obtener más información o verifica tus credenciales de ingreso.";
            return;

            /*$_SESSION["loginStudentSummary"] = true;
            $_SESSION["studentId"] = $IdStudent;
            header("location: SummaryStudent.php");*/
    }
}

if($statusfound == "A"){
    if($typeofoperation == 1){
        $form_err = "La licencia docente que estás intentando utilizar ya ha sido utilizada por otra persona. Por favor, ponte en contacto con el servicio de administración para obtener más información.";
            return;
    }else if ($typeofoperation == 2){
            header("location: ../login/index.php");
            return;
    }
}

mysqli_close($link);
?>
