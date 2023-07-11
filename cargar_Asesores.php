<?php
require_once('../../config-ext.php');

$query = "SELECT Id_asesor, Nombre_asesor FROM Asesor";
$result = mysqli_query($link, $query);

if(!$result) {
    die("ERROR: Could not execute $query. " . mysqli_error($link));
}

$asesores = array();

if(mysqli_num_rows($result) > 0) {
 
    while($row = mysqli_fetch_assoc($result)) {
        $asesores[] = $row;
    }
}

mysqli_free_result($result);
?>