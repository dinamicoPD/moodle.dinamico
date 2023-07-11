<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['valores'])) {
        $instituto = $_POST['valores'];
         if (is_array($instituto)) {
            $response = implode(",", $instituto);
            echo $response;
        } else {
            echo "El valor de 'valores' no es un array.";
        }
    } else {
        echo "No se proporcionó ningún valor para 'valores'.";
    }
}
?> 