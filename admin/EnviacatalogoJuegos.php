<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $InputTitulo = filter_input(INPUT_POST, 'InputTitulo', FILTER_SANITIZE_STRING);
    $InputObjetivo = filter_input(INPUT_POST, 'InputObjetivo', FILTER_SANITIZE_STRING);
    $InputMaterial = filter_input(INPUT_POST, 'InputMaterial', FILTER_SANITIZE_STRING);
    $InputEdades = filter_input(INPUT_POST, 'InputEdades', FILTER_SANITIZE_STRING);
    $InputValor = filter_input(INPUT_POST, 'InputValor', FILTER_SANITIZE_NUMBER_INT);
    $InputMedidas= filter_input(INPUT_POST, 'InputMedidas', FILTER_SANITIZE_STRING);
    $mensaje = "";
    $InputGuias = isset($_POST['InputGuias']) ? 1 : 0;

    if(isset($_FILES['inputImg']) && $_FILES['inputImg']['error'] === UPLOAD_ERR_OK){
        $uploadDir = 'uploads/';
        if(!file_exists($uploadDir)){
            mkdir($uploadDir, 0777, true);
        }
        $fileName = date('YmdHis') . "_" . $InputTitulo . "." . pathinfo($_FILES['inputImg']['name'], PATHINFO_EXTENSION);
        $uploadFile = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['inputImg']['tmp_name'], $uploadFile)){

            require_once('../../../config-ext.php');

            if ($link) {
                $sql = "INSERT INTO juegosCatalogo (titulo, objetivo, medidas, material, edades, valor, adjunto, guias) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($link, $sql);
                mysqli_stmt_bind_param($stmt, 'sssssiss', $InputTitulo, $InputObjetivo, $InputMedidas, $InputMaterial, $InputEdades, $InputValor, $fileName, $InputGuias);
        
                if (mysqli_stmt_execute($stmt)) {
                    $mensaje = "Datos insertados correctamente";
                    header("Location: catalogoJuegos.php?mensaje=".$mensaje);
                } else {
                    $mensaje = "Error al insertar los datos" . mysqli_error($link);
                    header("Location: catalogoJuegos.php?mensaje=".$mensaje);
                }
        
                mysqli_stmt_close($stmt);
            } else {
                $mensaje = "Error al conectar a la base de datos";
                header("Location: catalogoJuegos.php?mensaje=".$mensaje);
            }
        
            mysqli_close($link);

        }else{
            $mensaje =  "archivo no subido";
            header("Location: catalogoJuegos.php?mensaje=".$mensaje);
        }
    }    
}