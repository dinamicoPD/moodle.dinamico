<?php
include_once("/var/www/html/moodle/config-ext.php");
require_once('../cargar_Asesores.php');

mysqli_set_charset($link, "utf8");
$query = "SELECT * FROM PreDocentes";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if(!$result) {
    die("ERROR: Could not execute $query. " . mysqli_error($link));
}
 $Preinscripciones = array();
 if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $Preinscripciones[] = $row;
    }
}

 $PreinscripcionFull = "";

 foreach($Preinscripciones as $Preinscripcion) {
    if($Preinscripcion["confirmado"] == 0){
    $colegios = "";
    $cursos = "";
    $JD = 0;

    $asesor = htmlspecialchars($Preinscripcion["asesor"]);
    $array_asesor = explode(",", $asesor);

    $asesorInicio = '<option selected disabled value="">Seleccionar</option>';
    $asesorDefinitivo = '';

    foreach($asesores as $asesor_1) {
        if ($array_asesor[0] == 0){
            $asesorDefinitivo .= '<option value="' . $asesor_1['UserId'] . '">' . $asesor_1['UserName'] . '</option>';
        }else{
            if ($asesor_1['UserId'] == $array_asesor[0]){
                $asesorInicio = '<option selected value="' . $asesor_1['UserId'] . '">' . $asesor_1['UserName'] . '</option>';
            }else{
                $asesorDefinitivo .= '<option value="' . $asesor_1['UserId'] . '">' . $asesor_1['UserName'] . '</option>';
            }
        }   
    }

    $asesorDefinitivo = $asesorInicio . $asesorDefinitivo;

    if($Preinscripcion["esAsesor"] == 1){
        $asesorDefinitivo = '<input name="perfil_'.$Preinscripcion["Id_preDocente"].'" class="ocultarCss" value="Asesor">';
    }else{
        if($Preinscripcion["esSoporte"] == 1){
            $asesorDefinitivo = '<input name="perfil_'.$Preinscripcion["Id_preDocente"].'" class="ocultarCss" value="Soporte">';
        }else{
            $asesorDefinitivo = '<select name="asesor_'.$Preinscripcion["Id_preDocente"].'" class="form-select">'.$asesorDefinitivo.'</select><input name="perfil_'.$Preinscripcion["Id_preDocente"].'" class="ocultarCss" value="Profesor">';
        }
    }
       

    $nombre = htmlspecialchars($Preinscripcion["nombre"]);
    $array_nombre = explode(",", $nombre);

    $ubicacion = htmlspecialchars($Preinscripcion["ubicacion"]);
    $array_ubicacion = explode(",", $ubicacion);
    $cantidad_datos_ins = count($array_ubicacion);
    $cantidad_grupos_ins = $cantidad_datos_ins / 7;

    $conteoInicial = 0;

    for ($i = 1; $i <= $cantidad_grupos_ins; $i++){
        $conteo = ($i * 7) - 1;
        
        for ($j = $conteoInicial; $j <= $conteo; $j+=7){
            $JD++;
            
            $colegios .= '<div class="input-group">';
                $colegios .= '<select name="Departamento_'.$JD.'_'.$Preinscripcion["Id_preDocente"].'" class="form-select" disabled>';
                    $colegios .= '<option selected value="'.$array_ubicacion[$j].'">'.$array_ubicacion[$j+1].'</option>';
                $colegios .= '</select>';
                $colegios .= '<select name="Municipio_'.$JD.'_'.$Preinscripcion["Id_preDocente"].'" class="form-select" disabled>';
                    $colegios .= '<option selected value="'.$array_ubicacion[$j+2].'">'.$array_ubicacion[$j+3].'</option>';
                $colegios .= '</select>';
        if ($array_ubicacion[$j+4] == 'OTRO'){     
                $colegios .= '<input name="Otro_'.$JD.'_'.$Preinscripcion["Id_preDocente"].'" type="text" class="form-control otro" readonly value="'.$array_ubicacion[$j+6].'">';
                $colegios .= '<button class="btn btn-warning" type="button" onclick="verColegio('.$Preinscripcion["Id_preDocente"].', '.$JD.')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </button>';           
        }else{
            $colegios .= '<select name="Instituto_'.$JD.'_'.$Preinscripcion["Id_preDocente"].'" class="form-select InstitutoXD_'.$Preinscripcion["Id_preDocente"].'" disabled>';
                $colegios .= '<option selected value="'.$array_ubicacion[$j+4].'">'.$array_ubicacion[$j+5].'</option>';
            $colegios .= '</select>';
                $colegios .= '<input class="ocultarCss" name="Otro_'.$JD.'_'.$Preinscripcion["Id_preDocente"].'" type="text" class="form-control" readonly value="'.$array_ubicacion[$j+6].'">';
        }                
            $colegios .= '</div>';
        }
        $colegios .= '<br>';
        $conteoInicial = $j;
    }

    $grupos = htmlspecialchars($Preinscripcion["cursos"]);
    $array_grupos = explode(",", $grupos);
    $cantidad_datos_ins = count($array_grupos);
    $cantidad_grupos_ins = $cantidad_datos_ins / 7;
    $conteoInicial = 0;
    $k = 0;

    for ($i = 1; $i <= $cantidad_grupos_ins; $i++){
        $conteo = ($i * 7) - 1;
        for ($j = $conteoInicial; $j <= $conteo; $j+=7){
            $k++;
            $cursos .= '<div class="input-group">';
                $cursos .= '<select name="Colegio_'.$k.'_'.$Preinscripcion["Id_preDocente"].'" class="form-select" disabled>';
                    $cursos .= '<option selected value="'.$array_grupos[$j].'">'.$array_grupos[$j+1].'</option>';
                $cursos .= '</select>';
                $cursos .= '<select name="Edicion_'.$k.'_'.$Preinscripcion["Id_preDocente"].'" class="form-select" disabled>';
                    $cursos .= '<option selected value="'.$array_grupos[$j+2].'">'.$array_grupos[$j+3].'</option>';
                $cursos .= '</select>';
                $cursos .= '<select name="Curso_'.$k.'_'.$Preinscripcion["Id_preDocente"].'" class="form-select" disabled>';
                    $cursos .= '<option selected value="'.$array_grupos[$j+4].'">'.$array_grupos[$j+5].'</option>';
                $cursos .= '</select>';
                $cursos .= '<input name="Sigla_'.$k.'_'.$Preinscripcion["Id_preDocente"].'" class="form-control" value="'.$array_grupos[$j+6].'" disabled>';
            $cursos .= '</div>';
        }
        $cursos .= '<br>';
        $conteoInicial = $j;
    }

        $PreinscripcionFull .= '
        <table class="table table-bordered table-striped" id="laTabla_'.$Preinscripcion["Id_preDocente"].'">
            <thead class="table-light">
                <tr>
                    <th class="text-center" colspan="3"><hr>REGISTRO N° '.$Preinscripcion["Id_preDocente"].'<hr></th>
                </tr>
            </thead>
            <thead class="table-dark">
                <tr>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input name="email_'.$Preinscripcion["Id_preDocente"].'" type="text" class="form-control" disabled value="'.htmlspecialchars($Preinscripcion["email"]).'"></td>
                    <td>
                        <div class="input-group">
                            <input id="FirstName_'.$Preinscripcion["Id_preDocente"].'" name="FirstName_'.$Preinscripcion["Id_preDocente"].'" type="text" disabled class="form-control" value="'.$array_nombre[0].'">
                            <input name="MiddleName_'.$Preinscripcion["Id_preDocente"].'" type="text" disabled class="form-control" value="'.$array_nombre[1].'">
                            <input name="LastName_'.$Preinscripcion["Id_preDocente"].'" type="text" disabled class="form-control" value="'.$array_nombre[2].'">
                            <input name="SecondLastName_'.$Preinscripcion["Id_preDocente"].'" type="text" disabled class="form-control" value="'.$array_nombre[3].'">
                        </div>
                    </td>
                    <td>
                        <input name="Phone_'.$Preinscripcion["Id_preDocente"].'" type="text" disabled class="form-control" value="'.htmlspecialchars($Preinscripcion["telefono"]).'">
                    </td>
                </tr>
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th colspan="3">Colegios</th>
                </tr>
            </thead>
            <tbody>
                <td colspan="3">'.$colegios.'</td>
            </tbody>
            <thead class="table-success">
                <tr>
                    <th>
                        Grupos
                    </th>
                    <th>
                        
                    </th>
                    <th>
                        <label for="addGrup'.$Preinscripcion["Id_preDocente"].'" class="form-label">Agregar grupos:</label>
                        <div class="input-group">
                            <button class="btn btn-success" type="button" onclick="cantidadGrupos(\'add\', '.$Preinscripcion["Id_preDocente"].')">+</button>
                            <button class="btn btn-warning" type="button" onclick="cantidadGrupos(\'sub\', '.$Preinscripcion["Id_preDocente"].')">-</button>
                            <input id="addGrup'.$Preinscripcion["Id_preDocente"].'" name="addGrup'.$Preinscripcion["Id_preDocente"].'" type="number" class="form-control">
                            <button class="btn btn-info" type="button" onclick="editGrupos('.$Preinscripcion["Id_preDocente"].')">Agregar</button>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <td colspan="3">'.$cursos.'</td>
            </tbody>
            <thead class="table-warning">
                <tr>
                    <th colspan="2">Asesor</th>
                    <th>Enviar</th>
                </tr>
            </thead>
            <tbody>
                <td colspan="2">
                    <div class="input-group">
                        '.$asesorDefinitivo.'
                    </div>
                </td>
                <td class="text-center">
                    <button id="btn_'.$Preinscripcion["Id_preDocente"].'" type="button" class="btn btn-primary" onclick="editProf('.$Preinscripcion["Id_preDocente"].', '.$k.')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-check" viewBox="0 0 16 16">
                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z"/>
                            <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                        </svg>
                    </button>
                </td>
            </tbody>
        </table>
        ';
    }else{
        $PreinscripcionFull .= "";
    }
}


if ($PreinscripcionFull == ""){
    $PreinscripcionFull = "<br>
    <h1 class='alert alert-warning'>
        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-exclamation-octagon-fill' viewBox='0 0 16 16'>
            <path d='M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
        </svg>
        No se encuentran registros para agregar</h1>";
}

 mysqli_free_result($result);

?>