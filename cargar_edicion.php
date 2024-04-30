<?php
require_once('/var/www/html/moodle/config-ext.php');

// departamento
$query = "SELECT id_categories, name_categories	FROM categories";
$result = mysqli_query($link, $query);

if(!$result) {
    die("ERROR: Could not execute $query. " . mysqli_error($link));
}

// Comprobar si la consulta ha devuelto filas
if(mysqli_num_rows($result) > 0) {
    // Almacenar los resultados en la variable $departamentos
    while($row = mysqli_fetch_assoc($result)) {
        $ediciones[] = $row;
    }
}

mysqli_free_result($result);

$edicionFull = "";
foreach($ediciones as $edicion) {
    $edicionFull .= '<option value="' . $edicion['id_categories'] . '">' . $edicion['name_categories'] . '</option>';
}

?>