<?php
require_once('../../../config-ext.php');
$count = $_POST['datoId'];
$count = intval($count);

// departamento
$query = "SELECT departamentoId, departamento FROM departamento";
$result = mysqli_query($link, $query);

if(!$result) {
    die("ERROR: Could not execute $query. " . mysqli_error($link));
}

// Comprobar si la consulta ha devuelto filas
if(mysqli_num_rows($result) > 0) {
    // Almacenar los resultados en la variable $departamentos
    while($row = mysqli_fetch_assoc($result)) {
        $departamentos[] = $row;
    }
}

$departamentoFull = "";
foreach($departamentos as $departamento) {
    if($departamento['departamentoId'] === '35'){
        $departamentoPlataforma = '<option value="' . $departamento['departamentoId'] . '">' . $departamento['departamento'] . '</option>';
    }else{
        $departamentoFull .= '<option value="' . $departamento['departamentoId'] . '">' . $departamento['departamento'] . '</option>';
    }
}

$departamentoFull = $departamentoFull . $departamentoPlataforma;

for($i = 1; $i <= $count; $i++){
    $depFell.='<div>
        <h3>Instituto '.$i.':</h3>
        <div class="row">
            <div class="col">
                <label for="departamento" class="form-label">Departamento*</label>
                <div class="input-group">
                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m600-120-240-84-186 72q-20 8-37-4.5T120-170v-560q0-13 7.5-23t20.5-15l212-72 240 84 186-72q20-8 37 4.5t17 33.5v560q0 13-7.5 23T812-192l-212 72Zm-40-98v-468l-160-56v468l160 56Zm80 0 120-40v-474l-120 46v468Zm-440-10 120-46v-468l-120 40v474Zm440-458v468-468Zm-320-56v468-468Z"/></svg></span>
                        <select id="departamento_'.$i.'" class="form-select" aria-describedby="departamentoFeedback" onchange="datosDepartamento('.$i.')" required>
                            <option selected disabled value="">Seleccionar</option>
                                '.$departamentoFull.'
                        </select>
                </div>
            </div>
            <div class="col">
                <label for="Municipio" class="form-label">Municipio*</label>
                <div class="input-group">
                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M680-600h80v-80h-80v80Zm0 160h80v-80h-80v80Zm0 160h80v-80h-80v80Zm0 160v-80h160v-560H480v56l-80-58v-78h520v720H680Zm-640 0v-400l280-200 280 200v400H360v-200h-80v200H40Zm80-80h80v-200h240v200h80v-280L320-622 120-480v280Zm560-360ZM440-200v-200H200v200-200h240v200Z"/></svg></span>
                        <select id="Municipio_'.$i.'" class="form-select" aria-describedby="MunicipioFeedback" onchange="datosMunicipio('.$i.')" required>
                            <option selected disabled value="">Seleccionar</option>                          
                        </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="Instituto" class="form-label">Instituto*</label>
                <div class="input-group">
                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-120 200-272v-240L40-600l440-240 440 240v320h-80v-276l-80 44v240L480-120Zm0-332 274-148-274-148-274 148 274 148Zm0 241 200-108v-151L480-360 280-470v151l200 108Zm0-241Zm0 90Zm0 0Z"/></svg></span>
                        <select id="Instituto_'.$i.'" class="form-select elCole" aria-describedby="InstitutoFeedback" onchange="borrarInstitutos()" required>
                            <option selected disabled value="">Seleccionar</option>             
                        </select>
                </div>
            </div>
        </div>
        <br>
    </div>';
}

echo $depFell;

//mysqli_free_result($result);
?>