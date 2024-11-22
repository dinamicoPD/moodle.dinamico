<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $downloadQR = $_POST["descargaQR"];
    $arrayQR = explode(",", $downloadQR);

    for ($i = 0; $i < count($arrayQR); $i++) {
        echo $arrayQR[$i] . "\n"; 
    }
}