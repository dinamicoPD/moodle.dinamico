<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('/var/www/html/moodle/config-ext.php');

    $identificador = $_POST["identificador"];
    $tabla = $_POST["tabla"];
    $identificador = $link->real_escape_string($identificador);
    $tabla = $link->real_escape_string($tabla);

    $sql = "SHOW COLUMNS FROM `$tabla`";
    $result = $link->query($sql);
    if ($result && $result->num_rows > 0) {
        $primeraColumna = $result->fetch_assoc();
        $nombrePrimeraColumna = $primeraColumna['Field'];

        $stmt = $link->prepare("DELETE FROM $tabla WHERE $nombrePrimeraColumna = ?");
        $stmt->bind_param("i", $identificador);
    
        if ($stmt->execute()) {
            echo "Registro eliminado correctamente.";
        } else {
            echo "Error al eliminar el registro: " . $stmt->error;
        }
    
        $stmt->close();
    }
            
    mysqli_close($link);
}