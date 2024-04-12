<?php
//require_once(dirname(__FILE__).'/SigninStudentController.php');
require_once('inscripcionColegio.php');
require_once(dirname(__FILE__).'/inscripcionEstudiante.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro estudiante | Dinámico Pedagogía y Diseño</title>
    <link rel="icon" href="img/cara.png" type="image/x-icon">
    <link rel="stylesheet" href="css/8_0_1_normalize.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap_5_3_0_min.css">
    <link rel="stylesheet" href="css/getbootstrap.com_docs_5.3_assets_css_docs.css">
    <link rel="stylesheet" href="css/styleForm.css" type="text/css">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <!-- https://sweetalert.js.org/guides/ -->
	<script src="js/sweetAlert/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/sweetAlert/sweetalert2.min.css">

</head>
<body class="fondoCielo" id="contenedor">
<form  id="inscripciondocenteForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="bg-danger text-white"><?php echo $form_err;?></div>    
    <section id="piso_1">
        <div class="titleForm">
            <img src="img/fomrLarge/tituloSTD.png" alt="">
        </div>
        <div class="flechita hover">
            <img onclick="down1(2);" src="img/fomrLarge/flecha.png" alt="">
        </div>
    </section>
    <section id="piso_2">
        <img id="zzz" src="img/fomrLarge/zzz.png" alt="">
        <div class="formStyle">
            <div class="tituloForm">
                <h3>RESUMEN DEL REGISTRO</h3>
                <input type="hidden" name="licenceId" id="licenceId" value="<?php echo $IdLicenceToChange ?>">
                <input type="hidden" name="idColegio" id="idColegio" value="<?php echo $numero ?>">
                <input type="hidden" name="IdGroupFound" id="IdGroupFound" value="<?php echo $IdGroupFound ?>">
            </div>
            <!---->
            <label for="nombreDocente" class="form-label">Nombre del docente</label>
            <p class="inputResumen p-2 rounded"><?php echo $TeacherCompleteName ?></p>
            <!---->
            <div class="columnasX2">
                <div class="izquierda">
                    <label for="nombreCurso" class="form-label">Nombre del curso</label>
                    <p class="inputResumen p-2 rounded"><?php echo $CourseName ?></p>
                </div>
                <div class="derecha">
                    <label for="nombreGrupo" class="form-label">Nombre del grupo</label>
                    <p class="inputResumen p-2 rounded"><?php echo $GroupName ?></p>
                </div>
            </div>
            <!---->
            <label for="nombreInstitucion" class="form-label">Institución</label>
            <p class="inputResumen p-2 rounded"><?php echo $nombreColegio ?></p>
            <!---->
            <label for="nombreCiudad" class="form-label">Ciudad</label>
            <p class="inputResumen p-2 rounded"><?php echo $nombreMunicipio ?></p>
            <!---->
        </div>
        <div class="flechita hover">
            <img onclick="down1(3);" src="img/fomrLarge/flecha.png" alt="">
        </div>
    </section>
    <img id="paloma" src="img/fomrLarge/paloma.png" alt="">
    <section id="piso_3">
        <div class="formStyle">
            <!---->
            <label for="validationEmail" class="form-label">E-mail*</label>
            <div class="input-group has-validation">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30.64 30.67"><defs><style>.blanco{fill:#fff;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_6" data-name="Capa 6"><path class="blanco" d="M20.31,20.88a7.42,7.42,0,1,1-.57-11.44c0-.11,0-.2.06-.29A1.49,1.49,0,0,1,21.4,8a1.47,1.47,0,0,1,1.32,1.46c0,1.79,0,3.58,0,5.37,0,1.29,0,2.57,0,3.85a2.2,2.2,0,0,0,1.47,2A2.17,2.17,0,0,0,26.63,20a2.44,2.44,0,0,0,.41-.78c1.46-5,.41-9.39-3.39-12.93A11.6,11.6,0,0,0,11.48,3.7a11.73,11.73,0,0,0-8.24,9.35A12.33,12.33,0,0,0,21.58,26a1.49,1.49,0,0,1,2.14.47,1.47,1.47,0,0,1-.58,2,14.51,14.51,0,0,1-4.44,1.78A15.34,15.34,0,1,1,30.36,12.5a14.83,14.83,0,0,1-.56,7.81,4.83,4.83,0,0,1-4.42,3.43,5,5,0,0,1-4.93-2.59ZM10.88,15.4A4.45,4.45,0,1,0,15.36,11,4.45,4.45,0,0,0,10.88,15.4Z"/></g></g></svg>
                </span>
                <input type="email" autocomplete="new-email" name="Email" class="form-control" id="validationEmail" aria-describedby="validationEmailFeedback" placeholder=" Introduce tu correo electrónico" required value="<?php echo isset($Email) ? htmlspecialchars($Email, ENT_QUOTES) : ''; ?>">
                <div id="validationEmailFeedback" class="invalid-feedback">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16"><path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/><path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/></svg>
                    Ingresa una dirección de correo electrónico válida.
                </div>
            </div>
            <!---->
            <label for="validationEmail_2" class="form-label">Confirmar E-mail*</label>
            <div class="input-group has-validation">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30.64 30.67"><defs><style>.blanco{fill:#fff;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_6" data-name="Capa 6"><path class="blanco" d="M20.31,20.88a7.42,7.42,0,1,1-.57-11.44c0-.11,0-.2.06-.29A1.49,1.49,0,0,1,21.4,8a1.47,1.47,0,0,1,1.32,1.46c0,1.79,0,3.58,0,5.37,0,1.29,0,2.57,0,3.85a2.2,2.2,0,0,0,1.47,2A2.17,2.17,0,0,0,26.63,20a2.44,2.44,0,0,0,.41-.78c1.46-5,.41-9.39-3.39-12.93A11.6,11.6,0,0,0,11.48,3.7a11.73,11.73,0,0,0-8.24,9.35A12.33,12.33,0,0,0,21.58,26a1.49,1.49,0,0,1,2.14.47,1.47,1.47,0,0,1-.58,2,14.51,14.51,0,0,1-4.44,1.78A15.34,15.34,0,1,1,30.36,12.5a14.83,14.83,0,0,1-.56,7.81,4.83,4.83,0,0,1-4.42,3.43,5,5,0,0,1-4.93-2.59ZM10.88,15.4A4.45,4.45,0,1,0,15.36,11,4.45,4.45,0,0,0,10.88,15.4Z"/></g></g></svg>
                </span>
                <input type="email" autocomplete="new-email" class="form-control" id="validationEmail_2" aria-describedby="validationEmail2Feedback" placeholder=" Introduce nuevamente tu correo electrónico" required value="<?php echo isset($Email) ? htmlspecialchars($Email, ENT_QUOTES) : ''; ?>">
                <div id="validationEmail2Feedback" class="invalid-feedback">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16"><path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/><path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/></svg>
                    Introduce nuevamente tu correo electrónico
                </div>
            </div>
            <!---->
            <div class="jr"></div>
            <!---->
            <div class="columnasX2">
                <div class="izquierda">
                    <div class="obligatorio">
                        &nbsp;&nbsp;&nbsp;*Campo obligatorio.
                    </div>
                </div>
                <div class="derecha">
                    <button onclick="down(4);" id="btnCodigo" class="btnNext hover" type="button">Enviar código</button>
                </div>
            </div>
            <!---->
        </div>
    </section>
    <section id="piso_4">
        <img id="pergamino" src="img/fomrLarge/pergamino.png" alt="">
        <div class="pergaminoTxt">
            <p id="Txtpergamino">Introduce el código de verificación que se envió a tu correo electrónico. Si no has recibido este mensaje, recuerda darle un vistazo a la bandeja de spam de <br> tu e-mail.</p>
            <div class="jr"></div>
            <div class="columnasX2">
                <div class="izquierda">
                    <label for="validationCodigo" class="form-label">Código de verificación*</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32.19 32.2"><defs><style>.blanco{fill:#fff;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_8" data-name="Capa 8"><path class="blanco" d="M16.35,0a1.28,1.28,0,0,1,.95,1.15,1.16,1.16,0,0,1-1,1.25c-.69.08-1.38.08-2.06.17a13.19,13.19,0,0,0-6.78,3,13.14,13.14,0,0,0-4.54,7.08A13.32,13.32,0,0,0,5.94,25.21a13,13,0,0,0,8,4.38,13.31,13.31,0,0,0,11.13-3.2,13,13,0,0,0,4.24-6.83,27.11,27.11,0,0,0,.45-3c0-.19,0-.38,0-.56a1.2,1.2,0,0,1,1-1.1,1.22,1.22,0,0,1,1.31.81.84.84,0,0,0,.06.14V17c0,.11,0,.22,0,.34-.1.69-.16,1.39-.31,2.07a15.61,15.61,0,0,1-6,9.42,15.58,15.58,0,0,1-13.14,2.95,15.51,15.51,0,0,1-9.37-5.93A15.66,15.66,0,0,1,.08,14.49,15.58,15.58,0,0,1,4,5.49,15.8,15.8,0,0,1,13.32.25C13.93.14,14.54.08,15.15,0Z"/><path class="blanco" d="M15,19c.11-.15.17-.27.25-.36L29.39,4.56a1.36,1.36,0,0,1,1.23-.49A1.2,1.2,0,0,1,31.35,6a2.18,2.18,0,0,1-.25.28L16,21.34a1.26,1.26,0,0,1-2.11-.05Q11,18.13,8.05,15a1.22,1.22,0,0,1,.1-1.89,1.19,1.19,0,0,1,1.48,0l.29.29c1.62,1.77,3.25,3.53,4.88,5.3Z"/></g></g></svg>
                        </span>
                        <input type="number" autocomplete="off" class="form-control" id="validationCodigo" aria-describedby="validationCodigoFeedback" placeholder=" Código" required>
                    </div>
                </div>
                <div class="derecha">
                    <div class="row">
                        <div class="col">
                            <div class="obligatorio" style="float: right;">
                            &nbsp;&nbsp;&nbsp;*Campo obligatorio.
                            </div>
                        </div>
                    </div>
                    <div class="jr"></div>
                    <div class="row">
                        <div class="col">
                            <button onclick="down(5);" class="btnNext hover" type="button">Continuar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div id="respa"></div>
                </div>
            </div>
        <!---->
        </div>
    </section>
    <section id="piso_5">
        <img id="elMicoForm" src="img/fomrLarge/elMicoForm.png" alt="">
        <img id="elMicoFormMano" src="img/fomrLarge/manoMico.png" alt="">
        <div class="formStyle">
            <div class="tituloForm">
                <h3>Datos del estudiante</h3>
            </div>
            <!---->
            <div class="columnasX2">
                <div class="izquierda">
                    <!---->
                    <label for="validationName" class="form-label">Primer nombre*</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36.64 36.64"><defs><style>.blanco{fill:#fff;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path class="blanco" d="M36.64,22.11c-.17,0-.14.2-.18.31a2.85,2.85,0,0,1-2.32,1.91.66.66,0,0,1-.14,0,.87.87,0,0,0-.32,0H17.35a.85.85,0,0,0-.32,0,.94.94,0,0,1-.78-.83.81.81,0,0,1,.66-.95l.19-.08a.88.88,0,0,1,.32,0H33.68a.87.87,0,0,1,.32,0,1.12,1.12,0,0,0,.79-.92.85.85,0,0,0,0-.35v-18a.85.85,0,0,0,0-.35c-.1-.08,0-.22-.09-.32a.85.85,0,0,0-.77-.54,1,1,0,0,0-.42,0H16a1.19,1.19,0,0,1-.42,0A.9.9,0,0,1,14.68,1a1,1,0,0,1,.64-1s.12,0,.14-.07h.07a.74.74,0,0,0,.39,0H33.61A.75.75,0,0,0,34,0h.21a2.77,2.77,0,0,1,2,1.15,2.28,2.28,0,0,1,.44,1.12v.1s0,.1,0,.13V21.83a.1.1,0,0,0,0,.14Z"/><path class="blanco" d="M25.2,15.29a2.3,2.3,0,0,0-1.11-1.44,4.94,4.94,0,0,0-2.19-.36h-2c-.09,0-.48,0-.54,0l-1.65-1.63a5.7,5.7,0,0,0-4.07-1.76,6.42,6.42,0,0,0-1.24,0,.65.65,0,0,0-.45.15c-.52.43-1.05.84-1.56,1.28a1.49,1.49,0,0,1-2.06.18c-.4-.3-.77-.64-1.17-.94s-.61-.66-1.11-.67a5,5,0,0,0-1.09,0c-.25,0-.51,0-.77.07A5,5,0,0,0,.58,12.72,8.18,8.18,0,0,0,0,14.31v.15a.05.05,0,0,1,0,0,.2.2,0,0,1,0,.07.1.1,0,0,1,0,.09v8.52a.09.09,0,0,1,0,.07.09.09,0,0,1,0,.07v.14c.07.19,0,.4.12.59A3.2,3.2,0,0,0,3.44,26,1.93,1.93,0,0,1,4,25.84c.15.12.09.29.09.43v7.4a3,3,0,0,0,3,3h4.37a3,3,0,0,0,3-3c0-4.3,0-12.18,0-16.25,0-.08,0-.16,0-.23s.21.1.28.17c.49.47.95,1,1.44,1.43a2.93,2.93,0,0,0,1.85.74c.75-.06,1.49,0,2.24,0h1.31l.82,0a2.52,2.52,0,0,0,1-.15,2.69,2.69,0,0,0,.77-.4,2.93,2.93,0,0,0,1-1.42A4.14,4.14,0,0,0,25.2,15.29Zm-1.73,1.88a1.29,1.29,0,0,1-1,.48,15.32,15.32,0,0,1-1.66,0c-.59,0-1.17,0-1.76,0a5.62,5.62,0,0,1-.92,0A1.91,1.91,0,0,1,16.94,17a4.43,4.43,0,0,0-2.17-1.63,1.91,1.91,0,0,0-1.94.92,1.77,1.77,0,0,0-.15.31,3.89,3.89,0,0,0-.12,1.18q0,8,0,16a1,1,0,0,1-1,1h-.22a1.08,1.08,0,0,1-1.08-1.08c0-3.18,0-6.37,0-9.55A2.74,2.74,0,0,0,10.05,23a.94.94,0,0,0-.88-.59.93.93,0,0,0-.71.61,2.7,2.7,0,0,0-.12,1c0,3.22,0,6.44,0,9.66a1.1,1.1,0,0,1-1.08,1.08H7.1a1,1,0,0,1-1-1.05q0-8.4,0-16.8a2.81,2.81,0,0,0-.13-1,.93.93,0,0,0-.77-.62,1,1,0,0,0-.84.62A2.85,2.85,0,0,0,4.16,17c0,1.65,0,3.3,0,5A3.57,3.57,0,0,1,4,23.3,1.17,1.17,0,0,1,3,24.07a1.16,1.16,0,0,1-1-.77A3.62,3.62,0,0,1,1.82,22c0-1.56,0-3.12-.05-4.68a8.5,8.5,0,0,1,.47-3.59,2.89,2.89,0,0,1,2.85-1.85c1.41.2,2.32,1.75,3.73,2A4.15,4.15,0,0,0,12,12.59a3.61,3.61,0,0,1,.79-.55,2.13,2.13,0,0,1,1.09-.14c1.51.16,2.7,1.31,3.75,2.4a3.33,3.33,0,0,0,.91.71,2.5,2.5,0,0,0,1.11.25c1,0,2.19-.27,3.18.21A1.26,1.26,0,0,1,23.47,17.17Z"/><path class="blanco" d="M13.75,4.36a3.23,3.23,0,0,0-.16-1.07A4.44,4.44,0,0,0,11.74.75,5.74,5.74,0,0,0,10,.06s0,0-.06,0H9.82a.12.12,0,0,1-.09,0H9a.15.15,0,0,1-.11,0H8.73l-.08,0a4.45,4.45,0,0,0-3,1.74,4,4,0,0,0-.87,2.35,1.78,1.78,0,0,1,0,.65,2,2,0,0,0,.12.81,4.4,4.4,0,0,0,1.4,2.27A4.42,4.42,0,0,0,9.08,9c.14-.07.3,0,.44-.06s.09.07.13.06a5.38,5.38,0,0,0,1.87-.63,4.52,4.52,0,0,0,2.23-3.65A.59.59,0,0,0,13.75,4.36Zm-1.86.37A2.69,2.69,0,0,1,9.45,7.15a.66.66,0,0,0-.44,0A2.64,2.64,0,0,1,6.89,5.62a2.57,2.57,0,0,1,2-3.69,2.61,2.61,0,0,1,3,2,2.47,2.47,0,0,1,0,.39A.59.59,0,0,1,11.89,4.73Z"/></g></g></svg>
                        </span>
                        <input type="text" autocomplete="off" name="FirstName" class="form-control" id="validationName" aria-describedby="validationNameFeedback" placeholder="Primer nombre" value="<?php echo isset($FirstName) ? htmlspecialchars($FirstName, ENT_QUOTES) : ''; ?>" required>
                        <div id="validationNameFeedback" class="invalid-feedback">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16"><path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/><path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/></svg>
                        Por favor ingresa tu primer nombre.
                        </div>
                    </div>
                    <!---->
                    <label for="validationapellido" class="form-label">Primer apellido*</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36.64 36.64"><defs><style>.blanco{fill:#fff;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path class="blanco" d="M36.64,22.11c-.17,0-.14.2-.18.31a2.85,2.85,0,0,1-2.32,1.91.66.66,0,0,1-.14,0,.87.87,0,0,0-.32,0H17.35a.85.85,0,0,0-.32,0,.94.94,0,0,1-.78-.83.81.81,0,0,1,.66-.95l.19-.08a.88.88,0,0,1,.32,0H33.68a.87.87,0,0,1,.32,0,1.12,1.12,0,0,0,.79-.92.85.85,0,0,0,0-.35v-18a.85.85,0,0,0,0-.35c-.1-.08,0-.22-.09-.32a.85.85,0,0,0-.77-.54,1,1,0,0,0-.42,0H16a1.19,1.19,0,0,1-.42,0A.9.9,0,0,1,14.68,1a1,1,0,0,1,.64-1s.12,0,.14-.07h.07a.74.74,0,0,0,.39,0H33.61A.75.75,0,0,0,34,0h.21a2.77,2.77,0,0,1,2,1.15,2.28,2.28,0,0,1,.44,1.12v.1s0,.1,0,.13V21.83a.1.1,0,0,0,0,.14Z"/><path class="blanco" d="M25.2,15.29a2.3,2.3,0,0,0-1.11-1.44,4.94,4.94,0,0,0-2.19-.36h-2c-.09,0-.48,0-.54,0l-1.65-1.63a5.7,5.7,0,0,0-4.07-1.76,6.42,6.42,0,0,0-1.24,0,.65.65,0,0,0-.45.15c-.52.43-1.05.84-1.56,1.28a1.49,1.49,0,0,1-2.06.18c-.4-.3-.77-.64-1.17-.94s-.61-.66-1.11-.67a5,5,0,0,0-1.09,0c-.25,0-.51,0-.77.07A5,5,0,0,0,.58,12.72,8.18,8.18,0,0,0,0,14.31v.15a.05.05,0,0,1,0,0,.2.2,0,0,1,0,.07.1.1,0,0,1,0,.09v8.52a.09.09,0,0,1,0,.07.09.09,0,0,1,0,.07v.14c.07.19,0,.4.12.59A3.2,3.2,0,0,0,3.44,26,1.93,1.93,0,0,1,4,25.84c.15.12.09.29.09.43v7.4a3,3,0,0,0,3,3h4.37a3,3,0,0,0,3-3c0-4.3,0-12.18,0-16.25,0-.08,0-.16,0-.23s.21.1.28.17c.49.47.95,1,1.44,1.43a2.93,2.93,0,0,0,1.85.74c.75-.06,1.49,0,2.24,0h1.31l.82,0a2.52,2.52,0,0,0,1-.15,2.69,2.69,0,0,0,.77-.4,2.93,2.93,0,0,0,1-1.42A4.14,4.14,0,0,0,25.2,15.29Zm-1.73,1.88a1.29,1.29,0,0,1-1,.48,15.32,15.32,0,0,1-1.66,0c-.59,0-1.17,0-1.76,0a5.62,5.62,0,0,1-.92,0A1.91,1.91,0,0,1,16.94,17a4.43,4.43,0,0,0-2.17-1.63,1.91,1.91,0,0,0-1.94.92,1.77,1.77,0,0,0-.15.31,3.89,3.89,0,0,0-.12,1.18q0,8,0,16a1,1,0,0,1-1,1h-.22a1.08,1.08,0,0,1-1.08-1.08c0-3.18,0-6.37,0-9.55A2.74,2.74,0,0,0,10.05,23a.94.94,0,0,0-.88-.59.93.93,0,0,0-.71.61,2.7,2.7,0,0,0-.12,1c0,3.22,0,6.44,0,9.66a1.1,1.1,0,0,1-1.08,1.08H7.1a1,1,0,0,1-1-1.05q0-8.4,0-16.8a2.81,2.81,0,0,0-.13-1,.93.93,0,0,0-.77-.62,1,1,0,0,0-.84.62A2.85,2.85,0,0,0,4.16,17c0,1.65,0,3.3,0,5A3.57,3.57,0,0,1,4,23.3,1.17,1.17,0,0,1,3,24.07a1.16,1.16,0,0,1-1-.77A3.62,3.62,0,0,1,1.82,22c0-1.56,0-3.12-.05-4.68a8.5,8.5,0,0,1,.47-3.59,2.89,2.89,0,0,1,2.85-1.85c1.41.2,2.32,1.75,3.73,2A4.15,4.15,0,0,0,12,12.59a3.61,3.61,0,0,1,.79-.55,2.13,2.13,0,0,1,1.09-.14c1.51.16,2.7,1.31,3.75,2.4a3.33,3.33,0,0,0,.91.71,2.5,2.5,0,0,0,1.11.25c1,0,2.19-.27,3.18.21A1.26,1.26,0,0,1,23.47,17.17Z"/><path class="blanco" d="M13.75,4.36a3.23,3.23,0,0,0-.16-1.07A4.44,4.44,0,0,0,11.74.75,5.74,5.74,0,0,0,10,.06s0,0-.06,0H9.82a.12.12,0,0,1-.09,0H9a.15.15,0,0,1-.11,0H8.73l-.08,0a4.45,4.45,0,0,0-3,1.74,4,4,0,0,0-.87,2.35,1.78,1.78,0,0,1,0,.65,2,2,0,0,0,.12.81,4.4,4.4,0,0,0,1.4,2.27A4.42,4.42,0,0,0,9.08,9c.14-.07.3,0,.44-.06s.09.07.13.06a5.38,5.38,0,0,0,1.87-.63,4.52,4.52,0,0,0,2.23-3.65A.59.59,0,0,0,13.75,4.36Zm-1.86.37A2.69,2.69,0,0,1,9.45,7.15a.66.66,0,0,0-.44,0A2.64,2.64,0,0,1,6.89,5.62a2.57,2.57,0,0,1,2-3.69,2.61,2.61,0,0,1,3,2,2.47,2.47,0,0,1,0,.39A.59.59,0,0,1,11.89,4.73Z"/></g></g></svg>
                        </span>
                        <input type="text" autocomplete="off" name="LastName" class="form-control" id="validationapellido" aria-describedby="validationapellidoFeedback" placeholder=" Primer apellido" required value="<?php echo isset($LastName) ? htmlspecialchars($LastName, ENT_QUOTES) : ''; ?>">
                        <div id="validationapellidoFeedback" class="invalid-feedback">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16"><path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/><path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/></svg>
                        Por favor ingresa tu primer apellido.
                        </div>
                    </div>
                    <!---->
                </div>
                <div class="derecha">
                    <!---->
                    <label for="validationName2" class="form-label">Segundo nombre</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36.64 36.64"><defs><style>.blanco{fill:#fff;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path class="blanco" d="M36.64,22.11c-.17,0-.14.2-.18.31a2.85,2.85,0,0,1-2.32,1.91.66.66,0,0,1-.14,0,.87.87,0,0,0-.32,0H17.35a.85.85,0,0,0-.32,0,.94.94,0,0,1-.78-.83.81.81,0,0,1,.66-.95l.19-.08a.88.88,0,0,1,.32,0H33.68a.87.87,0,0,1,.32,0,1.12,1.12,0,0,0,.79-.92.85.85,0,0,0,0-.35v-18a.85.85,0,0,0,0-.35c-.1-.08,0-.22-.09-.32a.85.85,0,0,0-.77-.54,1,1,0,0,0-.42,0H16a1.19,1.19,0,0,1-.42,0A.9.9,0,0,1,14.68,1a1,1,0,0,1,.64-1s.12,0,.14-.07h.07a.74.74,0,0,0,.39,0H33.61A.75.75,0,0,0,34,0h.21a2.77,2.77,0,0,1,2,1.15,2.28,2.28,0,0,1,.44,1.12v.1s0,.1,0,.13V21.83a.1.1,0,0,0,0,.14Z"/><path class="blanco" d="M25.2,15.29a2.3,2.3,0,0,0-1.11-1.44,4.94,4.94,0,0,0-2.19-.36h-2c-.09,0-.48,0-.54,0l-1.65-1.63a5.7,5.7,0,0,0-4.07-1.76,6.42,6.42,0,0,0-1.24,0,.65.65,0,0,0-.45.15c-.52.43-1.05.84-1.56,1.28a1.49,1.49,0,0,1-2.06.18c-.4-.3-.77-.64-1.17-.94s-.61-.66-1.11-.67a5,5,0,0,0-1.09,0c-.25,0-.51,0-.77.07A5,5,0,0,0,.58,12.72,8.18,8.18,0,0,0,0,14.31v.15a.05.05,0,0,1,0,0,.2.2,0,0,1,0,.07.1.1,0,0,1,0,.09v8.52a.09.09,0,0,1,0,.07.09.09,0,0,1,0,.07v.14c.07.19,0,.4.12.59A3.2,3.2,0,0,0,3.44,26,1.93,1.93,0,0,1,4,25.84c.15.12.09.29.09.43v7.4a3,3,0,0,0,3,3h4.37a3,3,0,0,0,3-3c0-4.3,0-12.18,0-16.25,0-.08,0-.16,0-.23s.21.1.28.17c.49.47.95,1,1.44,1.43a2.93,2.93,0,0,0,1.85.74c.75-.06,1.49,0,2.24,0h1.31l.82,0a2.52,2.52,0,0,0,1-.15,2.69,2.69,0,0,0,.77-.4,2.93,2.93,0,0,0,1-1.42A4.14,4.14,0,0,0,25.2,15.29Zm-1.73,1.88a1.29,1.29,0,0,1-1,.48,15.32,15.32,0,0,1-1.66,0c-.59,0-1.17,0-1.76,0a5.62,5.62,0,0,1-.92,0A1.91,1.91,0,0,1,16.94,17a4.43,4.43,0,0,0-2.17-1.63,1.91,1.91,0,0,0-1.94.92,1.77,1.77,0,0,0-.15.31,3.89,3.89,0,0,0-.12,1.18q0,8,0,16a1,1,0,0,1-1,1h-.22a1.08,1.08,0,0,1-1.08-1.08c0-3.18,0-6.37,0-9.55A2.74,2.74,0,0,0,10.05,23a.94.94,0,0,0-.88-.59.93.93,0,0,0-.71.61,2.7,2.7,0,0,0-.12,1c0,3.22,0,6.44,0,9.66a1.1,1.1,0,0,1-1.08,1.08H7.1a1,1,0,0,1-1-1.05q0-8.4,0-16.8a2.81,2.81,0,0,0-.13-1,.93.93,0,0,0-.77-.62,1,1,0,0,0-.84.62A2.85,2.85,0,0,0,4.16,17c0,1.65,0,3.3,0,5A3.57,3.57,0,0,1,4,23.3,1.17,1.17,0,0,1,3,24.07a1.16,1.16,0,0,1-1-.77A3.62,3.62,0,0,1,1.82,22c0-1.56,0-3.12-.05-4.68a8.5,8.5,0,0,1,.47-3.59,2.89,2.89,0,0,1,2.85-1.85c1.41.2,2.32,1.75,3.73,2A4.15,4.15,0,0,0,12,12.59a3.61,3.61,0,0,1,.79-.55,2.13,2.13,0,0,1,1.09-.14c1.51.16,2.7,1.31,3.75,2.4a3.33,3.33,0,0,0,.91.71,2.5,2.5,0,0,0,1.11.25c1,0,2.19-.27,3.18.21A1.26,1.26,0,0,1,23.47,17.17Z"/><path class="blanco" d="M13.75,4.36a3.23,3.23,0,0,0-.16-1.07A4.44,4.44,0,0,0,11.74.75,5.74,5.74,0,0,0,10,.06s0,0-.06,0H9.82a.12.12,0,0,1-.09,0H9a.15.15,0,0,1-.11,0H8.73l-.08,0a4.45,4.45,0,0,0-3,1.74,4,4,0,0,0-.87,2.35,1.78,1.78,0,0,1,0,.65,2,2,0,0,0,.12.81,4.4,4.4,0,0,0,1.4,2.27A4.42,4.42,0,0,0,9.08,9c.14-.07.3,0,.44-.06s.09.07.13.06a5.38,5.38,0,0,0,1.87-.63,4.52,4.52,0,0,0,2.23-3.65A.59.59,0,0,0,13.75,4.36Zm-1.86.37A2.69,2.69,0,0,1,9.45,7.15a.66.66,0,0,0-.44,0A2.64,2.64,0,0,1,6.89,5.62a2.57,2.57,0,0,1,2-3.69,2.61,2.61,0,0,1,3,2,2.47,2.47,0,0,1,0,.39A.59.59,0,0,1,11.89,4.73Z"/></g></g></svg>
                        </span>
                        <input type="text" autocomplete="off" name="MiddleName" class="form-control" id="validationName2" aria-describedby="validationName2Feedback" placeholder=" Segundo nombre" value="<?php echo isset($MiddleName) ? htmlspecialchars($MiddleName, ENT_QUOTES) : ''; ?>">
                        <div id="validationName2Feedback" class="invalid-feedback">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16"><path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/><path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/></svg>
                        Por favor ingresa tu segundo nombre.
                        </div>
                    </div>
                    <!---->
                    <label for="validationapellido2" class="form-label">Segundo apellido</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36.64 36.64"><defs><style>.blanco{fill:#fff;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path class="blanco" d="M36.64,22.11c-.17,0-.14.2-.18.31a2.85,2.85,0,0,1-2.32,1.91.66.66,0,0,1-.14,0,.87.87,0,0,0-.32,0H17.35a.85.85,0,0,0-.32,0,.94.94,0,0,1-.78-.83.81.81,0,0,1,.66-.95l.19-.08a.88.88,0,0,1,.32,0H33.68a.87.87,0,0,1,.32,0,1.12,1.12,0,0,0,.79-.92.85.85,0,0,0,0-.35v-18a.85.85,0,0,0,0-.35c-.1-.08,0-.22-.09-.32a.85.85,0,0,0-.77-.54,1,1,0,0,0-.42,0H16a1.19,1.19,0,0,1-.42,0A.9.9,0,0,1,14.68,1a1,1,0,0,1,.64-1s.12,0,.14-.07h.07a.74.74,0,0,0,.39,0H33.61A.75.75,0,0,0,34,0h.21a2.77,2.77,0,0,1,2,1.15,2.28,2.28,0,0,1,.44,1.12v.1s0,.1,0,.13V21.83a.1.1,0,0,0,0,.14Z"/><path class="blanco" d="M25.2,15.29a2.3,2.3,0,0,0-1.11-1.44,4.94,4.94,0,0,0-2.19-.36h-2c-.09,0-.48,0-.54,0l-1.65-1.63a5.7,5.7,0,0,0-4.07-1.76,6.42,6.42,0,0,0-1.24,0,.65.65,0,0,0-.45.15c-.52.43-1.05.84-1.56,1.28a1.49,1.49,0,0,1-2.06.18c-.4-.3-.77-.64-1.17-.94s-.61-.66-1.11-.67a5,5,0,0,0-1.09,0c-.25,0-.51,0-.77.07A5,5,0,0,0,.58,12.72,8.18,8.18,0,0,0,0,14.31v.15a.05.05,0,0,1,0,0,.2.2,0,0,1,0,.07.1.1,0,0,1,0,.09v8.52a.09.09,0,0,1,0,.07.09.09,0,0,1,0,.07v.14c.07.19,0,.4.12.59A3.2,3.2,0,0,0,3.44,26,1.93,1.93,0,0,1,4,25.84c.15.12.09.29.09.43v7.4a3,3,0,0,0,3,3h4.37a3,3,0,0,0,3-3c0-4.3,0-12.18,0-16.25,0-.08,0-.16,0-.23s.21.1.28.17c.49.47.95,1,1.44,1.43a2.93,2.93,0,0,0,1.85.74c.75-.06,1.49,0,2.24,0h1.31l.82,0a2.52,2.52,0,0,0,1-.15,2.69,2.69,0,0,0,.77-.4,2.93,2.93,0,0,0,1-1.42A4.14,4.14,0,0,0,25.2,15.29Zm-1.73,1.88a1.29,1.29,0,0,1-1,.48,15.32,15.32,0,0,1-1.66,0c-.59,0-1.17,0-1.76,0a5.62,5.62,0,0,1-.92,0A1.91,1.91,0,0,1,16.94,17a4.43,4.43,0,0,0-2.17-1.63,1.91,1.91,0,0,0-1.94.92,1.77,1.77,0,0,0-.15.31,3.89,3.89,0,0,0-.12,1.18q0,8,0,16a1,1,0,0,1-1,1h-.22a1.08,1.08,0,0,1-1.08-1.08c0-3.18,0-6.37,0-9.55A2.74,2.74,0,0,0,10.05,23a.94.94,0,0,0-.88-.59.93.93,0,0,0-.71.61,2.7,2.7,0,0,0-.12,1c0,3.22,0,6.44,0,9.66a1.1,1.1,0,0,1-1.08,1.08H7.1a1,1,0,0,1-1-1.05q0-8.4,0-16.8a2.81,2.81,0,0,0-.13-1,.93.93,0,0,0-.77-.62,1,1,0,0,0-.84.62A2.85,2.85,0,0,0,4.16,17c0,1.65,0,3.3,0,5A3.57,3.57,0,0,1,4,23.3,1.17,1.17,0,0,1,3,24.07a1.16,1.16,0,0,1-1-.77A3.62,3.62,0,0,1,1.82,22c0-1.56,0-3.12-.05-4.68a8.5,8.5,0,0,1,.47-3.59,2.89,2.89,0,0,1,2.85-1.85c1.41.2,2.32,1.75,3.73,2A4.15,4.15,0,0,0,12,12.59a3.61,3.61,0,0,1,.79-.55,2.13,2.13,0,0,1,1.09-.14c1.51.16,2.7,1.31,3.75,2.4a3.33,3.33,0,0,0,.91.71,2.5,2.5,0,0,0,1.11.25c1,0,2.19-.27,3.18.21A1.26,1.26,0,0,1,23.47,17.17Z"/><path class="blanco" d="M13.75,4.36a3.23,3.23,0,0,0-.16-1.07A4.44,4.44,0,0,0,11.74.75,5.74,5.74,0,0,0,10,.06s0,0-.06,0H9.82a.12.12,0,0,1-.09,0H9a.15.15,0,0,1-.11,0H8.73l-.08,0a4.45,4.45,0,0,0-3,1.74,4,4,0,0,0-.87,2.35,1.78,1.78,0,0,1,0,.65,2,2,0,0,0,.12.81,4.4,4.4,0,0,0,1.4,2.27A4.42,4.42,0,0,0,9.08,9c.14-.07.3,0,.44-.06s.09.07.13.06a5.38,5.38,0,0,0,1.87-.63,4.52,4.52,0,0,0,2.23-3.65A.59.59,0,0,0,13.75,4.36Zm-1.86.37A2.69,2.69,0,0,1,9.45,7.15a.66.66,0,0,0-.44,0A2.64,2.64,0,0,1,6.89,5.62a2.57,2.57,0,0,1,2-3.69,2.61,2.61,0,0,1,3,2,2.47,2.47,0,0,1,0,.39A.59.59,0,0,1,11.89,4.73Z"/></g></g></svg>
                        </span>
                        <input type="text" autocomplete="off" name="SecondLastName" class="form-control" id="validationapellido2" aria-describedby="validationapellido2Feedback" placeholder=" Segundo apellido" required value="<?php echo isset($SecondLastName) ? htmlspecialchars($SecondLastName, ENT_QUOTES) : ''; ?>">
                        <div id="validationapellido2Feedback" class="invalid-feedback">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16"><path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/><path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/></svg>
                        Por favor ingresa tu segundo apellido.
                        </div>
                    </div>
                </div>
            </div>
            <div class="jr"></div>
            <!---->
            <div class="columnasX2">
                <div class="izquierda">
                    <div class="obligatorio">
                        &nbsp;&nbsp;&nbsp;*Campo obligatorio.
                    </div>
                </div>
                <div class="derecha">
                    <button onclick="down(6);"  class="btnNext hover" type="button">Continuar</button>
                </div>
            </div>
            <!---->
        </div>
    </section>
    <section id="piso_6">
        <img class="cofre" id="cofre1" src="img/fomrLarge/cofre1.png" alt="">
        <div class="formStyle">
            <!---->
            <label for="validationNewPass" class="form-label">Nueva contraseña*</label>
            <div class="input-group has-validation">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30.91 31.14"><defs><style>.blanco{fill:#fff;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path class="blanco" d="M24.46,7.86a8.94,8.94,0,0,0-3.15-5.75A9.45,9.45,0,0,0,17.53.24,3.8,3.8,0,0,1,16.42,0H14.6a.32.32,0,0,1-.22.12A7.74,7.74,0,0,0,11.45,1,8.74,8.74,0,0,0,8.74,3.14,9,9,0,0,0,7,6.22a9.08,9.08,0,0,0-.37,3.88A8.57,8.57,0,0,0,7.46,13,9,9,0,0,0,10.3,16.3s.11.06.1.13-.08,0-.13.05a16.51,16.51,0,0,0-2.84,1.37,15.92,15.92,0,0,0-3.91,3.41A16.49,16.49,0,0,0,1.71,24,14.72,14.72,0,0,0,.38,27.6,13.67,13.67,0,0,0,0,30.91c0,.15,0,.23.21.23.67,0,1.35,0,2,0,.16,0,.2-.05.2-.2a11.18,11.18,0,0,1,.05-1.15,14.17,14.17,0,0,1,.79-3.33A12.93,12.93,0,0,1,6,22.1a12.47,12.47,0,0,1,1.54-1.37,12.77,12.77,0,0,1,3.5-1.94A14.19,14.19,0,0,1,15.82,18a8.1,8.1,0,0,0,1.4-.14,9,9,0,0,0,7.24-10ZM20.23,13.6a6.48,6.48,0,0,1-4.46,2A6.56,6.56,0,1,1,20,4.16,6.34,6.34,0,0,1,22.12,9,6.32,6.32,0,0,1,20.23,13.6Z"/><path class="blanco" d="M30.91,25.32v-.61a.16.16,0,0,1,0-.13V24.4a.14.14,0,0,0,0-.06c0-.22-.08-.45-.13-.66A6,6,0,0,0,24.52,19a6.74,6.74,0,0,0-1.68.31,5.58,5.58,0,0,0-2.73,1.9.47.47,0,0,1-.41.18H12.77a.65.65,0,0,0-.53.21c-.72.73-1.41,1.49-2.18,2.16a1.75,1.75,0,0,0-.68,1.71.56.56,0,0,0,.15.36c.92.89,1.83,1.78,2.73,2.68a.62.62,0,0,0,.48.18h7a.48.48,0,0,1,.43.21,4.61,4.61,0,0,0,1.33,1.24,6.1,6.1,0,0,0,9.28-3.8c0-.16-.07-.4.17-.5v-.12a.11.11,0,0,1,0-.08v-.16C30.88,25.39,30.87,25.35,30.91,25.32Zm-3.67,2.41a3.59,3.59,0,0,1-4.77.07,5.17,5.17,0,0,1-1.07-1.39.32.32,0,0,0-.33-.19c-.62,0-1.24,0-1.85,0A1.49,1.49,0,0,1,18,25.72a12,12,0,0,0-1.09-1c-.12-.09-.14-.06-.23,0-.44.47-.92.9-1.33,1.4a.3.3,0,0,1-.29.12,1.47,1.47,0,0,0-.21,0,3.61,3.61,0,0,1-1.36,0,3.69,3.69,0,0,1-1.1-1.1,3,3,0,0,1,1.06-1.46,3.82,3.82,0,0,1,1.44-.05H21a.35.35,0,0,0,.38-.21,3.35,3.35,0,0,1,1.75-1.58,3.61,3.61,0,0,1,3.93.38,3.38,3.38,0,0,1,1.35,2.61A3.53,3.53,0,0,1,27.24,27.73Z"/><path class="blanco" d="M26,23.86A1.12,1.12,0,0,1,27.21,25,1.2,1.2,0,0,1,26,26.23,1.17,1.17,0,0,1,24.83,25,1.08,1.08,0,0,1,26,23.86Z"/></g></g></svg>
                </span>
                <input type="text" autocomplete="off" name="validationNewPass" class="form-control" id="validationNewPass" aria-describedby="validationNewPassFeedback" placeholder=" Introduce la nueva contraseña">
                <div id="validationNewPassFeedback" class="invalid-feedback">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16"><path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/><path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/></svg>
                Ingresa una contraseña valida.
                </div>
            </div>
            <!---->
            <label for="validationNewPass2" class="form-label">Repite la nueva contraseña*</label>
            <div class="input-group has-validation">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30.91 31.14"><defs><style>.blanco{fill:#fff;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path class="blanco" d="M24.46,7.86a8.94,8.94,0,0,0-3.15-5.75A9.45,9.45,0,0,0,17.53.24,3.8,3.8,0,0,1,16.42,0H14.6a.32.32,0,0,1-.22.12A7.74,7.74,0,0,0,11.45,1,8.74,8.74,0,0,0,8.74,3.14,9,9,0,0,0,7,6.22a9.08,9.08,0,0,0-.37,3.88A8.57,8.57,0,0,0,7.46,13,9,9,0,0,0,10.3,16.3s.11.06.1.13-.08,0-.13.05a16.51,16.51,0,0,0-2.84,1.37,15.92,15.92,0,0,0-3.91,3.41A16.49,16.49,0,0,0,1.71,24,14.72,14.72,0,0,0,.38,27.6,13.67,13.67,0,0,0,0,30.91c0,.15,0,.23.21.23.67,0,1.35,0,2,0,.16,0,.2-.05.2-.2a11.18,11.18,0,0,1,.05-1.15,14.17,14.17,0,0,1,.79-3.33A12.93,12.93,0,0,1,6,22.1a12.47,12.47,0,0,1,1.54-1.37,12.77,12.77,0,0,1,3.5-1.94A14.19,14.19,0,0,1,15.82,18a8.1,8.1,0,0,0,1.4-.14,9,9,0,0,0,7.24-10ZM20.23,13.6a6.48,6.48,0,0,1-4.46,2A6.56,6.56,0,1,1,20,4.16,6.34,6.34,0,0,1,22.12,9,6.32,6.32,0,0,1,20.23,13.6Z"/><path class="blanco" d="M30.91,25.32v-.61a.16.16,0,0,1,0-.13V24.4a.14.14,0,0,0,0-.06c0-.22-.08-.45-.13-.66A6,6,0,0,0,24.52,19a6.74,6.74,0,0,0-1.68.31,5.58,5.58,0,0,0-2.73,1.9.47.47,0,0,1-.41.18H12.77a.65.65,0,0,0-.53.21c-.72.73-1.41,1.49-2.18,2.16a1.75,1.75,0,0,0-.68,1.71.56.56,0,0,0,.15.36c.92.89,1.83,1.78,2.73,2.68a.62.62,0,0,0,.48.18h7a.48.48,0,0,1,.43.21,4.61,4.61,0,0,0,1.33,1.24,6.1,6.1,0,0,0,9.28-3.8c0-.16-.07-.4.17-.5v-.12a.11.11,0,0,1,0-.08v-.16C30.88,25.39,30.87,25.35,30.91,25.32Zm-3.67,2.41a3.59,3.59,0,0,1-4.77.07,5.17,5.17,0,0,1-1.07-1.39.32.32,0,0,0-.33-.19c-.62,0-1.24,0-1.85,0A1.49,1.49,0,0,1,18,25.72a12,12,0,0,0-1.09-1c-.12-.09-.14-.06-.23,0-.44.47-.92.9-1.33,1.4a.3.3,0,0,1-.29.12,1.47,1.47,0,0,0-.21,0,3.61,3.61,0,0,1-1.36,0,3.69,3.69,0,0,1-1.1-1.1,3,3,0,0,1,1.06-1.46,3.82,3.82,0,0,1,1.44-.05H21a.35.35,0,0,0,.38-.21,3.35,3.35,0,0,1,1.75-1.58,3.61,3.61,0,0,1,3.93.38,3.38,3.38,0,0,1,1.35,2.61A3.53,3.53,0,0,1,27.24,27.73Z"/><path class="blanco" d="M26,23.86A1.12,1.12,0,0,1,27.21,25,1.2,1.2,0,0,1,26,26.23,1.17,1.17,0,0,1,24.83,25,1.08,1.08,0,0,1,26,23.86Z"/></g></g></svg>
                </span>
                <input type="text" autocomplete="off" name="validationNewPass2" class="form-control" id="validationNewPass2" aria-describedby="validationNewPass2Feedback" placeholder=" Introduce nuevamente la contraseña">
                <div id="validationNewPass2Feedback" class="invalid-feedback">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16"><path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/><path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/></svg>
                Las contraseñas deben coincidir. Inténtalo de nuevo.
                </div>
            </div>
            <!---->
            <div class="jr"></div>
            <!---->
            <div class="obligatorio">
                &nbsp;&nbsp;&nbsp;La Contraseña tiene que estar compuesta de 8 caracteres.<br>
                &nbsp;&nbsp;&nbsp;Debe tener una letra en Mayúscula y una en Minúscula.<br>
                &nbsp;&nbsp;&nbsp;Debe tener un número.<br>
                &nbsp;&nbsp;&nbsp;Debe tener un caracter no alfanúmerico.
            </div>
            <button onclick="newPass();"  class="btnNext hover" type="button">Continuar</button>
            <div class="jr"></div>
        </div>
    </section>
    <section id="piso_7">
        <img id="telefonoP6" src="img/fomrLarge/telefono.png" alt="">
        <div class="formStyle">
            <label for="validationTelefono" class="form-label">Teléfono del acudiente (opcional)</label>
            <div class="input-group has-validation">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36.43 36.45"><defs><style>.blanco{fill:#fff;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path class="blanco" d="M25.87,36.45c-.5-.11-1-.2-1.5-.34a10.92,10.92,0,0,1-2.43-1c-1.16-.63-2.32-1.27-3.45-2a48.24,48.24,0,0,1-4.75-3.4c-.83-.68-1.64-1.4-2.42-2.14-.6-.56-1.22-1.12-1.77-1.73-1.14-1.24-2.26-2.49-3.29-3.82a49.62,49.62,0,0,1-3.37-4.91,26.08,26.08,0,0,1-2.49-5,5,5,0,0,1-.32-1.57c0-.06,0-.11-.08-.12v-.17a.2.2,0,0,0,0-.16V10a.19.19,0,0,0,0-.12V8.84c.05-.05,0-.11,0-.17v-.3a.15.15,0,0,0,0-.11V8.09C.14,7.53.26,7,.42,6.41a9.29,9.29,0,0,1,2.42-4A20.14,20.14,0,0,1,5,.37,1.57,1.57,0,0,1,6,0a.92.92,0,0,1,.52,0A2.36,2.36,0,0,1,8.11.82c2.11,2.09,4.2,4.19,6.3,6.3a3.27,3.27,0,0,1,.86,1.63.75.75,0,0,1,0,.42c-.18.15-.08.38-.16.57a2.65,2.65,0,0,1-.58.95c-.92.91-1.83,1.84-2.76,2.74a1.7,1.7,0,0,0-.22,2.21c.46.63.89,1.28,1.34,1.91s.22,1-.39,1.33a.59.59,0,0,1-.76-.17,18.75,18.75,0,0,1-1.62-2.24,2.66,2.66,0,0,1-.51-1.58.75.75,0,0,1,0-.42,3.05,3.05,0,0,1,1-2.18c.88-.84,1.74-1.71,2.58-2.58.26-.27.57-.56.35-1a.79.79,0,0,0-.23-.28L6.88,2A.85.85,0,0,0,5.56,2,19,19,0,0,0,2.88,5,8.33,8.33,0,0,0,1.73,8.11a8.21,8.21,0,0,0,.85,5.06,49.46,49.46,0,0,0,4.77,7.6c.72.95,1.49,1.86,2.3,2.75,1,1.15,2.14,2.26,3.28,3.32a42.49,42.49,0,0,0,4,3.26,47,47,0,0,0,6.5,3.9,7.82,7.82,0,0,0,4.33.78,8.09,8.09,0,0,0,5-2.42c.54-.56,1.1-1.1,1.64-1.65a.69.69,0,0,0,0-1.12L28,23.11a.77.77,0,0,0-1.2,0l-2.58,2.58a3.52,3.52,0,0,1-2.75,1.12,3.71,3.71,0,0,1-1.9-.78,20.67,20.67,0,0,1-2.65-2c-.4-.38-.44-.74-.15-1.09A.87.87,0,0,1,18,22.85c1,.7,1.9,1.42,2.89,2.07a1.54,1.54,0,0,0,1.92-.17c.93-.92,1.83-1.85,2.76-2.75a2.48,2.48,0,0,1,1.58-.81.75.75,0,0,1,.51,0,2.46,2.46,0,0,1,1.69.84c2.09,2.07,4.18,4.14,6.24,6.24A2.37,2.37,0,0,1,36,31.51a7,7,0,0,1-1,1A15.54,15.54,0,0,1,32.24,35,9.16,9.16,0,0,1,28,36.38a.17.17,0,0,1-.1,0H27.8c-.07,0-.13,0-.18,0h-.34a.83.83,0,0,0-.58,0h-.33a.14.14,0,0,0-.11,0h-.11a.14.14,0,0,0-.11,0Z"/></g></g></svg>
                </span>
                <input type="number" autocomplete="off" name="Phone" class="form-control" id="validationTelefono" aria-describedby="validationTelefonoFeedback" placeholder=" Número telefónico" value="<?php echo isset($Phone) ? htmlspecialchars($Phone, ENT_QUOTES) : ''; ?>">
                <div id="validationTelefonoFeedback" class="invalid-feedback">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16"><path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/><path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/></svg>
                    Ingresa el número teléfonico del acudiente.
                </div>
            </div>
            <input type="hidden" name="userNameJD" id="userNamePD">
            <!---->
            <div class="jr"></div>
            <!---->
            <div class="row">
                <div class="col">
                    <button onclick="down(8);"  class="btnNext hover" type="button">Enviar inscripción</button>
                </div>
            </div>
        </div>
    </section>
</form>

<script>
    var contenedor = document.querySelector("#contenedor");
    var elemento = new Image();
    elemento.src = "img/fomrLarge/nube.png";
    elemento.classList.add("rellax");
    elemento.classList.add("nube");
    contenedor.appendChild(elemento);

    var repeticiones = 200;
    for (var i = 0; i < repeticiones; i++) {
        var speed = Math.floor(Math.random() * 9) + 1;
        var sizeNube = speed + 3
        elemento.style.width = sizeNube + "vw";
        elemento.setAttribute("data-rellax-speed", speed.toString());
        var posicionX = Math.floor(Math.random() * 90) + 1;
        var posicionY = Math.floor(Math.random() * 103) + 1;
        var elementoCopia = elemento.cloneNode(true);
        elementoCopia.style.left = posicionX + "%";
        elementoCopia.style.top = posicionY + "%";
        contenedor.appendChild(elementoCopia);
    }

var elemento = document.getElementById("pergamino");
var div = document.getElementById("piso_4");
var isScrolling = false;

window.addEventListener('scroll', function() {
  if (!isScrolling) {
    window.requestAnimationFrame(function() {
      var posicion = window.pageYOffset;
      var posicionInferior = posicion + window.innerHeight;
      var posicionDiv = div.offsetTop;
      var altoDiv = div.offsetHeight;

      if (posicionInferior <= (posicionDiv*1.06)) {
        elemento.style.position = "relative";
        elemento.style.left = "5.5%";
      } else {
        if (posicionInferior >= (posicionDiv*1.06) && posicionInferior <= (posicionDiv + altoDiv)) {
            elemento.style.bottom = "-4%";
            elemento.style.left = "5.5%";
            elemento.style.position = "fixed";
        } else {
            elemento.style.position = "absolute";
            elemento.style.left = "5.5%";
            elemento.style.bottom = "0%";
        }
      }

      isScrolling = false;
    });
    isScrolling = true;
  }
});

</script>

<script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script><script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
<script src="js/code.jquery.com_jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="js/rellax.min.js"></script>

<script>
    var rellax = new Rellax('.rellax');
</script>

<script src="js/registroSTD.js"></script>
</body>
</html>