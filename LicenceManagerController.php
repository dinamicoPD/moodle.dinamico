<?php
// Include config file
//define('__ROOT__',dirname(dirname(dirname(__FILE__))));
//require_once(__ROOT__.'/config-ext.php');

require_once('../../config-ext.php');

include('Mailer.php');
//require(__ROOT__.'/moodle/vendor/autoload.php');

//use PhpOffice\PhpSpreadsheet\Spreadsheet;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class User{ 

    private $licenceTable = 'Licence';
    private $userTable = 'User';
    public function userList(){
        //$sqlQuery = "SELECT UserId, FirstName, LastName, Email, UserName, Rol FROM ".$this->usrTable." ";
        $sqlQuery="SELECT usr.UserId as UserId, lic.LicenceId as LicenceId, FirstName, LastName, Email,UserName,Rol, StartDate, FinishDate, Title, Code, Type,Status FROM Licence lic LEFT JOIN User usr ON lic.UserId = usr.UserId ";
            if(!empty($_POST["search"]["value"])){
            $sqlQuery .= 'where(LicenceId LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR FirstName LIKE "%'.$_POST["search"]["value"].'%" ';            
            $sqlQuery .= ' OR LastName LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR Email LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR UserName LIKE "%'.$_POST["search"]["value"].'%" '; 
            $sqlQuery .= ' OR Code LIKE "%'.$_POST["search"]["value"].'%" ';         
            $sqlQuery .= ' OR Type LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR Title LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR Rol LIKE "%'.$_POST["search"]["value"].'%") '; 
        }
        if(!empty($_POST["order"])){
                $sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }else{
                $sqlQuery .= 'ORDER BY LicenceId DESC ';
        }
        if($_POST["length"] != -1){
                $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        
        //$result = mysqli_query($link, $sqlQuery);
        //error_log($sqlQuery);
        $sql = "SELECT lic.LicenceId as LicenceId, FirstName, LastName, Email, UserName, StartDate, FinishDate, Title,Code, Type, Status, usr.UserId AS UserId FROM
            Licence lic LEFT JOIN User usr ON lic.UserId = usr.UserId ";  
        $numRows =0;
        $licenceData = array();
        //error_log("Server name:".DB_SERVER);
        //Take the data from the teacher provided.
        if($stmt = $link->query($sql)){
            $numRows = $stmt->num_rows;
        }
        //mysqli_stmt_close($stmt);
        //$numRows = 5;
        if($stmt = $link->query($sqlQuery)){
            while($employee = $stmt->fetch_assoc()) {
                $empRows = array();
                $empRows[] = $employee['LicenceId'];
                $empRows[] = ucfirst($employee['FirstName']);
                $empRows[] = $employee['LastName'];      
                $empRows[] = $employee['Email'];   
                $empRows[] = $employee['UserName'];
                $empRows[] = $employee['FinishDate'];
                $empRows[] = $employee['Title'];
                $empRows[] = $employee['Code'];

                //$empRows[] = $employee['Type'];
                if($employee['Type'] == "P"){
                     $empRows[] = 'Profesor';
                }else{
                    $empRows[] = 'Estudiante';
                }



                 if($employee['Status'] == 'W'){
                    $empRows[] = "Espera";
                 }else if($employee['Status'] == 'I'){
                     $empRows[] = "Inactiva";
                 }else if($employee['Status'] == 'A'){
                     $empRows[] = "Activa";
                 }else if($employee['Status'] == 'O'){
                    $empRows[] = "Abierta";
                 }else{
                    $empRows[] = $employee['Status'];
                 }

                 
                
                if($employee['Status'] != 'I'){
                    $empRows[] = '<button type="button" name="update" id="'.$employee["LicenceId"].'" class="btn btn-warning btn-xs update">Actualizar</button>';
                 }else{
                    $empRows[] = '<button type="button" name="update" id="'.$employee["LicenceId"].'" class="btn btn-success btn-xs update">Actualizar</button>';
                 }
               
                if($employee['Status'] == 'O'){
                    $empRows[] = '<button type="button" name="delete" id="'.$employee["LicenceId"].'" class="btn btn-danger btn-xs delete" >Borrar</button>';
                }else if($employee['Status'] != 'I'){
                    $empRows[] = '<button type="button" name="delete" id="'.$employee["LicenceId"].'" class="btn btn-danger btn-xs delete" >Inactivar</button>';
                }else{
                    $empRows[] = "";
                }
                if($employee['Type'] == "P" && $employee['Status'] != 'O'){
                    $empRows[] = '<button type="button" name="description" id="'.$employee["UserId"].'" class="btn btn-info btn-xs description-teacher" >Grupos</button>';
                }else if($employee['Type'] == "E" && $employee['Status'] != 'O'){
                    $empRows[] = '<button type="button" name="description" id="'.$employee["UserId"].'" class="btn btn-info btn-xs description-student" >Grupos</button>';  
                }else{
                    $empRows[] = "";
                }

                if($employee['Status'] != 'O'){
                    $empRows[] = '<button type="button" name="password-change" id="'.$employee["LicenceId"].'" class="btn btn-secondary btn-xs passchange" >Cambio Password</button>'; 
                }else{
                    $empRows[] = "";
                }


                $licenceData[] = $empRows;
            }
        }


            $output = array(
                "draw"              =>  intval($_POST["draw"]),
                "recordsTotal"      =>  $numRows,
                "recordsFiltered"   =>  $numRows,
                "data"              =>  $licenceData
            );
            echo json_encode($output);
            //mysqli_stmt_close($stmt);
    }
    public function addLicence(){

        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        $timeLicenceCreation = new DateTime('NOW');

        $rolLicence = $_POST["licRol"];
        $licenceCode = trim($_POST["licCode"]);
        $licenceTitle = trim($_POST["licName"]);
        $expirationDate = strtotime(trim($_POST["licExpr"]));
        $dt = '2009-04-30 10:09:00';
        $dt2 = '2022-04-30 10:09:00';


        //Check that the code is fulfil our needs
        $password_err = "";
        $code = 0;
        if(strlen($licenceCode)<8 && empty($password_err)){
            $password_err = "El código debe estár compuesto de más de 8 caracteres";
            $code =1;
        }
        if(!preg_match('/([0-9])/',$licenceCode) && empty($password_err)){
            $password_err = "El código debe tener un número";
            $code =1;
        }
        if(!preg_match('/([ña-z])/',$licenceCode) && empty($password_err)){
            $password_err = "El código debe tener una letra en Minúscula";
             $code =1;
        }
        if(!preg_match('/([ÑA-Z])/',$licenceCode) && empty($password_err)){
            $password_err = "El código debe tener una letra en Mayúscula";
            $code =1;
        }
        if(!preg_match('/([^ña-zÑA-Z0-9_])/',$licenceCode) && empty($password_err)){
            $password_err = "El código debe tener un caracter no alfanúmerico";
            $code =1;
        }



        $verificar_licencia = mysqli_query($link, "SELECT * FROM Licence WHERE Code = '$licenceCode'");

        if(mysqli_num_rows($verificar_licencia) > 0){
            $password_err = "El código ya se encuentra en uso en base de datos, por favor establezca otro";
            $code =1;
        }

        if(!empty($password_err)){
            header('HTTP/1.1 500 Internal Server Error');
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => $password_err, 'code' => $code)));
        }




        $newformatexpiration = date('Y-m-d H:i:s',$expirationDate);
        $newformatCreation = $timeLicenceCreation->format('Y-m-d H:i:s');

        if($rolLicence == "Profesor"){
            $rolLicence = "P";
        }else{
            $rolLicence = "E";
        }
        $status = "O";
      
        $sql = "INSERT INTO Licence (Code, Type, Title, StartDate, FinishDate, Status) VALUES (?,?,?,?,?,?)";
         if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssss",$licenceCode,$rolLicence,$licenceTitle,$newformatCreation, $newformatexpiration,$status);
             if(!mysqli_stmt_execute($stmt)){
                 error_log("Error al crear licencia");
            }
         }
          mysqli_stmt_close($stmt);

    }
    public function addLicences(){
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $timeLicenceCreation = new DateTime('NOW');
        $rolLicence = $_POST["licRolMassive"];
        $licenceTitle = trim($_POST["licNameMassive"]);
        $licAmountMassive = trim($_POST["licAmountMassive"]);
        $expirationDate = strtotime(trim($_POST["licExprMassive"]));

        $newformatexpiration = date('Y-m-d H:i:s',$expirationDate);
        $newformatCreation = $timeLicenceCreation->format('Y-m-d H:i:s');

        if($rolLicence == "Profesor"){
            $rolLicence = "P";
        }else{
            $rolLicence = "E";
        }
        $status = "O";
        
        for($i = 0; $i<intval($licAmountMassive);$i++){
            //error_log("We are at value: ".$i);
            $licenceCode=self::generateNewLicenceCode();
            $sql = "INSERT INTO Licence (Code, Type, Title, StartDate, FinishDate, Status) VALUES (?,?,?,?,?,?)";
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "ssssss",$licenceCode,$rolLicence,$licenceTitle,$newformatCreation, $newformatexpiration,$status);
                if(!mysqli_stmt_execute($stmt)){
                 error_log("Error al crear licencia (Masivo)");
                }
            }
        }
       
        mysqli_stmt_close($stmt); 
    }
    public function getLicence(){
        if($_POST["licId"]) {
            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
            $sqlQuery = "
                SELECT * FROM Licence 
                WHERE LicenceId = '".$_POST["licId"]."'";
            $result = mysqli_query($link, $sqlQuery);    
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $date=strtotime($row["FinishDate"]);
            $row["FinishDate"] = date("Y-m-d", $date); 
            echo json_encode($row);
        }
    }
    public function updateLicence(){
        if($_POST["licId"]) {
            //Get the licence current status
            //(W) can be updated without an issue (Expiration Date, Title ,Code)
            //(O) Can be updated in the same way as above
            //(I) Allows to update the same things as above but Will change the status to W.
            //(A) Both the title and date can be updated.

            $modificationDate = new DateTime('NOW');
            $newformatedModification = $modificationDate->format('Y-m-d H:i:s');

            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
            $sqlQuery = "SELECT Status FROM Licence WHERE LicenceId = '".$_POST["licId"]."'";
            $result = mysqli_query($link, $sqlQuery);    
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $expirationDate = strtotime(trim($_POST["licExpr"]));
            $newformatexpiration = date('Y-m-d H:i:s',$expirationDate);

            $licenceCode=trim($_POST["licCode"]);
            if($row['Status'] != "A"){
                $password_err = "";
                $code = 0;
                if(strlen($licenceCode)<8 && empty($password_err)){
                    $password_err = "El código debe estár compuesto de más de 8 caracteres";
                    $code =1;
                }
                if(!preg_match('/([0-9])/',$licenceCode) && empty($password_err)){
                    $password_err = "El código debe tener un número";
                    $code =1;
                }
                if(!preg_match('/([ña-z])/',$licenceCode) && empty($password_err)){
                    $password_err = "El código debe tener una letra en Minúscula";
                     $code =1;
                }
                if(!preg_match('/([ÑA-Z])/',$licenceCode) && empty($password_err)){
                    $password_err = "El código debe tener una letra en Mayúscula";
                    $code =1;
                }
                if(!preg_match('/([^ña-zÑA-Z0-9_])/',$licenceCode) && empty($password_err)){
                    $password_err = "El código debe tener un caracter no alfanúmerico";
                    $code =1;
                }

                $licenceId=$_POST["licId"];
                $verificar_licencia = mysqli_query($link, "SELECT * FROM Licence WHERE Code = '$licenceCode' AND LicenceId <> $licenceId");

                if(mysqli_num_rows($verificar_licencia) > 0){
                    $password_err = "El código ya se encuentra en uso en base de datos, por favor establezca otro";
                    $code =1;
                }

                if(!empty($password_err)){
                    header('HTTP/1.1 500 Internal Server Error');
                    header('Content-Type: application/json; charset=UTF-8');
                    die(json_encode(array('message' => $password_err, 'code' => $code)));
                }
            }
            
            if($row['Status'] == "O" || $row['Status'] == "W")
            {
                $updateQuery = "UPDATE Licence SET Code = '".$licenceCode."', StartDate = '".$newformatedModification."', Title = '".trim($_POST["licName"])."', FinishDate = '".$newformatexpiration."' WHERE LicenceId ='".$_POST["licId"]."'";
            }else if($row['Status'] == "A"){
                $updateQuery = "UPDATE Licence SET StartDate = '".$newformatedModification."',Title = '".$_POST["licName"]."', FinishDate = '".$newformatexpiration."' WHERE LicenceId ='".$_POST["licId"]."'";
            }else if ($row['Status'] == "I" && ($newformatexpiration > $newformatedModification)){
                $updateQuery = "UPDATE Licence SET Code = '".$_POST["licCode"]."', StartDate = '".$newformatedModification."', Title = '".$_POST["licName"]."', FinishDate = '".$newformatexpiration."', Status = 'W' WHERE LicenceId ='".$_POST["licId"]."'";
            }

            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
            $isUpdated = mysqli_query($link, $updateQuery);
            if(!$isUpdated){
                error_log("LicenceManagerController - updateLicence - No se pudo actualizar la base de datos");
            }
        }
    }
    public function deleteAndInactivateLicence(){
        if($_POST["licId"]) {
            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
            $sqlQuery = "SELECT UserId,Status,Type FROM Licence WHERE LicenceId = '".$_POST["licId"]."'";
            $result = mysqli_query($link, $sqlQuery);    
            $licence = mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            $modificationDate = new DateTime('NOW');
            $newformatedModification = $modificationDate->format('Y-m-d H:i:s');

            if($licence['Status'] == "O"){
                 $sqlDelete = "DELETE FROM Licence
                        WHERE LicenceId = '".$_POST["licId"]."'";      
                    mysqli_query($link, $sqlDelete);     
            }else{

                 $sqlUpdate = "UPDATE Licence SET Status = 'I', StartDate = '"
                .$newformatedModification."', FinishDate = '"
                .$newformatedModification."' WHERE LicenceId = '".$_POST["licId"]."'";
            }

            if ($licence['Status'] == "W"){ 

                 mysqli_query($link, $sqlUpdate);  
            }else if($licence['Status'] == "A"){
                mysqli_query($link, $sqlUpdate);
                //Get user's email
                $sqlQuery = "SELECT Email FROM User WHERE UserId = '".$licence['UserId']."'";
                $result = mysqli_query($link, $sqlQuery);    
                $userFound = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $link2 = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_MOODLE);
                //error_log("DEBUG: Email found: ". $userFound["Email"]);

                  $sqlQuery = "UPDATE mdl_user SET suspended = 1 WHERE Email = '".$userFound['Email']."'";
                  mysqli_query($link2, $sqlQuery);
            }else{
                error_log("LicenceManagerController - deleteAndInactivateLicence - Estado no encontrado, no se puede elminar registro");
            }
            $unlinkString="";
            $commandToExecute="";

            //Suspend the user in the group/course
            if($licence['Type']=='P'){
                $idTeacher=$licence['UserId'];
                $sql = "SELECT FirstName as firstname, MiddleName as middlename, LastName as lastname, SecondLastName as alternatename, 'N/A' as 'Institution', City as city, Phone as phone1,Email as email, Address as address, Username as username, enr.CourseName as course1, enr.GroupFullName as group1, enr.GroupKey as enrolmentkey1,  '2' as Type1, 'editingteacher' as 'role1', '1' as 'enrolstatus1' FROM User usr INNER JOIN Enrolment enr ON usr.UserId = enr.UserId WHERE usr.UserId=$idTeacher";

                $commandToExecute= 'php uploadusercli.php --mode=update --updatemode=missingonly --forcepasswordchange=all --file=PlantillaProfesor'.$idTeacher.'.csv';

                $unlinkString = "PlantillaProfesor".$idTeacher.'.csv';

                $file=fopen("../admin/tool/uploadusercli/cli/PlantillaProfesor".$idTeacher.".csv","w+");

            }else{//$licence['Type']=='E'
                $IdStudent = $licence['UserId'];
                 $sql = "SELECT FirstName as firstname, MiddleName as middlename, LastName as lastname, SecondLastName as alternatename, Institution as institution, City as city, Phone as phone1,Email as email, Address as address, Username as username, crs.ShortName as course1, grp.GrpName as group1, grp.EnrolmentKey as enrolmentkey1,  '1' as Type1, 'student' as 'role1', '1' as 'enrolstatus1' FROM User usr INNER JOIN Classroom clsrm ON usr.UserId = clsrm.UserId INNER JOIN UserGrp grp ON clsrm.UserGrpId = grp.UserGrpId INNER JOIN Course crs ON grp.CourseId = crs.CourseId WHERE usr.UserId =$IdStudent";

                $commandToExecute='php uploadusercli.php --mode=update --updatemode=missingonly --forcepasswordchange=all --file=PlantillaEstudiante'.$IdStudent.'.csv';

                 $unlinkString = "PlantillaEstudiante".$IdStudent.'.csv';


                 $file=fopen("../admin/tool/uploadusercli/cli/PlantillaEstudiante".$IdStudent.".csv","w+");
            }
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
                 //$form_err = "Error: ".$e->getMessage();
                 error_log("LicenceManagerController - deleteAndInactivateLicence - Error :".$e->getMessage());
                 fclose($file);
                return;
            }finally {
                fclose($file);
            }

            $old_path = getcwd();
            chdir('/var/www/html/moodle/moodle/admin/tool/uploadusercli/cli/');
            $output=shell_exec($commandToExecute);
            unlink($unlinkString);
            chdir($old_path);

         }
    }
    private function generateNewLicenceCode(){
         $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!#$%&/)+=*";
         $maxNumberChar = 7;
        do{
            for($j=0;$j<$maxNumberChar;$j++) {
            //obtenemos un caracter aleatorio escogido de la cadena de caracteres
             $password .= substr($str,rand(0,62),1);
            }
            $password .= substr($str,rand(63,72),1);

            if(!preg_match('/([0-9])/',$password)){
            //$password_err = "La contraseña debe tener un número";
                $password .= substr($str,rand(53,62),1);
            }
            if(!preg_match('/([ña-z])/',$password)){
                //$password_err = "La contraseña debe tener una letra en Minúscula";
                $password .= substr($str,rand(27,52),1);
            }
            if(!preg_match('/([ÑA-Z])/',$password)){
                //$password_err = "La contraseña debe tener una letra en Mayúscula";
                $password .= substr($str,rand(0,26),1);
            }
            if(!preg_match('/([^ña-zÑA-Z0-9_])/',$password)){
                //$password_err = "La contraseña debe tener un caracter no alfanúmerico";
                $password .= substr($str,rand(63,72),1);
            }
          
            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

            $maxNumberChar = 1;

            $verificar_licencia = mysqli_query($link, "SELECT * FROM Licence WHERE Code = '$password'");
            
         }while(mysqli_num_rows($verificar_licencia) > 0);
         return $password;
    }
    public function getNewLicenceCode(){
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!#$%&/)+=*";
        $maxNumberChar = 7;
        do{
            for($j=0;$j<$maxNumberChar;$j++) {
            //obtenemos un caracter aleatorio escogido de la cadena de caracteres
             $password .= substr($str,rand(0,62),1);
            }
            $password .= substr($str,rand(63,72),1);

            if(!preg_match('/([0-9])/',$password)){
            //$password_err = "La contraseña debe tener un número";
                $password .= substr($str,rand(53,62),1);
            }
            if(!preg_match('/([ña-z])/',$password)){
                //$password_err = "La contraseña debe tener una letra en Minúscula";
                $password .= substr($str,rand(27,52),1);
            }
            if(!preg_match('/([ÑA-Z])/',$password)){
                //$password_err = "La contraseña debe tener una letra en Mayúscula";
                $password .= substr($str,rand(0,26),1);
            }
            if(!preg_match('/([^ña-zÑA-Z0-9_])/',$password)){
                //$password_err = "La contraseña debe tener un caracter no alfanúmerico";
                $password .= substr($str,rand(63,72),1);
            }
          
            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

            $maxNumberChar = 1;

            $verificar_licencia = mysqli_query($link, "SELECT * FROM Licence WHERE Code = '$password'");
            
         }while(mysqli_num_rows($verificar_licencia) > 0);

            $licenceCode['LicCode'] = $password;

            echo json_encode($licenceCode);
    }
    public function getListStudetGroups(){
        if(!$_POST["idStudent"]) {
            return;
         }
        $idStudent = $_POST["idStudent"];
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        
        //$result = mysqli_query($link, $sqlQuery);
        //error_log($sqlQuery);
        $sql = "SELECT grp.UserGrpId as GroupId, crs.ShortName as CourseName, grp.GrpName as GroupName FROM User usr INNER JOIN Classroom clsrm ON usr.UserId = clsrm.UserId INNER JOIN UserGrp grp ON clsrm.UserGrpId = grp.UserGrpId INNER JOIN Course crs ON grp.CourseId = crs.CourseId WHERE usr.UserId = $idStudent";  
        $numRows =0;
        $grpData = array();
        //error_log("Server name:".DB_SERVER);
        //Take the data from the teacher provided.
        if($stmt = $link->query($sql)){
            $numRows = $stmt->num_rows;
        }
        //mysqli_stmt_close($stmt);
        //$numRows = 5;
        if($stmt = $link->query($sql)){
            while($group = $stmt->fetch_assoc()) {
                $grpRows = array();
                $grpRows[] = $group['GroupId'];
                $grpRows[] = $group['CourseName'];
                $grpRows[] = $group['GroupName'];
                $grpData[] = $grpRows;
            }
        }

            $output = array(
                "draw"              =>  intval($_POST["draw"]),
                "recordsTotal"      =>  $numRows,
                "recordsFiltered"   =>  $numRows,
                "data"              =>  $grpData
            );
            echo json_encode($output);
            //mysqli_stmt_close($stmt);
    }
    public function getListTeachersGroup(){
         if(!$_POST["idTeacher"]) {
            return;
         }
        $idTeacher = $_POST["idTeacher"];
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        
        //$result = mysqli_query($link, $sqlQuery);
        //error_log($sqlQuery);
        $sql = "SELECT EnrolmentId, CourseName,GroupCode, GroupKey FROM Enrolment WHERE UserId = $idTeacher AND Uploaded = 1";  
        $numRows =0;
        $grpData = array();
        //error_log("Server name:".DB_SERVER);
        //Take the data from the teacher provided.
        if($stmt = $link->query($sql)){
            $numRows = $stmt->num_rows;
        }
        //mysqli_stmt_close($stmt);
        //$numRows = 5;
        if($stmt = $link->query($sql)){
            while($group = $stmt->fetch_assoc()) {
                $grpRows = array();
                $grpRows[] = $group['EnrolmentId'];
                $grpRows[] = $group['CourseName'];
                $grpRows[] = $group['GroupCode'];
                $grpRows[] = $group['GroupKey'];
                $grpData[] = $grpRows;
            }
        }

            $output = array(
                "draw"              =>  intval($_POST["draw"]),
                "recordsTotal"      =>  $numRows,
                "recordsFiltered"   =>  $numRows,
                "data"              =>  $grpData
            );
            echo json_encode($output);
            //mysqli_stmt_close($stmt);
    }
    public function forcePasswordChange(){
        if(!$_POST["licenceId"]){
            return;
        }

        //$password_err = "Error prueba";
        //$code = 20;
        
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        //Update password with the current licence code

        $sqlQuery = "
                SELECT * FROM Licence 
                WHERE LicenceId = '".$_POST["licenceId"]."'";
        $result = mysqli_query($link, $sqlQuery);    
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $userIdFound = $row["UserId"];
        $licenceCodeFound = $row["Code"];
        $sqlQuery = "UPDATE User SET Password = '".md5($row["Code"])."'
                    WHERE UserId =".$row["UserId"]."";


        mysqli_query($link, $sqlQuery);

        $sqlQuery = "SELECT UserName,Email FROM User 
                WHERE UserId = ".$userIdFound ."";
        $result = mysqli_query($link, $sqlQuery);    
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $emailFound = $row["Email"];
        $usernameFound = $row["UserName"];
        //error_log("Email Found:". $emailFound);

        mysqli_close($link);

        $link2 = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_MOODLE);


        $verificar_configuracion = mysqli_query($link2, "SELECT * FROM mdl_user_preferences WHERE userid = (SELECT id FROM mdl_user WHERE Email = '$emailFound') AND name = 'auth_forcepasswordchange'");

         //Validar que no exista el registro con el correo electronico. Luego insertar, de lo contrario se actualiza cambiando el valor de auth_forcepasswordchange = 1
         if(mysqli_num_rows($verificar_configuracion) > 0){
            $sql = "UPDATE mdl_user_preferences SET value = '1' WHERE userid = (SELECT id FROM mdl_user WHERE Email = ?) AND name = 'auth_forcepasswordchange'";
         }else{
            $sql = "INSERT INTO mdl_user_preferences (userid, name, value) VALUES ((SELECT id FROM mdl_user WHERE Email = ?),'auth_forcepasswordchange','1')";
         }

        if($stmt = mysqli_prepare($link2, $sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s",$emailFound);
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
              //Everything ok
            }else{
                $password_err="Error con la Base de Datos, contacte al administrador";
                error_log("LicenceManagerController - forcePasswordChange - ".$stmt->error);
            }
        }else{
                $password_err="Error con la Base de Datos, contacte al administrador";
                error_log("LicenceManagerController - forcePasswordChange - ".$stmt->error);
        }
        mysqli_stmt_close($stmt);


        if(!empty($password_err)){
            $code = 20;
            header('HTTP/1.1 500 Internal Server Error');
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => $password_err, 'code' => $code)));
        }else{     
            $mailSender = new MailDispatcher(); 
            $mailSender->sendEmailChangePassword($emailFound,$licenceCodeFound,$usernameFound);
        }

    }
    public function getExcelFile(){
        /*$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');

        $writer = new Xlsx($spreadsheet);
        $xlsData = ob_get_contents();
        $file_name = "kpi_form_".date("Y-m-d_H:i:s").".xls";
        header("Content-Disposition: attachment; filename=$file_name");
        $writer->save('php://output');
        /*$response =  array(
        'op' => 'ok',
        'file' => "data:application/vnd.ms-excel;base64,".base64_encode($xlsData)
        );
        die(json_encode($response));*/
    }
    /*public function responseToAjaxError($code, $message){
            $password_err ="Hello world";
            $code = 22;
            header('HTTP/1.1 500 Internal Server Error');
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => $password_err, 'code' => $code)));
    }*/
}

?>
