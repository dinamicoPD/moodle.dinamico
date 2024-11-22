<?php
include("menu.php");
include("diplomasController.php");
session_start();
if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] != true){
header("location: AdminLogin.php");
exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager | Dinámico pedagogía y diseño</title>
    <link rel="icon" href="../img/cara.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap_5_3_0_min.css">
    <link rel="stylesheet" href="../css/getbootstrap.com_docs_5.3_assets_css_docs.css">
    <script src="../js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../../css/menu.css">
    <link rel="stylesheet" href="../../../css/config.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="styleManager.css">
    <link rel="stylesheet" href="../css/articulos.css">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <!-- https://sweetalert.js.org/guides/ -->
    <script src="../js/sweetAlert/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../css/sweetAlert/sweetalert2.min.css">

    <script src="html2canvas.js.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/file-saver"></script>
</head>
<style>

    @font-face {
        font-family: 'News706BTBold';
        src: url('diplomas/font/News706\ BT\ Bold.ttf');
    }

    @font-face {
        font-family: 'AncientMedium';
        src: url('diplomas/font/Ancient\ Medium.ttf');
    }

    @font-face {
        font-family: 'DSCloisterBlack';
        src: url('diplomas/font/DS\ Cloister\ Black.otf');
    }

    @font-face {
        font-family: 'SweetChild';
        src: url('diplomas/font/Sweet\ Child.ttf');
    }

    .diplomaFS *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .fondo{
        background-size: cover;
        width: 100vw;
        height: 77.273vw;
        padding: 3.5vw 3.5vw 2.6vw 3.4vw;
        position: relative;
    }

    .diploma{
        width: 100%;
        display: grid;
        grid-template-columns: 14vw 65vw 14vw;
        grid-template-areas: "escudoDinamico contenidoDiploma escudoColegio";
    }

    .escudoDinamico{
        grid-area: escudoDinamico;
    }

    .contenidoDiploma{
        grid-area: contenidoDiploma;
    }

    .escudoColegio{
        grid-area: escudoColegio;
    }

    .contenidoDiploma > div{
        padding: 1.4vw;
    }

    .firmas{
        width: 100%;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-areas: "rector medalla docente";
    }

    .rector{
        grid-area: rector;
    }

    .medalla{
        grid-area: medalla;
    }

    .docente{
        grid-area: docente;
    }

    .logoFestival img{
        width: 20vw;
        display: block;
        margin: auto;
        position: relative;
        z-index: 2;
    }

    .logoFestival{
        position: relative;
    }

    .creditos p{
        text-align: center;
        font-family: 'News706BTBold';
        font-size: 1.5vw;
    }

    .creditos span{
        font-size: 1.3vw;
    }

    .mencion p{
        text-align: center;
        font-family: 'AncientMedium';
        font-size: 4vw;
        
    }

    .mencion span{
        text-align: center;
        font-family: 'DSCloisterBlack';
        font-size: 3.5vw;
        
    }

    .nombreEstudiantes p{
        text-align: center;
        font-family: 'SweetChild';
        font-size: 3.5vw; 
    }

    .puesto p{
        text-align: center;
        font-family: 'News706BTBold';
        font-size: 1.5vw;
    }

    .medalla img{
        width: 15vw;
        display: block;
        margin: auto;
    }

    .rector p, .docente p{
        text-align: center;
        font-family: 'News706BTBold';
        font-size: 1.5vw;
    }

    .rector, .docente{
        padding: 8vw 1.5vw 0 1.5vw;
    }

    .lineaDecoracion{
        border-width: 0.1vw;
        border-style: solid;
        border-image: linear-gradient(to right, #dab75d 0%, #a17b2b 33%, #efe0a0 70%, #a27b34 100%) 1;
    }

    .logoLinea{
        width: 80%;
        position: absolute;
        transform: translate(-50%, -50%);
        top: 73%;
        left: 50%;
    }

    .bordeEscudo{
        width: 13vw;
        height: 13vw;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 1.5vw auto;
    }

    .bordeEscudo img{
        width: 8vw;
    }

    .losdiplomas img{
        width: 50%;
    }

    .fechaMsm{
        position: absolute;
        bottom: 3vw;
        right: 4vw;
    }

    .fechaMsm *{
        font-size: 1vw;
        font-family: 'News706BTBold';
    }
</style>
<body>
<?php echo $menu; ?>
<script>
    var posicionMenu = document.getElementById('m7');
    var posicionSudMenu = document.getElementById('m7-d');
    posicionMenu.classList.add('menuActivo');
    posicionSudMenu.classList.add('menuActivo');
</script>
<section id="p1">
        <br><br>
        <div class="titulo">
            <h2>Diplomas - seleccione tema</h2>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col articulos">
                    <?php echo $temasAll ?>
                </div>
            </div>
        </div>
        <div class="accordion container" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <div class="titulo">
                        <p>Diplomas - agregar nuevo tema</p>
                        <hr>
                    </div>
                </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        <div class="container popinsFont">
                            <form action="diplomasTema.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="InputTitulo" class="form-label">Nombre del evento</label>
                                    <input type="text" class="form-control" name="InputTitulo" id="InputTitulo" aria-describedby="InputTituloHelp" required>
                                    <div id="InputTituloHelp" class="form-text">Ingresa el nombre del evento</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-check-label" for="inputImgTitulo">Adjunte titulo del evento con formato .png</label>
                                    <input name="inputImgTitulo" class="form-control" type="file" id="inputImgTitulo" aria-describedby="inputImgTitulo" aria-label="Upload" accept=".png">
                                </div>
                                <div class="mb-3">
                                    <label class="form-check-label" for="inputImgFondo">Adjunte fondo con formato .png</label>
                                    <input name="inputImgFondo" class="form-control" type="file" id="inputImgFondo" aria-describedby="inputImgFondo" aria-label="Upload" accept=".png" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-check-label" for="inputImgMedalla1">medalla puesto 1 con formato .png</label>
                                    <input name="inputImgMedalla1" class="form-control" type="file" id="inputImgMedalla1" aria-describedby="inputImgMedalla1" aria-label="Upload" accept=".png" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-check-label" for="inputImgMedalla2">medalla puesto 2 con formato .png</label>
                                    <input name="inputImgMedalla2" class="form-control" type="file" id="inputImgMedalla2" aria-describedby="inputImgMedalla2" aria-label="Upload" accept=".png">
                                </div>
                                <div class="mb-3">
                                    <label class="form-check-label" for="inputImgMedalla3">medalla puesto 3 con formato .png</label>
                                    <input name="inputImgMedalla3" class="form-control" type="file" id="inputImgMedalla3" aria-describedby="inputImgMedalla3" aria-label="Upload" accept=".png">
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" class="btnPlataforma">Agregar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br>
    </section>
    <section>
        <div class="titulo">
            <h2>Diplomas - colegio</h2>
            <hr>
        </div>
        <div class="container popinsFont">
                <div class="mb-3">
                    <label for="inputDepartamento">Municipio</label>
                    <select name="inputDepartamento" id="inputDepartamento" class="form-select" aria-describedby="InputDepartamentoHelp" onchange="verColegios()">
                        <option value="" selected disabled>Seleccione ...</option>
                        <?php echo $selectCiudades ?>
                    </select required>
                    <div id="InputDepartamentoHelp" class="form-text">Seleccione municipio</div>
                </div>
                <div class="mb-3">
                    <select id="listadoColegios" class="form-select" aria-describedby="listadoColegiosHelp" onchange="verColegiosLogo()"></select>
                    <div id="listadoColegiosHelp" class="form-text alert alert-warning">Verifica si la institución ya este registrada</div>
                </div>
                <div class="row">
                    <div class="col" id="imagenLogo"></div>
                </div>
            <hr>
        </div>
    </section>
    <section>
        <div class="titulo">
            <h2>Diplomas - fecha</h2>
            <hr>
        </div>
        <br>
        <div class="container popinsFont">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <select id="fechaFestivalDia" class="form-select" aria-describedby="fechaFestivalDiaHelp">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                        <div id="fechaFestivalDiaHelp" class="form-text">Seleccione dia del festival</div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <select id="fechaFestivalMes" class="form-select" aria-describedby="fechaFestivalMesHelp">
                            <option value="January">Enero</option>
                            <option value="February">Febrero</option>
                            <option value="March">Marzo</option>
                            <option value="April">Abril</option>
                            <option value="May">Mayo</option>
                            <option value="June">Junio</option>
                            <option value="July">Julio</option>
                            <option value="August">Agosto</option>
                            <option value="September">Septiembre</option>
                            <option value="October">Octubre</option>
                            <option value="November">Noviembre</option>
                            <option value="December">Diciembre</option>
                        </select>
                        <div id="fechaFestivalMesHelp" class="form-text">Seleccione Mes del festival</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="fechaChecked" name="fechaChecked" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">desactiva si quieres eliminar la fecha</label>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <br><br>
        <div class="titulo">
            <h2>Diplomas - vista previa</h2>
            <hr>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="button" class="btnPlataforma" onclick="vistaPrevia()">ver</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <hr>
    <input id="cantidadDiplomas" type="hidden" name="cantidadDiplomas" value="">
    <section class="diplomaFS" id="diploma_vistaprevia"></section>
    <br>
    <section>
        <br><br>
        <div class="titulo">
            <h2>Diplomas - carga masiva</h2>
            <hr>
        </div>
        <br>
        <div class="container">
            <div class="mb-3">
                <label class="form-check-label" for="archivo_csv">Adjunte archivo CSV</label>
                <input name="archivo_csv" class="form-control" type="file" id="archivo_csv" aria-describedby="archivo_csv" accept=".csv">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btnPlataforma" id="mostrar-contenido">ver</button>
            </div>
            <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <p>Descargar diplomas:</p>
            </div>
            <div id="btnDeDescagas" class="d-grid gap-2 d-md-flex justify-content-md-end">
                <!--<button type="button" class="btn btn-primary" id="descargar-contenido">descargar</button>-->
            </div>
            <br>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Tamaño de Letra (Colegio)</span>
                        <button type="button" id="aumentar" class="form-control">+</button>
                        <button type="button" id="disminuir" class="form-control">-</button>
                        <span class="input-group-text" id="letraColegio"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Tamaño de la medalla</span>
                        <button type="button" id="aumentarLogo" class="form-control">+</button>
                        <button type="button" id="disminuirLogo" class="form-control">-</button>
                        <span class="input-group-text" id="LogoColegio"></span>
                    </div>
                </div>
            </div>
        </div>
        <div id="csvContent"></div>
        <div id="csvContent_copia"></div>
    </section>
    <br><br><br>

<script src="../js/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
<script src="../../../js/menu.js"></script>

<script src="diplomas.js"></script>
</body>
</html>