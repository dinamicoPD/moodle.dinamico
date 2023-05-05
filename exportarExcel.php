<?php
include("../../config-ext.php");
mysqli_set_charset($link, "utf8");
$option = $_GET["perfil"];
$perfil= "";

header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");

if ($option == 1){
    $licencias="SELECT * FROM Licence WHERE Type LIKE 'E'";
    header("content-Disposition: attachment; filename=datos-licencias-estudiantes.xls");
    $perfil = "Estudiantes";
}

if ($option == 2){
    $licencias="SELECT * FROM Licence WHERE Type LIKE 'P'";
    header("content-Disposition: attachment; filename=datos-licencias-profesores.xls");
    $perfil = "Profesores";
}
?>

<table>
    <caption>Licencias disponibles <?php echo $perfil;?></caption>
    <tr>
        <th>LicenceId</th>
        <th>Code</th>
    </tr>
<?php $resultado = mysqli_query($link, $licencias);
while($row=mysqli_fetch_assoc($resultado)) {
    if ($row["UserId"] == null){
    
    ?>
    <tr>
        <td><?php echo $row["LicenceId"]; ?></td>
        <td><?php echo $row["Code"]; ?></td>
    </tr>
<?php }} mysqli_free_result($resultado);?>
</table>
