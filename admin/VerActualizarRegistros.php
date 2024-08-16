<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identificador = $_POST["identificador"];
    $tabla = $_POST["tabla"];

    require_once('/var/www/html/moodle/config-ext.php');

    $identificador = $link->real_escape_string($identificador);
    $tabla = $link->real_escape_string($tabla);

    $sql = "SHOW COLUMNS FROM `$tabla`";
    $result = $link->query($sql);

    $construccionHTML = "";

    if ($result && $result->num_rows > 0) {
        $primeraColumna = $result->fetch_assoc();
        $nombrePrimeraColumna = $primeraColumna['Field'];

        $sql_1 = "SELECT * FROM `$tabla` WHERE `$nombrePrimeraColumna` = '$identificador'";
        $result_1 = $link->query($sql_1);

        if ($result_1 && $result_1->num_rows > 0) {

            $columnas = $result_1->fetch_fields();

            while($row = $result_1->fetch_assoc()) {
                $isFirstColumn = true;
                foreach ($columnas as $columna) {
                    if ($isFirstColumn) {
                        $isFirstColumn = false;
                        continue;
                    }

                    $construccionHTML .= '
                    <div class="mb-3">
                        <label for="basic-url" class="form-label"><strong>'.htmlspecialchars($columna->name).'</strong></label>
                        <div class="input-group mb-3">
                            <input type="text" id="'.htmlspecialchars($columna->name).'" class="form-control" value="'.htmlspecialchars($row[$columna->name]).'">
                            <button class="btn btn-outline-secondary actualizarHecho" type="button" onclick=actualizacion("'.$identificador.','.htmlspecialchars($columna->name).','.$tabla.'")>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16"><path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9"/><path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
                                </svg>
                            </button>
                        </div>
                    </div>';
                }

                echo $construccionHTML;
            }
        } else {
            echo "0 resultados";
        }
    } else {
        echo "La tabla no existe o no tiene columnas.";
    }
}
?>