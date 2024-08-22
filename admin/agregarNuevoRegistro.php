<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('/var/www/html/moodle/config-ext.php');

    $tabla = mysqli_real_escape_string($link, $_POST['identificador']);
    $campos = [];
    $registros = [];

    foreach ($_POST as $name => $value) {
        if ($name === 'identificador') {
            continue;
        }
        $campos[] = mysqli_real_escape_string($link, $name);
        $registros[] = "'" . mysqli_real_escape_string($link, $value) . "'";
    }

    if (!empty($campos) && !empty($registros)) {
        $cadenaCampo = implode(", ", $campos);
        $cadenaRegistro = implode(", ", $registros);
        $insertar = "INSERT INTO $tabla ($cadenaCampo) VALUES ($cadenaRegistro)";
        $resultado = mysqli_query($link, $insertar);

        if (!$resultado) {
            echo "Error en la consulta: " . mysqli_error($link);
        }else{
            header("Location: catalogoFestivales.php");
            exit(); 
        }
    }

    mysqli_close($link);
}
?>