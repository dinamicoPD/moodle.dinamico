<?php
//require_once(dirname(__FILE__).'/GroupSummaryController.php');
require_once('GroupSummaryController.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen Inscripcion| Dinámico Pedagogia y Diseño</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleFormPass.css">

	<script
      src="https://code.jquery.com/jquery-3.5.1.slim.js"
      integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM="
      crossorigin="anonymous"></script>
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/functions.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway&display=swap" rel="stylesheet">
    <!-- https://sweetalert.js.org/guides/ -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
    <!--tipografia-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway&display=swap" rel="stylesheet">
    <!--particulas-->
    <link rel="stylesheet" href="css/styleParticulas.css">
    <style>
        .modal {
        display:    none;
        position:   fixed;
        z-index:    1000;
        top:        0;
        left:       0;
        height:     100%;
        width:      100%;
        background: rgba( 255, 255, 255, .8 ) 
                    url('img/FhHRx.gif') 
                    50% 50% 
                    no-repeat;
        }
        body.loading .modal {
            overflow: hidden;   
        }
        body.loading .modal {
            display: block;
        }
    </style>
</head>
<body>
<!--particulas-->
<div id="particles-js"></div>
<div class="contenedor">
    <div class="container">
        <div class="row">
			<div class="col-12">
				<p class="text-center"><strong class="h1">¡Hola Dinamigo!</strong></p>
				<p class="text-center"><strong class="h2">Actualización de Grupos</strong></p>
			</div>
		</div>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="ResumenForm">
                    <div class="bg-danger text-white"><?php echo $form_err;?></div>
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th colspan="3">Información personal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nombre de Usuario:</td>
                                <td colspan="2"><?php echo $Username; ?></td>
                            </tr>
                            <tr>
                                <td>Nombre Completo:</td>
                                <td colspan="2"><?php echo $FullName; ?></td>
                            </tr>
                            <tr>
                                <td>Teléfono:</td>
                                <td colspan="2"><?php echo $Phone; ?></td>
                            </tr>
                            <tr>
                                <td>Ciudad:</td>
                                <td colspan="2"><?php echo $City; ?></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td colspan="2"><?php echo $Email; ?></td>
                            </tr>
                        </tbody>
                        <thead class="table-light">
                            <th colspan="3">Grupos asignados</th>
                        </thead>
                        <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Grupo</th>
                                <th>Clave</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            echo $foundGroups;
                            ?>
                        </tbody>                     
                    </table>
                    <fieldset>
                        <br>
                         <legend>Cursos a dictar</legend>
                         <p style="color: red; font-size: 0.8em;">Seleccione el curso al que dicta acompañado de la sigla del mismo si exite <strong>ejemplo:</strong> Primero A<br>Si dicta en mas cursos agregelos con el singo +</p>
                         <div class="field_wrapper">
                             <?php
                             echo $loadedGroups;
                             ?>
                         </div>
                         <br>                
                     </fieldset>
                     <br>
                     <input name="submitbutton"  class="boton" type="submit" value="Actualizar"><br>
                     <input name ="closebutton" style="margin-top: 10px;" class="boton" type="submit" value="Cerrar"> 
                </form>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br>
</div>


<div class="footer">
	<div class="contGridFooter">
		<div class="griRowC1_3 align-self-center"><a href="http://dinamicopd.com/"  target="_blank"><img class="logoForm" src="img/logo 2.png" alt="logo dinamico pd"></a></div>
		<div class="griRowC2_3 align-self-center">
			<table style="text-align: left; margin: auto;">
				<tr>
					<td>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
							<path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
							<path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
						</svg>
					</td>
					<td>Cra 2E # 73 - 25</td>
				</tr>
				<tr>
					<td>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
							<path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
							<path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
						</svg>
					</td>
					<td>3123000100 | 3123010101</td>
				</tr>
				<tr>
					<td>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-paper" viewBox="0 0 16 16">
							<path d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2H4Zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6v-2.55Zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v5.417Zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267v2.55Zm13 .566v5.734l-4.778-2.867L15 7.383Zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083l6.965 4.18ZM1 13.116V7.383l4.778 2.867L1 13.117Z"/>
						</svg>
					</td>
					<td>dinamicopdadm@gmail.com</td>
				</tr>
			</table>
		</div>
		<div class="griRowC3_3 align-self-center">
			<table style="margin: auto;">
				<tr>
					<td>
						<a class="fb" target="_blank" href="https://www.facebook.com/DinamicoColombia/">
							<svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
								<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
							</svg>
						</a>
					</td>
					<td>
						<a class="yt" target="_blank" href="https://www.youtube.com/channel/UCPSLG3t9l1DO1tEu9NjdK8A">
							<svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
								<path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
							</svg>
						</a>
					</td>
					<td>
						<a class="in" target="_blank" href="https://www.instagram.com/dinamicopd/">
							<svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
								<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
							</svg>
						</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>

<!--bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!--particulas-->
<script src="js/particles.js"></script>
<script src="js/lib/stats.js"></script>
<script src="js/app.js"></script>

<div class="modal"><!-- Place at bottom of page --></div>
</body>
</html>
