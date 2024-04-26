<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $idColegio = filter_input(INPUT_POST, 'idColegio', FILTER_SANITIZE_NUMBER_INT);
    $Colegio = filter_input(INPUT_POST, 'Colegio', FILTER_SANITIZE_STRING);
    $Colegioborrar = filter_input(INPUT_POST, 'Colegioborrar', FILTER_SANITIZE_STRING);
    $Colegio = strtoupper($Colegio);
    $nuevoID = $idColegio;
    $uploadDir = 'diplomas/img/colegios/';
    $uploadFile = $uploadDir . $nuevoID . "." . pathinfo($_FILES['inputImglogo']['name'], PATHINFO_EXTENSION);
    require_once('../../../config-ext.php');
    if($Colegioborrar === "0"){
        if(isset($_FILES['inputImglogo']) && $_FILES['inputImglogo']['error'] === UPLOAD_ERR_OK){
            if(!file_exists($uploadDir)){
                mkdir($uploadDir, 0777, true);
            }
            move_uploaded_file($_FILES['inputImglogo']['tmp_name'], $uploadFile);
        }

        $sql = "UPDATE colegios SET colegio = ? WHERE colegioId = ?";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("si", $Colegio, $idColegio);
        if($stmt->execute()){
            $stmt->close(); // Cerrar la declaración preparada
            $link->close(); // Cerrar la conexión a la base de datos
            header("Location: colegiosManager.php");
            exit;
        }
    } elseif($Colegioborrar === "1"){
        if (file_exists($uploadFile)) {
            unlink($uploadFile);
        }
        
        $sql = "DELETE FROM colegios WHERE colegioId = ?";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("i", $idColegio);
        if ($stmt->execute()) {
            $stmt->close(); // Cerrar la declaración preparada
            $link->close(); // Cerrar la conexión a la base de datos
            header("Location: colegiosManager.php");
            exit;
        }
    }
}