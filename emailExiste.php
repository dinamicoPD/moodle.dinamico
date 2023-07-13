<?php

if(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $email = $_POST['email'];
} else {
    die("ERROR: email is not set or not valid.");
}

require_once('../../config-ext.php');
$sql = "SELECT * FROM User WHERE Email = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "existe";
} else {
    $sql_1 = "SELECT * FROM PreDocentes WHERE email = ?";
    $stmt_1 = $link->prepare($sql_1);
    $stmt_1->bind_param("s", $email);
    $stmt_1->execute();
    $result_1 = $stmt_1->get_result();
    if ($result_1->num_rows > 0) {
        echo "si";
    }else{
        echo "no";
    }

    $stmt_1->close();
}

$stmt->close();
$link->close();
?>