<?php
    // Initialize the session
    session_start();
   // define('__ROOT__',dirname(dirname(dirname(__FILE__))));
// require_once(__ROOT__.'/config-ext.php');
	require_once('../../config-ext.php');
    $form_err="";

    if(!isset($_SESSION["loginStudentSummary"]) || $_SESSION["loginStudentSummary"] != true){
        header("location: LoginSTD.php");
        exit;
    }

    $idStudent = $_SESSION["studentId"];
    $unencodedPassword = $_SESSION["unencodedPassword"];
    $laLicencia = $_SESSION["laLicencia"];
    $hmtlGroup = $_SESSION["grupo"];
    //$idStudent = 30;
    
    //Take the data from the teacher provided.
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $sql = "SELECT FirstName,MiddleName,LastName,SecondLastName,Phone,Email,Institution,City,UserName FROM User WHERE UserId = ".$idStudent;
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
                $form_err="Error de conexión con base de datos, contacte al servicio de administración";
                return;
        }

        $FullName = $FirstName . " " .  $MiddleName . " " .  $LastName . " " .  $SecondLastName;

        if($_SERVER["REQUEST_METHOD"] != "POST"){
            return;
        }
    
    session_destroy();
    header("Location: https://dinamicopd.com/moodle");
?>
