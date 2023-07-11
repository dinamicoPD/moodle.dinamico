<?php
    require_once('../../config-ext.php');
    require_once('cargar_edicion.php');
    require_once('iconos.php');

    $count_2 = $_POST['count_2'];
    $resultInsituto = $_POST['resultInsituto'];

    echo ('
    <div id="cursosAdd_'.$count_2.'">
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-12">
                    <label for="colegio" class="form-label formLabel">Institución*</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text formIco" id="inputGroupPrepend3">'.$instituto.'</span>
                        <select name="colegio_'.$count_2.'" class="form-select formInput" id="colegio_'.$count_2.'" aria-describedby="colegioFeedback" onchange="edicionEdicion(\'#colegio_\','.$count_2.')" required>
                            '.$resultInsituto.'
                        </select>
                        <div id="colegioFeedback" class="invalid-feedback mal">
                            '.$alerta.' Selecciona la institución.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <label for="edicion" class="form-label formLabel">Edición*</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text formIco" id="inputGroupPrepend3">'.$edicionIco.'</span>
                        <select name="edicion_'.$count_2.'" class="form-select formInput" id="edicion_'.$count_2.'" aria-describedby="edicionFeedback" onchange="edicionEdicion(\'#edicion_\','.$count_2.')" required>
                            <option selected disabled value="">Seleccionar</option>
                            '.$edicionFull.'
                        </select>
                        <div id="edicionFeedback" class="invalid-feedback mal">
                            '.$alerta.' Selecciona la edición.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="espacio"></div>
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-12">
                    <label for="curso" class="form-label formLabel">Curso*</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text formIco" id="inputGroupPrepend3">'.$curso.'</span>
                        <select name="curso_'.$count_2.'" class="form-select  formInput" id="curso_'.$count_2.'" aria-describedby="cursoFeedback" required onchange="edicionEdicion(\'#curso_\','.$count_2.')">
                            <option selected disabled value="">Seleccionar</option>
                            <option>...</option>
                        </select>
                        <div id="cursoFeedback" class="invalid-feedback mal">
                        '.$alerta.' Selecciona la sigla.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-10">
                        <label for="sigla" class="form-label formLabel">Sigla*</label>
                        <input name="sigla_'.$count_2.'" type="number" class="form-control  formInput" id="sigla_'.$count_2.'" aria-describedby="siglaFeedback" placeholder="Ej: 801" oninput="edicionSigla('.$count_2.')">
                        <div id="siglaFeedback" class="invalid-feedback mal">
                        '.$alerta.' Por favor ingresa la sigla del grupo.
                        </div>
                    </div>
                    <div class="col-md-2 align-self-end">
                        <button class="btnSub" type="button" id="addFullCurso" onclick="subCurso('.$count_2.')">'.$menos.'</button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    ');
?>