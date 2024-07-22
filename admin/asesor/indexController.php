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

    $total_docentes = count(array_unique(array_column($datos, 'Docente')));

    $total_estudiantes = count($datos);

    $total_colegios = count(array_unique(array_column($datos, 'Codigo_Colegio')));
    
    $docentes_porcentaje = number_format((($total_docentes / $datos[0]['Total_Asesores'])*100), 2);

    $estudiantes_porcentaje = number_format((($total_estudiantes / $datos[0]['Total_Classroom'])*100), 2);

    $colegios_porcentaje = number_format((($total_colegios / $datos[0]['Total_Colegios'])*100), 2);

    $nivel = array();
    $numero_nivel = array();
    $comprobar_nivel = "";
    $proyectos = array();
    $libros = count($datos);
    $proyectosHTML = "";
    $colores = array('danger','warning','info','success','primary');
    $coloresCont = count($colores) - 1;
    $selectColor = 0;
    $losColegios = array();

    foreach ($datos as $valor) {
        $curso = $valor['Curso'];
        $colegio = $valor['Nombre_Colegio'];
        if (array_key_exists($curso, $proyectos)) {
            $proyectos[$curso]++;
        } else {
            $proyectos[$curso] = 1;
        }
        if (array_key_exists($colegio, $losColegios)) {
            $losColegios[$colegio]++;
        } else {
            $losColegios[$colegio] = 1;
        }
    }

    foreach ($proyectos as $curso => $cantidad) {
        $porcentaje = $cantidad/$libros;
        $porcentaje = number_format($porcentaje*100, 2);

        if($selectColor>4){
            $selectColor = 0;
        }

        $proyectosHTML .= '<h4 class="small font-weight-bold">'.$curso.' ('.$cantidad.') <span class="float-right">'.$porcentaje.'%</span></h4>';
        $proyectosHTML .= '<div class="progress mb-4">';
            $proyectosHTML .= '<div class="progress-bar bg-'.$colores[$selectColor].'" role="progressbar" style="width: '.$porcentaje.'%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>';
        $proyectosHTML .= '</div>';

        $selectColor++;
    }

    foreach ($losColegios as $colegio => $cantidadCole) {
        $imprimirColegio .= '<div class="row">
                                <div class="col">'.$colegio.'</div>
                            </div>';
    }

}
?>