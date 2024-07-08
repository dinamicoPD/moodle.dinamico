<?php
include("menu.php");
include("categoriasController.php");
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
    <title>Categorias | Dinámico pedagogía y diseño</title>
    <link rel="icon" href="../img/cara.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap_5_3_0_min.css">
    <link rel="stylesheet" href="../css/getbootstrap.com_docs_5.3_assets_css_docs.css">
    <script src="../js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../../css/menu.css">
    <link rel="stylesheet" href="../../../css/config.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="styleManager.css">
    <link rel="stylesheet" href="css/categorias.css">

    <!-- https://sweetalert.js.org/guides/ -->
    <script src="../js/sweetAlert/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../css/sweetAlert/sweetalert2.min.css">
</head>
<body>
<?php echo $menu; ?>
<section id="p1">
    <div class="titulo">
        <h2>Parametrizar categorías</h2>
        <hr>
    </div>
    <div class="container popinsFont text-center">
        <br>
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <label for="select_1" onclick="verActivo(1)"><p id="nav-link_1" class="nav-link active">Parametrizar</p></label>
                    </li>
                    <li class="nav-item">
                        <label for="select_2" onclick="verActivo(2)"><p id="nav-link_2" class="nav-link">Ediciones</p></label>
                    </li>
                    <li class="nav-item">
                        <label for="select_3" onclick="verActivo(3)"><p id="nav-link_3" class="nav-link">Niveles</p></label>
                    </li>
                </ul>
                <div class="select_main">
                    <ul>
                        <li>
                            <input type="radio" name="inputRadio" class="inputRadio" id="select_1" checked>
                            <div class="select_content">
                                <!-- parametrizar -->
                                <div class="row">
                                    <div class="col"><br></div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button style="float: left" type="button" class="btnPlataforma btnRegistro_1" data-bs-toggle="modal" data-bs-target="#Editar_parametros" onclick="actualizarParametro()">Parametrizar</button>
                                    </div>
                                    <div class="col">
                                        <button style="float: right" type="button" class="btnPlataforma" onclick=deletePara()>Eliminar</button>
                                    </div>
                                    <div class="col">
                                        <label type="button" style="float: right" id="slt_all_para" for="check_todos_para" class="btnPlataforma btnRegistro_2">Seleccionar todo</label>
                                        <input type="checkbox" id="check_todos_para" style="visibility:hidden;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col"><br></div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Id</th>
                                                <th>Nivel</th>
                                                <th>Edición</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody id="par_recargar">
                                            <?php echo $foundParametrizacion; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- parametrizar fin -->
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="inputRadio" class="inputRadio" id="select_2">
                            <div class="select_content">
                                <!-- ediciones -->
                                <div class="row">
                                    <div class="col"><br></div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button style="float: left" type="button" class="btnPlataforma btnRegistro_1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Agregar</button>
                                    </div>
                                    <div class="col">
                                        <button style="float: right" type="button" class="btnPlataforma" onclick=deleteCateg()>Eliminar</button>
                                    </div>
                                    <div class="col">
                                        <label style="float: right" id="slt_all" for="check_todos" class="btnPlataforma btnRegistro_2">Seleccionar todo</label>
                                        <input type="checkbox" id="check_todos" style="visibility:hidden;">
                                    </div>
                                    <br><br>
                                </div>
                                <div class="row">
                                    <div class="col"><br></div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Categoria</th>
                                                        <th>Editar</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cat_recargar">
                                                    <?php echo $foundCategories; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- ediciones fin -->
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="inputRadio" class="inputRadio" id="select_3">
                            <div class="select_content">
                                <!-- Niveles -->
                                <div class="row">
                                    <div class="col"><br></div>
                                </div>

                                <div class="row">
                                    <div class="col"><br></div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Curso</th>
                                                    </tr>
                                                </thead>
                                                    <tbody>
                                                        <?php echo $foundCourse; ?>
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Niveles fin -->
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- modal PARAMETRICACION -->
<div class="modal fade" id="Editar_parametros" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Vincular categorias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
	            <div class="input-group mb-3" id="actCategoria"></div>
		        <div class="input-group mb-3" id="actCurso"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="categEd_btn" class="btn btn-primary" data-bs-dismiss="modal" onclick="cambioParametro()">Vincular</button>
            </div>
        </div>
    </div>
</div>

<!-- modal categorias editar-->
<div class="modal fade" id="Editar_categorias" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text">id</span>
                    <input class="form-control" type="text" name="idcategM" id="idcategM" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Categoria</span>
                    <input class="form-control" type="text" name="categM" id="categM">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="categEd_btn" class="btn btn-primary" data-bs-dismiss="modal" onclick="cambioCateg()">Cambiar</button>
            </div>
        </div>
    </div>
</div>

<!-- modal categorias agregar-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
	  	<div class="input-group mb-3">
		  	<span class="input-group-text">Categoria</span>
			<input class="form-control" type="text" name="categ" id="categ">
		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="categ_btn" class="btn btn-primary" onclick="enviacodigo()" data-bs-dismiss="modal">Agregar</button>
      </div>

    </div>
  </div>
</div>

<script src="../js/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
<script src="js/categorias.js"></script>
<script src="../../../js/menu.js"></script>
</body>
</html>