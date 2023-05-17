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
	public function sendEmaiToTeacher($emailRecipient,$idTeacher,$userName,$password = ""){
		$mail = new PHPMailer(true);

		try {
			    //Server settings
			    $mail->SMTPDebug = 0;                      // Enable verbose debug output
			    $mail->isSMTP();                                            // Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			    $mail->Username   = MAIL_USER;                     // SMTP username
			    $mail->Password   = MAIL_PASSWORD;                               // SMTP password
			    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			    $mail->Port       = 587;  // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
				
				$ruta_img = 'img/logo 2.png';
        		$ruta_img2 = 'img/dinamicoEscritorio.png';

        		$ruta_fb = 'img/facebook.png';
        		$ruta_yt = 'img/youtube.png';
        		$ruta_in = 'img/instagram.png';

				$ruta_mano = 'img/manos-60-x-20.png';

				$mail->addEmbeddedImage($ruta_img, 'imagen_logo');
				$mail->addEmbeddedImage($ruta_img2, 'imagen_mico');

				$mail->addEmbeddedImage($ruta_fb, 'imagen_fb');
				$mail->addEmbeddedImage($ruta_yt, 'imagen_yt');
				$mail->addEmbeddedImage($ruta_in, 'imagen_in');

				$mail->addEmbeddedImage($ruta_mano, 'imagen_mano');
				
			    //Recipients
			    $mail->setFrom('dinamico.moodle@gmail.com', 'dinamicoMoodle');
			    
			    $mail->addAddress('dinamico.moodle@gmail.com', 'servicioCliente');     // Add a recipient
			    $mail->addAddress($emailRecipient);        // Name is optional
			    
			    // Content */
			    
			    $mail->isHTML(true);                                  // Set email format to HTML

				$css = "
				
				.table_1{
					width: 400px;
					font-family: Georgia, serif;
					text-align: center;
					margin: auto;
					border-collapse: collapse;
					border: none;
				}
			
				.table_2{
					width: 400px;
					font-family: Georgia, serif;
					text-align: center;
					margin: auto;
				}
			
				.table_2 th {
					background-color: #F2F2F2;
				}
			
				.table_2 td {
					border-bottom: 1px solid #F2F2F2;
				}
			
				.cabeza{
					background-color: #1F1F1F;
					color: #ffffff;
					padding: 10px;
				}
			
				.img {
					width: 200px;
					padding: 6px;
				}
			
				.img2 {
					width: 35px;
				}
			
				.txtTitulo{
					color: #49C025;
					font-weight: bold;
				}
			
				.txt{
					color: #CE9178;
					font-weight: bold;
				}
			
				.pie{
				   background-color: #A2A2A2;
				   color: #ffffff;
				}
			
				.pie2{
					font-size: 10px;
					background-color: #1F1F1F;
					color: #8C8C8C;
				}
			
				.bordeCentro{
					border-left: 1px solid #F2F2F2;
					border-right: 1px solid #F2F2F2;
				}
				
				";

			    $foundGroups="";
     			$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

			    $sql = "SELECT CourseName, GroupCode, GroupKey FROM Enrolment WHERE UserId = ".$idTeacher." ";
			    if ($result = $link->query($sql)){
			            while ($row = $result->fetch_assoc()) {
			                $foundGroups .= "<tr>";
			                $foundGroups .='<td>'.$row["CourseName"].'</td>';
			                $foundGroups .='<td  class="bordeCentro">'.$row["GroupCode"].'</td>' ;
			                $foundGroups .='<td>'.$row["GroupKey"].'</td>'; 
			                $foundGroups .="</tr>";
			             }
			    }else{
			             error_log("Mailer - No se pudo obtener listado de Grupos del Profesor". $idTeacher);
			    }

			    $mail->Subject = 'Cursos Vinculados';
			    
			    $mail->Body =
				'<html>
					<head>
						<style>'.$css.'</style>
					</head>';
				$mail->Body .=	
				'<body>
					<table class="table_1">
						<thead>
							<tr>
								<th class="cabeza" colspan="4">REGISTRO DOCENTE</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td rowspan="4"><img class="img" src="cid:imagen_mico" alt=""></td>
								<td class="txtTitulo" colspan="3">Nombre de<br>usuario:</td>
							</tr> 
							<tr>
								<td class="txt" colspan="3">'.$userName.'</td>
							</tr>';

	if(!empty($password)){
			$mail->Body .=

							'<tr>
								<td class="txtTitulo" colspan="3">Su contraseña<br>provisional:</td>
							</tr>
							<tr>
								<td class="txt" colspan="3">'.$password.'</td>
							</tr>';

						} else {

			$mail->Body .=
							'<tr>
								<td class="txtTitulo" colspan="3">---</td>
							</tr>
							<tr>
								<td class="txt" colspan="3">---</td>
							</tr>';

						}

				$mail->Body .= '
							<tr>
								<td colspan="4">
									<table class="table_2">
										<tr>
											<th colspan="3">Cursos disponibles</th>
										</tr>
										<tr>
											<th>Curso</th>
											<th class="bordeCentro">Grupo</th>
											<th>Clave</th>
										</tr>'
										.$foundGroups.
									'</table>
								<td>
							</tr>   
							<tr>
								<td colspan="4">
									<table class="table_1">
										<tr class="bordeCentro">
											<th>Ingresa tu contraseña provisional<br>y cambia tu contraseña</th>
											<th><a href="http://85.187.158.12/moodle/dinapage/LoginPasswordChange.php"><img src="cid:imagen_mano" alt=""><br>Clic aquí</a></th>
										</tr>
									</table>
								<td>
							</tr>
							<tr>
								<td colspan="4">
									<table class="table_1">
										<tr class="pie">
											<td><a href="http://dinamicopd.com/"><img class="img" src="cid:imagen_logo" alt=""></a></td>
											<td><a href="https://www.facebook.com/dinamicopd"><img class="img2" src="cid:imagen_fb" alt=""></a></td>
											<td><a href="https://www.youtube.com/channel/UCPSLG3t9l1DO1tEu9NjdK8A"><img class="img2" src="cid:imagen_yt" alt=""></a></td>
											<td><a href="https://www.instagram.com/dinamicopd/"><img class="img2" src="cid:imagen_in" alt=""></a></td>
										</tr>
									</table>
								<td>
							</tr>
							<tr>
								<td colspan="4">
									<table class="table_1">
										<tr class="pie2">
											<td colspan="4">
												<p>
													Cra 2E # 73 - 25<br>
													3123000100 | 3123010101<br>
													dinamicopdadm@gmail.com
												</p>
											</td>
										</tr>
									</table>
								<td>
							</tr>
						</tbody>
					</table>
				</body>
				</html>';
			    $mail->send();
			} catch (Exception $e) {
			    error_log("El mensaje no se pudo enviar. Error de Mailer:" . $mail->ErrorInfo);
			}
	}

	public function sendEmailToStudent($emailRecipient,$userName, $courseName, $groupName,$teacherName,$password = ""){
		$mail = new PHPMailer(true);
		
		try {
			    //Server settings
			    $mail->SMTPDebug = 0;                      // Enable verbose debug output
			    $mail->isSMTP();                                            // Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			    $mail->Username   = MAIL_USER;                     // SMTP username
			    $mail->Password   = MAIL_PASSWORD;                               // SMTP password
			    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

				$ruta_img = 'img/logo 2.png';
        		$ruta_img2 = 'img/dinamicoEscritorio.png';

        		$ruta_fb = 'img/facebook.png';
        		$ruta_yt = 'img/youtube.png';
        		$ruta_in = 'img/instagram.png';

				$ruta_mano = 'img/manos-60-x-20.png';

				$css = "
				
				.table_1{
					width: 400px;
					font-family: Georgia, serif;
					text-align: center;
					margin: auto;
					border-collapse: collapse;
					border: none;
				}
			
				.table_2{
					width: 400px;
					font-family: Georgia, serif;
					text-align: center;
					margin: auto;
				}
			
				.table_2 th {
					background-color: #F2F2F2;
				}
			
				.table_2 td {
					border-bottom: 1px solid #F2F2F2;
				}
			
				.cabeza{
					background-color: #1F1F1F;
					color: #ffffff;
					padding: 10px;
				}
			
				.img {
					width: 200px;
					padding: 6px;
				}
			
				.img2 {
					width: 35px;
				}
			
				.txtTitulo{
					color: #49C025;
					font-weight: bold;
				}
			
				.txt{
					color: #CE9178;
					font-weight: bold;
				}
			
				.pie{
				   background-color: #A2A2A2;
				   color: #ffffff;
				}
			
				.pie2{
					font-size: 10px;
					background-color: #1F1F1F;
					color: #8C8C8C;
				}
			
				.bordeCentro{
					border-left: 1px solid #F2F2F2;
					border-right: 1px solid #F2F2F2;
				}
				
				";

				$mail->addEmbeddedImage($ruta_img, 'imagen_logo');
				$mail->addEmbeddedImage($ruta_img2, 'imagen_mico');

				$mail->addEmbeddedImage($ruta_fb, 'imagen_fb');
				$mail->addEmbeddedImage($ruta_yt, 'imagen_yt');
				$mail->addEmbeddedImage($ruta_in, 'imagen_in');

				$mail->addEmbeddedImage($ruta_mano, 'imagen_mano');

			    //Recipients
			    $mail->setFrom('dinamico.moodle@gmail.com', 'dinamicoMoodle');
			    
			    $mail->addAddress('dinamico.moodle@gmail.com', 'servicioCliente');     // Add a recipient
			    $mail->addAddress($emailRecipient);        // Name is optional
			    
			    // Content */
			    
			    $mail->isHTML(true);                               // Set email format to HTML


			    $mail->Subject = 'Registro';
				//-------------------------------------------------
				$mail->Body =
				'<html>
					<head>
						<style>'.$css.'</style>
					</head>';
				$mail->Body .=
				'<table class="table_1">
				<thead>
					<tr>
						<th class="cabeza" colspan="4">REGISTRO ESTUDIANTE</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td rowspan="4"><img class="img" src="cid:imagen_mico" alt=""></td>
						<td class="txtTitulo" colspan="3">Nombre de<br>usuario:</td>
					</tr> 
					<tr>
						<td class="txt" colspan="3">'.$userName.'</td>
					</tr>';
					if(!empty($password)){
				$mail->Body .=
					'<tr>
						<td class="txtTitulo" colspan="3">Su contraseña<br>provisional:</td>
					</tr>
					<tr>
						<td class="txt" colspan="3">'.$password.'</td>
					</tr>';
					}else{
				$mail->Body .=
					'<tr>
						<td class="txtTitulo" colspan="3">---</td>
					</tr>
					<tr>
						<td class="txt" colspan="3">---</td>
					</tr>';
					}
				$mail->Body .=	
					'<tr>
						<td colspan="4">
							<table class="table_2">
								<tr>
									<th colspan="3">Cursos disponibles</th>
								</tr>
								<tr>
									<th>Profesor</th>
									<th class="bordeCentro">Curso</th>
									<th>Grupo</th>
								</tr>
								<tr>
									<td>'.$teacherName.'</td>
									<td class="bordeCentro">'.$courseName.'</td>
									<td>'.$groupName.'</td>
								</tr>
							</table>
						</td>
					</tr>   
					<tr>
						<td colspan="4">
							<table class="table_1">
								<tr class="bordeCentro">
									<th>Ingresa tu contraseña provisional<br>y cambia tu contraseña</th>
									<th><a href="http://85.187.158.12/moodle/dinapage/LoginPasswordChange.php"><img src="cid:imagen_mano" alt=""><br>Clic aquí</a></th>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<table class="table_1">
								<tr class="pie">
									<td><a href="http://dinamicopd.com/"><img class="img" src="cid:imagen_logo" alt=""></a></td>
									<td><a href="https://www.facebook.com/dinamicopd"><img class="img2" src="cid:imagen_fb" alt=""></a></td>
									<td><a href="https://www.youtube.com/channel/UCPSLG3t9l1DO1tEu9NjdK8A"><img class="img2" src="cid:imagen_yt" alt=""></a></td>
									<td><a href="https://www.instagram.com/dinamicopd/"><img class="img2" src="cid:imagen_in" alt=""></a></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<table class="table_1">
								<tr class="pie2">
									<td colspan="4">
										<p>
											Cra 2E # 73 - 25<br>
											3123000100 | 3123010101<br>
											dinamicopdadm@gmail.com
										</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</tbody>
			</table>';		
				$mail->send();
			} catch (Exception $e) {
			    error_log("El mensaje no se pudo enviar al estudiante. Error de Mailer:" . $mail->ErrorInfo);
			}
	}

	public function sendEmailChangePassword($emailRecipient, $tempPassword,$userName){
		$mail = new PHPMailer(true);
		
		try {
			    //Server settings
			    $mail->SMTPDebug = 0;                      // Enable verbose debug output
			    $mail->isSMTP();                                            // Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			    $mail->Username   = MAIL_USER;                     // SMTP username
			    $mail->Password   = MAIL_PASSWORD;                               // SMTP password
			    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			    $mail->Port       = 587;
				
				// TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

				$ruta_img = 'img/logo 2.png';
        		$ruta_img2 = 'img/dinamicoEscritorio.png';

        		$ruta_fb = 'img/facebook.png';
        		$ruta_yt = 'img/youtube.png';
        		$ruta_in = 'img/instagram.png';

				$ruta_mano = 'img/manos-60-x-20.png';

				$css = "
				
				.table_1{
					width: 400px;
					font-family: Georgia, serif;
					text-align: center;
					margin: auto;
					border-collapse: collapse;
					border: none;
				}
			
				.table_2{
					width: 400px;
					font-family: Georgia, serif;
					text-align: center;
					margin: auto;
				}
			
				.table_2 th {
					background-color: #F2F2F2;
				}
			
				.table_2 td {
					border-bottom: 1px solid #F2F2F2;
				}
			
				.cabeza{
					background-color: #1F1F1F;
					color: #ffffff;
					padding: 10px;
				}
			
				.img {
					width: 200px;
					padding: 6px;
				}
			
				.img2 {
					width: 35px;
				}
			
				.txtTitulo{
					color: #49C025;
					font-weight: bold;
				}
			
				.txt{
					color: #CE9178;
					font-weight: bold;
				}
			
				.pie{
				   background-color: #A2A2A2;
				   color: #ffffff;
				}
			
				.pie2{
					font-size: 10px;
					background-color: #1F1F1F;
					color: #8C8C8C;
				}
			
				.bordeCentro{
					border-left: 1px solid #F2F2F2;
					border-right: 1px solid #F2F2F2;
				}
				
				";

				$mail->addEmbeddedImage($ruta_img, 'imagen_logo');
				$mail->addEmbeddedImage($ruta_img2, 'imagen_mico');

				$mail->addEmbeddedImage($ruta_fb, 'imagen_fb');
				$mail->addEmbeddedImage($ruta_yt, 'imagen_yt');
				$mail->addEmbeddedImage($ruta_in, 'imagen_in');

				$mail->addEmbeddedImage($ruta_mano, 'imagen_mano');

			    //Recipients
			    $mail->setFrom('dinamico.moodle@gmail.com', 'dinamicoMoodle');
			    
			    $mail->addAddress('dinamico.moodle@gmail.com', 'servicioCliente');     // Add a recipient
			    $mail->addAddress($emailRecipient);        // Name is optional
			    
			  
			    // Content */
			    
			    $mail->isHTML(true);// Set email format to HTML
			    $mail->Subject = 'Restablecer Password';
				$mail->Body =
				'<html>
					<head>
						<style>'.$css.'</style>
					</head>';
				$mail->Body .=
				'<table class="table_1">
				<thead>
					<tr>
						<th class="cabeza" colspan="4">RESTABLECER CONTRASEÑA</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td rowspan="4"><img class="img" src="cid:imagen_mico" alt=""></td>
						<td class="txtTitulo" colspan="3">Nombre de<br>usuario:</td>
					</tr>
					<tr>
						<td class="txt" colspan="3">'.$userName.'</td>
					</tr>
					<tr>
						<td class="txtTitulo" colspan="3">Su contraseña<br>provisional:</td>
					</tr>
					<tr>
						<td class="txt" colspan="3">'.$tempPassword.'</td>
					</tr> 
					<tr>
						<td colspan="4">
							<table class="table_1">
								<tr class="bordeCentro">
									<th>Ingresa tu contraseña provisional<br>y cambia tu contraseña</th>
									<th><a href="http://85.187.158.12/moodle/dinapage/LoginPasswordChange.php"><img src="cid:imagen_mano" alt=""><br>Clic aquí</a></th>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<table class="table_1">
								<tr class="pie">
									<td><a href="http://dinamicopd.com/"><img class="img" src="cid:imagen_logo" alt=""></a></td>
									<td><a href="https://www.facebook.com/dinamicopd"><img class="img2" src="cid:imagen_fb" alt=""></a></td>
									<td><a href="https://www.youtube.com/channel/UCPSLG3t9l1DO1tEu9NjdK8A"><img class="img2" src="cid:imagen_yt" alt=""></a></td>
									<td><a href="https://www.instagram.com/dinamicopd/"><img class="img2" src="cid:imagen_in" alt=""></a></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<table class="table_1">
								<tr class="pie2">
									<td colspan="4">
										<p>
											Cra 2E # 73 - 25<br>
											3123000100 | 3123010101<br>
											dinamicopdadm@gmail.com
										</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</tbody>
			</table>';

			    $mail->send();
			} catch (Exception $e) {
			    error_log("El mensaje para reestablecer password no ha sido enviado. Error de Mailer:" . $mail->ErrorInfo);
			}
	}
}
?>
