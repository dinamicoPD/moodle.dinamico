<?php
session_start();

if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] != true){
    header("location: AdminLogin.php");
    exit;
}

include("../../../config-ext.php");
mysqli_set_charset($link, "utf8");
header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");

// Fixed code with prepared statements and initialized $licenciasHTML variable

$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "";
$rol = isset($_GET['rol']) ? $_GET['rol'] : "";

if ($filtro != "") {
    $sql = "SELECT * FROM Licence WHERE UserId IS NULL AND (Code LIKE '%$filtro%' OR Type LIKE '%$filtro%' OR Title LIKE '%$filtro%')";
} elseif ($rol == "1") {
    $sql = "SELECT Code FROM Licence WHERE UserId IS NULL";
} elseif ($rol == "2") {
    $sql = "SELECT Code FROM Licence WHERE Type LIKE 'E' AND UserId IS NULL";
    $perfil = "Estudiantes";
} elseif ($rol == "3") {
    $sql = "SELECT Code FROM Licence WHERE Type LIKE 'P' AND UserId IS NULL";
    $perfil = "Profesores";
}

$result = $link->query($sql);
$licenciasHTML = "";

if ($result->num_rows > 0) {
    $a = 0;
    $licenciasHTML .= "<table id=\"tabla_".$a."\">";
    $columna = 0;
    $filas = 0;
    while ($row = $result->fetch_assoc()) {
        $columna++;
        if ($columna === 1){
            $licenciasHTML .= "<tr>";
        }
        $licenciasHTML .= "<th>".$row['Code']."</th>";
        if ($columna === 7){
            $licenciasHTML .= "</tr>";
            $columna = 0;
            $filas++;
            if ($filas === 15){
                $a++;
                $licenciasHTML .= "</table>";
                $licenciasHTML .= "<br>";
                $licenciasHTML .= "<table id=\"tabla_".$a."\">";
                $filas = 0;
            }
        }
    }
    if ($columna !== 0){
        $licenciasHTML .= "</tr>";
    }
    $licenciasHTML .= "</table>";
}

header("content-Disposition: attachment; filename=datos-licencias.xls");
?>
<style>
    @font-face {
        font-family: 'RobotoMono-Regular', monospace;
        src: url("../font/RobotoMono-Regular.ttf");
    }
    table {
        border-collapse: collapse;
        margin: auto;
    }
    table th{
        border: 3px solid #000000;
        text-align: center;
        width: 12.4vw;
        height: 3.18vw;
        font-size: 1.7vw;
        font-family: 'RobotoMono-Regular';
    }
</style>
<body>
    <?php echo $licenciasHTML;?>
</html>