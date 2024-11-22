<?php
require_once('/var/www/html/moodle/config-ext.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identificador = $_POST["valor"];
    $sql = "SELECT
        g.titulo AS tituloQR,
        g.id_proyecto,
        e.url,
        e.tituloQR AS nombreEnlace,
        e.id,
        p.titulo AS tituloProyecto
    FROM
        QR_generado g
    LEFT JOIN
        QR_enlaces e ON g.id = e.id_generado
    LEFT JOIN
        QR_proyectos p ON g.id_proyecto = p.id
    WHERE
        g.id = $identificador";
    
    $inputQR = "";
    $tituloQR_All = [];

    $result = $link->query($sql);
    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tituloQR = $row['tituloQR'];
                $id_proyecto = $row['id_proyecto'];
                $tituloProyecto = $row['tituloProyecto'];

                if (!isset($tituloQR_All[$tituloQR])) {
                    $tituloQR_All[$tituloQR] = [];
                }

                $tituloQR_All[$tituloQR][] = [
                    'url' => $row['url'],
                    'nombreEnlace' => $row['nombreEnlace'],
                    'id' => $row['id']
                ];
            }
        }
    }
    
    foreach ($tituloQR_All as $titulo => $detalles) {

        $texto .= '<div class="mb-3">
            <label for="basic-url" class="form-label"><strong>Titulo del QR</strong></label>
            <div class="input-group mb-3">
                <input type="text" id="titulo" class="form-control" value="'.$titulo.'">
                <button class="btn btn-outline-secondary actualizarHecho" type="button" onclick=\'actualizacionQR("'.$identificador.',titulo,QR_generado,'.$id_proyecto.','.$tituloProyecto.'")\'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16"><path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9"/><path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
                    </svg>
                </button>
            </div>
        </div>';

        foreach ($detalles as $detalle) {
            $texto .= '<div class="mb-3">
                <label for="basic-url" class="form-label"><strong>Cambiar nombre enlace</strong></label>
                <div class="input-group mb-3">
                    <input type="text" id="tituloQR" class="form-control" value="'.$detalle["nombreEnlace"].'">
                    <button class="btn btn-outline-secondary actualizarHecho" type="button" onclick=\'actualizacionQR("'.$detalle["id"].',tituloQR,QR_enlaces,'.$id_proyecto.','.$tituloProyecto.'")\'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16"><path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9"/><path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
                        </svg>
                    </button>
                </div>
            </div>';
            $texto .= '<div class="mb-3">
                <label for="basic-url" class="form-label"><strong>Cambiar enlace</strong></label>
                <div class="input-group mb-3">
                    <input type="text" id="url" class="form-control" value="'.$detalle["url"].'">
                    <button class="btn btn-outline-secondary actualizarHecho" type="button" onclick=\'actualizacionQR("'.$detalle["id"].',url,QR_enlaces,'.$id_proyecto.','.$tituloProyecto.'")\'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16"><path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9"/><path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
                        </svg>
                    </button>
                </div>
            </div>';
        }
    }

    echo $texto;
}