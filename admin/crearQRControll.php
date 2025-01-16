<?php
function generado($nombreQR, $tituloQR, $aterrizaje, $proyectoQR_crear, $link){
    $fecha = date('Y-m-d');
    
    $sql = "INSERT INTO QR_generado (titulo, qr, fecha, id_aterrizaje, id_proyecto) VALUES (?, ?, ?, ?, ?)";
    
    if ($stmt = $link->prepare($sql)) {
        $stmt->bind_param("ssssi", $tituloQR, $nombreQR, $fecha, $aterrizaje, $proyectoQR_crear);
        
        if ($stmt->execute()){
            $idInsercion = $link->insert_id;
            $stmt->close();
            return $idInsercion;
        } else {
            error_log("Error en la ejecución: " . $stmt->error);
            $stmt->close();
            return false;
        }
    } else {
        error_log("Error en la preparación: " . $link->error);
        return false;
    }
}

function generarEnlaces($id_generado, $nombreEnlaces, $enlaces, $link) {
    $sql = "INSERT INTO QR_enlaces (id_generado, url, tituloQR) VALUES (?, ?, ?)";
    if ($stmt = $link->prepare($sql)) {
        $stmt->bind_param("iss", $id_generado, $url, $tituloQR);
        $count = count($nombreEnlaces);
        $exitos = true; 

        for ($i = 0; $i < $count; $i++) {
            $url = $enlaces[$i];
            $tituloQR = $nombreEnlaces[$i];
            if (!$stmt->execute()) {
                error_log("Error al ejecutar la declaración: " . $stmt->error);
                $exitos = false;
            }
        }

        $stmt->close();
        return $exitos;
    } else {
        error_log("Error al preparar la declaración: " . $link->error);
        return false;
    }  
}

function generarQR($url, $nombreQR){
    require_once('/var/www/html/moodle/moodle/dinapage/phpqrcode/qrlib.php');
    $filenameQR_2 = 'qr/'.$nombreQR;
    $tamanio = 10;
    $level = 'L';
    $frameSize = 2;
    $contenido = $url;
    QRcode::png($contenido, $filenameQR_2, $level, $tamanio, $frameSize);
    return "Creado";
}