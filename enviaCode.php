<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se envió el parámetro 'action' con el valor 'enviarCodigo'
    if (isset($_POST['action']) && $_POST['action'] === 'enviarCodigo') {
        // Llamar a la función interna
        enviarCodigo();
    }
    if (isset($_POST['action2']) && $_POST['action2'] === 'verCorreo') {
        // Llamar a la función interna
        verCorreo();
    }
}

function enviarCodigo(){

require_once('../../config-ext.php');

$codigo = htmlspecialchars($_POST['r'],ENT_QUOTES,'UTF-8');
$email = htmlspecialchars($_POST['e'],ENT_QUOTES,'UTF-8');

if ($link->connect_error){
    die("Conexion fallida: " . $link->connect_error);
}

$sql = "SELECT * FROM ConfirmaCodigo WHERE email = '$email'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    $fechaActual = new DateTime();
    $codigoFecha = new DateTime($row['CodigoFecha']);

    if ($fechaActual < $codigoFecha) {
        // El código aún está válido
        $verificacionSQL = "SELECT verificado FROM ConfirmaCodigo WHERE Email = '$email'";
        $verificacionResulta = $link->query($verificacionSQL);

        if ($verificacionResulta->num_rows > 0) {
            $row = $verificacionResulta->fetch_assoc();
            $verificado = $row['verificado'];
        
            if ($verificado == 0) {
                echo "no";
            } elseif ($verificado == 1) {
                $verificacionSQL2 = "SELECT CodigoEmail FROM ConfirmaCodigo WHERE Email = '$email'";
                $verificacionResulta2 = $link->query($verificacionSQL2);
    
                if ($verificacionResulta2->num_rows > 0) {
                    while ($row = $verificacionResulta2->fetch_assoc()) {
                        $codigoEmail = $row["CodigoEmail"];
                        echo $codigoEmail;
                    }
                }
            }
        } else {
            echo "no";
        }
       
    } else {
        // El código ha expirado
        $fecha_envio = date("Y-m-d H:i:s");
        $fecha = new DateTime($fecha_envio);
        $fecha->add(new DateInterval('PT24H'));
        $nueva_fecha = $fecha->format("Y-m-d H:i:s");
        
        $updateSql = "UPDATE ConfirmaCodigo SET CodigoFecha = '$nueva_fecha', CodigoEmail = '$codigo', verificado = 0 WHERE email = '$email'";

        if ($link->query($updateSql) === TRUE) {

            echo "si";
            $link->close();

        require 'phpMailer/Exception.php';
        require 'phpMailer/PHPMailer.php';
        require 'phpMailer/SMTP.php';

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
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
        $cssJD = '
        .tabla{width:450px;margin:auto;border-collapse:collapse;border:none;text-align:center;}table *{margin:0;padding:0;box-sizing:border-box;}.SkyBlue{background-color:#81D4E7;}.SkyBlueClaro{background-color:#CEF2F8;}.PaleGreen{background-color:#BDE298;}.PaleGreenClaro{background-color:#E5F1D6;}.Khaki{background-color:#FAD263;}.KhakiClaro{background-color:#FDDE90;}.Moccasin{background-color:#FFEBBA;}.oscuro{background-color:#424242;}.MediumPurple{background-color:#9AAFFE;}.MediumPurpleClaro{background-color:#D1DBFE;}.Blanco{background-color:#ffffff;}.fontBlanco{color:#ffffff;}.fontNegro{color:#424242;}.fontAzul{color:#368A9B;}.fontRojo{color:#F6746D;}.fontPoppins{font-family:"Poppins",sans-serif;}.fontRoboto{font-family:"Roboto",sans-serif;}.fontRobotoMono{font-family:"Roboto Mono",monospace;}.titulo{font-weight:700;padding:9px 0px;font-size:26px;}.span{background-color:#F6746D;}.tabla img{display:block;margin:auto;}.tablax4 td{width:112.5px;}.tablaX8 td{width:56.25px;}.tablaX6 td{width:75px;}.grupoTitulo{margin-top:17px;}.img80{width:80%;}.img100{width:100%;}.img50{width:50%;}.img30{width:30%;}.pestana{border-radius:12px 12px 0 0;font-size:12px;}.periodico{background-color:#EADED4;font-size:12px;padding:9px 6px 9px 6px;}.margenesDP{padding:9px 0px;}.carpetas{font-size:12px;padding:9px 6px 9px 6px;}.servicios{padding:5px;text-decoration:none;cursor:pointer;display:block;}.pantalla{width:100%;padding:10px 34px;}.play{width:35px;height:35px;border-radius:50%;padding:9.5px 0px 0px 2.5px;}.play img{width:15px;height:15px;}.progreso{width:90%;margin:auto;padding:3px 0;}.btnReproducir{width:60%;margin:auto;padding:3px 0;}.footer1{width:95%;margin:auto;font-size:10px;text-align:left;}.footer1 .social{width:15px;}.footer1 .social img{width:10px;}.footer1 .logo{width:49px;}.footer1 .logo img{width:40px;padding-right:5px;border-right:1px solid #ffffff;}.altoMensaje{height:215px;}.inputLicencia{width:90%;margin:auto;border:2px solid #424242;height:30px;border-radius:20px;margin:5px 0;}.bordeRedondeado{border-radius:3px;}.bordeSuperior{border-top:6px solid #ffffff;}.pasos1{padding:6.5px 3px;margin-right:3px;line-height:16px;}
        ';

        $ruta_img = 'img/correos/Recurso_14.png';

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
        $mail->setFrom('dinamico.moodle@gmail.com', 'dinamicoMoodle'); // quien envia
        $mail->addAddress($email);        // Name is optional

        
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Codigo de verificacion';

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
                        <td colspan="2" class="titulo fontPoppins oscuro fontBlanco">Verificación <span class="span">&nbsp;correo electrónico&nbsp;</span></td>
                    </tr>
                    <tr class="Moccasin">
                        <td>
                            <img class="img80" src="cid:imagen_img" alt="">
                        </td>
                        <td class="fontPoppins fontNegro">
                            <p><strong>Tu código de<br>verificación es:</strong></p>
                            <p class="inputLicencia Blanco">'.$codigo.'</p>
                            <p><strong>Tu código de vence el:</strong></p>
                            <p class="fontPoppins fontRojo">'.$nueva_fecha.'</p>
                        </td>
                    </tr>
                    <tr>
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
        error_log("El mensaje para ver codigo no ha sido enviado. Error de Mailer:" . $mail->ErrorInfo);
    }


        } else {
            echo "no";
        }
    }

} else {

    $fecha_envio = date("Y-m-d H:i:s");
    $fecha = new DateTime($fecha_envio);
    $fecha->add(new DateInterval('PT24H'));
    $nueva_fecha = $fecha->format("Y-m-d H:i:s");

    $sql = "INSERT INTO ConfirmaCodigo (CodigoEmail, CodigoFecha, Email, verificado) VALUES ('$codigo', '$nueva_fecha', '$email', 0)";
    if ($link->query($sql) === TRUE) {
        echo "si";

        $link->close();

    require 'phpMailer/Exception.php';
    require 'phpMailer/PHPMailer.php';
    require 'phpMailer/SMTP.php';

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
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
        $cssJD = '
        .tabla{width:450px;margin:auto;border-collapse:collapse;border:none;text-align:center;}table *{margin:0;padding:0;box-sizing:border-box;}.SkyBlue{background-color:#81D4E7;}.SkyBlueClaro{background-color:#CEF2F8;}.PaleGreen{background-color:#BDE298;}.PaleGreenClaro{background-color:#E5F1D6;}.Khaki{background-color:#FAD263;}.KhakiClaro{background-color:#FDDE90;}.Moccasin{background-color:#FFEBBA;}.oscuro{background-color:#424242;}.MediumPurple{background-color:#9AAFFE;}.MediumPurpleClaro{background-color:#D1DBFE;}.Blanco{background-color:#ffffff;}.fontBlanco{color:#ffffff;}.fontNegro{color:#424242;}.fontAzul{color:#368A9B;}.fontRojo{color:#F6746D;}.fontPoppins{font-family:"Poppins",sans-serif;}.fontRoboto{font-family:"Roboto",sans-serif;}.fontRobotoMono{font-family:"Roboto Mono",monospace;}.titulo{font-weight:700;padding:9px 0px;font-size:26px;}.span{background-color:#F6746D;}.tabla img{display:block;margin:auto;}.tablax4 td{width:112.5px;}.tablaX8 td{width:56.25px;}.tablaX6 td{width:75px;}.grupoTitulo{margin-top:17px;}.img80{width:80%;}.img100{width:100%;}.img50{width:50%;}.img30{width:30%;}.pestana{border-radius:12px 12px 0 0;font-size:12px;}.periodico{background-color:#EADED4;font-size:12px;padding:9px 6px 9px 6px;}.margenesDP{padding:9px 0px;}.carpetas{font-size:12px;padding:9px 6px 9px 6px;}.servicios{padding:5px;text-decoration:none;cursor:pointer;display:block;}.pantalla{width:100%;padding:10px 34px;}.play{width:35px;height:35px;border-radius:50%;padding:9.5px 0px 0px 2.5px;}.play img{width:15px;height:15px;}.progreso{width:90%;margin:auto;padding:3px 0;}.btnReproducir{width:60%;margin:auto;padding:3px 0;}.footer1{width:95%;margin:auto;font-size:10px;text-align:left;}.footer1 .social{width:15px;}.footer1 .social img{width:10px;}.footer1 .logo{width:49px;}.footer1 .logo img{width:40px;padding-right:5px;border-right:1px solid #ffffff;}.altoMensaje{height:215px;}.inputLicencia{width:90%;margin:auto;border:2px solid #424242;height:30px;border-radius:20px;margin:5px 0;}.bordeRedondeado{border-radius:3px;}.bordeSuperior{border-top:6px solid #ffffff;}.pasos1{padding:6.5px 3px;margin-right:3px;line-height:16px;}
        ';

        //Recipients
        $mail->setFrom('dinamico.moodle@gmail.com', 'dinamicoMoodle'); // quien envia
        
        $mail->addAddress($email);        // Name is optional

        $ruta_img = 'img/correos/Recurso_14.png';

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

        
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Codigo de verificacion';

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
                        <td colspan="2" class="titulo fontPoppins oscuro fontBlanco">Verificación <span class="span">&nbsp;correo electrónico&nbsp;</span></td>
                    </tr>
                    <tr class="Moccasin">
                        <td>
                            <img class="img80" src="cid:imagen_img" alt="">
                        </td>
                        <td class="fontPoppins fontNegro">
                            <p><strong>Tu código de<br>verificación es:</strong></p>
                            <p class="inputLicencia Blanco">'.$codigo.'</p>
                            <p><strong>Tu código de vence el:</strong></p>
                            <p class="fontPoppins fontRojo">'.$nueva_fecha.'</p>
                        </td>
                    </tr>
                    <tr>
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
        error_log("El mensaje para ver codigo no ha sido enviado. Error de Mailer:" . $mail->ErrorInfo);
    }
        } else {
            echo "no";
        }
}
}


function verCorreo(){
    require_once('../../config-ext.php');

    $email = htmlspecialchars($_POST['a'],ENT_QUOTES,'UTF-8');
    $codVer = htmlspecialchars($_POST['cod'],ENT_QUOTES,'UTF-8');

    if ($link->connect_error){
        die("Conexion fallida: " . $link->connect_error);
    }

    $sql = "SELECT CodigoEmail FROM ConfirmaCodigo WHERE Email = '$email'";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        // Existe el email en la tabla

        // Obtener el valor del campo "codigo"
        $row = $result->fetch_assoc();
        $codigo = $row["CodigoEmail"];

        if ($codVer === $codigo){
            $updateSql = "UPDATE ConfirmaCodigo SET verificado = 1 WHERE email = '$email'";
            if ($link->query($updateSql) === TRUE){
                echo $codigo;
            }
        }

    } else {
        
        echo "no";
    }

    // Cerrar la conexión
    $link->close();
}

?>