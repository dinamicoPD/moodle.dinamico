<?php
session_start();

if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] != true){
    header("location: AdminLogin.php");
    exit;
}

//header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");

include("colegios.php");
include("controllerLicenciasPrf.php");

$construtorHTML = "";
$totalEstudaintes = "";
$loscolegios = $resultcolegios;

$construtorHTML = "<tr>
    <th>Código del grupo</th>
    <th>Grupo</th>
    <th>Texto</th>
    <th>Total Estudiantes</th>
    <th>Departamento</th>
    <th>Municipio</th>
    <th>Colegio</th>
    <th>Licencia docente</th>
    <th>Titulo</th>
    <th>Nombre</th>
    <th>Usuario</th>
    <th>Teléfono</th>
    <th>Email</th>
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
    $totalEstudaintes = totalEstudiante($link, $codigoGrupo);
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
                <td>".$totalEstudaintes."</td>
                <td>".$nombreDepartamento."</td>
                <td>".$nombreMunicipio."</td>
                <td>".$nombreColegio."</td>               
                <td>".$codigoLicencia."</td>
                <td>".$Title."</td>
                <td>".$nombreCompleto."</td>
                <td>".$nombreUser."</td>
                <td>".$telefono."</td>
                <td>".$correo."</td>
                <td>".$asesorName."</td>
            </tr>";
}

$construtorHTML = "<table border='1'>".$construtorHTML."</table>";

//header("content-Disposition: attachment; filename=datos-licenciasDocentes.xls");

function asesorName($link, $asesor){

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

function totalEstudiante($link, $codigoGrupo){
    $sql = "SELECT COUNT(Classroom.UserGrpId) AS total_registros
            FROM UserGrp
            JOIN Classroom ON UserGrp.UserGrpId = Classroom.UserGrpId
            WHERE UserGrp.EnrolmentKey = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $codigoGrupo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    return $row['total_registros'];
}
?>
<html>
    <body>
        <?php echo $construtorHTML;?>
    </body>
</html>