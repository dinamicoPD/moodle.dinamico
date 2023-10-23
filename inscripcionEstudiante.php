<?php
if($_SERVER["REQUEST_METHOD"] != "POST"){
    return;
}

include('Mailer.php');
include('ForcePasswordChange.php');
require_once('../../config-ext.php');

$FirstName = ucfirst(strtolower(trim($_POST["FirstName"])));
$MiddleName = ucfirst(strtolower(trim($_POST["MiddleName"])));
$LastName = ucfirst(strtolower(trim($_POST["LastName"])));
$SecondLastName = ucfirst(strtolower(trim($_POST["SecondLastName"])));
$Phone = trim($_POST["Phone"]);
$validationNewPass = trim($_POST["validationNewPass"]);
$Email = strtolower(trim($_POST["Email"]));
$Institution = trim($_POST["Institution"]);
$City = trim($_POST["City"]);
$IdLicenceToChange = trim($_POST["licenceId"]);
$IdLicenceColegio = trim($_POST["idColegio"]);
$IdGroupFound = trim($_POST["IdGroupFound"]);

$TeacherCompleteName = trim($_POST["TeacherCompleteName"]);
$CourseName = trim($_POST["CourseName"]);
$GroupName = trim($_POST["GroupName"]);

// Validar y sanitizar las entradas
$FirstName = filter_var($FirstName, FILTER_SANITIZE_STRING);
$MiddleName = filter_var($MiddleName, FILTER_SANITIZE_STRING);
$LastName = filter_var($LastName, FILTER_SANITIZE_STRING);
$SecondLastName = filter_var($SecondLastName, FILTER_SANITIZE_STRING);
$Phone = filter_var($Phone, FILTER_SANITIZE_STRING);
$Email = filter_var($Email, FILTER_SANITIZE_EMAIL);
$Institution = filter_var($Institution, FILTER_SANITIZE_STRING);
$City = filter_var($City, FILTER_SANITIZE_STRING);
$IdLicenceToChange = filter_var($IdLicenceToChange, FILTER_SANITIZE_STRING);
$IdLicenceColegio = filter_var($IdLicenceColegio, FILTER_SANITIZE_STRING);
$IdGroupFound = filter_var($IdGroupFound, FILTER_SANITIZE_STRING);
$TeacherCompleteName = filter_var($TeacherCompleteName, FILTER_SANITIZE_STRING);
$CourseName = filter_var($CourseName, FILTER_SANITIZE_STRING);
$GroupName = filter_var($GroupName, FILTER_SANITIZE_STRING);


$userName = 'std.'.$IdLicenceColegio.'.'.iconv('UTF-8','ASCII//TRANSLIT',$FirstName).'.'.iconv('UTF-8','ASCII//TRANSLIT',$LastName);
$userName = strtolower($userName);

$userName2 = $userName;

    $verificar_usuario = mysqli_query($link, "SELECT * FROM User WHERE UserName = '$userName'");
    $a = 0;
    while (mysqli_num_rows($verificar_usuario) > 0){
        $userName2 = $userName;
        $a = $a + 1;
        $userName2 .= '.'.$a;
        $verificar_usuario = mysqli_query($link, "SELECT * FROM User WHERE UserName = '$userName2'");
    }

$userName = $userName2;

$sql = "SELECT Code FROM Licence WHERE LicenceId = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("d",$IdLicenceToChange);
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
             if(mysqli_stmt_num_rows($stmt) == 1){
                $stmt->bind_result($laLicencia);
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

$unencodedPassword = $validationNewPass;
$password=md5($validationNewPass);

$rol="Estudiante";
$insertar = "INSERT INTO User(FirstName, MiddleName, LastName, SecondLastName, Institution, City, Email, UserName, Password, Rol, Phone) VALUES ('$FirstName', '$MiddleName', '$LastName', '$SecondLastName', '$Institution', '$City', '$Email', '$userName', '$password', '$rol','$Phone')";

$verificar = mysqli_query($link, "SELECT * FROM User WHERE Email = '$Email'");
if (mysqli_num_rows($verificar) > 0){
    $form_err =  "El Email se encuentra ya registrado";
    return;
}

$resultado = mysqli_query($link, $insertar);

if(!$resultado){
    $form_err =  "Error de conexión, contacte al servicio de administración";
    return;
}

$IdStudent=mysqli_insert_id($link);

if($IdStudent==0){
    $form_err =  "Error al crear cuenta, contacte al servicio de administración";
    return;
}

$old_path = getcwd();
chdir('/var/www/html/moodle/moodle/auth/db/cli/');
$output=shell_exec('php sync_users.php');
chdir($old_path);
//Get current enrolment based on group key

//Insertar Enrolment

$sql = "INSERT INTO Classroom (UserId,UserGrpId,MdlActive) VALUES (?,?,1)";

if($stmt = mysqli_prepare($link, $sql)){
    $stmt->bind_param("ii",$IdStudent,$IdGroupFound);
    if(!mysqli_stmt_execute($stmt)){
         mysqli_stmt_close($stmt);
         $form_err =  "Error al vincular al curso, contacte al servicio de administración";
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
      $form_err =  "Error: ".$e->getMessage();
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
       $form_err =  "Error al actualizar la licencia, contacte al servicio de administración";
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

$sql = "DELETE FROM ConfirmaCodigo WHERE Email = '$Email'";
$result = $link->query($sql);
if ($result === true) {
  $form_err = "Registros eliminados exitosamente.";
} else {
  $form_err = "Error al eliminar registros: " . $link->error;
}

mysqli_close($link);
mysqli_close($link2);
session_destroy();
session_start();
$_SESSION["loginStudentSummary"] = true;
$_SESSION["studentId"] = $IdStudent;
$_SESSION["unencodedPassword"] = $unencodedPassword;
$_SESSION["laLicencia"] = $laLicencia;
header("location: SummaryStudent.php");
?>