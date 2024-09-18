<?php
require_once('/var/www/html/moodle/config-ext.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valor = isset($_POST["valor"]) ? $_POST["valor"] : '';
    $valor = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
    $cadena_decodificada = base64_decode($valor);
    $arrayvalor = array_map('trim', explode(",", $cadena_decodificada));

    $valorInput = isset($_POST["valorInput"]) ? $_POST["valorInput"] : '';
    $valorInput = htmlspecialchars($valorInput, ENT_QUOTES, 'UTF-8');

    if (count($arrayvalor) < 3) {
        echo "Error: Datos insuficientes.";
        exit;
    }

    $nombreColegio = $valorInput;
    $id_municipio = (int)$arrayvalor[1];
    $id_solicitud = (int)$arrayvalor[2];

    $sql_1 = "INSERT INTO colegios (colegio, municipioId) VALUES (?, ?)";
    $stmt = $link->prepare($sql_1);
    if ($stmt) {
        $stmt->bind_param("si", $nombreColegio, $id_municipio);
        if ($stmt->execute()) {
            $id_insertado = $link->insert_id;
            $sql_2 = "UPDATE FestivalSolicitud SET colegioId = ?, colegioOtro = NULL WHERE id_solicitud = ?";
            $stmt_2 = $link->prepare($sql_2);
            if ($stmt_2) {
                $stmt_2->bind_param("ii", $id_insertado, $id_solicitud);
                if ($stmt_2->execute()) {
                    include_once('catalogoFestivalesController.php');
                    echo $solicitud;
                } else {
                    echo "Error en la actualización: " . $stmt_2->error;
                }
                $stmt_2->close();
            } else {
                echo "Error en la preparación de la consulta de actualización: " . $link->error;
            }
        } else {
            echo "Error en la inserción: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta de inserción: " . $link->error;
    }
}
?>