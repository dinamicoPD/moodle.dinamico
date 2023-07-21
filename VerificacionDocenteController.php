<?php
include_once(__DIR__ . "/../../config-ext.php");
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
    $colegios = "";
    $cursos = "";
    $k = 0;

    $PreinscripcionFull .= '<tr id="edit_'.$Preinscripcion["Id_preDocente"].'">';
    $PreinscripcionFull .= '<td><input name="email_'.$Preinscripcion["Id_preDocente"].'" type="text" class="form-control" readonly value="'.htmlspecialchars($Preinscripcion["email"]).'"></td>';

    $asesor = htmlspecialchars($Preinscripcion["asesor"]);
    $array_asesor = explode(",", $asesor);

    $query_2 = "SELECT Nombre_asesor FROM Asesor WHERE Id_asesor = ?";
    $stmt_2 = mysqli_prepare($link, $query_2);
    mysqli_stmt_bind_param($stmt_2, "s", $array_asesor[0]);
    mysqli_stmt_execute($stmt_2);
    $result_2 = mysqli_stmt_get_result($stmt_2);
    $asesores_2 = array();
    if(mysqli_num_rows($result_2) > 0) {
        while($row = mysqli_fetch_assoc($result_2)) {
            $asesores_2[] = $row;
        }
    }
    $asesoresFull = "";
    foreach($asesores_2 as $asesor) {
        $asesoresFull .= $asesor['Nombre_asesor'];
    }
    mysqli_free_result($result_2);

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
            $k++;
            
            $colegios .= '<div class="input-group">';
                $colegios .= '<select name="Departamento_'.$k.'_'.$Preinscripcion["Id_preDocente"].'" class="form-select" disabled>';
                    $colegios .= '<option selected value="'.$array_ubicacion[$j].'">'.$array_ubicacion[$j+1].'</option>';
                $colegios .= '</select>';
                $colegios .= '<select name="Municipio_'.$k.'_'.$Preinscripcion["Id_preDocente"].'" class="form-select" disabled>';
                    $colegios .= '<option selected value="'.$array_ubicacion[$j+2].'">'.$array_ubicacion[$j+3].'</option>';
                $colegios .= '</select>';
        if ($array_ubicacion[$j+4] == 'OTRO'){     
                $colegios .= '<input name="Otro_'.$k.'_'.$Preinscripcion["Id_preDocente"].'" type="text" class="form-control" readonly value="'.$array_ubicacion[$j+6].'">';
                $colegios .= '<button class="btn btn-warning" type="button" onclick="verColegio('.$Preinscripcion["Id_preDocente"].', '.$k.')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </button>';           
        }else{
            $colegios .= '<select name="Instituto_'.$k.'_'.$Preinscripcion["Id_preDocente"].'" class="form-select" disabled>';
                $colegios .= '<option selected value="'.$array_ubicacion[$j+4].'">'.$array_ubicacion[$j+5].'</option>';
            $colegios .= '</select>';
                $colegios .= '<input class="ocultarCss" name="Otro_'.$k.'_'.$Preinscripcion["Id_preDocente"].'" type="text" class="form-control" readonly value="'.$array_ubicacion[$j+6].'">';
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
                $cursos .= '<select name="Sigla_'.$k.'_'.$Preinscripcion["Id_preDocente"].'" class="form-select" disabled>';
                    $cursos .= '<option selected value="'.$array_grupos[$j+6].'">'.$array_grupos[$j+6].'</option>';
                $cursos .= '</select>';
            $cursos .= '</div>';
        }
        $cursos .= '<br>';
        $conteoInicial = $j;
    }
       
    $PreinscripcionFull .= '<td>
                                <div class="input-group">
                                    <input name="FirstName_'.$Preinscripcion["Id_preDocente"].'" type="text" class="form-control" readonly value="'.$array_nombre[0].'">
                                    <input name="MiddleName_'.$Preinscripcion["Id_preDocente"].'" type="text" class="form-control" readonly value="'.$array_nombre[1].'">
                                    <input name="LastName_'.$Preinscripcion["Id_preDocente"].'" type="text" class="form-control" readonly value="'.$array_nombre[2].'">
                                    <input name="SecondLastName_'.$Preinscripcion["Id_preDocente"].'" type="text" class="form-control" readonly value="'.$array_nombre[3].'">
                                </div>
                            </td>';
    $PreinscripcionFull .= '<td><input name="Phone_'.$Preinscripcion["Id_preDocente"].'" type="text" class="form-control" readonly value="'.htmlspecialchars($Preinscripcion["telefono"]).'"></td>';
    
    $PreinscripcionFull .= '<td><select name="asesor_'.$Preinscripcion["Id_preDocente"].'" class="form-select" disabled>';
    $PreinscripcionFull .=  '<option selected value="'.$array_asesor[0].'">'.$asesoresFull.'</option>';
    $PreinscripcionFull .= '</select></td>';
   
    $PreinscripcionFull .= '<td>'.$colegios.'</td>';
    $PreinscripcionFull .= '<td>'.$cursos.'</td>';
    $PreinscripcionFull .= '<td>
                                <button type="button" class="btn btn-primary" onclick="editProf('.$Preinscripcion["Id_preDocente"].')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button>';
    $PreinscripcionFull .= '</td>';
    $PreinscripcionFull .= '</tr>';
}
 mysqli_free_result($result);

?>