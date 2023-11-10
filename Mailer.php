<?php
//define('__ROOT__',dirname(dirname(dirname(__FILE__))));
//require_once(__ROOT__.'/config-ext.php');
require_once('../../config-ext.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

class MailDispatcher{
	public function sendEmaiToTeacher($emailRecipient,$idTeacher,$userName,$password = "",$Rol){
		
		$mail = new PHPMailer(true);

		try {
			    //Server settings
			    $mail->SMTPDebug = 0;                      // Enable verbose debug output
			    $mail->isSMTP();                                            // Send using SMTP
				$mail->CharSet 	  = 'UTF-8';
			    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			    $mail->Username   = MAIL_USER;                     // SMTP username
			    $mail->Password   = MAIL_PASSWORD;                               // SMTP password
			    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			    $mail->Port       = 587;  // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
				
				$cssJD = '
					.tabla{width:450px;margin:auto;border-collapse:collapse;border:none;text-align:center;}table *{margin:0;padding:0;box-sizing:border-box;}.SkyBlue{background-color:#81D4E7;}.SkyBlueClaro{background-color:#CEF2F8;}.PaleGreen{background-color:#BDE298;}.PaleGreenClaro{background-color:#E5F1D6;}.Khaki{background-color:#FAD263;}.KhakiClaro{background-color:#FDDE90;}.Moccasin{background-color:#FFEBBA;}.oscuro{background-color:#424242;}.MediumPurple{background-color:#9AAFFE;}.MediumPurpleClaro{background-color:#D1DBFE;}.Blanco{background-color:#ffffff;}.fontBlanco{color:#ffffff;}.fontNegro{color:#424242;}.fontAzul{color:#368A9B;}.fontRojo{color:#F6746D;}.fontPoppins{font-family:"Poppins",sans-serif;}.fontRoboto{font-family:"Roboto",sans-serif;}.fontRobotoMono{font-family:"Roboto Mono",monospace;}.titulo{font-weight:700;padding:9px 0px;font-size:26px;}.span{background-color:#F6746D;}.tabla img{display:block;margin:auto;}.tablax4 td{width:112.5px;}.tablaX8 td{width:56.25px;}.tablaX6 td{width:75px;}.grupoTitulo{margin-top:17px;}.img80{width:80%;}.img100{width:100%;}.img50{width:50%;}.img30{width:30%;}.pestana{border-radius:12px 12px 0 0;font-size:12px;}.periodico{background-color:#EADED4;font-size:12px;padding:9px 6px 9px 6px;}.margenesDP{padding:9px 0px;}.carpetas{font-size:12px;padding:9px 6px 9px 6px;}.servicios{padding:5px;text-decoration:none;cursor:pointer;display:block;}.pantalla{width:100%;padding:10px 34px;}.play{width:35px;height:35px;border-radius:50%;padding:9.5px 0px 0px 2.5px;}.play img{width:15px;height:15px;}.progreso{width:90%;margin:auto;padding:3px 0;}.btnReproducir{width:60%;margin:auto;padding:3px 0;}.footer1{width:95%;margin:auto;font-size:10px;text-align:left;}.footer1 .social{width:15px;}.footer1 .social img{width:10px;}.footer1 .logo{width:49px;}.footer1 .logo img{width:40px;padding-right:5px;border-right:1px solid #ffffff;}.altoMensaje{height:215px;}.inputLicencia{width:90%;margin:auto;border:2px solid #424242;height:30px;border-radius:20px;margin:5px 0;}.bordeRedondeado{border-radius:3px;}.bordeSuperior{border-top:6px solid #ffffff;}.pasos1{padding:6.5px 3px;margin-right:3px;line-height:16px;}
				';
				
				$ruta_img = 'img/correos/Recurso_9.png';

				$ruta_paso1 = 'img/correos/Recurso_11.png';
				$ruta_pasos = 'img/correos/Recurso_12.png';

				$ruta_yt = 'img/correos/youtube.png';
				$ruta_msm = 'img/correos/email.png';
        		$ruta_wpp = 'img/correos/wpp.png';       		
        		$ruta_in = 'img/correos/instagram.png';

				$ruta_logo = 'img/correos/el_logo.png';

				$ruta_Change = 'temp/QRchange.png';
				
				$foundGroups="";
     			$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

				 $sql = "SELECT CourseName, GroupCode, GroupKey FROM Enrolment WHERE UserId = ?";
				 $stmt = $link->prepare($sql);
				 $stmt->bind_param("s", $idTeacher);
				 
				 if ($stmt->execute()) {
					 $result = $stmt->get_result();
					 $rows = array(); // Array para almacenar los resultados
					 
					 while ($row = $result->fetch_assoc()) {
						 $rutaQR = 'temp/QR'.$row["GroupKey"].'.png';
						 $nameQR = 'imagenQR'.$row["GroupKey"];
						 $mail->addEmbeddedImage($rutaQR, $nameQR);

						 $rows[] = '
							<tr class="bordeSuperior">
								<td colspan="2">
									<table class="tabla tablaX8" cellpadding="0" cellspacing="0">
										<tr class="Moccasin">
											<td class="Blanco" colspan="2" rowspan="4">
												<img class="img100" src="cid:'.$nameQR.'" alt="">
											</td>
											<td colspan="3"></td>
											<td colspan="3"><p class="grupoTitulo pestana Khaki fontNegro fontPoppins"><strong>Curso</strong></p></td>
										</tr>
										<tr>
											<td colspan="6" class="Khaki carpetas"><p class="fontNegro fontPoppins"><strong>'.$row["CourseName"].'</strong></p></td>
										</tr>
										<tr class="Khaki">
											<td></td>
											<td><p class="grupoTitulo pestana KhakiClaro fontNegro fontPoppins"><strong>Grupo</strong></p></td>
											<td colspan="3"></td>
											<td><p class="grupoTitulo pestana Moccasin fontNegro fontPoppins"><strong>Clave</strong></p></td>
										</tr>
										<tr>
											<td class="KhakiClaro carpetas" colspan="2"><p class="fontNegro fontPoppins"><strong>'.$row["GroupCode"].'</strong></p></td>
											<td class="Moccasin carpetas" colspan="4"><p class="fontNegro fontRobotoMono"><strong>'.$row["GroupKey"].'</strong></p></td>
										</tr>
									</table>
								</td>
							</tr>
						 ';
					 }
					 
					 $foundGroups = implode("", $rows); // Unir los resultados al final
				 } else {
					 error_log("Mailer - No se pudo obtener listado de Grupos del Profesor". $idTeacher);
				 }

				$mail->addEmbeddedImage($ruta_img, 'imagen_img');

				$mail->addEmbeddedImage($ruta_paso1, 'imagen_paso1');
				$mail->addEmbeddedImage($ruta_pasos, 'imagen_pasos');

				$mail->addEmbeddedImage($ruta_yt, 'imagen_yt');
				$mail->addEmbeddedImage($ruta_msm, 'imagen_msm');
				$mail->addEmbeddedImage($ruta_wpp, 'imagen_wpp');
				$mail->addEmbeddedImage($ruta_in, 'imagen_in');

				$mail->addEmbeddedImage($ruta_logo, 'imagen_logo');
				$mail->addEmbeddedImage($ruta_Change, 'ruta_Change');
				
			    //Recipients
			    $mail->setFrom('dinamico.moodle@gmail.com', 'dinamicoMoodle');
			    $mail->addAddress($emailRecipient);        // Name is optional
			    
			    // Content */
			    
			    $mail->isHTML(true);                                  // Set email format to HTML

			    $mail->Subject = 'Registro Docente';
			    
			    $mail->Body =
				'<html>
					<head>
						<link rel="preconnect" href="https://fonts.googleapis.com">
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&family=Roboto+Mono:wght@300;700&family=Roboto:wght@300;700&display=swap" rel="stylesheet">
						<style>'.$cssJD.'</style>
					</head>';
					
				$mail->Body .=	
				'<body>
					<table class="tabla" cellpadding="0" cellspacing="0">
    					<tr>
				';

			if($Rol == "Asesor"){
				$mail->Body .= '
							<td colspan="2" class="titulo fontPoppins oscuro fontBlanco">
								Asesor COD: <span class="span">&nbsp;'.$idTeacher.'&nbsp;</span>
							</td>';
			}else{
				$mail->Body .= '
							<td colspan="2" class="titulo fontPoppins oscuro fontBlanco">
								Registro <span class="span">&nbsp;Docente&nbsp;</span>
							</td>';
			}
				
				$mail->Body .='
						</tr>
						<tr class="Moccasin">
							<td>
								<img class="img80" src="cid:imagen_img" alt="">
							</td>
							<td class="fontPoppins fontNegro">
								<p><strong>Nombre de usuario:</strong></p>
								<p class="inputLicencia Blanco">'.$userName.'</p>
							';
			if(!empty($password)){
				$mail->Body .='
								<p><strong>Contraseña provisional:</strong></p>
								<p class="fontRobotoMono inputLicencia Blanco">'.$password.'</p>	
				';
			}
				$mail->Body .='
							</td>
						</tr>
						<tr class="PaleGreen">
							<td colspan="2" class="fontNegro fontPoppins"><p><strong>Cursos disponibles</strong></p></td>
						</tr>
						<tr class="PaleGreenClaro fontRoboto">
							<td colspan="2"><p class="carpetas">Porporciona estas claves o códigos QR a tus estudiantes para que<br>puedan víncularse a los cursos (grupos) correspondientes.</p></td>
						</tr>
						'.$foundGroups.'
						<tr class="bordeSuperior">
							<td>
								<div class="pasos1 SkyBlue bordeRedondeado">
									<br>
									<p class="fontNegro fontPoppins"><strong>¿Cómo cambiar<br>tu contraseña?</strong></p>
									<br>
									<a href="https://dinamicopd.com/moodle/dinapage/LoginPasswordChange.php?3m4il='.urlencode($userName).'&cl4v3='.urlencode($password).'"><img class="img80" src="cid:imagen_paso1" alt=""></a>
									<br>
									<p class="fontAzul fontPoppins"><strong>También puedes</strong></p>
									<p class="fontNegro fontPoppins"><strong>escanear el QR:</strong></p>
									<br>
									<img class="img50" src="cid:ruta_Change" alt="">
									<br>
								</div>
							</td>
							<td>
								<img src="cid:imagen_pasos" alt="">
							</td>
						</tr>
						<tr class="bordeSuperior">
							<td colspan="2" class="oscuro fontBlanco fontRoboto">
								<table class="footer1 margenesDP">
									<tr>
										<td class="logo" rowspan="3"><img src="cid:imagen_logo" alt=""></td>
									</tr>
									<tr>
										<td class="social"><img src="cid:imagen_yt" alt=""></td>
										<td>Dinámico Pedagogía y Diseño</td>
										<td>&nbsp;</td>
										<td class="social"><img src="cid:imagen_wpp" alt=""></td>
										<td>312 300 0100 - 312 301 0101</td>
									</tr>
									<tr>
										<td class="social"><img src="cid:imagen_msm" alt=""></td>
										<td>dinamicopdadm@gmail.com</td>
										<td>&nbsp;</td>
										<td class="social"><img src="cid:imagen_in" alt=""></td>
										<td>dinamicopd</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</body>
				</html>
				';
			    $mail->send();
			} catch (Exception $e) {
			    error_log("El mensaje no se pudo enviar. Error de Mailer:" . $mail->ErrorInfo);
			}
	}

	public function sendEmailToStudent($emailRecipient,$userName, $courseName, $groupName,$teacherName,$password = ""){
		
		$mail = new PHPMailer(true);
		
		try {
			  
			    $mail->SMTPDebug = 0;
				$mail->isSMTP();
				$mail->CharSet 	  = 'UTF-8';
				$mail->Host       = 'smtp.gmail.com';
			    $mail->SMTPAuth   = true;
			    $mail->Username   = MAIL_USER;
			    $mail->Password   = MAIL_PASSWORD;
			    $mail->SMTPSecure = 'tls';
			    $mail->Port       = 587;

				$cssJD = '
				.tabla{width:450px;margin:auto;border-collapse:collapse;border:none;text-align:center;}table *{margin:0;padding:0;box-sizing:border-box;}.SkyBlue{background-color:#81D4E7;}.SkyBlueClaro{background-color:#CEF2F8;}.PaleGreen{background-color:#BDE298;}.PaleGreenClaro{background-color:#E5F1D6;}.Khaki{background-color:#FAD263;}.KhakiClaro{background-color:#FDDE90;}.Moccasin{background-color:#FFEBBA;}.oscuro{background-color:#424242;}.MediumPurple{background-color:#9AAFFE;}.MediumPurpleClaro{background-color:#D1DBFE;}.Blanco{background-color:#ffffff;}.fontBlanco{color:#ffffff;}.fontNegro{color:#424242;}.fontAzul{color:#368A9B;}.fontRojo{color:#F6746D;}.fontPoppins{font-family:"Poppins",sans-serif;}.fontRoboto{font-family:"Roboto",sans-serif;}.fontRobotoMono{font-family:"Roboto Mono",monospace;}.titulo{font-weight:700;padding:9px 0px;font-size:26px;}.span{background-color:#F6746D;}.tabla img{display:block;margin:auto;}.tablax4 td{width:112.5px;}.tablaX8 td{width:56.25px;}.tablaX6 td{width:75px;}.grupoTitulo{margin-top:17px;}.img80{width:80%;}.img100{width:100%;}.img50{width:50%;}.img30{width:30%;}.pestana{border-radius:12px 12px 0 0;font-size:12px;}.periodico{background-color:#EADED4;font-size:12px;padding:9px 6px 9px 6px;}.margenesDP{padding:9px 0px;}.carpetas{font-size:12px;padding:9px 6px 9px 6px;}.servicios{padding:5px;text-decoration:none;cursor:pointer;display:block;}.pantalla{width:100%;padding:10px 34px;}.play{width:35px;height:35px;border-radius:50%;padding:9.5px 0px 0px 2.5px;}.play img{width:15px;height:15px;}.progreso{width:90%;margin:auto;padding:3px 0;}.btnReproducir{width:60%;margin:auto;padding:3px 0;}.footer1{width:95%;margin:auto;font-size:10px;text-align:left;}.footer1 .social{width:15px;}.footer1 .social img{width:10px;}.footer1 .logo{width:49px;}.footer1 .logo img{width:40px;padding-right:5px;border-right:1px solid #ffffff;}.altoMensaje{height:215px;}.inputLicencia{width:90%;margin:auto;border:2px solid #424242;height:30px;border-radius:20px;margin:5px 0;}.bordeRedondeado{border-radius:3px;}.bordeSuperior{border-top:6px solid #ffffff;}.pasos1{padding:6.5px 3px;margin-right:3px;line-height:16px;}
				';

				$ruta_img = 'img/correos/Recurso_13.png';

				$ruta_yt = 'img/correos/youtube.png';
				$ruta_msm = 'img/correos/email.png';
        		$ruta_wpp = 'img/correos/wpp.png';       		
        		$ruta_in = 'img/correos/instagram.png';

				$ruta_logo = 'img/correos/el_logo.png';

				$mail->addEmbeddedImage($ruta_img, 'imagen_img');

				$mail->addEmbeddedImage($ruta_yt, 'imagen_yt');
				$mail->addEmbeddedImage($ruta_msm, 'imagen_msm');
				$mail->addEmbeddedImage($ruta_wpp, 'imagen_wpp');
				$mail->addEmbeddedImage($ruta_in, 'imagen_in');

				$mail->addEmbeddedImage($ruta_logo, 'imagen_logo');

			    //Recipients
			    $mail->setFrom('dinamico.moodle@gmail.com', 'dinamicoMoodle');
			    $mail->addAddress($emailRecipient);        // Name is optional
			    
			    // Content */
			    
			    $mail->isHTML(true);                               // Set email format to HTML


			    $mail->Subject = 'Registro Estudiante';
				//-------------------------------------------------
				$mail->Body =
				'<html>
					<head>
						<link rel="preconnect" href="https://fonts.googleapis.com">
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&family=Roboto+Mono:wght@300;700&family=Roboto:wght@300;700&display=swap" rel="stylesheet">
						<style>'.$cssJD.'</style>
					</head>';
				$mail->Body .='
				<body>
					<table class="tabla" cellpadding="0" cellspacing="0">
						<tr>
							<td colspan="2" class="titulo fontPoppins oscuro fontBlanco">Registro <span class="span">&nbsp;Estudiante&nbsp;</span></td>
						</tr>
						<tr class="SkyBlueClaro">
							<td>
								<img class="img80" src="cid:imagen_img" alt="">
							</td>
							<td class="fontPoppins fontNegro">
								<p><strong>Nombre de usuario:</strong></p>
								<p class="inputLicencia Blanco">'.$userName.'</p>
								<p><strong>Contraseña:</strong></p>
								<p class="fontRobotoMono inputLicencia Blanco">'.$password.'</p>
							</td>
						</tr>
						<tr class="PaleGreen">
							<td colspan="2" class="fontNegro fontPoppins"><p><strong>Cursos disponibles</strong></p></td>
						</tr>
						<tr>
							<td colspan="2">
								<tr class="bordeSuperior">
									<td colspan="2">
										<table class="tabla tablaX6" cellpadding="0" cellspacing="0">
											<tr class="Moccasin">
												<td colspan="3"></td>
												<td colspan="3"><p class="pestana Khaki fontNegro fontPoppins"><strong>Profesor</strong></p></td>
											</tr>
											<tr>
												<td colspan="6" class="Khaki carpetas"><p class="fontNegro fontPoppins"><strong>'.$teacherName.'</strong></p></td>
											</tr>
											<tr class="Khaki">
												<td></td>
												<td><p class="pestana KhakiClaro fontNegro fontPoppins"><strong>Grupo</strong></p></td>
												<td colspan="3"></td>
												<td><p class="pestana Moccasin fontNegro fontPoppins"><strong>Curso</strong></p></td>
											</tr>
											<tr>
												<td class="KhakiClaro carpetas" colspan="2"><p class="fontNegro fontPoppins"><strong>'.$groupName.'</strong></p></td>
												<td class="Moccasin carpetas" colspan="4"><p class="fontNegro fontPoppins"><strong>'.$courseName.'</strong></p></td>
											</tr>
										</table>
									</td>
								</tr>
							</td>
						</tr>
						<tr class="bordeSuperior">
							<td colspan="2" class="oscuro fontBlanco fontRoboto">
								<table class="footer1 margenesDP">
									<tr>
										<td class="logo" rowspan="3"><img src="cid:imagen_logo" alt=""></td>
									</tr>
									<tr>
										<td class="social"><img src="cid:imagen_yt" alt=""></td>
										<td>Dinámico Pedagogía y Diseño</td>
										<td>&nbsp;</td>
										<td class="social"><img src="cid:imagen_wpp" alt=""></td>
										<td>312 300 0100 - 312 301 0101</td>
									</tr>
									<tr>
										<td class="social"><img src="cid:imagen_msm" alt=""></td>
										<td>dinamicopdadm@gmail.com</td>
										<td>&nbsp;</td>
										<td class="social"><img src="cid:imagen_in" alt=""></td>
										<td>dinamicopd</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</body>
				</html>
				';		
				$mail->send();
			} catch (Exception $e) {
			    error_log("El mensaje no se pudo enviar al estudiante. Error de Mailer:" . $mail->ErrorInfo);
			}
	}

	public function sendEmailChangePassword($emailRecipient, $tempPassword,$userName){

		include('phpqrcode/qrlib.php');
		$DIR = 'temp/';
		if(!file_exists($DIR)){
			mkdir($DIR);
		}
		$filenameQR = $DIR.'QR';
		$filenameQR_change = $filenameQR.'change.png';
		$tamanio2 = 10;
		$level2 = 'M';
		$frameSize2 = 2;
		$contenido2 = 'https://dinamicopd.com/moodle/dinapage/LoginPasswordChange.php?3m4il='.urlencode($userName).'&cl4v3='.urlencode($tempPassword);
		QRcode::png($contenido2, $filenameQR_change, $level2, $tamanio2, $frameSize2);

		$mail = new PHPMailer(true);
	
		try {
			    //Server settings
			    $mail->SMTPDebug = 0;
				$mail->isSMTP();
				$mail->CharSet 	  = 'UTF-8';
				$mail->Host       = 'smtp.gmail.com';
				$mail->SMTPAuth   = true;
				$mail->Username   = MAIL_USER;
				$mail->Password   = MAIL_PASSWORD;
				$mail->SMTPSecure = 'tls';
				$mail->Port       = 587;

				$cssJD = '
				.tabla{width:450px;margin:auto;border-collapse:collapse;border:none;text-align:center;}table *{margin:0;padding:0;box-sizing:border-box;}.SkyBlue{background-color:#81D4E7;}.SkyBlueClaro{background-color:#CEF2F8;}.PaleGreen{background-color:#BDE298;}.PaleGreenClaro{background-color:#E5F1D6;}.Khaki{background-color:#FAD263;}.KhakiClaro{background-color:#FDDE90;}.Moccasin{background-color:#FFEBBA;}.oscuro{background-color:#424242;}.MediumPurple{background-color:#9AAFFE;}.MediumPurpleClaro{background-color:#D1DBFE;}.Blanco{background-color:#ffffff;}.fontBlanco{color:#ffffff;}.fontNegro{color:#424242;}.fontAzul{color:#368A9B;}.fontRojo{color:#F6746D;}.fontPoppins{font-family:"Poppins",sans-serif;}.fontRoboto{font-family:"Roboto",sans-serif;}.fontRobotoMono{font-family:"Roboto Mono",monospace;}.titulo{font-weight:700;padding:9px 0px;font-size:26px;}.span{background-color:#F6746D;}.tabla img{display:block;margin:auto;}.tablax4 td{width:112.5px;}.tablaX8 td{width:56.25px;}.tablaX6 td{width:75px;}.grupoTitulo{margin-top:17px;}.img80{width:80%;}.img100{width:100%;}.img50{width:50%;}.img30{width:30%;}.pestana{border-radius:12px 12px 0 0;font-size:12px;}.periodico{background-color:#EADED4;font-size:12px;padding:9px 6px 9px 6px;}.margenesDP{padding:9px 0px;}.carpetas{font-size:12px;padding:9px 6px 9px 6px;}.servicios{padding:5px;text-decoration:none;cursor:pointer;display:block;}.pantalla{width:100%;padding:10px 34px;}.play{width:35px;height:35px;border-radius:50%;padding:9.5px 0px 0px 2.5px;}.play img{width:15px;height:15px;}.progreso{width:90%;margin:auto;padding:3px 0;}.btnReproducir{width:60%;margin:auto;padding:3px 0;}.footer1{width:95%;margin:auto;font-size:10px;text-align:left;}.footer1 .social{width:15px;}.footer1 .social img{width:10px;}.footer1 .logo{width:49px;}.footer1 .logo img{width:40px;padding-right:5px;border-right:1px solid #ffffff;}.altoMensaje{height:215px;}.inputLicencia{width:90%;margin:auto;border:2px solid #424242;height:30px;border-radius:20px;margin:5px 0;}.bordeRedondeado{border-radius:3px;}.bordeSuperior{border-top:6px solid #ffffff;}.pasos1{padding:6.5px 3px;margin-right:3px;line-height:16px;}
				';

				$ruta_img = 'img/correos/Recurso_14.png';

				$ruta_yt = 'img/correos/youtube.png';
				$ruta_msm = 'img/correos/email.png';
				$ruta_wpp = 'img/correos/wpp.png';       		
				$ruta_in = 'img/correos/instagram.png';

				$ruta_paso1 = 'img/correos/Recurso_11.png';
				$ruta_pasos = 'img/correos/Recurso_12.png';

				$ruta_logo = 'img/correos/el_logo.png';

				$ruta_QR = 'temp/QRchange.png';

				$mail->addEmbeddedImage($ruta_img, 'imagen_img');

				$mail->addEmbeddedImage($ruta_yt, 'imagen_yt');
				$mail->addEmbeddedImage($ruta_msm, 'imagen_msm');
				$mail->addEmbeddedImage($ruta_wpp, 'imagen_wpp');
				$mail->addEmbeddedImage($ruta_in, 'imagen_in');

				$mail->addEmbeddedImage($ruta_paso1, 'imagen_paso1');
				$mail->addEmbeddedImage($ruta_pasos, 'imagen_pasos');

				$mail->addEmbeddedImage($ruta_logo, 'imagen_logo');

				$mail->addEmbeddedImage($ruta_QR, 'imagen_QR');

			    //Recipients
			    $mail->setFrom('dinamico.moodle@gmail.com', 'dinamicoMoodle');
			    $mail->addAddress($emailRecipient);        // Name is optional
			    
			  
			    // Content */
			    
			    $mail->isHTML(true);// Set email format to HTML
			    $mail->Subject = 'Restablecer Password';
				$mail->Body = '
				<html>
					<head>
						<link rel="preconnect" href="https://fonts.googleapis.com">
						<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
						<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&family=Roboto+Mono:wght@300;700&family=Roboto:wght@300;700&display=swap" rel="stylesheet">
						<style>'.$cssJD.'</style>
					</head>
					<body>
						<table class="tabla" cellpadding="0" cellspacing="0">
							<tr>
								<td colspan="2" class="titulo fontPoppins oscuro fontBlanco">Restablecer <span class="span">&nbsp;Contraseña&nbsp;</span></td>
							</tr>
							<tr class="PaleGreenClaro">
								<td>
									<img class="img80" src="cid:imagen_img" alt="">
								</td>
								<td class="fontPoppins fontNegro">
									<p><strong>Nombre de usuario:</strong></p>
									<p class="inputLicencia Blanco">'.$userName.'</p>
									<p><strong>Contraseña provisional:</strong></p>
									<p class="fontRobotoMono inputLicencia Blanco">'.$tempPassword.'</p>
								</td>
							</tr>
							<tr class="bordeSuperior">
								<td>
									<div class="pasos1 SkyBlue bordeRedondeado">
										<br>
										<p class="fontNegro fontPoppins"><strong>¿Cómo cambiar<br>tu contraseña?</strong></p>
										<br>
										<a href="'.$contenido2.'"><img class="img80" src="cid:imagen_paso1" alt=""></a>
										<br>
										<p class="fontAzul fontPoppins"><strong>También puedes</strong></p>
										<p class="fontNegro fontPoppins"><strong>escanear el QR:</strong></p>
										<br>
										<img class="img50" src="cid:imagen_QR" alt="">
										<br>
									</div>    
								</td>
								<td>
									<img src="cid:imagen_pasos" alt="">
								</td>
							</tr>
							<tr class="bordeSuperior">
								<td colspan="2" class="oscuro fontBlanco fontRoboto">
									<table class="footer1 margenesDP">
										<tr>
											<td class="logo" rowspan="3"><img src="cid:imagen_logo" alt=""></td>
										</tr>
										<tr>
											<td class="social"><img src="cid:imagen_yt" alt=""></td>
											<td>Dinámico Pedagogía y Diseño</td>
											<td>&nbsp;</td>
											<td class="social"><img src="cid:imagen_wpp" alt=""></td>
											<td>312 300 0100 - 312 301 0101</td>
										</tr>
										<tr>
											<td class="social"><img src="cid:imagen_msm" alt=""></td>
											<td>dinamicopdadm@gmail.com</td>
											<td>&nbsp;</td>
											<td class="social"><img src="cid:imagen_in" alt=""></td>
											<td>dinamicopd</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</body>
				</html>
				';

			    $mail->send();
			} catch (Exception $e) {
			    error_log("El mensaje para reestablecer password no ha sido enviado. Error de Mailer:" . $mail->ErrorInfo);
			}

			$carpeta = '/var/www/html/moodle/moodle/dinapage/temp';

			// Obtener la lista de archivos y carpetas dentro de la carpeta
			$contenidoDIR = glob($carpeta . '/*');

			// Recorrer el contenido y eliminar cada archivo o carpeta
			foreach ($contenidoDIR as $elemento) {
				if (is_file($elemento)) {
					unlink($elemento);  // Eliminar archivo
				} elseif (is_dir($elemento)) {
					rmdir($elemento);  // Eliminar carpeta vacía
				}
			}
	}
}
?>
