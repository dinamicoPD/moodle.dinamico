<?php
require_once('/var/www/html/moodle/config-ext.php');
$stmt = $link->prepare("SELECT COUNT(UserId) AS count FROM FestivalesAsesores WHERE UserId = ?");
$stmt->bind_param("i", $UserId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['count'] > 0) {
    $valorInicial = 0;
} else {
    $valorInicial = 1;
}
?>