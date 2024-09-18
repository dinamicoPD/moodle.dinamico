<?php
require_once('/var/www/html/moodle/config-ext.php');
$totalDocentes = "";
$areas = "";

if ($link) {
    $sql = "SELECT total FROM FestivalPersonal LIMIT 1";
    $result = $link->query($sql);
    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $totalDocentes = $row["total"];
        }
    } else {
        echo "Error en la consulta: " . $link->error;
    }

    $sql_2 = "SELECT * FROM FestivalArea";
    $result_2 = $link->query($sql_2);
    if ($result_2) {
        if ($result_2->num_rows > 0) {
            while ($row_2 = $result_2->fetch_assoc()) {
                $areas .= "<tr>
                                <td class='text-center'>" . $row_2["area"] . "</td>
                                <td class='text-center'>
                                    <button type='button' class='btn btn-primary actualizar' value='".$row_2["id_festival"].",FestivalArea'>
                                        Actualizar
                                    </button>
                                </td>
                                <td class='text-center'>
                                    <button type='button' class='btn btn-danger eliminar' value='".$row_2["id_festival"].",FestivalArea'>
                                        Eliminar
                                    </button>
                                </td>
                            </tr>";
            }
        }
    } else {
        echo "Error en la consulta: " . $link->error;
    }

    $sql_3 = "SELECT * FROM FestivalTipo";
    $result_3 = $link->query($sql_3);
    if ($result_3) {
        if ($result_3->num_rows > 0) {
            while ($row_3 = $result_3->fetch_assoc()) {
                $tipo .= "<tr>
                            <td class='text-center'>" . $row_3["Actividad"] . "</td>
                            <td class='text-center'>
                                <button type='button' class='btn btn-primary actualizar' value='".$row_3["id_Actividad"].",FestivalTipo'>
                                    Actualizar
                                </button>
                            </td>
                            <td class='text-center'>
                                <button type='button' class='btn btn-danger eliminar' value='".$row_3["id_Actividad"].",FestivalTipo'>
                                    Eliminar
                                </button>
                            </td>
                        </tr>";
            }
        }
    } else {
        echo "Error en la consulta: " . $link->error;
    }

    $sql_4 =
        "SELECT
        Fs.id_solicitud,
        C.colegio,
        Fs.colegioOtro,
        M.municipio,
        M.municipioId,
        D.departamento,
        D.departamentoId,
        Fa.Fecha AS fechaApoyo,
        Fa.Cantidad AS personalApoyo,
        Fc.Fecha As fechaCapacitacion,
        Fc.Cantidad AS personalCapacitacion,
        GROUP_CONCAT(DISTINCT Far.area SEPARATOR ', ') AS Areas,
        GROUP_CONCAT(DISTINCT Ft.Actividad SEPARATOR ', ') AS Actividades,
        U.UserName AS Asesor,
        Fs.contacto,
        Fs.Prescolar AS cursosPrescolar,
        Fs.PrescolarNum AS totalEstudiantesPrescolar,
        Fs.Primaria AS cursosPrimaria,
        Fs.PrimariaNum AS totalEstudiantesPrimaria,
        Fs.Bachillerato AS cursosBachillerato,
        Fs.BachilleratoNum AS totalEstudiantesBachillerato,
        Fs.logistica,
        Fs.abono,
        E.estado,
        E.color
        FROM FestivalSolicitud Fs
        INNER JOIN User U ON Fs.UserId = U.UserId
        LEFT JOIN colegios C ON Fs.colegioId = C.colegioId
        INNER JOIN municipio M ON Fs.municipioId = M.municipioId
        INNER JOIN departamento D ON M.departamentoId = D.departamentoId
        INNER JOIN FestivalApoyo Fa ON Fs.id_Solicitud = Fa.id_Solicitud
        INNER JOIN FestivalAreaSolicitud Fas ON Fs.id_Solicitud = Fas.id_Solicitud
        INNER JOIN FestivalArea Far ON Far.id_festival = Fas.id_festival
        INNER JOIN FestivalCapacitacion Fc ON Fs.id_Solicitud = Fc.id_Solicitud
        INNER JOIN FestivalEstado Fe ON Fs.id_Solicitud = Fe.id_Solicitud
        INNER JOIN Estado E ON Fe.id_Estado = E.id_estado
        INNER JOIN FestivalTipoSolicitud Fts ON Fs.id_Solicitud = Fts.id_Solicitud
        INNER JOIN FestivalTipo Ft ON Fts.id_Actividad = Ft.id_Actividad
        GROUP BY Fs.id_Solicitud, U.UserId, C.colegioId, M.municipioId, D.departamentoId, Fa.id_Apoyo, Fc.id_Capacitacion, E.id_estado
        ";

        $result_4 = $link->query($sql_4);
        if ($result_4) {
            if ($result_4->num_rows > 0) {
                while ($row_4 = $result_4->fetch_assoc()) {
                    //codificar
                    $nombreColegio = mb_strtoupper($row_4["colegioOtro"], 'UTF-8');
                    $base64_encoded = base64_encode($nombreColegio.','.$row_4["municipioId"].','.$row_4["id_solicitud"]);

                    if($row_4["colegio"] != "" || $row_4["colegio"] != Null){
                        $colegio = $row_4["colegio"];
                    }else{

                        $colegio = '<div class="mb-3">
                            <div class="input-group">
                                <input id="'.$row_4["id_solicitud"].'_nameColegio" type="text" class="form-control" value="'.$nombreColegio.'" onkeyup="this.value = this.value.toUpperCase();">
                                <button class="btn btn-dark actualizarModificar" value="'.$base64_encoded.','.$row_4["id_solicitud"].'_nameColegio">Actualizar</button>
                            </div>
                        </div>';
                    }

                    $solicitud .= '<div class="card my-2 text-bg-light"><div class="card-body">
                        <table class="table">
                            <tr>
                                <td style="background-color:'.$row_4["color"].';">'.$colegio.' ('.$row_4["municipio"].'-'.$row_4["departamento"].')</td>
                                <td style="background-color:'.$row_4["color"].';"><strong>Estado: </strong>
                                    '.$row_4["estado"].'
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Capacitación: </strong>'.$row_4["fechaCapacitacion"].'</td>
                                <td><strong>Festival: </strong>'.$row_4["fechaApoyo"].'</td>
                            </tr>
                        </table>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-'.$row_4["id_solicitud"].'" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Ver más
                                </button>
                            </h2>
                            <div id="flush-collapseOne-'.$row_4["id_solicitud"].'" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col"><h2>Personal solicitado</h2></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><p><strong>Capacitación: </strong>'.$row_4["personalCapacitacion"].'</p></div>
                                        <div class="col"><p><strong>Festival: </strong>'.$row_4["personalApoyo"].'</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><h2>Áreas</h2></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><p>'.$row_4["Areas"].'</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><h2>Actividades</h2></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><p>'.$row_4["Actividades"].'</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><h2>Asesor</h2></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><p>'.$row_4["Asesor"].'</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><h2>Contacto</h2></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><p>'.$row_4["contacto"].'</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><h2>Grupos Preescolar</h2></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><p>'.$row_4["cursosPrescolar"].'</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><h2>Estudiantes Preescolar</h2></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><p>'.$row_4["totalEstudiantesPrescolar"].'</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><h2>Grupos Primaria</h2></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><p>'.$row_4["cursosPrimaria"].'</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><h2>Estudiantes Primaria</h2></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><p>'.$row_4["totalEstudiantesPrimaria"].'</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><h2>Grupos Bachillerato</h2></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><p>'.$row_4["cursosBachillerato"].'</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><h2>Estudiantes Bachillerato</h2></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><p>'.$row_4["totalEstudiantesBachillerato"].'</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><h2>Logística</h2></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><p>'.$row_4["logistica"].'</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><h2>Abono</h2></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><p>'.$row_4["abono"].'</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div></div>
                    ';
                }
            }
        } else {
            echo "Error en la consulta: " . $link->error;
        }

        $solicitud_1 = "<tr><th>Colegio</th> <th>Otro Colegio</th> <th>Ciudad</th> <th>Departamento</th> <th>Fecha festival</th> <th>Personal de apoyo</th> <th>Fecha capacitación</th> <th>Personal capacitación</th> <th>Areas</th> <th>Actividades</th> <th>Asesor</th> <th>Contacto</th> <th>Grupos Preescolar</th> <th>Estudiantes Preescolar</th> <th>Grupos Primaria</th> <th>Estudiantes Primaria</th> <th>Grupos Bachillerato</th> <th>Estudiantes Bachillerato</th> <th>Logística</th> <th>Abono</th> <th>Estado</th> <th>Color</th></tr><tr>".$solicitud_1."</tr>";

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