<?php
require_once('../../config-ext.php');
$sql = "DELETE FROM ConfirmaCodigo WHERE (verificado = 0 AND CodigoFecha < NOW()) OR (verificado = 1 AND Email IN (SELECT Email FROM User))";
$result = $link->query($sql);
if ($result) {
   echo "Registros eliminados exitosamente.";
} else {
   echo "Error al eliminar registros: " . $link->error;
}
?>