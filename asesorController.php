<?php
$is_nameAsesor = false;
$btnAsesor = "Verificar código";
$form_err = "";
$is_codAsesor_err = "";
$licenceAsesor = "";
$NameAsesor = "";
$bloqueoAsesor = "";


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../config-ext.php');
    $inputCodAsesor = filter_var($_POST["licenceAsesor"], FILTER_SANITIZE_NUMBER_INT);
    $is_nameAsesor = verificarAsesor($inputCodAsesor, $link);

    if($is_nameAsesor){
        $is_codAsesor_err = "is-valid";
        $licenceAsesor = $inputCodAsesor; 
        $btnAsesor = "Registro";
        $bloqueoAsesor = "readonly";
    }else{
        $is_codAsesor_err = "is-invalid";
        $form_err = "No fue posible verificar el código del asesor. Si tienes alguna duda, por favor comunícate al número <strong>314 470 5547</strong> o al correo <strong>soporte@dinamicopd.com</strong>";
        return;
    }

    $opcionAsesor = $_POST["nombresAsesores"];

    if($opcionAsesor == ""){
        $NameAsesor = muestraNombre($inputCodAsesor, $link);
        $form_err = "Selecciona el nombre del asesor para continuar";
    }else{
        $proceso = verificarAsesorNew($inputCodAsesor, $opcionAsesor, $link);
        if($proceso){
            session_start();
            $_SESSION["loggedinRegister"] = true;
            $_SESSION["codAsesor"] = $inputCodAsesor;
            header("location: PreRegistroDocente.php");
        }else{
            $form_err = "No fue posible verificar el código del asesor. Si tienes alguna duda, por favor comunícate al número <strong>314 470 5547</strong> o al correo <strong>soporte@dinamicopd.com</strong>";
            $is_nameAsesor = false;
            $btnAsesor = "Verificar código";
            $is_codAsesor_err = "";
            $licenceAsesor = "";
            $NameAsesor = "";
            $bloqueoAsesor = "";
        }
    }
}

function verificarAsesor($inputCodAsesor, $link) {
    $sql = "SELECT UserId FROM User WHERE UserId = ? AND Rol = ?";
    $stmt = $link->prepare($sql);
    $rol = 'Asesor';
    $stmt->bind_param("is", $inputCodAsesor, $rol);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0){
        return true;
    }else{
        return false;
    }
}

function muestraNombre($inputCodAsesor, $link) {
    $idEspecifico = $inputCodAsesor;
    $registros = [];

    $sql = "
        SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(UserName, '.', -2), '.', 1) AS UserNamePart1,
               SUBSTRING_INDEX(UserName, '.', -1) AS UserNamePart2
        FROM User
        WHERE UserId <> ? AND Rol <> 'Admin'
        ORDER BY UserId
        LIMIT 8
    ";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $idEspecifico);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $registros[] = htmlspecialchars($row['UserNamePart1'] . ' ' . $row['UserNamePart2'], ENT_QUOTES, 'UTF-8');
    }

    $sqlEspecifico = "
        SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(UserName, '.', -2), '.', 1) AS UserNamePart1,
               SUBSTRING_INDEX(UserName, '.', -1) AS UserNamePart2
        FROM User
        WHERE UserId = ? AND Rol <> 'Admin'
    ";
    $stmtEspecifico = $link->prepare($sqlEspecifico);
    $stmtEspecifico->bind_param("i", $idEspecifico);
    $stmtEspecifico->execute();
    $resultEspecifico = $stmtEspecifico->get_result();

    if ($row = $resultEspecifico->fetch_assoc()) {
        $registros[] = htmlspecialchars($row['UserNamePart1'] . ' ' . $row['UserNamePart2'], ENT_QUOTES, 'UTF-8');
    }

    shuffle($registros);

    $htmlOptions = '';
    foreach ($registros as $nombre) {
        $htmlOptions .= '<option value="'.$nombre.'">'.$nombre.'</option>';
    }

    return $htmlOptions;
}

function verificarAsesorNew($inputCodAsesor, $opcionAsesor, $link){
    $sql = "SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(UserName, '.', -2), '.', 1) AS UserNamePart1,
            SUBSTRING_INDEX(UserName, '.', -1) AS UserNamePart2
            FROM User
            WHERE UserId = ?";
    $stmt = $link->prepare($sql);
    
    if (!$stmt) {
        // Manejo de error si la preparación de la consulta falla
        return false;
    }

    $stmt->bind_param("i", $inputCodAsesor);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row['UserNamePart1'] . ' ' . $row['UserNamePart2'];
        return $nombre === $opcionAsesor;
    }

    return false;
}