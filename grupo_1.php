<?php
include_once("/var/www/html/moodle/config-ext.php");
// Comprobar si el dato ha sido enviado y es válido
if(!isset($_POST['dato']) || empty($_POST['dato'])) {
    die("ERROR: Invalid data provided.");
}
if(!isset($_POST['total']) || empty($_POST['total'])) {
    die("ERROR: Invalid data provided.");
}
// valores 
// obtener valores de registros existentes
require_once("cargar_edicion.php");


$registroId = $_POST['dato'];
$total = $_POST['total'];
$colegiosAll = $_POST['colegios'];

mysqli_set_charset($link, "utf8");

// Selección de datos de cursos inscritos
$query = "SELECT cursos FROM PreDocentes WHERE Id_preDocente = ?";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "i", $registroId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(!$result) {
    die("ERROR: Could not execute $query. " . mysqli_error($link));
}

$Grupos = array();
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $Grupos[] = $row['cursos'];
    }
    $AllGrupos = implode(", ", $Grupos);
}

$arrayGrupos = explode(",", $AllGrupos);

$cantidad_datos_ins = count($arrayGrupos);
$cantidad_grupos_ins = $cantidad_datos_ins / 7;
$conteoInicial = 0;

$judarofe = 0;
$cadenaComparativa = "";
$colegiosInscritos = "";

for ($i = 1; $i <= $cantidad_grupos_ins; $i++){
    $conteo = ($i * 7) - 1;
    for ($j = $conteoInicial; $j <= $conteo; $j+=7){
        $cadenaComparativa = '<option value="'.$arrayGrupos[$j].'">'.$arrayGrupos[$j+1].'</option>';

        if (strpos($colegiosAll, $cadenaComparativa) !== false) {
            $colegiosAll = str_replace($cadenaComparativa, "", $colegiosAll);
        }

        if (strpos($colegiosInscritos, $cadenaComparativa) === false) {
            $colegiosInscritos .= '
                <option value="'.$arrayGrupos[$j].'">'.$arrayGrupos[$j+1].'</option>
            ';
        }

        $matriculados .='
            <div class="input-group" name="fe_'.$i.'">
                <select class="form-select" id="fender'.$judarofe++.'">
                    <option value="'.$arrayGrupos[$j].'">'.$arrayGrupos[$j+1].'</option>
                </select>
                <select class="form-select" id="fender'.$judarofe++.'">
                    <option value="'.$arrayGrupos[$j+2].'">'.$arrayGrupos[$j+3].'</option>
                </select>
                <select class="form-select" id="fender'.$judarofe++.'">
                    <option value="'.$arrayGrupos[$j+4].'">'.$arrayGrupos[$j+5].'</option>
                </select>
                <input type="text" class="form-control" value="'.$arrayGrupos[$j+6].'" id="fender'.$judarofe++.'">
                <button class="btn btn-danger" type="button" onclick="delGrupos('.$i.')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                    </svg>
                </button>          
            </div>
            <br>
        ';
    }
    $conteoInicial = $j;
}

for ($k = 1; $k <= $total; $k++){
    $addGrupo .=
    '<div class="input-group">
        <select class="form-select" id="fender'.$judarofe++.'">
            <option selected disabled value="">Seleccionar</option>
            '. $colegiosInscritos . $colegiosAll .'
        </select>
        <select class="form-select" name="ju_'.$k.'" onchange="libro('.$k.')" id="fender'.$judarofe++.'">
            <option selected disabled value="">Seleccionar</option>
            '.$edicionFull.'
        </select>
        <select class="form-select" name="da_'.$k.'" id="fender'.$judarofe++.'">
            <option selected disabled value="">Seleccionar</option>
        </select>
        <input type="text" class="form-control" name="ro_'.$k.'" id="fender'.$judarofe++.'">
    </div>
    <br>';
}

$mensajeHTML = $matriculados . $addGrupo ;

echo json_encode(array('dato1' => $mensajeHTML, 'dato2' => $judarofe));
?>