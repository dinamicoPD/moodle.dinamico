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

        $mail->addEmbeddedImage($ruta_img, 'imagen_logo');
        $mail->addEmbeddedImage($ruta_img2, 'imagen_mico');

        $mail->addEmbeddedImage($ruta_fb, 'imagen_fb');
        $mail->addEmbeddedImage($ruta_yt, 'imagen_yt');
        $mail->addEmbeddedImage($ruta_in, 'imagen_in');
        //Recipients
        $mail->setFrom('dinamico.moodle@gmail.com', 'dinamicoMoodle'); // quien envia
        
        $mail->addAddress('dinamico.moodle@gmail.com', 'servicioCliente');     // Add a recipient
        $mail->addAddress($email);        // Name is optional

        
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Codigo de verificacion';
        //$mail->Body     = "<H1>Codigo de verificacion</H1><br>";
        //$mail->Body    .= "<b>Codigo: </b>".$codigo." <br>";
        //$mail->Body    .= '<p>Transcriba este codigo en el formulario</p>';

        $css = "
        table{
            width: 400px;
            font-family: Georgia, serif;
            text-align: center;
            margin: auto;
            border-collapse: collapse;
            border: none;
        }
    
        thead th{
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
        ";

        $mail->Body = '
        <html>
            <head>
                <style>'.$css.'</style>
            </head>
            <body>
                <table>
                    <thead>
                        <tr>
                            <th colspan="4">VERIFICA TU CORREO ELECTRÓNICO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="3"><img class="img" src="cid:imagen_mico" alt=""></td>
                            <td  colspan="3" class="txtTitulo">Su código de<br>verificación es</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="txt">'.$codigo.'</td>
                        </tr>
                        <tr>
                            <td colspan="3">Su código vence el<br>'.$nueva_fecha.'</td>
                        </tr>
                        <tr class="pie">
                            <td><a href="http://dinamicopd.com/"><img class="img" src="cid:imagen_logo" alt=""></a></td>
                            <td><a href="https://www.facebook.com/dinamicopd"><img class="img2" src="cid:imagen_fb" alt=""></a></td>
                            <td><a href="https://www.youtube.com/channel/UCPSLG3t9l1DO1tEu9NjdK8A"><img class="img2" src="cid:imagen_yt" alt=""></a></td>
                            <td><a href="https://www.instagram.com/dinamicopd/"><img class="img2" src="cid:imagen_in" alt=""></a></td>
                        </tr>
                        <tr class="pie2">
                            <td colspan="4">
                                <p>
                                    Cra 2E # 73 - 25<br>
                                    3123000100 | 3123010101<br>
                                    dinamicopdadm@gmail.com
                                </p>
                            </td>
                        </tr>
                    </tbody>
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

        $mail->addEmbeddedImage($ruta_img, 'imagen_logo');
        $mail->addEmbeddedImage($ruta_img2, 'imagen_mico');

        $mail->addEmbeddedImage($ruta_fb, 'imagen_fb');
        $mail->addEmbeddedImage($ruta_yt, 'imagen_yt');
        $mail->addEmbeddedImage($ruta_in, 'imagen_in');
        //Recipients
        $mail->setFrom('dinamico.moodle@gmail.com', 'dinamicoMoodle'); // quien envia
        
        $mail->addAddress('dinamico.moodle@gmail.com', 'servicioCliente');     // Add a recipient
        $mail->addAddress($email);        // Name is optional

        
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Codigo de verificacion';
        //$mail->Body     = "<H1>Codigo de verificacion</H1><br>";
        //$mail->Body    .= "<b>Codigo: </b>".$codigo." <br>";
        //$mail->Body    .= '<p>Transcriba este codigo en el formulario</p>';

        $css = "
        table{
            width: 400px;
            font-family: Georgia, serif;
            text-align: center;
            margin: auto;
            border-collapse: collapse;
            border: none;
        }
    
        thead th{
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
        ";

        $mail->Body = '
        <html>
            <head>
                <style>'.$css.'</style>
            </head>
            <body>
                <table>
                    <thead>
                        <tr>
                            <th colspan="4">VERIFICA TU CORREO ELECTRÓNICO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="3"><img class="img" src="cid:imagen_mico" alt=""></td>
                            <td  colspan="3" class="txtTitulo">Su código de<br>verificación es</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="txt">'.$codigo.'</td>
                        </tr>
                        <tr>
                            <td colspan="3">Su código vence el<br>'.$nueva_fecha.'</td>
                        </tr>
                        <tr class="pie">
                            <td><a href="http://dinamicopd.com/"><img class="img" src="cid:imagen_logo" alt=""></a></td>
                            <td><a href="https://www.facebook.com/dinamicopd"><img class="img2" src="cid:imagen_fb" alt=""></a></td>
                            <td><a href="https://www.youtube.com/channel/UCPSLG3t9l1DO1tEu9NjdK8A"><img class="img2" src="cid:imagen_yt" alt=""></a></td>
                            <td><a href="https://www.instagram.com/dinamicopd/"><img class="img2" src="cid:imagen_in" alt=""></a></td>
                        </tr>
                        <tr class="pie2">
                            <td colspan="4">
                                <p>
                                    Cra 2E # 73 - 25<br>
                                    3123000100 | 3123010101<br>
                                    dinamicopdadm@gmail.com
                                </p>
                            </td>
                        </tr>
                    </tbody>
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
