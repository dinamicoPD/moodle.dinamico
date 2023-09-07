<?php
require_once('../../config-ext.php');
$gruposFull = $_POST['gruposFull'];
$registro = $_POST['registro'];

$sql = "UPDATE PreDocentes SET cursos = '$gruposFull' WHERE Id_preDocente = $registro";

if (mysqli_query($link, $sql)) {
    echo "1";
}else{
    echo "0";
}
// Cerrar la conexión
mysqli_close($link);
?>