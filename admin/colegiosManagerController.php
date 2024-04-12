<?php
if(isset($_GET['mensaje'])){
    $variable1 = '<div class="alert alert-danger" role="alert">
        '.$_GET['mensaje'].'
      </div>';
} else {
    $variable1 = "";
}

require_once('../../../config-ext.php');

$sql = "    SELECT d.departamento, c.municipio, c.municipioId
            FROM departamento d
            INNER JOIN municipio c ON d.departamentoId = c.departamentoId ORDER BY d.departamento, c.municipio";
$result = $link->query($sql);

// Variables para mantener el seguimiento del departamento actual
$current_department = "";
$selectCiudades = "";
// Iterar sobre los resultados de la consulta
while($row = $result->fetch_assoc()) {
    $nombre_departamento = $row["departamento"];
    $nombre_ciudad = $row["municipio"];
    $id_ciudad = $row["municipioId"];
    
    // Si el departamento actual es diferente al anterior, crear un nuevo grupo
    if ($nombre_departamento != $current_department) {
        if ($current_department != "") {
            $selectCiudades .= "</optgroup>";
        }
        $selectCiudades .= "<optgroup label=\"$nombre_departamento\">";
        $current_department = $nombre_departamento;
    }
    
    // Imprimir la opción de la ciudad
    $selectCiudades .= "<option value=\"$id_ciudad\">$nombre_ciudad</option>";
}

// Cerrar el último grupo
$selectCiudades .= "</optgroup>";

// Cerrar la conexión a la base de datos
$link->close();


?>