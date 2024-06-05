<?php
$perfil = "Profesor";
include("/var/www/html/moodle/config-ext.php");

$query =    "SELECT User.*, Licence.Code, Licence.LicenceId, Licence.Title, Enrolment.CourseName, Enrolment.GroupCode, Enrolment.GroupKey, Enrolment.EnrolmentId, asesores.id_usuario
            FROM User
            LEFT JOIN Licence ON User.UserId = Licence.UserId
            LEFT JOIN Enrolment ON User.UserId = Enrolment.UserId
            LEFT JOIN PreDocentes ON User.Email = PreDocentes.email
            LEFT JOIN asesores ON User.UserId = asesores.id_docente
            WHERE User.Rol = ?";

$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "s", $perfil);
mysqli_stmt_execute($stmt);
$resultProfe = mysqli_stmt_get_result($stmt);

mysqli_stmt_close($stmt);

?>