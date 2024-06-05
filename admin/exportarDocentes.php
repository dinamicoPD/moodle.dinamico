<?php
session_start();

if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] != true){
    header("location: AdminLogin.php");
    exit;
}

header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");

include("colegios.php");
include("controllerLicenciasPrf.php");

$construtorHTML = "";
$loscolegios = $resultcolegios;

$construtorHTML = "<tr>
    <th>Código</th>
    <th>Grupo</th>
    <th>Texto</th>
    <th>Departamento</th>
    <th>Municipio</th>
    <th>Colegio</th>
    <th>Licencia</th>
    <th>Titulo</th>
    <th>Nombre</th>
    <th>Usuario</th>
    <th>Teléfono</th>
    <th>Asesor</th>
</tr>";

while ($row = mysqli_fetch_assoc($resultProfe)) {
    $nombreCompleto = $row['FirstName'] ." ". $row['MiddleName'] ." ". $row['LastName'] ." ". $row['SecondLastName'];
    $correo = $row['Email'];
    $idUser = $row['UserId'];
    $nombreUser = $row['UserName'];
    $telefono = $row['Phone'];
    $asesor = $row['id_usuario'];
    if (!empty($asesor)) {
        $asesorName = asesorName($link, $asesor);
    }else{
        $asesorName = "";
    }
    $codigoLicencia = $row['Code'];
    $curso = $row['CourseName'];
    $grupo = $row['GroupCode'];
    $codigoGrupo = $row['GroupKey'];
    $LicenceId = $row['LicenceId'];
    $Title = $row['Title'];
    $parts = explode('_', $codigoGrupo);
    $numero = $parts[1];
   
    foreach ($loscolegios as $colegio) {
        if ($colegio['colegioId'] === $numero){
            $nombreColegio = $colegio['colegio'];
            $nombreMunicipio = $colegio['municipio'];
            $nombreDepartamento = $colegio['departamento'];
        }
    }
        $construtorHTML .= "
            <tr>
                <td>".$codigoGrupo."</td>
                <td>".$grupo."</td>
                <td>".$curso."</td>
                <td>".$nombreDepartamento."</td>
                <td>".$nombreMunicipio."</td>
                <td>".$nombreColegio."</td>               
                <td>".$codigoLicencia."</td>
                <td>".$Title."</td>
                <td>".$nombreCompleto."</td>
                <td>".$nombreUser."</td>
                <td>".$telefono."</td>
                <td>".$asesorName."</td>
            </tr>";
}

$construtorHTML = "<table border='1'>".$construtorHTML."</table>";

header("content-Disposition: attachment; filename=datos-licenciasDocentes.xls");

function asesorName($link, $asesor){
    include_once("../../../config-ext.php");

    $sql = "SELECT FirstName, MiddleName, LastName, SecondLastName FROM User WHERE UserId = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $asesor);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    
    // Concatenar los campos
    $fullName = $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['LastName'] . " " . $row['SecondLastName'];

    return $fullName;

}
?>
<html>
    <body>
        <?php echo $construtorHTML;?>
    </body>
</html>