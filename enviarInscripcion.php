<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (empty($_POST["FirstName"]) || empty($_POST["LastName"])) {
        header("location: admin/VerificacionDocente.php");
        exit;
    }
    
    include('ForcePasswordChange.php');
    include('SuspendAccount.php');  

    $FirstName = !empty($_POST["FirstName"]) ? formatearNombre(filter_var(trim($_POST["FirstName"]), FILTER_SANITIZE_STRING)) : "";
    $MiddleName = !empty($_POST["MiddleName"]) ? formatearNombre(filter_var(trim($_POST["MiddleName"]), FILTER_SANITIZE_STRING)) : "";
    $LastName = !empty($_POST["LastName"]) ? formatearNombre(filter_var(trim($_POST["LastName"]), FILTER_SANITIZE_STRING)) : "";
    $SecondLastName = !empty($_POST["SecondLastName"]) ? formatearNombre(filter_var(trim($_POST["SecondLastName"]), FILTER_SANITIZE_STRING)) : "";
    $Phone = filter_var(trim($_POST["Phone"]), FILTER_SANITIZE_NUMBER_INT);
    $City = filter_var(trim($_POST["City"]), FILTER_SANITIZE_STRING);
    $Email = filter_var(trim($_POST["Email"]), FILTER_SANITIZE_EMAIL);
    $Perfil = filter_var(trim($_POST["Perfil"]), FILTER_SANITIZE_STRING);
    $Asesor = !empty($_POST["Asesor"]) ? filter_var(trim($_POST['Asesor']), FILTER_SANITIZE_NUMBER_INT) : "";
    
    $Codigo_Colegio = [];
    if(isset($_POST['Codigo_Colegio']) && is_array($_POST['Codigo_Colegio'])){
        $Codigo_Colegio = array_map('intval', $_POST['Codigo_Colegio']);
    }
    
    $Curso = [];
    if(isset($_POST['field_name']) && is_array($_POST['field_name'])){
        $Curso = $_POST['field_name'];
    }
    
    $Sigla = [];
    if(isset($_POST['field_name2']) && is_array($_POST['field_name2'])){
        $Sigla = $_POST['field_name2'];
    }

    $DIR = 'temp/';
    if(!file_exists($DIR)){
        mkdir($DIR);
    }
    $filenameQR = $DIR.'QR';

    require_once('/var/www/html/moodle/config-ext.php');

    $docenteNuevo = docenteNuevo($link, $Email);

    if($docenteNuevo === "SI"){
        $Licence = buscarLicencia($link); //  $Licence["id"] //  $Licence["codigo"]
        $userName = generarNombreDeUsurario($link, $FirstName, $LastName, $Perfil);
        $idTeacher = insertarUsuario($link, $FirstName, $MiddleName, $LastName, $SecondLastName, $City, $Email, $userName, $Phone, $Perfil, $Licence["codigo"]);
        if($Asesor != ""){
            agregarAsesor($link, $idTeacher, $Asesor);
        }
        actualizarLicencia($link, $idTeacher, $Licence["id"]);

        crearGrupos($link, $Codigo_Colegio, $Curso, $Sigla, $userName, $idTeacher);
        insripcionAlcursoCSV($link, $idTeacher, $Perfil);
    
        $enlace = "https://dinamicopd.com/moodle/dinapage/LoginPasswordChange.php?3m4il=".urlencode($userName)."&cl4v3=".urlencode($Licence["codigo"]);
        $nombreArchivo = "change";
        generarQR($codGrupo, $enlace, $nombreArchivo);
        enviarEmail($Email, $idTeacher, $userName, $Licence["codigo"], $Perfil);
    
        forcePasswordChange($Email);
        ActivateAccount($Email);
    }else{
        $array_docenteNuevo = explode(",", $docenteNuevo);
        $Licence = array("id" => $array_docenteNuevo[2], "codigo" => $array_docenteNuevo[3]);
        $userName = $array_docenteNuevo[1];
        $idTeacher = $array_docenteNuevo[0];
        crearGrupos($link, $Codigo_Colegio, $Curso, $Sigla, $userName, $idTeacher);
        insripcionAlcursoCSV($link, $idTeacher, $Perfil);
        enviarEmail2($Email, $idTeacher, $userName);
    }


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
    eliminarRegistro($link, $Email);
    header("location: admin/VerificacionDocente.php");
}else{
    header("location: admin/VerificacionDocente.php");
    exit;
}
function eliminarRegistro($link, $email){
    $sql = "DELETE FROM PreDocentes WHERE email = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("s", $email);
    $result = $stmt->execute();
    return;
}
//-----------------------------------//
function enviarEmail2($Email, $idTeacher, $userName){
    require_once('Mailer.php');

    $mailSender = new MailDispatcher(); 
    $mailSender->sendEmaiToTeacher2($Email, $idTeacher, $userName);

    return;
}
//-----------------------------------//
function enviarEmail($Email, $idTeacher, $userName, $codigoDocente, $Rol){
    require_once('Mailer.php');

    $mailSender = new MailDispatcher(); 
    $mailSender->sendEmaiToTeacher($Email, $idTeacher, $userName, $codigoDocente, $Rol);

    return;
}
//-----------------------------------//
function actualizarLicencia($link, $idTeacher, $IdLicenceToChange){
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
    return;
}
//-----------------------------------//
function insripcionAlcursoCSV($link, $idTeacher, $Rol){
    if ($Rol === "Soporte"){
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
        fclose($file);
    }finally {
        fclose($file);
    }

    $old_path = getcwd();
    chdir('/var/www/html/moodle/moodle/admin/tool/uploadusercli/cli/');
    $output=shell_exec('php uploadusercli.php --mode=update --updatemode=missingonly --forcepasswordchange=all --file=PlantillaProfesor'.$idTeacher.'.csv');
    sleep(3);
    unlink("PlantillaProfesor".$idTeacher.'.csv');
    chdir($old_path);

    return;
}
//-----------------------------------//
function agregarAsesor($link, $idTeacher, $Asesor){
    $sql = "INSERT INTO asesores (id_docente,id_usuario) VALUES (?,?)";
    if($stmt = mysqli_prepare($link, $sql)){
        $stmt->bind_param("ii",$idTeacher,$Asesor);
        $resultado = mysqli_stmt_execute($stmt);
        if(!$resultado){
            echo "Error de conexión, contacte al servicio de administración";
            return;
        }
        $stmt->close();
    }
    return;
}
//-----------------------------------//
function crearGrupos($link, $Colegio, $Curso, $Sigla, $userName, $idTeacher){
    for ($i=0;$i<count($Curso);$i++){
        $verificar_Colegio =  $Colegio[$i];
        $verificar_Cursos =  $Curso[$i];
        $verificar_Sigla =  $Sigla[$i];
        $codGrupo = generarCodigoGrupo($link, $verificar_Colegio);
        $enlace="https://dinamicopd.com/moodle/dinapage/LoginSTD.php?d1n4m1c0=";
        generarQR($codGrupo, $enlace, $codGrupo);
        $courseNameFound = buscarCurso($link, $verificar_Cursos);
        $fullnamegroup = $userName.".".$i.".".$verificar_Sigla;
        $fullnamegroup = mb_strtolower($fullnamegroup, 'UTF-8');

        $sql_Enrolment = "INSERT INTO Enrolment (UserId,CourseId,CourseName,GroupCode,GroupFullName,GroupKey) VALUES (?,?,?,?,?,?)";
    
        if($stmt_Enrolment = mysqli_prepare($link, $sql_Enrolment)){

            $stmt_Enrolment->bind_param("iissss",$idTeacher,$verificar_Cursos,$courseNameFound,$verificar_Sigla,$fullnamegroup,$codGrupo);
            if(!mysqli_stmt_execute($stmt_Enrolment)){
                error_log("Error: se esta intentando de ingresar el mismo grupo".$stmt_Enrolment->error_list[0]);
                error_log("Nombre del grupo:".$fullnamegroup);
            }
        }
    }
    return;
    mysqli_stmt_close($stmt_Enrolment);
}
function generarCodigoGrupo($link, $verificar_Colegio) {
    $cadena = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $longitudCadena = strlen($cadena);
    $codGrupo = "";

    for($i = 0; $i < 8; $i++) {
        $randomPosicion = rand(0, $longitudCadena - 1);
        $codGrupo .= $cadena[$randomPosicion];
    }

    if (preg_match('/[A-Z]/', $codGrupo) && preg_match('/[a-z]/', $codGrupo) && preg_match('/[0-9]/', $codGrupo)) {
        $codGrupo_2 = $codGrupo."_".$verificar_Colegio;
        if (CodigoGrupoExists($link, $codGrupo_2)) {
            return generarCodigoGrupo($link, $verificar_Colegio);
        } else {
            return $codGrupo_2;
        }
    } else {
        return generarCodigoGrupo($link, $verificar_Colegio);
    }
}
function CodigoGrupoExists($link, $codGrupo) {
    if ($stmt = $link->prepare("SELECT Groupkey FROM Enrolment WHERE Groupkey = ?")) {
        $stmt->bind_param("s", $codGrupo);
        $stmt->execute();
        $stmt->store_result();
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
//-----------------------------------//
function generarQR($codGrupo, $enlace, $nombreArchivo){
    require_once 'phpqrcode/qrlib.php';
    $filenameQR_2 = 'temp/QR'.$nombreArchivo.'.png';
    $tamanio = 10;
    $level = 'M';
    $frameSize = 2;
    $contenido = $enlace.urlencode($codGrupo);
    QRcode::png($contenido, $filenameQR_2, $level, $tamanio, $frameSize);
    return;
}
//-----------------------------------//
function insertarUsuario($link, $FirstName, $MiddleName, $LastName, $SecondLastName, $City, $Email, $userName, $Phone, $Rol, $codigoDocente){
    $password = md5($codigoDocente);
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

    return $idTeacher;
}
//-----------------------------------//
function generarNombreDeUsurario($link, $FirstName, $LastName, $Perfil){
    $convertedFirstName = transliterator_transliterate('Any-Latin; Latin-ASCII;', $FirstName);
    $convertedLastName = transliterator_transliterate('Any-Latin; Latin-ASCII;', $LastName);

    switch ($Perfil) {
        case "Asesor":
            $userName = "asr.$convertedFirstName.$convertedLastName";
            break;
        case "Soporte":
            $userName = "spt.$convertedFirstName.$convertedLastName";
            break;
        default:
            $userName = "prf.$convertedFirstName.$convertedLastName";
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

    return $userName;
}
//-----------------------------------//
function docenteNuevo($link, $Email){
    $stmt = mysqli_prepare($link, "SELECT u.UserId, u.UserName, l.LicenceId, l.Code  FROM User u JOIN Licence l ON u.UserId = l.UserId WHERE Email = ?");
    mysqli_stmt_bind_param($stmt, "s", $Email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    
    if (mysqli_stmt_num_rows($stmt) > 0){
        // El email ya está registrado
        $userInfo = "";
        mysqli_stmt_bind_result($stmt, $UserId, $UserName, $LicenceId, $Code);
        while (mysqli_stmt_fetch($stmt)) {
            $userInfo .= $UserId . "," . $UserName . "," . $LicenceId . "," . $Code;
        }
        mysqli_stmt_close($stmt);
        return $userInfo;
    } else {
        // El email no está registrado
        mysqli_stmt_close($stmt);
        return "SI";
    }
}
//-----------------------------------//
function formatearNombre($cadena){
    $cadenaMinusculas = strtolower($cadena);
    $cadenaFormateada = ucfirst($cadenaMinusculas);
    return $cadenaFormateada;
}
//-----------------------------------//
function buscarLicencia($link){
    $query = "SELECT LicenceId, Code, StartDate FROM Licence WHERE Type = 'P' AND UserId IS NULL LIMIT 1";
    $result = $link->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $codigoDocente = $row["Code"];
        $IdLicenceToChange = $row["LicenceId"];
    } else {
        $query = "SELECT LicenceId, Code, StartDate FROM Licence WHERE Type = 'E' AND UserId IS NULL AND YEAR(StartDate) < YEAR(CURDATE()) - 1 LIMIT 1";
        $result = $link->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $codigoDocente = $row["Code"];
            $IdLicenceToChange = $row["LicenceId"];
            $updateQuery = "UPDATE Licence SET Type = 'P' WHERE LicenceId = $IdLicenceToChange";
            $link->query($updateQuery);
        } else {
            $codigoDocente = generarCodigo($link);
            $IdLicenceToChange = cargarNuevoCodigo($link, $codigoDocente);
        }
    }
    $codigoUsuario = array("id" => $IdLicenceToChange, "codigo" => $codigoDocente);
    return $codigoUsuario;
}

function cargarNuevoCodigo($link, $codigoDocente){
    $rol = "P";
    $tituloLicencias = "nuevoDocente";
    $fechaActual = date("Y-m-d H:i:s");
    $nuevaFecha = date("Y-m-d H:i:s", strtotime('+1 year', strtotime($fechaActual)));

    $stmt = $link->prepare("INSERT Licence SET Type = ?, Code = ?, Title = ?, StartDate = ?, FinishDate = ?");
    $stmt->bind_param("sssss", $rol, $codigoDocente, $tituloLicencias, $fechaActual, $nuevaFecha);
    $stmt->execute();
    $nuevoId = $link->insert_id;
    $stmt->close();
    return $nuevoId;
}

function generarCodigo($link) {
    $cadena = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#$%&/)+=*";
    $longitudCadena = strlen($cadena);
    $codigoGenerar = "";

    for($i = 0; $i < 8; $i++) {
        $randomPosicion = rand(0, $longitudCadena - 1);
        $codigoGenerar .= $cadena[$randomPosicion];
    }

    if (preg_match('/[A-Z]/', $codigoGenerar) && preg_match('/[a-z]/', $codigoGenerar) && preg_match('/[0-9]/', $codigoGenerar) && preg_match('/[!#\$%&\/\)\+\=\*]/', $codigoGenerar)) {
        
        if (passwordExists($link, $codigoGenerar)) {
            return generarCodigo($link);
        } else {
            return $codigoGenerar;
        }
    } else {
        return generarCodigo($link);
    }
}

function passwordExists($link, $codigoGenerar) {
    if ($stmt = $link->prepare("SELECT Code FROM Licence WHERE Code = ?")) {
        $stmt->bind_param("s", $codigoGenerar);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        echo "Error preparando la consulta: " . $link->error;
    }
}
?>