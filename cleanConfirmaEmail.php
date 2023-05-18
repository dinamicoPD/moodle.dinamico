<?php
require_once('../../config-ext.php');

$currentDateTime = date('Y-m-d H:i:s');
$sql = "DELETE FROM ConfirmaCodigo WHERE (verificado = 0 AND CodigoFecha < '$currentDateTime') OR (verificado = 1 AND Email IN (SELECT Email FROM User))";
$result = $link->query($sql);

if ($result === true) {
    echo "Registros eliminados exitosamente.";
} else {
    echo "Error al eliminar registros: " . $conn->error;
}
?>