<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $InputDepartamento = filter_input(INPUT_POST, 'inputDepartamento', FILTER_SANITIZE_NUMBER_INT);
    $InputInstitucion = filter_input(INPUT_POST, 'InputInstitucion', FILTER_SANITIZE_STRING);

    $proceso = !empty($InputDepartamento) && !empty($InputInstitucion);
    $mensaje = "";

    if($proceso){
        $mensaje = $InputDepartamento."-".$InputInstitucion;
        header("Location: colegiosManager.php?mensaje=".$mensaje);
    }else{
        $mensaje = "Complete el formulario";
        header("Location: colegiosManager.php?mensaje=".$mensaje);
    }

}
?>