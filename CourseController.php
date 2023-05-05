<?php
// Include config file
define('__ROOT__',dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__.'/config-ext.php');
mysqli_close($link2);
// Check if the user is logged in, if not then redirect to login page
/*if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
    header("location: LoginPasswordChange.php");
    exit;
}*/

class Course
{
    public $id;
    public $name;
}

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] != "GET"){
    return;
}

$CourseIdFound = $CourseNameFound = "";

$rows = array();

$sql = "SELECT CourseId, ShortName FROM Course";

if($stmt = mysqli_prepare($link, $sql)){
     // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $licencecode);
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
         if(mysqli_stmt_num_rows($stmt) > 0){
            $stmt->bind_result($CourseIdFound,$CourseNameFound);
            while($stmt->fetch()){
                $courseFound = new Course();
                $courseFound->id = $CourseIdFound;
                $courseFound->name = $CourseNameFound; 
                $rows[] = $courseFound;
            }
         }else if (mysqli_stmt_num_rows($stmt)==0){
            $form_err = "No se han creado Cursos en el sistema, contacte al administrador";
            return;
         }else{
            $form_err = "Verifique el código de Plantilla suministrado";
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


if($varcloseecho != 1){
    echo json_encode($rows);
}
$result = json_encode($rows);
mysqli_stmt_close($stmt);
mysqli_close($link);
?>