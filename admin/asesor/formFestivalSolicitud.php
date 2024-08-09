<?php
if($_SERVER["REQUEST_METHOD"] != "POST"){
    return;
}
$mensajeErr = "";

$UserId = filter_input(INPUT_POST, 'UserId', FILTER_SANITIZE_NUMBER_INT);

$Departamento = filter_input(INPUT_POST, 'Departamento', FILTER_SANITIZE_NUMBER_INT);
$Ciudad = filter_input(INPUT_POST, 'Ciudad', FILTER_SANITIZE_NUMBER_INT);
$Institucion = filter_input(INPUT_POST, 'Institucion', FILTER_SANITIZE_NUMBER_INT);
$Institucion = empty($Institucion) ? null : $Institucion;
$institucionOtro = filter_input(INPUT_POST, 'institucionOtro', FILTER_SANITIZE_STRING);
$Nombrecontacto = filter_input(INPUT_POST, 'Nombrecontacto', FILTER_SANITIZE_STRING);
$Numerocontacto = filter_input(INPUT_POST, 'Numerocontacto', FILTER_SANITIZE_STRING);

$CienciasNaturales = filter_input(INPUT_POST, 'CienciasNaturales', FILTER_SANITIZE_NUMBER_INT);
$Lenguaje = filter_input(INPUT_POST, 'Lenguaje', FILTER_SANITIZE_NUMBER_INT);
$Matematicas = filter_input(INPUT_POST, 'Matematicas', FILTER_SANITIZE_NUMBER_INT);
$Ingles = filter_input(INPUT_POST, 'Ingles', FILTER_SANITIZE_NUMBER_INT);
$Sociales = filter_input(INPUT_POST, 'Sociales', FILTER_SANITIZE_NUMBER_INT);
$RolFinanciero = filter_input(INPUT_POST, 'RolFinanciero', FILTER_SANITIZE_NUMBER_INT);
$RolEmprendimiento = filter_input(INPUT_POST, 'RolEmprendimiento', FILTER_SANITIZE_NUMBER_INT);
$RallyFinanciero = filter_input(INPUT_POST, 'RallyFinanciero', FILTER_SANITIZE_NUMBER_INT);

$Prueba = filter_input(INPUT_POST, 'Prueba', FILTER_SANITIZE_NUMBER_INT);
$ActividadSalon = filter_input(INPUT_POST, 'ActividadSalon', FILTER_SANITIZE_NUMBER_INT);
$Rally = filter_input(INPUT_POST, 'Rally', FILTER_SANITIZE_NUMBER_INT);

$Prejar = filter_input(INPUT_POST, 'Prejar', FILTER_SANITIZE_NUMBER_INT);
$Jardin = filter_input(INPUT_POST, 'Jardin', FILTER_SANITIZE_NUMBER_INT);
$Transicion = filter_input(INPUT_POST, 'Transicion', FILTER_SANITIZE_NUMBER_INT);
$numPres = filter_input(INPUT_POST, 'numPres', FILTER_SANITIZE_NUMBER_INT);

$Primero = filter_input(INPUT_POST, 'Primero', FILTER_SANITIZE_NUMBER_INT);
$Segundo = filter_input(INPUT_POST, 'Segundo', FILTER_SANITIZE_NUMBER_INT);
$Tercero = filter_input(INPUT_POST, 'Tercero', FILTER_SANITIZE_NUMBER_INT);
$Cuarto = filter_input(INPUT_POST, 'Cuarto', FILTER_SANITIZE_NUMBER_INT);
$Quinto = filter_input(INPUT_POST, 'Quinto', FILTER_SANITIZE_NUMBER_INT);
$numPri = filter_input(INPUT_POST, 'numPri', FILTER_SANITIZE_NUMBER_INT);

$Sexto = filter_input(INPUT_POST, 'Sexto', FILTER_SANITIZE_NUMBER_INT);
$Septimo = filter_input(INPUT_POST, 'Septimo', FILTER_SANITIZE_NUMBER_INT);
$Octavo = filter_input(INPUT_POST, 'Octavo', FILTER_SANITIZE_NUMBER_INT);
$Noveno = filter_input(INPUT_POST, 'Noveno', FILTER_SANITIZE_NUMBER_INT);
$Decimo = filter_input(INPUT_POST, 'Decimo', FILTER_SANITIZE_NUMBER_INT);
$Once = filter_input(INPUT_POST, 'Once', FILTER_SANITIZE_NUMBER_INT);
$numbach = filter_input(INPUT_POST, 'numbach', FILTER_SANITIZE_NUMBER_INT);

$logDecimo = filter_input(INPUT_POST, 'logDecimo', FILTER_SANITIZE_STRING);
$LogUndecimo = filter_input(INPUT_POST, 'LogUndecimo', FILTER_SANITIZE_STRING);
$LogOtro = filter_input(INPUT_POST, 'LogOtro', FILTER_SANITIZE_STRING);

$Abono = filter_input(INPUT_POST, 'Abono', FILTER_SANITIZE_NUMBER_INT);

$fechaCapacitacion = filter_input(INPUT_POST, 'fechaCapacitacion', FILTER_SANITIZE_STRING);
$PersonalCapacitacionDef = filter_input(INPUT_POST, 'PersonalCapacitacionDef', FILTER_SANITIZE_NUMBER_INT);

$fechaFestival = filter_input(INPUT_POST, 'fechaFestival', FILTER_SANITIZE_STRING);
$eventoCapacitacionDef = filter_input(INPUT_POST, 'eventoCapacitacionDef', FILTER_SANITIZE_NUMBER_INT);

if(empty($Departamento)){
    $mensajeErr .= "Ingrese departamento<br>";
}
if(empty($Ciudad)){
    $mensajeErr .= "Ingrese ciudad<br>";
}
if(empty($Institucion)){
    if(empty($institucionOtro)){
        $mensajeErr .= "Ingrese una institución<br>";
    }
}
if(empty($Nombrecontacto)){
    $mensajeErr .= "Ingrese nombre del docente<br>";
}
if(empty($Numerocontacto)){
    $mensajeErr .= "Ingrese número de contacto del docente<br>";
}
if(empty($CienciasNaturales) && empty($Lenguaje) && empty($Matematicas) && empty($Ingles) && empty($Sociales) && empty($RolFinanciero) && empty($RolEmprendimiento) && empty($RallyFinanciero)){
    $mensajeErr .= "Falta seleccionar algún área<br>";
}
if(empty($Prueba) && empty($ActividadSalon) && empty($Rally)){
    $mensajeErr .= "Falta seleccionar alguna actividad<br>";
}
if($Prejar!=0 || $Jardin!=0 || $Transicion!=0){
    if(empty($numPres)){
        $mensajeErr .= "Ingrese la cantidad promedio de estudiantes en Preescolar<br>";
    }
}
if($Primero!=0 || $Segundo!=0 || $Tercero!=0 || $Cuarto!=0 || $Quinto!=0){
    if(empty($numPri)){
        $mensajeErr .= "Ingrese la cantidad promedio de estudiantes en Primaria<br>";
    }
}
if($Sexto!=0 || $Septimo!=0 || $Octavo!=0 || $Noveno!=0 || $Decimo!=0 || $Once!=0){
    if(empty($numbach)){
        $mensajeErr .= "Ingrese la cantidad promedio de estudiantes en Bachillerato<br>";
    }
}
if(empty($Prejar) && empty($Jardin) && empty($Transicion) && empty($Primero) && empty($Segundo) && empty($Tercero) && empty($Cuarto) && empty($Quinto) && empty($Sexto) && empty($Septimo) && empty($Octavo) && empty($Noveno) && empty($Decimo) && empty($Once)){
    $mensajeErr .= "Seleccione los cursos con los que se va realizar el festival<br>";
}
if(empty($logDecimo) && empty($LogUndecimo) && empty($LogOtro)){
    $mensajeErr .= "Seleccione los estudiantes encargados de la logística<br>";
}
if(empty($Abono)){
    $mensajeErr .= "Ingrese el valor del anticipó (Abono)<br>";
}
if(empty($fechaCapacitacion)){
    $mensajeErr .= "Debe ingresar fecha de capacitación<br>";
}
if(empty($fechaFestival)){
    $mensajeErr .= "Debe ingresar fecha para el festival<br>";
}

if($mensajeErr === ""){

    require_once('/var/www/html/moodle/config-ext.php');

    $contacto = implode(',', [$Nombrecontacto, $Numerocontacto]);
    $Prescolar = implode(',', [$Prejar, $Jardin, $Transicion]);
    $Primaria = implode(',', [$Primero, $Segundo, $Tercero, $Cuarto, $Quinto]);
    $Bachillerato = implode(',', [$Sexto, $Septimo, $Octavo, $Noveno, $Decimo, $Once]);
    $logistica = implode(',', [$logDecimo, $LogUndecimo, $LogOtro]);
    $Areas = [$CienciasNaturales, $Lenguaje, $Matematicas, $Ingles, $Sociales, $RolFinanciero, $RolEmprendimiento, $RallyFinanciero];
    $Tipos = [$Prueba, $ActividadSalon, $Rally];

    $link->begin_transaction();

    try {
        $stmt_1 = $link->prepare("INSERT INTO FestivalSolicitud (UserId, colegioId, colegioOtro, municipioId, contacto, Prescolar, PrescolarNum, Primaria, PrimariaNum, Bachillerato, BachilleratoNum, logistica, abono) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt_1->bind_param("iisissisisisi", $UserId, $Institucion, $institucionOtro, $Ciudad, $contacto, $Prescolar, $numPres, $Primaria, $numPri, $Bachillerato, $numbach, $logistica, $Abono);
        
        if (!$stmt_1->execute()) {
            throw new Exception("Error en la inserción de FestivalSolicitud: " . $stmt_1->error);
        }

        $id_solicitud = $link->insert_id; // Usar insert_id de la conexión

        $stmt_2 = $link->prepare("INSERT INTO FestivalEstado (id_Estado, id_Solicitud) VALUES (?, ?)");
        $stmt_2->bind_param("ii", $estado, $id_solicitud);
        $estado = 1;

        if (!$stmt_2->execute()) {
            throw new Exception("Error en la inserción de FestivalEstado: " . $stmt_2->error);
        }

        foreach ($Areas as $Area) {
            if($Area != "" || $Area != null){
                $stmt_3 = $link->prepare("INSERT INTO FestivalAreaSolicitud (id_festival, id_solicitud) VALUES (?, ?)");
                $stmt_3->bind_param("ii", $Area, $id_solicitud);
                if (!$stmt_3->execute()) {
                    throw new Exception("Error en la inserción de FestivalAreaSolicitud: " . $stmt_3->error);
                }
            }
        }

        foreach ($Tipos as $Tipo) {
            if($Tipo != "" || $Tipo != null){
                $stmt_4 = $link->prepare("INSERT INTO FestivalTipoSolicitud (id_Actividad, id_Solicitud) VALUES (?, ?)");
                $stmt_4->bind_param("ii", $Tipo, $id_solicitud);
                if (!$stmt_4->execute()) {
                    throw new Exception("Error en la inserción de FestivalTipoSolicitud: " . $stmt_4->error);
                }
            }
        }

        $stmt_5 = $link->prepare("INSERT INTO FestivalCapacitacion (Fecha, Cantidad, id_Solicitud) VALUES (?, ?, ?)");
        $stmt_5->bind_param("sii", $fechaCapacitacion, $PersonalCapacitacionDef, $id_solicitud);

        if (!$stmt_5->execute()) {
            throw new Exception("Error en la inserción de FestivalCapacitacion: " . $stmt_5->error);
        }

        $stmt_6 = $link->prepare("INSERT INTO FestivalApoyo (Fecha, Cantidad, id_Solicitud) VALUES (?, ?, ?)");
        $stmt_6->bind_param("sii", $fechaFestival, $eventoCapacitacionDef, $id_solicitud);

        if (!$stmt_6->execute()) {
            throw new Exception("Error en la inserción de FestivalApoyo: " . $stmt_6->error);
        }

        // Confirmar la transacción
        $link->commit();

    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $link->rollback();
        echo "Error: " . $e->getMessage();
    } finally {
        // Cerrar los statements
        $stmt_1->close();
        $stmt_2->close();
        $stmt_3->close();
        $stmt_4->close();
        $stmt_5->close();
        $stmt_6->close();
    }

// Redirigir
header('Location: festivalesSolicitud.php');

}else{
    echo $mensajeErr;
}
?>