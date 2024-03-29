<?php
    require_once('../../config-ext.php');
    require_once('cargar_departamentos.php');
    require_once('iconos.php');

    $count = $_POST['count'];

    echo ('
        <div id="add_'.$count.'">
            <div class="ContenidoX2">
                <div class="contenidoIZ nube3_4">
                    <div class="row">
                        <div class="col margenInput">
                            <label for="departamento" class="form-label formLabel">Departamento*</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text formIco" id="inputGroupPrepend3">'.$ubicacion.'</span>
                                <select name="departamento_'.$count.'" class="form-select formInput" id="departamento_'.$count.'" aria-describedby="departamentoFeedback" onchange="datosInstituto(\'#departamento\', '.$count.')" required>
                                    <option selected disabled value="">Seleccionar</option>
                                    '.$departamentoFull.'
                                </select>
                                <div id="departamentoFeedback" class="invalid-feedback mal">
                                    '.$alerta.' Selecciona el departamento.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col margenInput">
                            <label for="Instituto" class="form-label formLabel">Institución*</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text formIco" id="inputGroupPrepend3">'.$instituto.'</span>
                                <select name="instituto_'.$count.'" class="form-select formInput escuela" id="Instituto_'.$count.'" aria-describedby="InstitutoFeedback" onchange="datosCursos('.$count.')" required>
                                    <option selected disabled value="">Seleccionar</option>
                                </select>
                                <div id="InstitutoFeedback" class="invalid-feedback mal">
                                    '.$alerta.' Selecciona la institución.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contenidoDE nube3_4">
                    <div class="row">
                        <div class="col margenInput">
                            <label for="ciudad" class="form-label formLabel">Ciudad*</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text formIco" id="inputGroupPrepend3">'.$ubicacion.'</span>
                                <select name="ciudad_'.$count.'" class="form-select formInput" id="ciudad_'.$count.'" aria-describedby="ciudadaFeedback" onchange="datosInstituto(\'#ciudad\', '.$count.')" required>
                                    <option selected disabled value="">Seleccionar</option>
                                </select>
                                <div id="ciudadFeedback" class="invalid-feedback mal">
                                '.$alerta.' Selecciona la ciudad.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col margenInput">
                            <label for="otro" class="form-label formLabel">&nbsp;</label>
                            <input name="otro_'.$count.'" style="visibility: hidden" type="text" class="form-control formInput" id="otro_'.$count.'" aria-describedby="otroFeedback" oninput="datosCursos('.$count.')" placeholder="Otra:" onkeyup="this.value = this.value.toUpperCase();">
                            <div id="otroFeedback" class="invalid-feedback mal">
                                '.$alerta.' Por favor ingresa el nombre de la institución.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btnSub" style="float: right" type="button" onclick="subInstituto('.$count.')">'.$menos.'</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ');
?>