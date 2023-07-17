<?php
require_once('../../config-ext.php');

if(isset($_POST['datoId']) && is_numeric($_POST['datoId'])){
    $departamentoId = $_POST['datoId'];
} else {
    die("ERROR: datoId is not set or not valid.");
}

// municipio
$query = "SELECT municipioId, municipio, departamentoId FROM municipio WHERE departamentoId = ?";
$stmt = $link->prepare($query);
$stmt->bind_param("i", $departamentoId);
$stmt->execute();
$result = $stmt->get_result();

if(!$result) {
    die("ERROR: Could not execute $query. " . mysqli_error($link));
}

$municipios = array();
// Comprobar si la consulta ha devuelto filas
if($result->num_rows > 0) {
    // Almacenar los resultados en la variable $departamentos
    while($row = $result->fetch_assoc()) {
        $municipios[] = $row;
    }
}

$stmt->free_result();

$municipioSelect = "<option selected disabled value=\"\">Seleccionar</option>";
foreach($municipios as $municipio):
    $municipioSelect .= "
        <option value=\"".$municipio['municipioId']."\">".$municipio['municipio']."</option>
    ";
endforeach;

echo $municipioSelect;
?>