<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $generar = isset($_POST['generar']) ? $_POST['generar'] : null;
    include("../../../config-ext.php");
    if ($generar === "1") {
        $codigoGenerado = generarCodigo($link);
        echo $codigoGenerado;
    }
    if ($generar === "2") {
        include("../../../config-ext.php");
        $rol = isset($_POST['rol']) ? $_POST['rol'] : null;
        $totalLicencias = isset($_POST['totalLicencias']) ? $_POST['totalLicencias'] : null;
        $tituloLicencias = isset($_POST['tituloLicencias']) ? $_POST['tituloLicencias'] : null;

        if (!$rol || !$totalLicencias || !$tituloLicencias) {
            return;
        }else{
            generarMasivoLicence($link, $rol, $totalLicencias, $tituloLicencias);
        }        
    }
}else{
    return;
}

function generarMasivoLicence($link, $rol, $totalLicencias, $tituloLicencias){
    $fechaActual = date("Y-m-d H:i:s");
    $nuevaFecha = date("Y-m-d H:i:s", strtotime('+1 year', strtotime($fechaActual)));

    for($i=0;$i<$totalLicencias;$i++){
        $codigoLicencia = generarCodigo($link);
        $stmt = $link->prepare("INSERT Licence SET Type = ?, Code = ?, Title = ?, StartDate = ?, FinishDate = ?");
            $stmt->bind_param("sssss", $rol, $codigoLicencia, $tituloLicencias, $fechaActual, $nuevaFecha);
            $stmt->execute();
            $stmt->close();
    }

    echo "ok";
}

function generarCodigo($link) {

    $cadena = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#$%&/)+=*";
    $longitudCadena = strlen($cadena);
    $codigoGenerar = "";

    for($i = 0; $i < 8; $i++) {
        $randomPosicion = rand(0, $longitudCadena - 1);
        $codigoGenerar .= $cadena[$randomPosicion];
    }

    if (preg_match('/[A-Z]/', $codigoGenerar) && preg_match('/[a-z]/', $codigoGenerar) && preg_match('/[0-9]/', $codigoGenerar) && preg_match('/[!#\$%&\/\)\+\=\*]/', $codigoGenerar)) {
        
        if (passwordExists($link, $codigoGenerar)) {
            // Si existe, generamos una nueva
            return generarCodigo($link);
        } else {
            // Si no existe, retornamos esta contraseña
            return $codigoGenerar;
        }
    } else {
        // Si no se cumplen las condiciones, generamos una nueva contraseña
        return generarCodigo($link);
    }
}

function passwordExists($link, $codigoGenerar) {
    // Preparamos la consulta
    if ($stmt = $link->prepare("SELECT Code FROM Licence WHERE Code = ?")) {
        // Asociamos los parámetros
        $stmt->bind_param("s", $codigoGenerar);
        // Ejecutamos la consulta
        $stmt->execute();
        // Obtenemos los resultados
        $stmt->store_result();
        // Verificamos si encontró alguna coincidencia
        if ($stmt->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        echo "Error preparando la consulta: " . $link->error;
    }
}