<?php
require_once(dirname(__FILE__).'/GroupSummaryController.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen | Dinámico Pedagogia y Diseño</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.js"
      integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM="
      crossorigin="anonymous"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/functions.js"></script>
    <link rel="stylesheet" href="css/styleDocente.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway&display=swap" rel="stylesheet">
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
    <header>
        <img src="img/logo%202.png" alt="Logo Dínamico Pedagogia y Diseño">
    </header>
    <div class="container">
    <div class="row">
        <div class="col-xs-12">
        <main>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="ResumenForm">
                <div class="bg-danger text-white"><?php echo $form_err;?></div>
                <h2>Actualización de Grupos</h2><br>
                <fieldset>
                 <legend>Nombre de Usuario</legend>
                     <dl class="row">
                        <div class="col-xs-12">
                        <dt class="col-xs-3 text-left"></dt>
                        <dt class="col-xs-3 text-left">Nombre de Usuario:</dt>
                        <dd class="col-xs-3 text-left"><?php echo $Username; ?></dd>
                        <dt class="col-xs-3 text-left"></dt>
                        </div>
                     </dl>
                     <br>
                </fieldset>
                <fieldset>

                   <br>
                    <legend>Información personal</legend>
                   <dl class="row">
                        <div class="col-xs-12">
                        <dt class="col-xs-3 text-left"></dt>
                        <dt class="col-xs-3 text-left">Nombre Completo:</dt>
                        <dd class="col-xs-3 text-left"><?php echo $FullName; ?></dd>
                        <dt class="col-xs-3 text-left"></dt>
                        </div>
                        <div class="col-xs-12">
                        <dt class="col-sm-3 text-left"></dt>
                        <dt class="col-sm-3 text-left">Teléfono:</dt>
                        <dd class="col-sm-3 text-left"><?php echo $Phone; ?></dd>
                        <dt class="col-sm-3 text-left"></dt>
                        </div>
                        <div class="col-xs-12">
                        <dt class="col-xs-3 text-left"></dt>
                        <dt class="col-xs-3 text-left">Ciudad:</dt>
                        <dd class="col-xs-3 text-left"><?php echo $City; ?></dd>
                        <dt class="col-xs-3 text-left"></dt>
                        </div>
                        <div class="col-xs-12">
                        <dt class="col-sm-3 text-left"></dt>
                        <dt class="col-sm-3 text-left">Email:</dt>
                        <dd class="col-sm-3 text-left"><?php echo $Email; ?></dd>
                        <dt class="col-sm-3 text-left"></dt>
                        </div>
                    </dl>
                    <br>
                </fieldset>
                <br>
                <fieldset>
                    <legend>Grupos asignados</legend>

                <table style="width:100%" class="table">
                <thead class="thead-dark">
                <tr>
                    <th class="text-center">Curso</th>
                    <th class="text-center">Grupo</th>
                    <th class="text-center">Clave</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    echo $foundGroups;
                    ?>
                </tbody>
                </table>    
                </fieldset>
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
                <input name="submitbutton"  class="col-xs-12 btn btn-primary btn-load btn-lg" type="submit" value="Actualizar"><br>
                <input name ="closebutton" style="margin-top: 10px;" class="col-xs-12 btn btn-danger btn-load btn-lg" type="submit" value="Cerrar">
            </form>
        </main>
        </div>
    </div>
    </div>
    <footer>
        <img src="img/logo%201.png" alt="logo Dínamico Pedagogia y Diseño">
        <div class="sociales">
               <a class="icon-facebook-rect" href="https://www.facebook.com/dinamicopd"></a>
               <a class="icon-youtube" href="https://www.youtube.com/channel/UCPSLG3t9l1DO1tEu9NjdK8A"></a>
              <a class="icon-instagram-filled" href="https://www.instagram.com/dinamicopd/"></a>
        </div>
        <div class="contacto">
            <ul>
                <li>Direccion: Carrera 10 # 12 -76</li>
                <li>Celular: 3132318181 / 3103023779</li>
                <li>Correo: direccion@dinamicopd.com</li>
            </ul>
        </div>
    </footer>
</body>
<div class="modal"><!-- Place at bottom of page --></div>
</html>