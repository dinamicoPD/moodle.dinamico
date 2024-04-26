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
$listadoColegios = "";
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


$selectCiudades .= "</optgroup>";


$sql2 = "SELECT c.colegioId, c.colegio, m.municipioId, m.municipio, d.departamento, d.departamentoId 
        FROM colegios As c
        JOIN municipio AS m ON c.municipioId = m.municipioId
        JOIN departamento AS d ON m.departamentoId = d.departamentoId
        ORDER BY d.departamento, m.municipio, c.colegio";
$result2 = $link->query($sql2);

$listadoColegios = "<tr><th>Colegio</th><th>Municipio</th><th>Departamento</th><th>Logo</th><th>Actualizar</th></tr>";

while($row2 = $result2->fetch_assoc()) {

    $uploadDir = 'diplomas/img/colegios/';
    $uploadFile = $uploadDir . $row2["colegioId"] . ".png";

    if (file_exists($uploadFile)) {
        $verLogo = "<img src='diplomas/img/colegios/".$row2["colegioId"].".png' alt=''>";
    }else{
        $verLogo = "";
    }

    $listadoColegios .= "
    <tr>
        <td>[".$row2["colegioId"]."] ".$row2["colegio"]."</td>
        <td>[".$row2["municipioId"]."] ".$row2["municipio"]."</td>
        <td>[".$row2["departamentoId"]."] ".$row2["departamento"]."</td>
        <td class='imagenLogo table-secondary'>".$verLogo."</td>
        <td><button type='button' class='btn btnPlataforma' onclick='Actualizar(\"".$row2["colegioId"]."\", \"".$row2["colegio"]."\")'>Actualizar</button></td>
    </tr>
    ";
}


// Cerrar la conexión a la base de datos
$link->close();


?>