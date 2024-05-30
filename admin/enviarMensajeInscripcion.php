<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('/var/www/html/moodle/config-ext.php');
    $constCursos = $_POST['constCursos'];
    $constCursos = filter_var($constCursos, FILTER_SANITIZE_STRING);
    $constCursosArray = explode(",",$constCursos);
    $mensajeConfirmar = "";
    $emailASesor = "";

    $mensajeConfirmar .= "<br><br><p class=\"inputLicencia PaleGreenClaro\"><strong>Nombre del docente:</strong> ".$constCursosArray[1]."</p><br>";
    $mensajeConfirmar .= "<p class=\"inputLicencia PaleGreenClaro\"><strong>Teléfono:</strong> ".$constCursosArray[2]."</p><br>";
    if(empty($constCursosArray[4])){
        $mensajeConfirmar .= "<p class=\"inputLicencia PaleGreenClaro\"><strong>¿Cual es el nombre de tu asesor?</strong></p><br>";
    }else{
        $asesorArray = datosAsesor($link, $constCursosArray[4]);
        
        if($asesorArray){
            $mensajeConfirmar .= "<p class=\"inputLicencia PaleGreenClaro\"><strong>Asesor:</strong> ".$asesorArray[0]."</p><br>";
            $emailASesor = $asesorArray[1];
        }else{
            $mensajeConfirmar .= "<p class=\"inputLicencia PaleGreenClaro\"><strong>¿Cual es el nombre de tu asesor?</strong></p><br>";
        }
    }
    $mensajeConfirmar .= "<br><table class=\"tabla tablaX8 fontPoppins\" cellpadding=\"0\" cellspacing=\"0\"><tr><th colspan=\"4\" class=\"grupoTitulo pestana Khaki fontNegro fontPoppins\">Grupos a inscribir</th></tr><tr class=\"KhakiClaro\"><th>Colegio</th><th>Edición</th><th>Libro</th><th>Curso</th></tr>";
    $valorParaFor = ($constCursosArray[0] * 4) + 5;
    for($i=5; $i<$valorParaFor; $i+=4){
        $mensajeConfirmar .= "<tr class=\"Moccasin\" style=\"border: 1px solid #424242;\">";
            $mensajeConfirmar .= "<td>".$constCursosArray[$i]."</td>";
            $mensajeConfirmar .= "<td>".$constCursosArray[$i+1]."</td>";
            $mensajeConfirmar .= "<td>".$constCursosArray[$i+2]."</td>";
            $mensajeConfirmar .= "<td>".$constCursosArray[$i+3]."</td>";
        $mensajeConfirmar .= "</tr>";
    }
    $mensajeConfirmar .= "</table>";
    enviaMensaje($mensajeConfirmar, $emailASesor, $constCursosArray[3]);
}

function datosAsesor($link, $asesor){
    $sql = "SELECT FirstName, LastName, Email FROM User WHERE UserId = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $asesor);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_array($result)){
        $asesor = $row['FirstName'] . " " . $row['LastName'];
        $asesorEmail = $row['Email'];
        return array($asesor, $asesorEmail);
    }else{
        return false;
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enviaMensaje($mensajeConfirmar, $emailASesor, $emailUser){
    require_once('/var/www/html/moodle/config-ext.php');

    require '/var/www/html/moodle/moodle/dinapage/phpMailer/Exception.php';
    require '/var/www/html/moodle/moodle/dinapage/phpMailer/PHPMailer.php';
    require '/var/www/html/moodle/moodle/dinapage/phpMailer/SMTP.php';

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
            .tabla {
                width: 450px;
                margin: auto;
                border-collapse: collapse;
                border: none;
                text-align: center;
            }
            
            table * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            .SkyBlue {
                background-color: #81D4E7;
            }
            
            .SkyBlueClaro {
                background-color: #CEF2F8;
            }
            
            .PaleGreen {
                background-color: #BDE298;
            }
            
            .PaleGreenClaro {
                background-color: #E5F1D6;
            }
            
            .Khaki {
                background-color: #FAD263;
            }
            
            .KhakiClaro {
                background-color: #FDDE90;
            }
            
            .Moccasin {
                background-color: #FFEBBA;
            }
            
            .oscuro {
                background-color: #424242;
            }
            
            .MediumPurple {
                background-color: #9AAFFE;
            }
            
            .MediumPurpleClaro {
                background-color: #D1DBFE;
            }
            
            .Blanco {
                background-color: #ffffff;
            }
            
            .fontBlanco {
                color: #ffffff;
            }
            
            .fontNegro {
                color: #424242;
            }
            
            .fontAzul {
                color: #368A9B;
            }
            
            .fontRojo {
                color: #F6746D;
            }
            
            .fontPoppins {
                font-family: "Poppins", sans-serif;
            }
            
            .fontRoboto {
                font-family: "Roboto", sans-serif;
            }
            
            .fontRobotoMono {
                font-family: "Roboto Mono", monospace;
            }
            
            .titulo {
                font-weight: 700;
                padding: 9px 0px;
                font-size: 26px;
            }
            
            .span {
                background-color: #F6746D;
            }
            
            .tabla img {
                display: block;
                margin: auto;
            }
            
            .tablax4 td {
                width: 112.5px;
            }
            
            .tablaX8 td {
                width: 56.25px;
            }
            
            .tablaX6 td {
                width: 75px;
            }
            
            .grupoTitulo {
                margin-top: 17px;
            }
            
            .img80 {
                width: 80%;
            }
            
            .img100 {
                width: 100%;
            }
            
            .img50 {
                width: 50%;
            }
            
            .img30 {
                width: 30%;
            }
            
            .pestana {
                border-radius: 12px 12px 0 0;
                font-size: 12px;
            }
            
            .periodico {
                background-color: #EADED4;
                font-size: 12px;
                padding: 9px 6px 9px 6px;
            }
            
            .margenesDP {
                padding: 9px 0px;
            }
            
            .carpetas {
                font-size: 12px;
                padding: 9px 6px 9px 6px;
            }
            
            .servicios {
                padding: 5px;
                text-decoration: none;
                cursor: pointer;
                display: block;
            }
            
            .pantalla {
                width: 100%;
                padding: 10px 34px;
            }
            
            .play {
                width: 35px;
                height: 35px;
                border-radius: 50%;
                padding: 9.5px 0px 0px 2.5px;
            }
            
            .play img {
                width: 15px;
                height: 15px;
            }
            
            .progreso {
                width: 90%;
                margin: auto;
                padding: 3px 0;
            }
            
            .btnReproducir {
                width: 60%;
                margin: auto;
                padding: 3px 0;
            }
            
            .footer1 {
                width: 95%;
                margin: auto;
                font-size: 10px;
                text-align: left;
            }
            
            .footer1 .social {
                width: 15px;
            }
            
            .footer1 .social img {
                width: 10px;
            }
            
            .footer1 .logo {
                width: 49px;
            }
            
            .footer1 .logo img {
                width: 40px;
                padding-right: 5px;
                border-right: 1px solid #ffffff;
            }
            
            .altoMensaje {
                height: 215px;
            }
            
            .inputLicencia {
                width: 90%;
                display: block;
                margin: auto;
                border: 2px solid #424242;
                height: 30px;
                border-radius: 20px;
            }
            
            .bordeRedondeado {
                border-radius: 3px;
            }
            
            .bordeSuperior {
                border-top: 6px solid #ffffff;
            }
            
            .pasos1 {
                padding: 6.5px 3px;
                margin-right: 3px;
                line-height: 16px;
            }
        ';

        $ruta_img = '/var/www/html/moodle/moodle/dinapage/img/correos/Recurso_9.png';
		$ruta_yt = '/var/www/html/moodle/moodle/dinapage/img/correos/youtube.png';
		$ruta_msm = '/var/www/html/moodle/moodle/dinapage/img/correos/email.png';
        $ruta_wpp = '/var/www/html/moodle/moodle/dinapage/img/correos/wpp.png';       		
        $ruta_in = '/var/www/html/moodle/moodle/dinapage/img/correos/instagram.png';
		$ruta_logo = '/var/www/html/moodle/moodle/dinapage/img/correos/el_logo.png';

        $mail->setFrom('dinamico.moodle@gmail.com', 'dinamicoMoodle');
		$mail->addAddress($emailUser);

        if($emailASesor != ""){
            $mail->addAddress($emailASesor);
        }

        $mail->isHTML(true);

        $mail->addEmbeddedImage($ruta_img, 'imagen_img');
        $mail->addEmbeddedImage($ruta_yt, 'imagen_yt');
		$mail->addEmbeddedImage($ruta_msm, 'imagen_msm');
		$mail->addEmbeddedImage($ruta_wpp, 'imagen_wpp');
		$mail->addEmbeddedImage($ruta_in, 'imagen_in');
        $mail->addEmbeddedImage($ruta_logo, 'imagen_logo');

        $mail->Subject = 'Registro Docente inconsistente';
        $mail->Body = '
            <html>
                <head>
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&family=Roboto+Mono:wght@300;700&family=Roboto:wght@300;700&display=swap" rel="stylesheet">
                    <style>'.$cssJD.'</style>
                </head>
                <body>
                    <table class="tabla PaleGreen" cellpadding="0" cellspacing="0">
                        <tr>
                            <td colspan="2" class="titulo fontPoppins oscuro fontBlanco">
                                Registro <span class="span">&nbsp;Inconsistente&nbsp;</span>
                            </td>
                        </tr>
                        <tr class="Moccasin">
                            <td class="img50">
                                <img class="img80" src="cid:imagen_img" alt="">
                            </td>
                            <td style="padding: 3px" class="fontPoppins fontNegro">
                                <p>Por favor, <span class="fontBlanco span">revise los datos</span> incluidos en este correo y <span class="fontBlanco span">proporciónenos su respuesta a través de este medio</span>. Su confirmación es necesaria para proceder con la inscripción en la plataforma.</p>
                            </td>
                        </tr>
                        <tr class="bordeSuperior">
							<td colspan="2">
                                '.$mensajeConfirmar.'
                            </td>
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
?>