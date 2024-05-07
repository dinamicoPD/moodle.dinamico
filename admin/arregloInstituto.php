<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('/var/www/html/moodle/config-ext.php');
    $instituto_1 = $_POST['instituto_1'] ?? '';
    $defOtro = $_POST['defOtro'] ?? '';
    $newName = $_POST['newName'] ?? '';
    $ciudadId = $_POST['ciudadId'] ?? '';
    $consecutivo = $_POST['consecutivo'] ?? '';
    $id_registro = $_POST['id_registro'] ?? '';
    $errorMensaje = "";
    
    if(isset($link)){
        if($instituto_1 === "" || $instituto_1 === "OTRO"){
            if($defOtro === ""){
                $errorMensaje .= "Ingrese nombre del colegio";
                echo $errorMensaje;
                exit();
            }else{
                $instituto_1 = nuevoColegio($link, $defOtro, $ciudadId);
            }
        }

        $ubicacionArray = generarUbicacionNueva($link, $instituto_1);
        $grupos = generarGrupos($link, $ubicacionArray, $newName, $id_registro);
        $ubicacionAll = generarUbicacion($link, $ubicacionArray, $consecutivo, $id_registro);

        actualizarRegistro($link, $ubicacionAll, $grupos, $id_registro);
    }
}

function nuevoColegio($link, $defOtro, $ciudadId){
    $sql_insert = "INSERT INTO colegios (colegio, municipioId) VALUES (?, ?)";
    $stmt_insert = $link->prepare($sql_insert);
    $stmt_insert->bind_param("ss", $defOtro, $ciudadId);
        if ($stmt_insert->execute()) {
            $colegioId = $stmt_insert->insert_id;
            return $colegioId;
        }
}

function generarUbicacionNueva($link, $instituto_1){
    $sql_1 = 'SELECT d.departamentoId, d.departamento, m.municipioId, m.municipio, c.colegioId, c.colegio FROM colegios c INNER JOIN municipio m ON c.municipioId = m.municipioId INNER JOIN departamento d ON m.departamentoId = d.departamentoId WHERE c.colegioId = ?';
    $stmt = $link->prepare($sql_1);
    $stmt->bind_param("s", $instituto_1);
    $stmt->execute();
    $stmt->store_result();
    
    $stmt->bind_result($departamentoId, $departamento, $municipioId, $municipio, $colegioId, $colegio);
    
    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        $ubicacion = array( "departamentoId" => $departamentoId,
                            "departamento" => $departamento,
                            "municipioId" => $municipioId,
                            "municipio" => $municipio,
                            "colegioId" => $colegioId,
                            "colegio" => $colegio,
                            "estado" => "NO" );
        $stmt->close();
        return $ubicacion;
    }
}

function generarGrupos($link, $ubicacion, $newName, $id_registro){
    $sql = "SELECT cursos FROM PreDocentes WHERE Id_preDocente = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("s", $id_registro);
    $stmt->execute();
    $stmt->bind_result($cursos);
    $stmt->fetch();
    $stmt->close();

    $cursosArray = explode(',', $cursos);
    $total = count($cursosArray);

    for($i=0; $i<$total; $i++){
        if ($cursosArray[$i] === $newName){
            $cursosArray[$i-1] = $ubicacion["colegioId"];
            $cursosArray[$i] = $ubicacion["colegio"];
        }
    }

    $cursos = implode(',', $cursosArray);
    // crear nuevo grupo 
    return $cursos;
}

function generarUbicacion($link, $ubicacionArray, $consecutivo, $id_registro){
    $sql = "SELECT ubicacion FROM PreDocentes WHERE Id_preDocente = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("s", $id_registro);
    $stmt->execute();
    $stmt->bind_result($ubicacionBD);
    $stmt->fetch();
    $stmt->close();

    $ubicacion = explode(',', $ubicacionBD);

    $valorMax = ((intval($consecutivo) * 7))-1;
    $valorMin = $valorMax - 6;
    $a = 0;

    for($i=$valorMin; $i <= $valorMax; $i++){
        $a++;
        switch ($a) {
            case 1:
                $ubicacion[$i] = $ubicacionArray["departamentoId"];
                break;
            case 2:
                $ubicacion[$i] = $ubicacionArray["departamento"];
                break;
            case 3:
                $ubicacion[$i] = $ubicacionArray["municipioId"];
                break;
            case 4:
                $ubicacion[$i] = $ubicacionArray["municipio"];
                break;
            case 5:
                $ubicacion[$i] = $ubicacionArray["colegioId"];
                break;
            case 6:
                $ubicacion[$i] = $ubicacionArray["colegio"];
                break;
            case 7:
                $ubicacion[$i] = "NO";
                break;
        }
    }

    $ubicacionNueva = implode(',', $ubicacion);
    return $ubicacionNueva;
}

function actualizarRegistro($link, $ubicacion, $grupos, $id_registro){
    $sql_3 = "UPDATE PreDocentes SET ubicacion = ?, cursos = ? WHERE Id_preDocente = ?";
    $stmt = $link->prepare($sql_3);
    $stmt->bind_param("ssi", $ubicacion, $grupos, $id_registro);
     if ($stmt->execute()) {
        header("Location: VerificacionDocente.php");
        exit;
    } else {
        throw new Exception("Error al modificar el registro: " . $stmt->error);
    }
     // Cerrar la conexión
    $stmt->close();
    $link->close();
}
?>