<?php
include("colegios.php");
include("controllerLicenciasPrf.php");

$cantidad_registros = isset($_POST['cantidad_registros']) ? $_POST['cantidad_registros'] : 25;
$posicion = isset($_POST['posicion']) ? $_POST['posicion'] : 1;
$searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : "";
$result = $resultProfe;
$loscolegios = $resultcolegios;


$cantidad = 0;
$verificarGrupo = NULL;
$valordePosicion = $cantidad_registros * $posicion;
$valorInicio = $valordePosicion - $cantidad_registros + 1;

while ($row = mysqli_fetch_assoc($result)) {

    $nombreCompleto = $row['FirstName'] ." ". $row['MiddleName'] ." ". $row['LastName'] ." ". $row['SecondLastName'];
    $correo = $row['Email'];
    $idUser = $row['UserId'];
    $nombreUser = $row['UserName'];
    $telefono = $row['Phone'];
    $asesor = $row['asesor'];
    $codigoLicencia = $row['Code'];
    $curso = $row['CourseName'];
    $grupo = $row['GroupCode'];
    $codigoGrupo = $row['GroupKey'];

    $parts = explode('_', $codigoGrupo);
    $numero = $parts[1];
   
    foreach ($loscolegios as $colegio) {
        if ($colegio['colegioId'] === $numero){
            $nombreColegio = $colegio['colegio'];
            $nombreMunicipio = $colegio['municipio'];
            $nombreDepartamento = $colegio['departamento'];
        }
    }

    $CadenaBusqueda = $nombreCompleto.$correo.$nombreUser.$telefono.$codigoLicencia.$curso.$codigoGrupo.$nombreColegio.$nombreMunicipio.$nombreDepartamento;

        if ($searchTerm === null || $searchTerm === "" || buscarSinAcentos($CadenaBusqueda, $searchTerm) !== false){

            if ($verificarGrupo != $idUser || $verificarGrupo === NULL){
                $cantidad++;

                if($cantidad <= $valordePosicion && $cantidad >= $valorInicio){
                    $guardarCSV = $row['FirstName'] .",". $row['MiddleName'] .",". $row['LastName'] .",". $row['SecondLastName'] .",". $correo .",". $nombreUser .",". $idUser;
                    $construtorHTML .= "
                    <tr>
                        <td>".$idUser."</td>
                        <td>".$codigoLicencia."</td>
                        <td>".$nombreCompleto."</td>
                        <td>".$correo."</td>
                    </tr>
                    <tr>
                        <td colspan='4'>
                            <div class='accordion-item'>
                                <h2 class='accordion-header'>
                                    <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapseOne_".$idUser."' aria-expanded='false' aria-controls='flush-collapseOne'>
                                        <strong>Ver más</strong>
                                    </button>
                                </h2>
                            <div id='flush-collapseOne_".$idUser."' class='accordion-collapse collapse' data-bs-parent='#accordionFlushExample'>
                                <div class='accordion-body'>
                                    <div class='table-responsive'>
                                        <table class='table table-bordered table-striped table-hover'>
                                            <thead>
                                                <tr>
                                                    <th>Usuario</th>
                                                    <th>Teléfono</th>
                                                    <th>Asesor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>".$nombreUser."</td>
                                                    <td>".$telefono."</td>
                                                    <td>".$asesor."</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <button id='' type='button' class='botonDP hover botonDP_1'>Cambiar licencia</button>
                                                    </td>
                                                    <td>
                                                        <button type='button' class='botonDP hover botonDP_3'>Reenviar correo</button>
                                                    </td>
                                                    <td>
                                                        <button type='button' class='botonDP hover botonDP_2'>Cambiar contraseña</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan='3'><button type='button' class='botonDP hover botonDP_2' onclick='AgregarGrupo(\"".$guardarCSV."\")'>Agregar grupos</button></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class='table-responsive'>
                                        <table class='table table-bordered table-striped table-hover caption-top'>
                                            <caption><strong>Grupo:</strong> ".$row['EnrolmentId']."</caption>
                                                <thead>
                                                    <tr>
                                                        <th style='width: 34%;'>Curso</th>
                                                        <th style='width: 33%;'>Grupo</th>
                                                        <th style='width: 33%;'>Código</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>".$curso."</td>
                                                        <td>".$grupo."</td>
                                                        <td>".$codigoGrupo."</td>
                                                    </tr>
                                                </tbody>                                 
                                                <thead>
                                                    <tr>
                                                        <th style='width: 34%;'>Colegio</th>
                                                        <th style='width: 33%;'>Municipio</th>
                                                        <th style='width: 33%;'>Departamento</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <select class='form-select cole_".$idUser."' aria-label='Default select example' disabled>
                                                                <option value='".$numero."'>".$nombreColegio."</option>
                                                            </select>
                                                        </td>
                                                        <td>".$nombreMunicipio."</td>
                                                        <td>".$nombreDepartamento."</td>
                                                    </tr>
                                                </tbody>
                                        </table>
                                    </div>";
                }

            }else{

                if($cantidad <= $valordePosicion && $cantidad >= $valorInicio){
                    $construtorHTML .="
                    <div class='table-responsive'>
                        <table class='table table-bordered table-striped table-hover caption-top'>
                            <caption><strong>Grupo:</strong> ".$row['EnrolmentId']."</caption>
                                <thead>
                                    <tr>
                                        <th style='width: 34%;'>Curso</th>
                                        <th style='width: 33%;'>Grupo</th>
                                        <th style='width: 33%;'>Código</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>".$curso."</td>
                                        <td>".$grupo."</td>
                                        <td>".$codigoGrupo."</td>
                                    </tr>
                                </tbody>                                 
                                <thead>
                                    <tr>
                                        <th style='width: 34%;'>Colegio</th>
                                        <th style='width: 33%;'>Municipio</th>
                                        <th style='width: 33%;'>Departamento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select class='form-select cole_".$idUser."' aria-label='Default select example' disabled>
                                                <option value='".$numero."'>".$nombreColegio."</option>
                                            </select>
                                        </td>
                                        <td>".$nombreMunicipio."</td>
                                        <td>".$nombreDepartamento."</td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>"; 
                }

            }
            $verificarGrupo = $idUser;
        }
}

function buscarSinAcentos($cadena, $buscar) {
    $cadenaSinAcentos = iconv('UTF-8', 'ASCII//TRANSLIT', $cadena);
    $buscarSinAcentos = iconv('UTF-8', 'ASCII//TRANSLIT', $buscar);
    return stristr($cadenaSinAcentos, $buscarSinAcentos);
}

$totalDivicion = ceil($cantidad / $cantidad_registros);
$inicio_registros = ($cantidad_registros * $posicion) - $cantidad_registros;

$construtorHTML .= "</div>
                </div>
            </div>
        </td>
    </tr>";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo $cantidad."¬-|°.°|¬-".$totalDivicion."¬-|°.°|¬-".$construtorHTML;
}
?>