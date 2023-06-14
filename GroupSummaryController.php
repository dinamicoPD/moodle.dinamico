<?php
	// Initialize the session
	session_start();
	//define('__ROOT__',dirname(dirname(dirname(__FILE__))));
	//require_once(__ROOT__.'/config-ext.php');
	require_once('../../config-ext.php');
    include('SuspendAccount.php');
    include('Mailer.php');
	$varcloseecho=1;
	require_once('CourseController.php');
    $foundGroups = "";
    $form_err="";

    if(!isset($_SESSION["loginGroupsSummary"]) || $_SESSION["loginGroupsSummary"] != true){
    header("location: LoginPRF.php");
    exit;
    }
    $idTeacher = $_SESSION["teacherId"];
    //$idTeacher = 23;

	$optionsHTML="";
    $rowsToBeStored=array();
    if(!empty($rows)){
        foreach ($rows as $courseToStore) {
            $rowsToBeStored[$courseToStore->name] = $courseToStore->id;
        }
        $_SESSION["IdCoursesFound"] = $rowsToBeStored;
    }
    
    //TODO VERIFY THE LICENCE status... is the licence A or W?

    //Take the data from the teacher provided.
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $sql = "SELECT FirstName,MiddleName,LastName,SecondLastName,Phone,Email,City,UserName FROM User WHERE UserId = ".$idTeacher;
        if ($result = $link->query($sql)) {
            if ($row = $result->fetch_assoc()) {
                $FirstName = $row["FirstName"];
                $MiddleName = $row["MiddleName"];
                $LastName = $row["LastName"];
                $SecondLastName = $row["SecondLastName"];
                $Phone = $row["Phone"];
                $Email = $row["Email"];
                //$Institution = $row["Institution"];
                $City = $row["City"];
                $Username = $row["UserName"];
                //$Password = "123456";
             }
        }else{
                $form_err="Error de conexión con base de datos, contacte al servicio de administración";
                return;
        }


   $FullName = $FirstName . " " .  $LastName;

    foreach($rows as $tmpValeCourse){
        $optionsHTML.= "<option value=\"".$tmpValeCourse->id."\">".$tmpValeCourse->name."</option>";
    }

    $loadedGroups = "<div><select name=\"field_name[]\" id=\"curso\" required class=\"inputD\"><option disabled selected>Curso*</option>".$optionsHTML."</select><input type=\"text\" placeholder=\"sigla\" name=\"field_name2[]\" class=\"inputI\"><a href=\"javascript:void(0);\" class=\"add_button\" title=\"Add field\"><img src=\"img/add-icon.png\" /></a></div>";


     //Get the list of courses available from the table enrolment filtered by the Teacher's id.

     $foundGroups="";
     $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

     $sql = "SELECT CourseName, GroupCode, GroupKey FROM Enrolment WHERE UserId = ".$idTeacher." AND Uploaded = 1";
    if ($result = $link->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $foundGroups .= "<tr>";
                $foundGroups .="<td>".$row["CourseName"]."</td>";
                $foundGroups .="<td>".$row["GroupCode"]."</td>" ;
                $foundGroups .="<td>".$row["GroupKey"]."</td>"; 
                $foundGroups .="</tr>";
             }
        }else{
                $form_err="Error de conexión con base de datos, contacte al servicio de administración";
                return;
        }

    mysqli_stmt_close($stmt);

    if($_SERVER["REQUEST_METHOD"] != "POST"){
    return;
    }
    $closebutton = $_POST['closebutton'];
    if($closebutton){
        //cerrar sesion y redireccionar a home.
            session_destroy();
            header("Location: http://".$_SERVER['HTTP_HOST']."/moodle");
    }

    $rowsCourses=$_SESSION["IdCoursesFound"];
    //stores the values of Couse and Group provided
    $selectedValuesCourseGroup = array();
    $identifierCourseSelected = array();
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!#$%&/)+=*";
    $loadedGroups ="";
    $Curso = $_POST['field_name'];
    $Sigla = $_POST['field_name2'];

    for ($i=0;$i<=count($Curso);$i++){

        $coursesavailable="";
        $htmlgenerator="<div><select name=\"field_name[]\" id=\"curso\" required class=\"inputD\"><option disabled selected>Curso*</option>";

        foreach($rowsCourses as $key=>$value){
            if($value == $Curso[$i]){
                 $htmlgenerator .= "<option value=\"".$value."\" selected>".$key."</option>";
                $selectedValuesCourseGroup[] = $key.".".$Sigla[$i].".".$Username;
                $identifierCourseSelected[$key.".".$Sigla[$i].".".$Username] = $value; 
             }else{
                 $htmlgenerator .= "<option value=\"".$value."\">".$key."</option>";
             }
        }
        //$htmlgenerator.=$coursesavailable;
        $htmlgenerator.="</select>";
        if($i==0){
            $htmlgenerator.="<input type=\"text\" placeholder=\"sigla\" name=\"field_name2[]\" value=\"".$Sigla[$i]."\" class=\"inputI\"><a href=\"javascript:void(0);\" class=\"add_button\" title=\"Add field\"><img src=\"img/add-icon.png\" /></a></div>";  
        }else{
            $htmlgenerator.="<input type=\"text\" placeholder=\"sigla\" name=\"field_name2[]\" value=\"".$Sigla[$i]."\" class=\"inputI\"><a href=\"javascript:void(0);\" class=\"remove_button\"title=\"Remove field\"><img src=\"img/remove-icon.png\"/></a></div>";
        }

        $loadedGroups.=$htmlgenerator;
    }



    if(empty(trim($Curso[0]))){
        $form_err = "No ha ingresado Cursos/Grupos adicionales.";
        return;
    }

    $valuesStoredAtDBCourseGroup = array();
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    //Retrive the already existing groups from the enrolment table

    $sql = "SELECT GroupFullName FROM Enrolment WHERE UserId = $idTeacher AND Uploaded = 1";

    try {
        if ($result = $link->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $valuesStoredAtDBCourseGroup[] = $row["GroupFullName"];
            }
        }
    }catch(Extepction $e){
         $form_err = "Error: ".$e->getMessage();
        return;
    }
    $reultingArrayWithGroups = array_intersect($selectedValuesCourseGroup,$valuesStoredAtDBCourseGroup);
    
    $groupsToBeAddedAtDataBase=array_diff($selectedValuesCourseGroup,$reultingArrayWithGroups);


    if(empty($groupsToBeAddedAtDataBase)){
        $form_err =  "No hay nuevos Grupos por registrar";
        return;
    }
    $groupsToBeAddedAtDataBase=array_unique($groupsToBeAddedAtDataBase);
     /*var_dump($groupsToBeAddedAtDataBase);
     $form_err = "Hello".ob_get_clean();
     return;*/

    $valuesRequiredForEnrolment = array();
    $groupNamesMatchingIndex = array();//This will store the groups full names, indexes will start from 0, and will match with the splited array
    foreach($groupsToBeAddedAtDataBase as $value){
         $valuesRequiredForEnrolment[] = explode(".",$value);
         $groupNamesMatchingIndex[] = $value;
    }
    /*var_dump($valuesRequiredForEnrolment);
    $form_err = ob_get_clean();
    return;*/
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    $sql = "INSERT INTO Enrolment (UserId,CourseId,CourseName,GroupCode,GroupFullName,GroupKey) VALUES (?,?,?,?,?,?)";

    foreach ($valuesRequiredForEnrolment as $key => $value) {
        for($j=0;$j<8;$j++) {
        //obtenemos un caracter aleatorio escogido de la cadena de caracteres
        $password2 .= substr($str,rand(0,62),1);
        }
        $password2 .= substr($str,rand(63,72),1);

        if($stmt = mysqli_prepare($link, $sql)){
            $courseName = strval($value[0]);
            $groupCode =  strval($value[1]);
            $groupFullName=strval($groupNamesMatchingIndex[(int)$key]);
            $idCourse = $identifierCourseSelected[$groupFullName];
             /*$form_err =  "CourseName:". $courseName."</br>GroupCode:".$groupCode."</br>GroupFullName:".$groupFullName."</br>TeacherId:".$idTeacher."</br>Password:".$password2."</br>";
             return;*/
               $stmt->bind_param("iissss",$idTeacher,$idCourse,$courseName,$groupCode,$groupFullName,$password2);
               if(!mysqli_stmt_execute($stmt)){
                    error_log("Error: se esta intentando de ingresar el mismo grupo".$stmt->error_list[0]);
                    error_log("Nombre del grupo:".$groupFullName);
               }else{
                   mysqli_stmt_store_result($stmt);
               }
        }
        $password2 = "";
    }

    mysqli_stmt_close($stmt);


    $sql = "SELECT FirstName as firstname, MiddleName as middlename, LastName as lastname, SecondLastName as alternatename, 'N/A' as 'Institution', City as city, Phone as phone1,Email as email, Address as address, Username as username, enr.CourseName as course1, enr.GroupFullName as group1, enr.GroupKey as enrolmentkey1,  '1' as Type1, 'teacher' as 'role1', '0' as 'enrolstatus1' FROM User usr INNER JOIN Enrolment enr ON usr.UserId = enr.UserId WHERE usr.UserId=$idTeacher";

    $file=fopen("../admin/tool/uploadusercli/cli/PlantillaProfesor".$idTeacher.".csv","w+");
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
        return;
    }finally {
        fclose($file);
    }


      //Change the licence status to A and update the UserId

    $sql = "UPDATE Licence SET Status = 'A' WHERE UserId = ? AND Status = 'W'";


    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $idTeacher);
        if(!mysqli_stmt_execute($stmt)){
             $form_err = "Error al actualizar la licencia, contacte al servicio de administración";
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

    $mailSender = new MailDispatcher(); 
    $mailSender->sendEmaiToTeacher($Email, $idTeacher,$Username);


    ActivateAccount($Email);

    mysqli_close($link);
    mysqli_close($link2);



    header("Refresh:0");

    /*var_dump($groupsToBeAddedAtDataBase);
    $form_err =  ob_get_clean();
    return;*/

    /*for ($i=0;$i<count($Curso);$i++){
        $verificar_cursos =  mysqli_query($link, "SELECT * FROM Course WHERE CourseId = $Curso[$i]");
        if(mysqli_num_rows($verificar_cursos)==0){
                $form_err = "Algunos de los cursos seleccionados no son validos, por favor actualice la página";
            return;
        }
    }*/

?>
