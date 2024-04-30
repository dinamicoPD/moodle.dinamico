<?php
    session_start();
    if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] != true){
    header("location: AdminLogin.php");
    exit;
    }
include("menu.php");
if(isset($_GET['mensaje'])){
    $variable1 = $_GET['mensaje'];
    $variable1 = '<div class="alert alert-success" role="alert">
        '.$variable1.'
      </div>';
} else {
    $variable1 = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masivo docente | Dinámico pedagogía y diseño</title>
    <link rel="icon" href="../img/cara.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap_5_3_0_min.css">
    <link rel="stylesheet" href="../css/getbootstrap.com_docs_5.3_assets_css_docs.css">
    <script src="../js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../../css/menu.css">
    <link rel="stylesheet" href="../../../css/config.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="styleManager.css">
    
    <!-- https://sweetalert.js.org/guides/ -->
    <script src="../js/sweetAlert/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../css/sweetAlert/sweetalert2.min.css">
</head>
<body>
<?php echo $menu; ?>
<section id="p1">
    <div class="titulo">
        <h2>Masivos Docente</h2>
        <hr>
        <br>
        <br>
        <br>
    </div>
    <div class="container popinsFont">
        <?php echo $variable1 ?>
        <form action="masivoDocenteProcesar.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-check-label" for="archivo_csv">Adjunte archivo CSV</label>
                <input name="archivo_csv" class="form-control" type="file" id="archivo_csv" aria-describedby="archivo_csv" required>
            </div>
            <input class="btnPlataforma" type="submit" value="Subir archivo CSV" />
        </form>
    </div>
</section>
<section>
    <div class="titulo">
        <h2>Instrucciones</h2>
        <hr>
    </div>
    <div class="container popinsFont">
        <br><br><br>
        <div class="row">
            <div class="col">
            <style type="text/css">
                .ritz .waffle a {
                	color: transparent;
                }
                
                .ritz .waffle .s2 {
                	border-bottom: 1px SOLID #000000;
                	border-right: 1px SOLID #000000;
                	background-color: transparent;
                	text-align: center;
                	font-weight: bold;
                	color: #000000;
                	font-family: 'Arial';
                	font-size: 10pt;
                	vertical-align: bottom;
                	white-space: nowrap;
                	direction: ltr;
                	padding: 2px 3px 2px 3px;
                }
                
                .ritz .waffle .s4 {
                	background-color: transparent;
                	text-align: center;
                	color: #000000;
                	font-family: 'Arial';
                	font-size: 10pt;
                	vertical-align: bottom;
                	white-space: nowrap;
                	direction: ltr;
                	padding: 2px 3px 2px 3px;
                }
                
                .ritz .waffle .s5 {
                	background-color: #fce5cd;
                	text-align: center;
                	color: #000000;
                	font-family: 'Arial';
                	font-size: 10pt;
                	vertical-align: middle;
                	white-space: nowrap;
                	direction: ltr;
                	padding: 2px 3px 2px 3px;
                }
                
                .ritz .waffle .s3 {
                	background-color: transparent;
                	text-align: center;
                	font-weight: bold;
                	color: #000000;
                	font-family: 'Arial';
                	font-size: 10pt;
                	vertical-align: bottom;
                	white-space: nowrap;
                	direction: ltr;
                	padding: 2px 3px 2px 3px;
                }
                
                .ritz .waffle .s0 {
                	border-bottom: 1px SOLID #000000;
                	background-color: transparent;
                	text-align: center;
                	font-weight: bold;
                	color: #000000;
                	font-family: 'Arial';
                	font-size: 10pt;
                	vertical-align: middle;
                	white-space: nowrap;
                	direction: ltr;
                	padding: 2px 3px 2px 3px;
                }
                
                .ritz .waffle .s6 {
                	border-bottom: 1px SOLID #000000;
                	background-color: transparent;
                	text-align: center;
                	font-weight: bold;
                	color: #000000;
                	font-family: 'Arial';
                	font-size: 10pt;
                	vertical-align: bottom;
                	white-space: nowrap;
                	direction: ltr;
                	padding: 2px 3px 2px 3px;
                }
                
                .ritz .waffle .s1 {
                	border-bottom: 1px SOLID #000000;
                	border-right: 1px SOLID #000000;
                	background-color: #fce5cd;
                	text-align: center;
                	font-weight: bold;
                	color: #000000;
                	font-family: 'Arial';
                	font-size: 10pt;
                	vertical-align: bottom;
                	white-space: nowrap;
                	direction: ltr;
                	padding: 2px 3px 2px 3px;
                }
                
                .ritz .waffle .s7 {
                	border-bottom: 1px SOLID #000000;
                	background-color: transparent;
                	text-align: center;
                	color: #000000;
                	font-family: 'Arial';
                	font-size: 10pt;
                	vertical-align: bottom;
                	white-space: nowrap;
                	direction: ltr;
                	padding: 2px 3px 2px 3px;
                }
                
                .ritz .waffle .s8 {
                	background-color: transparent;
                	text-align: left;
                	color: #000000;
                	font-family: 'Arial';
                	font-size: 10pt;
                	vertical-align: bottom;
                	white-space: nowrap;
                	direction: ltr;
                	padding: 2px 3px 2px 3px;
                }
            </style>
<div class="ritz grid-container p-3" dir="ltr">
	<table class="waffle" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th class="row-header freezebar-origin-ltr"></th>
				<th id="0C0" style="width:131px;" class="column-headers-background"></th>
				<th id="0C1" style="width:131px;" class="column-headers-background"></th>
				<th id="0C2" style="width:131px;" class="column-headers-background"></th>
				<th id="0C3" style="width:131px;" class="column-headers-background"></th>
				<th id="0C4" style="width:131px;" class="column-headers-background"></th>
				<th id="0C5" style="width:131px;" class="column-headers-background"></th>
				<th id="0C6" style="width:131px;" class="column-headers-background"></th>
				<th id="0C7" style="width:131px;" class="column-headers-background"></th>
				<th id="0C8" style="width:183px;" class="column-headers-background"></th>
				<th id="0C9" style="width:131px;" class="column-headers-background"></th>
				<th id="0C10" style="width:131px;" class="column-headers-background"></th>
				<th id="0C11" style="width:196px;" class="column-headers-background"></th>
			</tr>
		</thead>
		<tbody>
			<tr style="height: 41px">
				<th id="0R0" style="height: 41px;" class="row-headers-background">
					<div class="row-header-wrapper" style="line-height: 41px"></div>
				</th>
				<td class="s0" dir="ltr" colspan="12">FORMATO INSCRIPCION DOCENTES</td>
			</tr>
			<tr style="height: 20px">
				<th id="0R1" style="height: 20px;" class="row-headers-background">
					<div class="row-header-wrapper" style="line-height: 20px"></div>
				</th>
				<td class="s1" dir="ltr">CODIGO ASESOR:</td>
				<td class="s2" dir="ltr">5</td>
				<td class="s2" dir="ltr">NOMBRE ASESOR:</td>
				<td class="s2" dir="ltr" colspan="4">Camilo</td>
				<td class="s3" dir="ltr"></td>
				<td class="s3" dir="ltr"></td>
				<td class="s3" dir="ltr"></td>
				<td class="s3" dir="ltr"></td>
				<td class="s3" dir="ltr"></td>
			</tr>
			<tr style="height: 20px">
				<th id="0R2" style="height: 20px;" class="row-headers-background">
					<div class="row-header-wrapper" style="line-height: 20px"></div>
				</th>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
			</tr>
			<tr style="height: 20px">
				<th id="0R3" style="height: 20px;" class="row-headers-background">
					<div class="row-header-wrapper" style="line-height: 20px"></div>
				</th>
				<td class="s5" dir="ltr" colspan="12" rowspan="2"><span style="font-weight:bold;">NOTA: </span>Por favor, complete cada fila con un grupo a la vez. En caso de que el docente esté asignado a más de un grupo, por ejemplo, 601 y 602, asegúrese de colocarlos ordenadamente en filas separadas, ver ejemplos a continuacion:</td>
			</tr>
			<tr style="height: 20px">
				<th id="0R4" style="height: 20px;" class="row-headers-background">
					<div class="row-header-wrapper" style="line-height: 20px"></div>
				</th>
			</tr>
			<tr style="height: 20px">
				<th id="0R5" style="height: 20px;" class="row-headers-background">
					<div class="row-header-wrapper" style="line-height: 20px"></div>
				</th>
				<td class="s6" dir="ltr"></td>
				<td class="s6" dir="ltr"></td>
				<td class="s6" dir="ltr"></td>
				<td class="s6" dir="ltr"></td>
				<td class="s6" dir="ltr"></td>
				<td class="s6" dir="ltr"></td>
				<td class="s6" dir="ltr"></td>
				<td class="s6" dir="ltr"></td>
				<td class="s6" dir="ltr"></td>
				<td class="s6" dir="ltr"></td>
				<td class="s6" dir="ltr"></td>
				<td class="s6" dir="ltr"></td>
			</tr>
			<tr style="height: 20px">
				<th id="0R6" style="height: 20px;" class="row-headers-background">
					<div class="row-header-wrapper" style="line-height: 20px"></div>
				</th>
				<td class="s1" dir="ltr">Grupo</td>
				<td class="s1" dir="ltr">Nivel</td>
				<td class="s2" dir="ltr">Edicion</td>
				<td class="s1" dir="ltr">Primer nombre</td>
				<td class="s1" dir="ltr">Segundo nombre</td>
				<td class="s1" dir="ltr">Primer apellido</td>
				<td class="s1" dir="ltr">Segundo apellido</td>
				<td class="s1" dir="ltr">Telefono</td>
				<td class="s2" dir="ltr">Departamento</td>
				<td class="s2" dir="ltr">Ciudad</td>
				<td class="s1" dir="ltr">Colegio</td>
				<td class="s1" dir="ltr">Email</td>
			</tr>
			<tr style="height: 20px">
				<th id="0R7" style="height: 20px;" class="row-headers-background">
					<div class="row-header-wrapper" style="line-height: 20px"></div>
				</th>
				<td class="s4" dir="ltr">601</td>
				<td class="s4" dir="ltr">C1</td>
				<td class="s4" dir="ltr">Alpha</td>
				<td class="s4" dir="ltr">Dinamico</td>
				<td class="s4" dir="ltr"></td>
				<td class="s4" dir="ltr">Moodle</td>
				<td class="s4" dir="ltr">Soporte</td>
				<td class="s4" dir="ltr">3144705547</td>
				<td class="s4" dir="ltr">PLATAFORMA</td>
				<td class="s4" dir="ltr">DINAMICO PD</td>
				<td class="s4" dir="ltr">MUESTRAS</td>
				<td class="s4" dir="ltr">dinamico.moodle@gmail.com</td>
			</tr>
			<tr style="height: 20px">
				<th id="0R8" style="height: 20px;" class="row-headers-background">
					<div class="row-header-wrapper" style="line-height: 20px"></div>
				</th>
				<td class="s4" dir="ltr"></td>
				<td class="s4" dir="ltr"></td>
				<td class="s4" dir="ltr"></td>
				<td class="s4" dir="ltr"></td>
				<td class="s4" dir="ltr"></td>
				<td class="s4" dir="ltr"></td>
				<td class="s4" dir="ltr"></td>
				<td class="s4" dir="ltr"></td>
				<td class="s4" dir="ltr"></td>
				<td class="s4" dir="ltr"></td>
				<td class="s4" dir="ltr"></td>
				<td class="s4" dir="ltr"></td>
			</tr>
			<tr style="height: 20px">
				<th id="0R9" style="height: 20px;" class="row-headers-background">
					<div class="row-header-wrapper" style="line-height: 20px"></div>
				</th>
				<td class="s5" dir="ltr" colspan="12" rowspan="2"><span style="font-weight:bold;">NOTA:</span> Verificar el id del curso para Nivel <span style="font-style:italic;">(</span><span style="font-style:italic;color:#0000ff;">moodle/dinapage/admin/colegiosManager.php</span><span style="font-style:italic;">)</span> y el id del colegio <span style="font-style:italic;">(</span><span style="font-style:italic;color:#0000ff;">moodle/dinapage/admin/categoriasManager.php</span><span style="font-style:italic;">)</span> y reemplazar la informacion como la tabla a continuacion</td>
			</tr>
			<tr style="height: 20px">
				<th id="0R10" style="height: 20px;" class="row-headers-background">
					<div class="row-header-wrapper" style="line-height: 20px"></div>
				</th>
			</tr>
			<tr style="height: 20px">
				<th id="0R11" style="height: 20px;" class="row-headers-background">
					<div class="row-header-wrapper" style="line-height: 20px"></div>
				</th>
				<td class="s7"></td>
				<td class="s7"></td>
				<td class="s7"></td>
				<td class="s7"></td>
				<td class="s7"></td>
				<td class="s7"></td>
				<td class="s7"></td>
				<td class="s7"></td>
				<td class="s7"></td>
				<td class="s7"></td>
				<td class="s4"></td>
				<td class="s4"></td>
			</tr>
			<tr style="height: 20px">
				<th id="0R12" style="height: 20px;" class="row-headers-background">
					<div class="row-header-wrapper" style="line-height: 20px"></div>
				</th>
				<td class="s1" dir="ltr">Grupo</td>
				<td class="s1" dir="ltr">Nivel</td>
				<td class="s1" dir="ltr">Primer nombre</td>
				<td class="s1" dir="ltr">Segundo nombre</td>
				<td class="s1" dir="ltr">Primer apellido</td>
				<td class="s1" dir="ltr">Segundo apellido</td>
				<td class="s1" dir="ltr">Telefono</td>
				<td class="s1" dir="ltr">Colegio</td>
				<td class="s1" dir="ltr">Email</td>
				<td class="s1" dir="ltr">Asesor</td>
				<td></td>
				<td></td>
			</tr>
			<tr style="height: 20px">
				<th id="0R13" style="height: 20px;" class="row-headers-background">
					<div class="row-header-wrapper" style="line-height: 20px"></div>
				</th>
				<td class="s4" dir="ltr">601</td>
				<td class="s4" dir="ltr">1</td>
				<td class="s4" dir="ltr">Dinamico</td>
				<td class="s4" dir="ltr"></td>
				<td class="s4" dir="ltr">Moodle</td>
				<td class="s4" dir="ltr">Soporte</td>
				<td class="s4" dir="ltr">3144705547</td>
				<td class="s4" dir="ltr">24</td>
				<td class="s8" dir="ltr">dinamico.moodle@gmail.com</td>
				<td class="s4" dir="ltr">5</td>
				<td class="s4"></td>
				<td class="s4"></td>
			</tr>
            <tr style="height: 20px">
				<th id="0R2" style="height: 20px;" class="row-headers-background">
					<div class="row-header-wrapper" style="line-height: 20px"></div>
				</th>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
				<td class="s4"></td>
			</tr>
            <tr style="height: 20px">
				<th id="0R3" style="height: 20px;" class="row-headers-background">
					<div class="row-header-wrapper" style="line-height: 20px"></div>
				</th>
				<td class="s5" dir="ltr" colspan="12" rowspan="2"><span style="font-weight:bold;">NOTA: </span>al modificar el contenido de la tabla borre los encabezado y exporte el documento en formato .CSV debe quedar de la siguiente manera:<br>601,1,Dinamico,,Moodle,Soporte,3144705547,24,dinamico.moodle@gmail.com,5</td>
			</tr>
		</tbody>
	</table>
</div>
            </div>
        </div>
    </div>
    <br><br><br>
</section>
<script>
    var posicionMenu = document.getElementById('m7');
    var posicionSudMenu = document.getElementById('m7-b');
    posicionMenu.classList.add('menuActivo');
    posicionSudMenu.classList.add('menuActivo');
</script>


<script src="../js/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
<script src="../../../js/menu.js"></script>
</body>
</html>