<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    return;
}

include("../../../config-ext.php");

if (isset($_POST['searchTerm'])) {
    $searchTerm = $_POST['searchTerm'];

    $query = "SELECT * FROM Licence WHERE Code LIKE '%$searchTerm%' OR Type LIKE '%$searchTerm%' OR Title LIKE '%$searchTerm%'";
    $result = $link->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $licenciasHTML .= "
    <tr>
        <th class='text-center' scope='row'>".$row['LicenceId']."</th>
        <td class='text-center monospaceFont'>".$row['Code']."</td>
        <td class='text-center'>";

        $licenciasHTML .= $row['Type'];

    $licenciasHTML .= 
    "</td>
        <td class='text-center'>".$row['Title']."</td>
        <td class='text-center'><button class='botonDP hover botonDP_4' type='button'>Actualizar</button></td>
        <td class='text-center'><input type='checkbox'></td>
    </tr>  
    ";
        }

        echo $licenciasHTML;

    } else {
        echo "No se encontraron coincidencias.";
    }
}

$link->close();