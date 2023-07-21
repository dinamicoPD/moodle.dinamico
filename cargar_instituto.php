<?php
require_once('../../config-ext.php');

// Comprobar si el dato ha sido enviado y es válido
if(!isset($_POST['datoId']) || empty($_POST['datoId'])) {
    die("ERROR: Invalid data provided.");
}

$ciudadId = $_POST['datoId'];

$query = "SELECT colegioId, colegio, municipioId FROM colegios WHERE municipioId = ?";
$stmt = $link->prepare($query);
$stmt->bind_param("i", $ciudadId);
$stmt->execute();
$result = $stmt->get_result();

if(!$result) {
    die("ERROR: Could not execute $query. " . mysqli_error($link));
}

$institutos = array();
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $institutos[] = $row;
    }
}

$stmt->free_result();

$institutoSelect .= '<option selected disabled value="">Seleccionar</option>';
foreach($institutos as $instituto):
    $institutoSelect .= "
        <option value=\"".$instituto['colegioId']."\">".$instituto['colegio']."</option>
    ";
endforeach;
$institutoSelect .= "<option value='OTRO'>OTRA</option>";

echo $institutoSelect;
?>