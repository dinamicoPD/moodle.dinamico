<?php
setlocale(LC_ALL, "en_US.UTF-8");
session_start();
if(!isset($_SESSION["loggedinRegisterStudent"]) || $_SESSION["loggedinRegisterStudent"] != true){
    header("location: LoginSTD.php");
    exit;
}

require_once('../../config-ext.php');

$IdGroupFound=$_SESSION["GrpId"];
$codigoGrupo = $_SESSION["groupcode"];
$IdLicenceToChange = $_SESSION["licenceId"];

$parts = explode('_', $codigoGrupo);
if (count($parts) > 1 && is_numeric($parts[1])) {
    $numero = $parts[1];
    $query = "SELECT colegios.colegio, municipio.municipio FROM colegios INNER JOIN municipio ON colegios.municipioId = municipio.municipioId WHERE colegios.colegioId = ?";
    $stmt = $link->prepare($query);
    if (!$stmt) {
        die("ERROR: Could not prepare query. " . $link->error);
    }
    $stmt->bind_param("i", $numero);
    $stmt->execute();
    $stmt->bind_result($nombreColegio, $nombreMunicipio);
    $stmt->fetch();
    $stmt->close();
    $bloqueo = "readonly";
} else {
    $nombreColegio = null;
    $nombreMunicipio = null;

    $bloqueo = null;
}

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

?>