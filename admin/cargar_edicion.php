<?php
require_once('../../../config-ext.php');

// departamento
$query = "SELECT id_categories, name_categories	FROM categories";
$result = mysqli_query($link, $query);

if(!$result) {
    die("ERROR: Could not execute $query. " . mysqli_error($link));
}

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $ediciones[] = $row;
    }
}

mysqli_free_result($result);

$edicionFull = "";
foreach($ediciones as $edicion) {
    $edicionFull .= '<option value="' . $edicion['id_categories'] . '">' . $edicion['name_categories'] . '</option>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $edicionFull_1 = '<option selected disabled value="">Seleccionar</option>' . $edicionFull;
    echo $edicionFull_1;
}
?>