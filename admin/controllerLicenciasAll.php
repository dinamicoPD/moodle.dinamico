<?php
include("/var/www/html/moodle/config-ext.php");

// Verificar la conexión
if ($link->connect_error) {
    die("Error de conexión: " . $link->connect_error);
}

// Preparar la consulta SQL
$sql = "SELECT User.*, Licence.Code, Licence.LicenceId, Licence.Title, Enrolment.CourseName, Enrolment.GroupCode, Enrolment.GroupKey, Enrolment.EnrolmentId, asesores.id_usuario
        FROM User
        LEFT JOIN Licence ON User.UserId = Licence.UserId
        LEFT JOIN Enrolment ON User.UserId = Enrolment.UserId
        LEFT JOIN PreDocentes ON User.Email = PreDocentes.email
        LEFT JOIN asesores ON User.UserId = asesores.id_docente
        WHERE User.UserId IN (
            SELECT DISTINCT UserId
            FROM `Enrolment`
            WHERE CAST(SUBSTRING(GroupKey, INSTR(GroupKey, '_') + 1, LENGTH(GroupKey)) AS UNSIGNED) = $perfil
        )";

// Ejecutar la consulta y guardar los resultados en $resultProfe
$resultProfe = $link->query($sql);
?>