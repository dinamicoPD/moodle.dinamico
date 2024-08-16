<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identificador = $_POST["identificador"];
    $campo = $_POST["campo"];
    $tabla = $_POST["tabla"];
    $nuevoValor = $_POST["nuevoValor"];

    require_once('/var/www/html/moodle/config-ext.php');

    $identificador = $link->real_escape_string($identificador);
    $campo = $link->real_escape_string($campo);
    $tabla = $link->real_escape_string($tabla);
    $nuevoValor = $link->real_escape_string($nuevoValor);

    $sql = "SHOW COLUMNS FROM `$tabla`";
    $result = $link->query($sql);

    if ($result && $result->num_rows > 0) {
        $primeraColumna = $result->fetch_assoc();
        $nombrePrimeraColumna = $primeraColumna['Field'];

        $sql_1 = "UPDATE `$tabla` SET `$campo` = '$nuevoValor' WHERE `$nombrePrimeraColumna` = '$identificador'";
        if ($link->query($sql_1) === TRUE) {
            echo "Registro actualizado con éxito: " . $nuevoValor;
        }
    }
}
?>