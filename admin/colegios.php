<?php
include("../../../config-ext.php");

$queryColegios="SELECT colegios.colegioId, colegios.colegio, municipio.municipio, departamento.departamento
FROM colegios
INNER JOIN municipio ON colegios.municipioId = municipio.municipioId
INNER JOIN departamento ON municipio.departamentoId = departamento.departamentoId";

$resultColegios = mysqli_query($link, $queryColegios);
$resultcolegios = mysqli_fetch_all($resultColegios, MYSQLI_ASSOC);

?>