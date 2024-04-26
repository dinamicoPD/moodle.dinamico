<?php
require_once('../../../config-ext.php');

$sql = "    SELECT d.departamento, c.municipio, c.municipioId
            FROM departamento d
            INNER JOIN municipio c ON d.departamentoId = c.departamentoId ORDER BY d.departamento, c.municipio";
$result = $link->query($sql);

// Variables para mantener el seguimiento del departamento actual
$current_department = "";
$selectCiudades = "";
$listadoColegios = "";
// Iterar sobre los resultados de la consulta
while($row = $result->fetch_assoc()) {
    $nombre_departamento = $row["departamento"];
    $nombre_ciudad = $row["municipio"];
    $id_ciudad = $row["municipioId"];
    
    // Si el departamento actual es diferente al anterior, crear un nuevo grupo
    if ($nombre_departamento != $current_department) {
        if ($current_department != "") {
            $selectCiudades .= "</optgroup>";
        }
        $selectCiudades .= "<optgroup label=\"$nombre_departamento\">";
        $current_department = $nombre_departamento;
    }
    
    // Imprimir la opción de la ciudad
    $selectCiudades .= "<option value=\"$id_ciudad\">$nombre_ciudad</option>";
}


$selectCiudades .= "</optgroup>";


// ver directorios

$ruta = 'diplomas/img/temas/';
$temasAll = "";
$a = 0;

if (is_dir($ruta)) {
    if ($gestor = opendir($ruta)) {
        while (($archivo = readdir($gestor)) !== false) {
            if ($archivo != '.' && $archivo != '..') {
                if (is_dir($ruta . '/' . $archivo)) {
                    $a++;
                    $temasAll .= '<article>';
                        $temasAll .= '<div class="card text-bg-dark p-1" style="position: relative;">';
                            $temasAll .= '<img src="'. $ruta . $archivo . '/Fondo.png" class="card-img-top">';
                            
                            $temasAll .= '<div class="card-body">';
                                $temasAll .= '<h5 class="card-title">'.$archivo.'</h5>';
                                $temasAll .= '<div class="accordion">';
                                    $temasAll .= '<h2 class="accordion-item">';
                                        $temasAll .= '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$a.'" aria-expanded="true" aria-controls="collapse'.$a.'">Ver mas</button>';
                                    $temasAll .= '</h2>';
                                    $temasAll .= '<div id="collapse'.$a.'" class="accordion-collapse collapse" data-bs-parent="#accordionExample">';
                                        $temasAll .= '<div class="accordion-body">';
                                            $temasAll .= '<table class="table table-dark">
                                                <tr>
                                                    <th>Titulo</th>
                                                    <td class="losdiplomas"><img src="'. $ruta . $archivo . '/Titulo.png" class="rounded mx-auto d-block"></td>
                                                </tr>
                                                <tr>
                                                    <th>Medalla_1</th>
                                                    <td class="losdiplomas"><img src="'. $ruta . $archivo . '/Medalla1.png" class="rounded mx-auto d-block"></td>
                                                </tr>
                                                <tr>
                                                    <th>Medalla_2</th>
                                                    <td class="losdiplomas"><img src="'. $ruta . $archivo . '/Medalla2.png" class="rounded mx-auto d-block"></td>
                                                </tr>
                                                <tr>
                                                    <th>Medalla_3</th>
                                                    <td class="losdiplomas"><img src="'. $ruta . $archivo . '/Medalla3.png" class="rounded mx-auto d-block"></td>
                                                </tr>
                                            </table>';
                                        $temasAll .= '</div>';
                                    $temasAll .= '</div">';
                                $temasAll .= '</div>';
                            $temasAll .= '</div>';
                        $temasAll .= '</div>';
                            $temasAll .= '<div class="form-check m-1">';
                                $temasAll .= '<input class="form-check-input" type="radio" name="flexRadioDiploma" id="flexRadioDiploma'.$a.'" value="'.$archivo.'">';
                                $temasAll .= '<label class="form-check-label" for="flexRadioDefault'.$a.'">Seleccione</label>';
                            $temasAll .= '</div>';
                    $temasAll .= '</article>';
                }
            }
        }
        closedir($gestor);
    }
}