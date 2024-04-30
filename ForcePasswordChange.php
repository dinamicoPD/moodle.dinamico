<?php
require_once('/var/www/html/moodle/config-ext.php');

function forcePasswordChange($email){
    try{
        $link2 = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_MOODLE);
        if($link2 === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $sql = "INSERT INTO mdl_user_preferences (userid, name, value) 
                SELECT id, 'auth_forcepasswordchange', '1'
                FROM mdl_user
                WHERE Email = ?";
        if($stmt = mysqli_prepare($link2, $sql)){
            $stmt->bind_param("s", $email);
            if(mysqli_stmt_execute($stmt)){
                // Todo está bien
            }else{
                $form_err= "Error con la Base de Datos, contacte al administrador";
                return;
            }
            mysqli_stmt_close($stmt);
        }else{
            $form_err= "Error con la Base de Datos, contacte al administrador";
            return;
        }
        mysqli_close($link2);
    }catch(Exception $w){
        $form_err= "Error con la Base de Datos, contacte al administrador";
        return;
    }
}
?>