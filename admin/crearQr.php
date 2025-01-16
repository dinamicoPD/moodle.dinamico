<?php
include('crearQRControll.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('/var/www/html/moodle/config-ext.php');

    $proyectoQR_crear = trim($_POST['proyectoQR_crear']);
    $tituloQR = trim($_POST['tituloQR']);
    $aterrizaje = trim($_POST['aterrizaje']);
    $aterrizaje = explode(",", $aterrizaje);
    $nombreEnlaces = $_POST['nombreEnlace'];
    $enlaces = $_POST['Enlace'];
    $nombreQR = "QR_".str_replace(' ', '_', $tituloQR).$proyectoQR_crear.".png";

    $id_generado = generado($nombreQR, $tituloQR, $aterrizaje[0], $proyectoQR_crear, $link);
    $generarEnlaces = generarEnlaces($id_generado, $nombreEnlaces, $enlaces, $link);
    $url = 'https://dinamicopd.com/codeQR/'.$aterrizaje[1].'?qr='.$id_generado;

    $generado = generarQR($url, $nombreQR);

    header("Location: generadorQR.php?proyecto=".$proyectoQR_crear);
}