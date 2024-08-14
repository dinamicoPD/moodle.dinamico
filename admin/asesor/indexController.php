<?php
require_once('/var/www/html/moodle/config-ext.php');

$sql = "SELECT e.UserId, e.UserGrpId, e.GroupKey, c.ClassroomId, c.UserId AS estudiantes, e.CourseName, s.colegio, SUBSTRING_INDEX(e.GroupKey, '_', -1) AS Codigo_Colegio
FROM asesores a
LEFT JOIN Enrolment e ON a.id_docente = e.UserId
LEFT JOIN Classroom c ON e.UserGrpId = c.UserGrpId
LEFT JOIN colegios s ON s.colegioId = SUBSTRING_INDEX(e.GroupKey, '_', -1)
WHERE a.id_usuario = ?";

// Preparar la consulta
if ($stmt = $link->prepare($sql)) {

    $stmt->bind_param("i", $UserId);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    $docentesActivos = array();
    $docentesTotales = array();
    $estudiantesTotales = array();
    $colegiosTotales = array();
    $colegiosActivos = array();
    $docenteActivo = array();
    $docentesTotales = array();
    $estudianteTotal = array();
    $colegioTotal = array();
    $colegioActivo = array();
    $colores = array('danger','warning','info','success','primary');
    $nivelesActivos = array();
    $nivelesNoActivos = array();
    $gruposDocentesTotales = array();
    $proyectosActivos = array();

    foreach ($data as $row) {
        
        if($row["ClassroomId"] != Null || $row["ClassroomId"] != ""){
            $docentesActivos[] = $row["UserId"];
            $estudiantesTotales[] = $row["estudiantes"];
            $colegiosActivos[] = $row["Codigo_Colegio"];
            $nivelesActivos[] = $row["CourseName"];
            $colegioActivos[] = $row["colegio"];
        }else{
            $nivelesNoActivos[] = $row["CourseName"];
            $colegioNoActivos[] = $row["colegio"];
        }
        $gruposDocentesTotales[] = $row["UserId"];
        $colegiosTotales[] = $row['Codigo_Colegio'];
    }

    // ---- docentes activos ---- //
    $docenteActivo = array_unique($docentesActivos);
    $docenteUsoTotal = count($docenteActivo);
    // ---- Total docentes ---- //
    $docentesTotales = array_unique($gruposDocentesTotales);
    $total_docentes = count($docentesTotales);
    // ---- Porcentaje docentes ---- //
    $docentes_porcentaje = number_format(($docenteUsoTotal*100)/$total_docentes, 2);
    // ---- Total estudiantes ---- //
    $estudianteTotal = array_unique($estudiantesTotales);
    $total_estudiantes = count($estudianteTotal);
    // ---- total colegios ---- //
    $colegioTotal = array_unique($colegiosTotales);
    $total_colegios = count($colegioTotal);
    // ---- colegios activos ---- //
    $colegioActivo = array_unique($colegiosActivos);
    $Activos_colegios = count($colegioActivo);
    // ---- Porcentaje colegios ---- //
    $colegios_porcentaje = number_format(($Activos_colegios*100)/$total_colegios, 2);
    // ---- Niveles Activos ---- //
    $nivelesDefinitivos = array_count_values($nivelesActivos);
    $nivelesNoActivos_unique = array_unique($nivelesNoActivos);
    // ---- Colegios Activos ---- //
    $colegioDefinitivos = array_count_values($colegioActivos);
    $colegioNoActivos_unique = array_unique($colegioNoActivos);

    foreach($nivelesNoActivos_unique as $value){
        if (!array_key_exists($value, $nivelesDefinitivos)) {
            $nivelesDefinitivos[$value] = 0;
        }
    }

    $sumatoria_total_niveles = array_sum($nivelesDefinitivos);
    $selectColor = 0;
    $proyectosHTML = "";
    foreach ($nivelesDefinitivos as $keyniveles => $valueniveles) {
        $porcentajeNiveles = number_format(($valueniveles / $sumatoria_total_niveles)*100, 2);
        if($selectColor>4){
            $selectColor = 0;
        }
        $proyectosHTML .= '<h4 class="small font-weight-bold">'.$keyniveles.' (Total: '.$valueniveles.') <span class="float-right">%'.$porcentajeNiveles.'</span></h4><div class="progress mb-4"><div class="progress-bar bg-'.$colores[$selectColor].' role="progressbar" style="width:'.$porcentajeNiveles.'%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div></div>';
        $selectColor++;
    }

    foreach($colegioNoActivos_unique as $value){
        if (!array_key_exists($value, $colegioDefinitivos)) {
            $colegioDefinitivos[$value] = 0;
        }
    }
    $sumatoria_total_colegio = array_sum($colegioDefinitivos);
    $selectColor = 0;
    $imprimirColegio = "";
    foreach ($colegioDefinitivos as $keycolegios => $valuecolegios){
        $porcentajeColegios = number_format(($valuecolegios / $sumatoria_total_colegio)*100, 2);
        if($selectColor>4){
            $selectColor = 0;
        }
        $imprimirColegio .= '<h4 class="small font-weight-bold">'.$keycolegios.'<br> (Total: '.$valuecolegios.') <span class="float-right">%'.$porcentajeColegios.'</span></h4><div class="progress mb-4"><div class="progress-bar bg-'.$colores[$selectColor].' role="progressbar" style="width:'.$porcentajeColegios.'%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div></div>';
        $selectColor++;
    }
    // Cerrar la declaración
    $stmt->close();
}
?>