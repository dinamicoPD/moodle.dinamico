<?php
$codigo = htmlspecialchars($_POST['c'],ENT_QUOTES,'UTF-8');
$email = htmlspecialchars($_POST['e'],ENT_QUOTES,'UTF-8');




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'dinamico.moodle@gmail.com';                     // SMTP username
    $mail->Password   = 'jylbqrelzyveweuz';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('dinamico.moodle@gmail.com', 'dinamicoMoodle'); // quien envia
    
    $mail->addAddress('dinamico.moodle@gmail.com', 'servicioCliente');     // Add a recipient
    $mail->addAddress($email);        // Name is optional

    
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Codigo de verificacion';
    $mail->Body     = "<H1>Codigo de verificacion</H1><br>";
    $mail->Body    .= "<b>Codigo: </b>".$codigo." <br>";
    $mail->Body    .= '<p>Transcriba este codigo en el formulario</p>';
    $mail->send();
} catch (Exception $e) {
    error_log("El mensaje para ver codigo no ha sido enviado. Error de Mailer:" . $mail->ErrorInfo);
}

?>
