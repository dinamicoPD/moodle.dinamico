<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("location: licenciasDocentes.php");
    return;
}

require_once('/var/www/html/moodle/config-ext.php');
require ('/var/www/html/moodle/moodle/dinapage/phpqrcode/qrlib.php');
include ('mailer.php');

// crea carpeta temporal para codigo qr

$dominio = "https://dinamicopd.com";
$DIR = '/var/www/html/moodle/moodle/dinapage/temp/';
mkdir($DIR, 0777, true);
$filenameQR = $DIR.'QR';


// cargar datos del formulario
$idTeacher = $_POST["Id"];
$FirstName = $_POST["FirstName"];
$MiddleName = $_POST["MiddleName"];
$LastName = $_POST["LastName"];
$SecondLastName = $_POST["SecondLastName"];
$Email = $_POST["Email"];
$userName = $_POST["userName"];
$Colegio = $_POST['Instituto_fn'];
$Curso = $_POST['nivel_fn'];
$Sigla = $_POST['sigla_fn'];

$cursos = "";

$stmt = $link->prepare("SELECT COUNT(*) AS total_usuarios FROM Enrolment WHERE UserId = ?");
$stmt->bind_param("i", $idTeacher); 
$stmt->execute(); 
$stmt->bind_result($total_usuarios); 
$stmt->fetch(); 
$stmt->close();

$total_usuarios++;

$column_names = array();

array_push($column_names, array(0 => 'username', 1 => 'firstname', 2 => 'lastname', 3 => 'email', 4 => 'course1', 5 => 'group1', 6 => 'enrolmentkey1', 7 => 'Type1', 8 => 'role1', 9 => 'enrolstatus1'));

for ($i=0;$i<count($Curso);$i++){

    $verificar_Colegio =  $Colegio[$i];
    $verificar_Cursos = $Curso[$i];
    $verificar_Sigla =  $Sigla[$i];
    $total_user = $total_usuarios + $i;

    $courseNameFound = buscarCurso($link, $verificar_Cursos);
    $codGrupo = generarPassword($link, $verificar_Colegio);
    
    $fullnamegroup = $userName.".".$total_user.".".$verificar_Sigla;
    $fullnamegroup = mb_strtolower($fullnamegroup, 'UTF-8');

    array_push($column_names, array(0 => $userName, 1 => $FirstName, 2 => $LastName, 3 => $Email, 4 => $courseNameFound, 5 => $fullnamegroup, 6 => $codGrupo, 7 => '1', 8 => 'teacher', 9 => '0'));

    $sql_Enrolment = "INSERT INTO Enrolment (UserId,CourseId,CourseName,GroupCode,GroupFullName,GroupKey) VALUES (?,?,?,?,?,?)";
    
    if($stmt_Enrolment = mysqli_prepare($link, $sql_Enrolment)){

        $stmt_Enrolment->bind_param("iissss",$idTeacher,$verificar_Cursos,$courseNameFound,$verificar_Sigla,$fullnamegroup,$codGrupo);

        if(!mysqli_stmt_execute($stmt_Enrolment)){
            error_log("Error: se esta intentando de ingresar el mismo grupo".$stmt_Enrolment->error_list[0]);
            error_log("Nombre del grupo:".$fullnamegroup);
        }else{
           mysqli_stmt_store_result($stmt_Enrolment);
           // generar codigo QR
           $filenameQR_2 = $filenameQR.$codGrupo.'.png';
           $tamanio = 10;
           $level = 'M';
           $frameSize = 2;
           $contenido = $dominio.'/moodle/dinapage/LoginSTD.php?d1n4m1c0='.urlencode($codGrupo);

           QRcode::png($contenido, $filenameQR_2, $level, $tamanio, $frameSize);
        }

    }
}

function generarPassword($link, $verificar_Colegio) {
    $longitud = 8;
    $cadena = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $longitudCadena = strlen($cadena);
    $codGrupo = "";

    for($i = 0; $i < $longitud; $i++) {
        $randomPosicion = rand(0, $longitudCadena - 1);
        $codGrupo .= $cadena[$randomPosicion];
    }

    if (preg_match('/[A-Z]/', $codGrupo) && preg_match('/[a-z]/', $codGrupo) && preg_match('/[0-9]/', $codGrupo)) {
        $codGrupo_2 = $codGrupo."_".$verificar_Colegio;
        if (passwordExists($link, $codGrupo_2)) {
            // Si existe, generamos una nueva
            return generarPassword($link, $verificar_Colegio);
        } else {
            // Si no existe, retornamos esta contraseña
            return $codGrupo_2;
        }
    } else {
        // Si no se cumplen las condiciones, generamos una nueva contraseña
        return generarPassword($link, $verificar_Colegio);
    }
}

function passwordExists($link, $codGrupo) {
    // Preparamos la consulta
    if ($stmt = $link->prepare("SELECT Groupkey FROM Enrolment WHERE Groupkey = ?")) {
        // Asociamos los parámetros
        $stmt->bind_param("s", $codGrupo);
        // Ejecutamos la consulta
        $stmt->execute();
        // Obtenemos los resultados
        $stmt->store_result();
        // Verificamos si encontró alguna coincidencia
        if ($stmt->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        echo "Error preparando la consulta: " . $link->error;
    }
}

function buscarCurso($link, $verificar_Cursos) {
    static $cache = array(); // Caché de resultados
     if (isset($cache[$verificar_Cursos])) {
        return $cache[$verificar_Cursos];
    }
     $query = "SELECT FullName FROM Course WHERE CourseId = ?";
    $stmt = $link->prepare($query);
    $stmt->bind_param("i", $verificar_Cursos);
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$result) {
        die("ERROR: Could not execute $query. " . $link->error);
    }
    $curso = $result->fetch_assoc()["FullName"];
    $stmt->close();
     $cache[$verificar_Cursos] = $curso; // Almacenar resultado en caché
    return $curso;
}

$file=fopen("/var/www/html/moodle/moodle/admin/tool/uploadusercli/cli/PlantillaProfesor".$idTeacher.".csv","w+");

chmod("/var/www/html/moodle/moodle/admin/tool/uploadusercli/cli/PlantillaProfesor".$idTeacher.".csv", 0777);

fwrite($file, "\xEF\xBB\xBF"); // Agregar BOM para indicar que el archivo está en UTF-8

$longitud = count($column_names);

$rowCSV = array();

for ($i = 0; $i < $longitud; $i++) {
    $rowCSV = $column_names[$i];
    fputcsv($file,$rowCSV);
}

fclose($file);

$old_path = getcwd();
chdir('/var/www/html/moodle/moodle/admin/tool/uploadusercli/cli/');
$output=shell_exec('php uploadusercli.php --mode=update --updatemode=missingonly --forcepasswordchange=all --file=PlantillaProfesor'.$idTeacher.'.csv');
sleep(3);
unlink("PlantillaProfesor".$idTeacher.'.csv');
chdir($old_path);

sendEmaiToTeacher($Email, $idTeacher, $userName);

mysqli_close($link);
mysqli_close($link2);
session_destroy();
session_start();

$carpeta = '/var/www/html/moodle/moodle/dinapage/temp';

    // Obtener la lista de archivos y carpetas dentro de la carpeta
$contenidoDIR = glob($carpeta . '/*');

    // Recorrer el contenido y eliminar cada archivo o carpeta
foreach ($contenidoDIR as $elemento) {

    if (is_file($elemento)) {
        unlink($elemento);  // Eliminar archivo
    } elseif (is_dir($elemento)) {
        rmdir($elemento);  // Eliminar carpeta vacía
    }

}

header("location: licenciasDocentes.php");
?>