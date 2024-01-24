<?php
$consulta = "SELECT COUNT(*) AS total FROM PreDocentes WHERE confirmado = 0";
$result = $link->query($consulta);
if ($result->num_rows > 0) {
    // Obtener el resultado de la consulta
    $row = $result->fetch_assoc();
    $totalRegistros = $row["total"];
} else {
    $totalRegistros = 0;
}
?>