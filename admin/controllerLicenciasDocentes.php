<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cantidad_registros = isset($_POST['cantidad_registros']) ? $_POST['cantidad_registros'] : null;
    $posicion = isset($_POST['posicion']) ? $_POST['posicion'] : null;
    $searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : null;
} else {
    $cantidad_registros = 25;
    $posicion = 1;
    $searchTerm = "";
}

include("../../../config-ext.php");

$stmt = mysqli_prepare($link, "SELECT COUNT(*) as total FROM User WHERE Rol = ?");
mysqli_stmt_bind_param($stmt, "s", $perfil);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

if ($resultado) {
    $row = mysqli_fetch_assoc($resultado);
    $cantidad = $row['total'];
}

$totalDivicion = ceil($cantidad / $cantidad_registros);

$inicio_registros = ($cantidad_registros * $posicion) - $cantidad_registros;

$licenciasHTML = $cantidad . " - " . $totalDivicion;
?>