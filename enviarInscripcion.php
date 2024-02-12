<?php
require_once('../../config-ext.php');
include('ForcePasswordChange.php');
include('SuspendAccount.php');
require ('phpqrcode/qrlib.php');
include('Mailer.php');

// crea caréta temporal para codigo qr
$dominio = "https://dinamicopd.com";
$DIR = 'temp/';
if(!file_exists($DIR)){
    mkdir($DIR);
}
$filenameQR = $DIR.'QR';

// cargar datos del formulario
$FirstName = trim($_POST["FirstName"]);
$MiddleName = trim($_POST["MiddleName"]);
$LastName = trim($_POST["LastName"]);
$SecondLastName = trim($_POST["SecondLastName"]);
$Phone = trim($_POST["Phone"]);
$Email = trim($_POST["Email"]);
$City = trim($_POST["City"]);
$Colegio = $_POST['Codigo_Colegio'];
$Curso = $_POST['field_name'];
$Sigla = $_POST['field_name2'];
$Asesor = $_POST['Asesor'];
$registro = $_POST['Registro'];
$Perfil = trim($_POST["Perfil"]);

// buscar codigo de licencia libre y generar contraseña
$query = "SELECT LicenceId, Code FROM Licence WHERE Type = 'P' AND UserId IS NULL LIMIT 1";
$result = $link->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $codigoDocente = $row["Code"];
    $IdLicenceToChange = $row["LicenceId"];
  }else{
    //generar licencia nueva
    echo "el sistema no encontró licencias disponibles";
    return;
  }

$password = md5($codigoDocente);

// Verificar email
$verificar = mysqli_query($link, "SELECT * FROM User WHERE Email = '$Email'");
if (mysqli_num_rows($verificar) > 0){
    echo "El Email ya está registrado";
    return;
}

// generar nombre de usuario
$convertedFirstName = transliterator_transliterate('Any-Latin; Latin-ASCII;', $FirstName);
$convertedLastName = transliterator_transliterate('Any-Latin; Latin-ASCII;', $LastName);

switch ($Perfil) {
    case "Asesor":
        $userName = "asr.$convertedFirstName.$convertedLastName";
        $Rol = "Asesor";
        break;
    case "Soporte":
        $userName = "spt.$convertedFirstName.$convertedLastName";
        $Rol = "Soporte";
        break;
    default:
        $userName = "prf.$convertedFirstName.$convertedLastName";
        $Rol = "Profesor";
        break;
}

$userName = strtolower($userName);
$verificar_usuario = mysqli_query($link, "SELECT * FROM User WHERE UserName = '$userName'");
$a = 0;
if (mysqli_num_rows($verificar_usuario) > 0) {
    while (true) {
        $a++;
        $newUserName = sprintf('%s%d', $userName, $a);
        $verificar_usuario = mysqli_query($link, "SELECT * FROM User WHERE UserName = '$newUserName'");
        if (mysqli_num_rows($verificar_usuario) == 0) {
            $userName = $newUserName;
            break;
        }
    }
}

// actualizar asesor

$sql_asesor = "UPDATE PreDocentes SET asesor = '$Asesor' WHERE Id_preDocente = $registro";
if (mysqli_query($link, $sql_asesor)) {
    echo "Registro actualizado exitosamente.";
} else {
    echo "Error al actualizar el registro: " . mysqli_error($link);
}

// Insertar usuario
$insertar = "INSERT INTO User(FirstName, MiddleName, LastName, SecondLastName, City, Email, UserName, Password, Phone, Rol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt_user = mysqli_prepare($link, $insertar);
mysqli_stmt_bind_param($stmt_user, "ssssssssss", $FirstName, $MiddleName, $LastName, $SecondLastName, $City, $Email, $userName, $password, $Phone, $Rol);
$resultado = mysqli_stmt_execute($stmt_user);
if(!$resultado){
    echo "Error de conexión, contacte al servicio de administración";
    return;
}
$idTeacher = mysqli_insert_id($link);
if($idTeacher == 0){
    echo "Error al crear cuenta, contacte al servicio de administración";
    return;
}
$old_path = getcwd();
chdir('/var/www/html/moodle/moodle/auth/db/cli/');
$output=shell_exec('php sync_users.php');
chdir($old_path); 

// Insertar Enrolment linea 209
for ($i=0;$i<count($Curso);$i++){
    
    $verificar_Colegio =  $Colegio[$i];
    $verificar_Cursos =  $Curso[$i];
    $verificar_Sigla =  $Sigla[$i];
    generarPassword($link, $verificar_Colegio);
    $codGrupo = generarPassword($link, $verificar_Colegio);
    buscarCurso($link, $verificar_Cursos);
    $courseNameFound = buscarCurso($link, $verificar_Cursos);
    $fullnamegroup = $userName.".".$i.".".$verificar_Sigla;
    $fullnamegroup = mb_strtolower($fullnamegroup, 'UTF-8');

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

mysqli_stmt_close($stmt_Enrolment);

// Código corregido
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


// generar codigos de grupo
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

//Crear el CSV con los valores provistos.
if ($Rol == "Soporte"){
    $sql = "SELECT FirstName as firstname, MiddleName as middlename, LastName as lastname, SecondLastName as alternatename, 'N/A' as 'Institution', City as city, Phone as phone1,Email as email, Address as address, Username as username, enr.CourseName as course1, enr.GroupFullName as group1, enr.GroupKey as enrolmentkey1,  '1' as Type1, 'editingteacher' as 'role1', '0' as 'enrolstatus1' FROM User usr INNER JOIN Enrolment enr ON usr.UserId = enr.UserId WHERE usr.UserId=$idTeacher";
}else{
    $sql = "SELECT FirstName as firstname, MiddleName as middlename, LastName as lastname, SecondLastName as alternatename, 'N/A' as 'Institution', City as city, Phone as phone1,Email as email, Address as address, Username as username, enr.CourseName as course1, enr.GroupFullName as group1, enr.GroupKey as enrolmentkey1,  '1' as Type1, 'teacher' as 'role1', '0' as 'enrolstatus1' FROM User usr INNER JOIN Enrolment enr ON usr.UserId = enr.UserId WHERE usr.UserId=$idTeacher";
}

$file=fopen("../admin/tool/uploadusercli/cli/PlantillaProfesor".$idTeacher.".csv","w+");
chmod("../admin/tool/uploadusercli/cli/PlantillaProfesor".$idTeacher.".csv", 0777);
fwrite($file, "\xEF\xBB\xBF"); // Agregar BOM para indicar que el archivo está en UTF-8

try {
    if ($result = $link->query($sql)) {
            $header = true;
            while ($row = $result->fetch_assoc()) {
                 if($header){
                        fputcsv($file, array_keys($row));
                        $header = false;
                    }
                    fputcsv($file,$row);
            }
        }

    }catch(Extepction $e){
         $form_err = "Error: ".$e->getMessage();
         fclose($file);
         $lockbutton = false;
        return;
    }finally {
        fclose($file);
    }
//Cambiar el estado de la licencia a A y actualizar el ID de usuario
$sql = "UPDATE Licence SET  UserId = ?, Status = 'A' WHERE LicenceId = ?";

if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ii", $idTeacher ,$IdLicenceToChange);
    if(!mysqli_stmt_execute($stmt)){
        return;
    }
}

mysqli_stmt_close($stmt);

$old_path = getcwd();
chdir('/var/www/html/moodle/moodle/admin/tool/uploadusercli/cli/');
$output=shell_exec('php uploadusercli.php --mode=update --updatemode=missingonly --forcepasswordchange=all --file=PlantillaProfesor'.$idTeacher.'.csv');
sleep(3);
unlink("PlantillaProfesor".$idTeacher.'.csv');
chdir($old_path);

$filenameQR_change = $filenameQR.'change.png';
$tamanio2 = 10;
$level2 = 'M';
$frameSize2 = 2;
$contenido2 = $dominio.'/moodle/dinapage/LoginPasswordChange.php?3m4il='.urlencode($userName).'&cl4v3='.urlencode($codigoDocente);
QRcode::png($contenido2, $filenameQR_change, $level2, $tamanio2, $frameSize2);

$mailSender = new MailDispatcher(); 
$mailSender->sendEmaiToTeacher($Email, $idTeacher, $userName, $codigoDocente, $Rol);

forcePasswordChange($Email);
ActivateAccount($Email);

$stmt = $link->prepare("UPDATE PreDocentes SET confirmado = 1 WHERE email = ?");
$stmt->bind_param("s", $Email);
$stmt->execute();
$stmt->close();

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

echo "Contenido de la carpeta eliminado exitosamente.";

header("location: VerificacionDocente.php");
?>