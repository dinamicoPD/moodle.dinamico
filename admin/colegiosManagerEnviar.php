<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $InputDepartamento = filter_input(INPUT_POST, 'inputDepartamento', FILTER_SANITIZE_NUMBER_INT);
    $InputInstitucion = filter_input(INPUT_POST, 'InputInstitucion', FILTER_SANITIZE_STRING);

    $proceso = !empty($InputDepartamento) && !empty($InputInstitucion);
    $mensaje = "";

    $InputInstitucion = mb_strtoupper($InputInstitucion, 'UTF-8');

    if($proceso){
        require_once('../../../config-ext.php');
        if ($link) {
            $sql = "INSERT INTO colegios (colegio, 	municipioId) VALUES (?, ?)";
                $stmt = mysqli_prepare($link, $sql);
                mysqli_stmt_bind_param($stmt, 'si', $InputInstitucion, $InputDepartamento);
        
                if (mysqli_stmt_execute($stmt)) {
                    // datos insertados
                    header("Location: colegiosManager.php");
                } else {
                    $mensaje = "Error al insertar los datos" . mysqli_error($link);
                    header("Location: colegiosManager.php?mensaje=".$mensaje);
                }
        
                mysqli_stmt_close($stmt);
        } else {
            $mensaje = "Error al conectar a la base de datos";
            header("Location: colegiosManager.php?mensaje=".$mensaje);
        }
    
        mysqli_close($link);
    }else{
        $mensaje = "Complete el formulario";
        header("Location: colegiosManager.php?mensaje=".$mensaje);
    }

}
?>