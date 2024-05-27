<?php

if(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $email = $_POST['email'];
} else {
    die("ERROR: email is not set or not valid.");
}

require_once('../../config-ext.php');
$sql = "SELECT u.FirstName, u.MiddleName, u.LastName, u.SecondLastName, u.Phone, a.id_usuario
FROM User u
LEFT JOIN asesores a ON u.UserId = a.id_docente
WHERE u.Email = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()){
        echo $row['FirstName'].",".$row['MiddleName'].",".$row['LastName'].",".$row['SecondLastName'].",".$row['Phone'].",".$row['id_usuario'];
    }
} else {
    $sql_1 = "SELECT * FROM PreDocentes WHERE email = ?";
    $stmt_1 = $link->prepare($sql_1);
    $stmt_1->bind_param("s", $email);
    $stmt_1->execute();
    $result_1 = $stmt_1->get_result();
    if ($result_1->num_rows > 0) {
        $row = $result_1->fetch_assoc();
        $confirmado = $row['confirmado'];
        if($confirmado == 1){
            echo "no";
        }else{
            echo "si";
        }
    }else{
        echo "no";
    }

    $stmt_1->close();
}

$stmt->close();
$link->close();
?>