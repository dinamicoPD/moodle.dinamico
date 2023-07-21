<?php
require_once('../../config-ext.php');

$dataReceived = json_decode(file_get_contents('php://input'), true);
if (is_array($dataReceived)) {
    $count = $dataReceived['count'] ?? 0;
    $count_2 = $dataReceived['count_2'] ?? 0;
    $email = filter_var($dataReceived['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $nombre = filter_var($dataReceived['FirstName'] ?? '', FILTER_SANITIZE_STRING);
    $nombre .= ',' . filter_var($dataReceived['MiddleName'] ?? '', FILTER_SANITIZE_STRING);
    $nombre .= ',' . filter_var($dataReceived['LastName'] ?? '', FILTER_SANITIZE_STRING);
    $nombre .= ',' . filter_var($dataReceived['SecondLastName'] ?? '', FILTER_SANITIZE_STRING);
    $phone = filter_var($dataReceived['Tel'] ?? '', FILTER_SANITIZE_STRING);
    $asesor = $dataReceived['asesor'] ?? '';
    $asesorData = implode(",", $asesor);
    $definitivoDel = '';

    for ($i = 0; $i <= $count; $i++) {
        $valorDepar = "departamento_" . $i;
        $departamento = $dataReceived[$valorDepar] ?? '';
        if (!empty($departamento)) {
            $departamentoData = implode(",", $departamento);
            $definitivoDel .= $departamentoData . ",";
            $valorciudad = "ciudad_" . $i;
            $ciudad = $dataReceived[$valorciudad] ?? '';

            if (!empty($ciudad)) {
                $ciudadData = implode(",", $ciudad);
                $definitivoDel .= $ciudadData . ",";
            }

            $valorinstituto = "instituto_" . $i;
            $instituto = $dataReceived[$valorinstituto] ?? '';
            if (!empty($instituto)) {
                $institutoData = implode(",", $instituto);
                $definitivoDel .= $institutoData . ",";
            }

            $valorotro = "otro_" . $i;
            $otro = $dataReceived[$valorotro] ?? '';
            if (!empty($otro)){
                $definitivoDel .= $otro . ",";
            }else{
                $definitivoDel .= "NO,";
            }
        }
    }

    $definitivoDel = substr($definitivoDel, 0, -1);

    $definitivoGrup = '';

    for ($i = 0; $i <= $count_2; $i++) {
        $valorCurso = "colegio_" . $i;
        $colegio = $dataReceived[$valorCurso] ?? '';
        if (!empty($colegio)) {
            $colegioData = implode(",", $colegio);
            $definitivoGrup .= $colegioData . ",";
            $valoredicion = "edicion_" . $i;
            $edicion = $dataReceived[$valoredicion] ?? '';
            if (!empty($edicion)) {
                $edicionData = implode(",", $edicion);
                $definitivoGrup .= $edicionData . ",";
            }
            $valorcurso = "curso_" . $i;
            $curso = $dataReceived[$valorcurso] ?? '';
            if (!empty($curso)) {
                $cursoData = implode(",", $curso);
                $definitivoGrup .= $cursoData . ",";
            }
            $valorsigla = "sigla_" . $i;
            $sigla = $dataReceived[$valorsigla] ?? '';
            if (!empty($sigla)) {
                $definitivoGrup .= $sigla . ",";
            }
        }
    }
    
    $definitivoGrup = rtrim($definitivoGrup, ",");

    $sql = "INSERT INTO PreDocentes (email, nombre, telefono, asesor, ubicacion, cursos) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("ssssss", $email, $nombre, $phone, $asesorData, $definitivoDel, $definitivoGrup);
     if ($stmt->execute()) {
        echo "Ya hemos registrado tu cuenta. Nuestro equipo está en proceso de verificar tu inscripción. Pronto recibirás una confirmación de acceso a la plataforma en el correo electrónico que nos diste: ".$email.".";
    } else {
        echo "Error al guardar tus datos: " . $stmt->error . " Contacta con soporte técnico para recibir ayuda";
    }
    $stmt->close();
    $link->close();
}
?>