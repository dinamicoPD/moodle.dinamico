<?php
require_once('/var/www/html/moodle/config-ext.php');
$totalDocentes = "";
if($link){
    $sql = "SELECT total FROM FestivalPersonal LIMIT 1";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar el primer valor del campo "total"
        $row = $result->fetch_assoc();
        $totalDocentes = $row["total"];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["personalTotal"])) {
        $nuevoTotal = $_POST["personalTotal"];
        $sql = "UPDATE FestivalPersonal SET total = $nuevoTotal WHERE id = 1";
    
        if ($link->query($sql) === TRUE) {
            $totalDocentes = $nuevoTotal;
        } else {
            echo "Error al actualizar el valor: " . $link->error;
        }

    }
}

?>