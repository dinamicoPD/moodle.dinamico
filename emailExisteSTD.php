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
    $row = $result->fetch_assoc();
    $fields = implode(",", array(
        $row['FirstName'],
        $row['MiddleName'],
        $row['LastName'],
        $row['SecondLastName'],
        $row['UserName'],
        $row['Phone']
    ));
    echo $fields;
} else {
    echo "no existe";
}

$stmt->close();
$link->close();
?>