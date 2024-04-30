<?php
require_once('/var/www/html/moodle/config-ext.php');

$query = "SELECT UserId, UserName FROM User WHERE Rol = 'Asesor'";
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

$asesoresFull = "";
foreach($asesores as $asesor) {
    $asesoresFull .= '<option value="' . $asesor['UserId'] . '">' . $asesor['UserId'] . '</option>';
}

mysqli_free_result($result);
?>