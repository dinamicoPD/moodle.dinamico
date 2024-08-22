<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Registro = $_POST["Registro"];
    require_once('/var/www/html/moodle/config-ext.php');
    $Registro = $link->real_escape_string($Registro);
    
    $sql = "SHOW COLUMNS FROM `$Registro`";
    $result = $link->query($sql);
    $isFirstColumn = true;
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($isFirstColumn) {
                $isFirstColumn = false;
                continue;
            }

            $generadorHTML .= '<div class="mb-3"><label for="Agrega'.$row['Field'].'" class="form-label"><strong>Agregar registro '.$row['Field'].'</strong></label><div class="input-group mb-3"><input type="text" id="Agrega'.$row['Field'].'" class="form-control" name="'.$row['Field'].'" required></div></div>';
        }

        echo '<form action="agregarNuevoRegistro.php" method="POST" id="form1"><input type="hidden" class="form-control" name="identificador" value="'.$Registro.'">' . $generadorHTML . '<button class="btn btn-outline-secondary" type="submit">Agregar</button></form>';
    } else {
        echo "No se encontraron columnas o la tabla no existe.";
    }
}
?>