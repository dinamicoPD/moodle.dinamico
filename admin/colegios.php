<?php
include("../../../config-ext.php");

$queryColegios="SELECT colegios.colegioId, colegios.colegio, municipio.municipio, departamento.departamento
FROM colegios
INNER JOIN municipio ON colegios.municipioId = municipio.municipioId
INNER JOIN departamento ON municipio.departamentoId = departamento.departamentoId";

$resultColegios = mysqli_query($link, $queryColegios);
$resultcolegios = mysqli_fetch_all($resultColegios, MYSQLI_ASSOC);

$link->close();
/*
echo "<table border='1'>
<tr>
<th>Colegio ID</th>
<th>Colegio</th>
<th>Municipio</th>
<th>Departamento</th>
</tr>";

while($row = $resultColegios->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["colegioId"] . "</td>";
    echo "<td>" . $row["colegio"] . "</td>";
    echo "<td>" . $row["municipio"] . "</td>";
    echo "<td>" . $row["departamento"] . "</td>";
    echo "</tr>";
}

echo "</table>";
*/
?>