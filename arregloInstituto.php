<?php
require_once('../../config-ext.php');
// Validar datos recibidos
$id_registro = $_POST['id_registro'] ?? '';
$ciudadId = $_POST['ciudadId'] ?? '';
$defOtro = $_POST['defOtro'] ?? '';
$newName = $_POST['newName'] ?? '';
$Instituto_ID = $_POST['instituto_1'] ?? '';
 if ($Instituto_ID == "" || $Instituto_ID == "OTRO") {
    // Verificar si el colegio ya existe
    $sql_check = "SELECT colegioId FROM colegios WHERE colegio = ? AND municipioId = ?";
    $stmt_check = $link->prepare($sql_check);
    $stmt_check->bind_param("ss", $defOtro, $ciudadId);
    $stmt_check->execute();
    $stmt_check->store_result();
     if ($stmt_check->num_rows > 0) {
        // El colegio ya existe, obtener el colegioId existente
        $stmt_check->bind_result($colegioId);
        $stmt_check->fetch();
        addColegio($link, $colegioId, $defOtro, $newName, $id_registro);
    } else {
        // Agregar nuevo colegio si no existe
        $sql_insert = "INSERT INTO colegios (colegio, municipioId) VALUES (?, ?)";
        $stmt_insert = $link->prepare($sql_insert);
        $stmt_insert->bind_param("ss", $defOtro, $ciudadId);
         if ($stmt_insert->execute()) {
            $colegioId = $stmt_insert->insert_id;
            addColegio($link, $colegioId, $defOtro, $newName, $id_registro);
            // Actualizar registros de docente
        } else {
            echo "Error al guardar tus datos: " . $stmt_insert->error . " Contacta con soporte técnico para recibir ayuda";
        }
         $stmt_insert->close();
    }
     $stmt_check->close();
} else {
    // Actualizar registros de docente
    $sql_1 = "SELECT colegio FROM colegios WHERE colegioId = ?";
    $stmt_1 = $link->prepare($sql_1);
    $stmt_1->bind_param("s", $Instituto_ID);
    $stmt_1->execute();
    $stmt_1->bind_result($colegio);
    $stmt_1->fetch();
    $stmt_1->close();
    addColegio($link, $Instituto_ID, $colegio, $newName, $id_registro);
}

 function addColegio($link, $institutoId, $institutoName, $Name, $id_registro){
    $sql_2 = "SELECT ubicacion, cursos FROM PreDocentes WHERE Id_preDocente = ?";
    $stmt_2 = $link->prepare($sql_2);
    $stmt_2->bind_param("s", $id_registro);
    $stmt_2->execute();
    $stmt_2->bind_result($ubicacion, $cursos);
    $stmt_2->fetch();
    $stmt_2->close();
    $cadenaUbicacion_1 = "OTRO,OTRA,".$Name;
    $cadenaUbicacion_2 = $institutoId.",".$institutoName.",NO";
    $newUbicacion = str_replace($cadenaUbicacion_1, $cadenaUbicacion_2, $ubicacion);
    $cadenaCursos_1 = "OTRO,".$Name;
    $cadenaCursos_2 = $institutoId.",".$institutoName;
    $newCursos = str_replace($cadenaCursos_1, $cadenaCursos_2, $cursos);

    modificarRegistro($link, $newUbicacion, $newCursos, $id_registro);
}

function modificarRegistro($link, $newUbicacion, $newCursos, $id_registro){

    $sql_3 = "UPDATE PreDocentes SET ubicacion = ?, cursos = ? WHERE Id_preDocente = ?";
    $stmt = $link->prepare($sql_3);
    $stmt->bind_param("ssi", $newUbicacion, $newCursos, $id_registro);
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