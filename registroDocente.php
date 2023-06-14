<?php
require_once(dirname(__FILE__).'/registroDocenteController.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inscripcion | Dinámico Pedagogia y Diseño</title>
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
    <script src="//code.jivosite.com/widget/K8kniJJst9" async></script>
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="inscripciondocenteForm">
                <div class="bg-danger text-white"><?php echo $form_err;?></div>
                <h2>Incripción Docente</h2><br>
                <fieldset>
                   <br>
                    <legend>Información personal</legend>
                    <p><input type="text" required placeholder="Primer Nombre*" name="FirstName" value="<?php echo $FirstName; ?>" class="inputD">
                    <input type="text" placeholder="Segundo Nombre" name="MiddleName" value="<?php echo $MiddleName; ?>" class="inputI"></p>
                    <p><input type="text" required placeholder="Primer Apellido*" name="LastName" value="<?php echo $LastName; ?>" class="inputD">
                    <input type="text" required placeholder="Segundo Apellido*" name="SecondLastName" value="<?php echo $SecondLastName; ?>" class="inputI"></p>
                    <p><input type="tel" placeholder="Número de Teléfono" name="Phone" value="<?php echo $Phone; ?>" class="inputC"></p>
                    <input type="text" placeholder="Ciudad*" value="<?php echo $City; ?>" name="City" required class="inputC"></p>
                    <p><input type="email" required placeholder="Correo electrónico*" value="<?php echo $Email; ?>" name="Email" class="inputC"></p>
                    <br>
                </fieldset>
                <br>
                <fieldset>
                   <br>
                    <legend>Cursos que dicta</legend>
                    <p style="color: red; font-size: 0.8em;">Seleccione el curso al que dicta acompañado de la sigla del mismo si exite <strong>ejemplo:</strong> Primero A<br>Si dicta en mas cursos agregelos con el singo +</p>
                    <div class="field_wrapper">
                     <!--  <div><select name="field_name[]" id="curso" required class="inputD">
                            <option disabled selected>Curso*</option>
                            <option value="1">Primero</option>
                            <option value="2">Segundo</option>
                            <option value="3">Tercero</option>
                            <option value="4">Cuarto</option>
                            <option value="5">Quinto</option>
                            <option value="6">Sexto</option>
                            <option value="7">Septimo</option>
                            <option value="8">Octavo</option>
                            <option value="9">Noveno</option>
                            <option value="10">Decimo</option>
                            <option value="11">Once</option>
                        </select>
                        <input type="text" placeholder="sigla" name="field_name2[]" minlength="1" pattern="[A-Z] {0,1}" title="se acepta un caracter en mayuscula" class="inputI">
                        <a href="javascript:void(0);" class="add_button" title="Add field"><img src="img/add-icon.png" /></a>
                        </div> --> 
                        <?php
                        echo $loadedGroups;
                        ?>
                    </div>
                    <br>                
                </fieldset>
                <br>
                <input type="submit"  id="btn-sumbit-register" class="col-xs-12 btn btn-primary btn-load btn-lg" value="Enviar" <?php echo ($lockbutton?"disabled":"") ?>>
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
