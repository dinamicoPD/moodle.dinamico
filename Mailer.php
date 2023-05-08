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
		//$emailRecipient = "carloscaroavila@gmail.com";
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

			    //Recipients
			    $mail->setFrom('dinamico.moodle@gmail.com', 'dinamicoMoodle');
			    
			    $mail->addAddress('dinamico.moodle@gmail.com', 'servicioCliente');     // Add a recipient
			    $mail->addAddress($emailRecipient);        // Name is optional
			    
			    /* $mail->addCC('gerencia@preservir.com');
			    // Content */
			    
			    $mail->isHTML(true);                                  // Set email format to HTML


			    $foundGroups="";
     			$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

			    $sql = "SELECT CourseName, GroupCode, GroupKey FROM Enrolment WHERE UserId = ".$idTeacher." ";
			    if ($result = $link->query($sql)){
			            while ($row = $result->fetch_assoc()) {
			                $foundGroups .= "<tr>";
			                $foundGroups .='<td style="border: 1px solid black;">'.$row["CourseName"].'</td>';
			                $foundGroups .='<td style="border: 1px solid black;">'.$row["GroupCode"].'</td>' ;
			                $foundGroups .='<td style="border: 1px solid black;">'.$row["GroupKey"].'</td>'; 
			                $foundGroups .="</tr>";
			             }
			    }else{
			             error_log("Mailer - No se pudo obtener listado de Grupos del Profesor". $idTeacher);
			    }



			    $mail->Subject = 'Cursos Vinculados';
			    
			    $mail->Body     = "<H1>Registro</H1><br>";
			    $mail->Body    .= "<b>Nombre de usuario asignado: </b>".$userName." <br>";
			    if(!empty($password)){
			    	$mail->Body    .= "<b>Password: </b>".$password." <br>";
			    }
			    $mail->Body    .= "<b>Cursos Disponibles:</b>";
			    $mail->Body    .= '<table style="border: 1px solid black;" class="table"><thead lass="thead-dark">
                <tr>
                    <th style="border: 1px solid black;">Curso</th>
                    <th style="border: 1px solid black;">Grupo</th>
                    <th style="border: 1px solid black;">Clave</th>
                </tr>
                </thead>
                <tbody>'.
                     $foundGroups
                .'</tbody>
                </table>';
				$mail->Body    .= '<p>Ingresa tu contraseña provisional y cambia tu contraseña</p>';
				$mail->Body    .= '<a href="http://85.187.158.12/dinapage/LoginPasswordChange.php">Aqui</a>';              
			    
			    $mail->send();
			} catch (Exception $e) {
			    error_log("El mensaje no se pudo enviar. Error de Mailer:" . $mail->ErrorInfo);
			}
	}
	public function sendEmailToStudent($emailRecipient,$userName, $courseName, $groupName,$teacherName,$password = ""){
		$mail = new PHPMailer(true);
		//$emailRecipient = "carloscaroavila@gmail.com";
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

			    //Recipients
			    $mail->setFrom('dinamico.moodle@gmail.com', 'dinamicoMoodle');
			    
			    $mail->addAddress('dinamico.moodle@gmail.com', 'servicioCliente');     // Add a recipient
			    $mail->addAddress($emailRecipient);        // Name is optional
			    
			    /* $mail->addCC('gerencia@preservir.com');
			    // Content */
			    
			    $mail->isHTML(true);                                  // Set email format to HTML


			    $mail->Subject = 'Registro';
			    
			    $mail->Body     = "<H1>Registro</H1><br>";
			    $mail->Body    .= "<b>Nombre de usuario asignado: </b>".$userName." <br>";
			    if(!empty($password)){
					$mail->Body   .= "<b>Password: </b>".$password." <br>";
			    }

			    $mail->Body   .= "<b>Profesor: </b>".$teacherName." <br>";
			    $mail->Body    .= "<b>Curso/Grupo:</b>";
			    $mail->Body    .= "<b>".$courseName.'/'.$groupName."</b>";
				$mail->Body    .= '<p>Ingresa tu contraseña provisional y cambia tu contraseña</p>';
				$mail->Body    .= '<a href="http://85.187.158.12/moodle/dinapage/LoginPasswordChange.php">Aqui</a>';            
			    $mail->send();
			} catch (Exception $e) {
			    error_log("El mensaje no se pudo enviar al estudiante. Error de Mailer:" . $mail->ErrorInfo);
			}
	}
	public function sendEmailChangePassword($emailRecipient, $tempPassword,$userName){
		$mail = new PHPMailer(true);
		//$emailRecipient = "carloscaroavila@gmail.com";
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

			    //Recipients
			    $mail->setFrom('dinamico.moodle@gmail.com', 'dinamicoMoodle');
			    
			    $mail->addAddress('dinamico.moodle@gmail.com', 'servicioCliente');     // Add a recipient
			    $mail->addAddress($emailRecipient);        // Name is optional
			    
			    /* $mail->addCC('gerencia@preservir.com');
			    // Content */
			    
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = 'Restablecer Password';
			    $mail->Body     = "<H1>Restablecer Password</H1><br>";
			    $mail->Body    .= "<b>Nombre de usuario asignado: </b>".$userName." <br>";
			    $mail->Body    .= "<b>Su password temporal es: </b>".$tempPassword." <br>";
				$mail->Body    .= '<p>Ingresa tu contraseña provisional y cambia tu contraseña</p>';
				$mail->Body    .= '<a href="http://85.187.158.12/moodle/dinapage/LoginPasswordChange.php">Aqui</a>'; 
			    $mail->send();
			} catch (Exception $e) {
			    error_log("El mensaje para reestablecer password no ha sido enviado. Error de Mailer:" . $mail->ErrorInfo);
			}
	}
}
?>
