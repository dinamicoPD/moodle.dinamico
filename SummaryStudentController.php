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

        $FullName = $FirstName . " " .  $LastName;
    
     $sql = "SELECT crs.ShortName as course1, grp.GrpName as group1, grp.EnrolmentKey as enrolmentkey1, enrl.GroupCode as groupcode FROM User usr INNER JOIN Classroom clsrm ON usr.UserId = clsrm.UserId INNER JOIN UserGrp grp ON clsrm.UserGrpId = grp.UserGrpId INNER JOIN Course crs ON grp.CourseId = crs.CourseId INNER JOIN Enrolment enrl ON grp.UserGrpId = enrl.UserGrpId WHERE usr.UserId = ".$idStudent;


    $hmtlGroup = "";

     if ($result = $link->query($sql)) {
            while($row = $result->fetch_assoc()) {
             $hmtlGroup =$hmtlGroup . '<div class="col-xs-12">
                            <dt class="col-xs-3 text-left">Curso y Grupo:</dt>
                            <dd class="col-xs-3 text-left">'.$row["course1"].' '.$row["groupcode"].'</dd>
                            <dt class="col-xs-3 text-left"></dt></div>'; 
            }
        }else{
                $form_err="Error de conexión con base de datos, contacte al servicio de administración";
                return;
        }


    if($_SERVER["REQUEST_METHOD"] != "POST"){
    return;
    }
    session_destroy();
    header("Location: http://".$_SERVER['HTTP_HOST']);
?>
