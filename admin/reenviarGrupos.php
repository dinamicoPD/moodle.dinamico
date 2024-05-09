<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("location: licenciasDocentes.php");
    return;
}

require_once('/var/www/html/moodle/config-ext.php');
require ('/var/www/html/moodle/moodle/dinapage/phpqrcode/qrlib.php');
include ('mailer.php');
$UserId = $_POST["idUser"];
$correo = $_POST["correo"];
$nombreUser = $_POST["nombreUser"];
$dominio = "https://dinamicopd.com";
$DIR = '/var/www/html/moodle/moodle/dinapage/temp/';
$filenameQR = $DIR.'QR';

$sql = "SELECT GroupKey FROM Enrolment WHERE UserId = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "i", $UserId);
mysqli_stmt_execute($stmt);
$resultgrupos = mysqli_stmt_get_result($stmt);
$codigoGe = "";
while ($row = mysqli_fetch_assoc($resultgrupos)) {
    // generar codigo QR
    $codGrupo = $row['GroupKey'];
    $filenameQR_2 = $filenameQR.$codGrupo.'.png';
    $tamanio = 10;
    $level = 'M';
    $frameSize = 2;
    $contenido = $dominio.'/moodle/dinapage/LoginSTD.php?d1n4m1c0='.urlencode($codGrupo);

    QRcode::png($contenido, $filenameQR_2, $level, $tamanio, $frameSize);

}

sendEmaiToTeacher($correo, $UserId, $nombreUser);

$carpeta = '/var/www/html/moodle/moodle/dinapage/temp';

    // Obtener la lista de archivos y carpetas dentro de la carpeta
$contenidoDIR = glob($carpeta . '/*');

    // Recorrer el contenido y eliminar cada archivo o carpeta
foreach ($contenidoDIR as $elemento) {

    if (is_file($elemento)) {
        unlink($elemento);  // Eliminar archivo
    } elseif (is_dir($elemento)) {
        rmdir($elemento);  // Eliminar carpeta vacía
    }

}

echo "Mensaje enviado con exito";
?>