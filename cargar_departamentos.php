<?php
require_once('../../config-ext.php');

// departamento
$query = "SELECT departamentoId, departamento FROM departamento";
$result = mysqli_query($link, $query);

if(!$result) {
    die("ERROR: Could not execute $query. " . mysqli_error($link));
}

// Comprobar si la consulta ha devuelto filas
if(mysqli_num_rows($result) > 0) {
    // Almacenar los resultados en la variable $departamentos
    while($row = mysqli_fetch_assoc($result)) {
        $departamentos[] = $row;
    }
}

mysqli_free_result($result);
?>