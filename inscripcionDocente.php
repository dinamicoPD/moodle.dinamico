<?php
require_once('../../config-ext.php');

$dataReceived = json_decode(file_get_contents('php://input'), true);
if (is_array($dataReceived)) {
    $count = $dataReceived['count'] ?? 0;
    $count_2 = $dataReceived['count_2'] ?? 0;
    $email = filter_var($dataReceived['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $FirstName = filter_var($dataReceived['FirstName'] ?? '', FILTER_SANITIZE_STRING);
    $MiddleName = filter_var($dataReceived['MiddleName'] ?? '', FILTER_SANITIZE_STRING);
    $LastName = filter_var($dataReceived['LastName'] ?? '', FILTER_SANITIZE_STRING);
    $SecondLastName = filter_var($dataReceived['SecondLastName'] ?? '', FILTER_SANITIZE_STRING);
    $phone = filter_var($dataReceived['Tel'] ?? '', FILTER_SANITIZE_STRING);
    $asesor = $dataReceived['asesor'] ?? '';
    $asesorData = reset($asesor);
    $definitivoDel = '';

    $email = strtolower(trim($email));
    $FirstName = ucfirst(strtolower(trim($FirstName)));
    $MiddleName = ucfirst(strtolower(trim($MiddleName)));
    $LastName = ucfirst(strtolower(trim($LastName)));
    $SecondLastName = ucfirst(strtolower(trim($SecondLastName)));

    $nombre = $FirstName . ',' . $MiddleName . ',' . $LastName . ',' . $SecondLastName;

    $sqlSearch = "SELECT Id_preDocente FROM PreDocentes WHERE email = ? LIMIT 1";
    $stmtSearch = $link->prepare($sqlSearch);
    $stmtSearch->bind_param("s", $email);
    $stmtSearch->execute();
    $resultSearch = $stmtSearch->get_result();

    if ($resultSearch->num_rows > 0) {
        $rowSearch = $resultSearch->fetch_assoc();
        $idRegistroSearch = $rowSearch['Id_preDocente'];
    } else {
        $idRegistroSearch = 0;
    }

    $esAsesor = 0;
    $esSoporte = 0;

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
                $institutoArray = explode(",", $institutoData);
                $primerValorinstituto = $institutoArray[0];
                if ($primerValorinstituto == 1){
                    $esAsesor++;
                }
                if ($primerValorinstituto == 2){
                    $esSoporte++;
                }
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

    if ($esAsesor > 0){
        $esAsesor = 1;
    }else{
        $esAsesor = 0;
    }

    if ($esSoporte > 0){
        $esSoporte = 1;
    }else{
        $esSoporte = 0;
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

    if ($idRegistroSearch == 0){
        $sql = "INSERT INTO PreDocentes (email, nombre, telefono, asesor, ubicacion, cursos, esAsesor, esSoporte) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("ssssssii", $email, $nombre, $phone, $asesorData, $definitivoDel, $definitivoGrup, $esAsesor, $esSoporte);
        if ($stmt->execute()) {
            echo "Ya hemos registrado tu cuenta. Nuestro equipo está en proceso de verificar tu inscripción. Pronto recibirás una confirmación de acceso a la plataforma en el correo electrónico que nos diste: ".$email.".";
        } else {
            echo "Error al guardar tus datos: " . $stmt->error . " Contacta con soporte técnico para recibir ayuda";
        }
        $stmt->close();
        $link->close();
    }else{
        $estado = 0;
        $sql_3 = "UPDATE PreDocentes SET email = ?, nombre = ?, telefono = ?, asesor = ?, ubicacion = ?, cursos = ?, confirmado = ?, esAsesor = ?, esSoporte = ? WHERE Id_preDocente = ?";
        $stmt_3 = $link->prepare($sql_3);
        $stmt_3->bind_param("ssssssiiii", $email, $nombre, $phone, $asesorData, $definitivoDel, $definitivoGrup, $estado, $esAsesor, $esSoporte, $idRegistroSearch);
        if ($stmt_3->execute()) {
            echo "Ya hemos registrado tu cuenta. Nuestro equipo está en proceso de verificar tu inscripción. Pronto recibirás una confirmación de acceso a la plataforma en el correo electrónico que nos diste: ".$email.".";
        } else {
            throw new Exception("Error al modificar el registro: " . $stmt_3->error);
        }
        // Cerrar la conexión
        $stmt_3->close();
        $link->close();
    } 
}
?>