<?php
require_once('/var/www/html/moodle/config-ext.php');

if(isset($asesor)) {
    $asesor = $link->real_escape_string($asesor);

    $sql = "
    SELECT 
        Enrolment.GroupKey AS Codigo_Grupo,
        SUBSTRING_INDEX(Enrolment.GroupKey, '_', -1) AS Codigo_Colegio,
        colegios.colegio AS Nombre_Colegio,
        Classroom.UserId AS Id_Estudiante,
        Enrolment.CourseId AS Id_Curso,
        Enrolment.CourseName AS Curso,
        Enrolment.UserId AS Docente,
        (SELECT COUNT(*) FROM Classroom) AS Total_Classroom,
        (SELECT COUNT(*) FROM asesores) AS Total_Asesores,
        (SELECT COUNT(*) FROM colegios) AS Total_Colegios
    FROM 
        User
    INNER JOIN 
        asesores ON User.UserId = asesores.id_usuario
    INNER JOIN 
        Enrolment ON asesores.id_docente = Enrolment.UserId
    INNER JOIN 
        Classroom ON Enrolment.UserGrpId = Classroom.UserGrpId
    INNER JOIN 
        colegios ON colegios.colegioId = SUBSTRING_INDEX(Enrolment.GroupKey, '_', -1)
    WHERE 
        User.UserName = '$asesor';
    ";
    // Ejecutar la consulta y guardar los resultados en un array
    $result = $link->query($sql);
    $datos = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $datos[] = $row;
        }
    }

    // Contar el total de Docentes
    $total_docentes = count(array_unique(array_column($datos, 'Docente')));
        
    // Contar el total de Id_Estudiantes
    $total_estudiantes = count($datos);
    
    // Contar el total de Códigos de Colegio
    $total_colegios = count(array_unique(array_column($datos, 'Codigo_Colegio')));
    
    $docentes_porcentaje = number_format((($total_docentes / $datos[0]['Total_Asesores'])*100), 2);

    $estudiantes_porcentaje = number_format((($total_estudiantes / $datos[0]['Total_Classroom'])*100), 2);

    $colegios_porcentaje = number_format((($total_colegios / $datos[0]['Total_Colegios'])*100), 2);

}
?>