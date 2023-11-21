<?php
include("../../../config-ext.php");
mysqli_set_charset($link, "utf8");
header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");

if(isset($_GET['filtro']) && $_GET['filtro'] != ""){
    $filtro = $_GET['filtro'];
    $perfil = "";
    $sql = "SELECT * FROM Licence WHERE UserId IS NULL AND (Code LIKE '%$filtro%' OR Type LIKE '%$filtro%' OR Title LIKE '%$filtro%')";
}elseif(isset($_GET['rol'])){
    $rol = $_GET['rol'];
    if($rol == "1"){
        $sql = "SELECT * FROM Licence WHERE UserId IS NULL";
        $perfil = "";
    }
    if($rol == "2"){
        $sql = "SELECT * FROM Licence WHERE Type LIKE 'E' AND UserId IS NULL";
        $perfil = "Estudiantes";
    }
    if($rol == "3"){
        $sql = "SELECT * FROM Licence WHERE Type LIKE 'P' AND UserId IS NULL";
        $perfil = "Profesores";
    }
}

$result = $link->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $licenciasHTML .= "
            <tr>
                <td>".$row['LicenceId']."</td>
                <td>".$row['Code']."</td>
                <td>".$row['Title']."</td>
                <td>".$row['StartDate']."</td>
                <td>".$row['FinishDate']."</td>
            </tr>";
    }
}

header("content-Disposition: attachment; filename=datos-licencias.xls");
?>
<table>
    <caption>Licencias disponibles <?php echo $perfil;?></caption>
    <tr>
        <th>LicenceId</th>
        <th>Code</th>
        <th>Titulo</th>
        <th>Fecha inicio</th>
        <th>Fecha fin</th>
    </tr>
    <?php echo $licenciasHTML;?>
</table>