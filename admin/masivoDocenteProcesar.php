<?php
if ($_FILES['archivo_csv']['error'] == UPLOAD_ERR_OK) {
    require_once('../../../config-ext.php');

    $nombre_temporal = $_FILES['archivo_csv']['tmp_name'];
    $nombre_archivo = $_FILES['archivo_csv']['name'];

    $correo_current = "";
    $registro_Current = "";
    $registro_Principal = "";
    $ubicacion_Current = array();

    $ubicacion = "";
    $curso = "";
    $nombreColegio = "";

    $registroFull = "";
    
    if (($archivo = fopen($nombre_temporal, 'r')) !== false) {
        while (($datos = fgetcsv($archivo)) !== false) {

            $correo = $datos[8];
            $nombre = $datos[2].",".$datos[3].",".$datos[4].",".$datos[5];
            $telefono = $datos[6];
            $asesor = $datos[9];

            $registro_Principal = $correo."|".$nombre."|".$telefono."|".$asesor;

            $colegio = $datos[7];
            $grupo = $datos[0];
            $nivel = $datos[1];

            if($correo_current === ""){
                //Primer registro
                $ubicacion = ubicacion($colegio, $link);
                $nombreColegio = nombreColegio($colegio, $link);
                $curso = curso($nivel, $grupo, $colegio, $nombreColegio, $link);
                $correo_current = $correo;
                $registro_current = $registro_Principal;
                $ubicacion_Current[] = $colegio;
            }else{
                if($correo_current === $correo){
                    //Registro Actual
                    $procedeUbicacion = procedeUbicacion($ubicacion_Current, $colegio);
                    if($procedeUbicacion === "1"){
                        //Nuevo colegio
                        $ubicacion .= "," . ubicacion($colegio, $link);
                        $nombreColegio = nombreColegio($colegio, $link);
                        $curso .= "," . curso($nivel, $grupo, $colegio, $nombreColegio, $link);
                        $correo_current = $correo;
                        $registro_current = $registro_Principal;
                        $ubicacion_Current[] = $colegio;
                    }else{
                        //Antiguo colegio
                        $nombreColegio = nombreColegio($colegio, $link);
                        $curso .= "," . curso($nivel, $grupo, $colegio, $nombreColegio, $link);
                        $correo_current = $correo;
                        $registro_current = $registro_Principal;
                    }
                }else{
                    //Registro nuevo
                    $registroFull = $registro_current . "|" . $ubicacion . "|" . $curso;
                    cargarDatos($registroFull, $link);
                    unset($ubicacion_Current);
                    $ubicacion = ubicacion($colegio, $link);
                    $nombreColegio = nombreColegio($colegio, $link);
                    $curso = curso($nivel, $grupo, $colegio, $nombreColegio, $link);
                    $correo_current = $correo;
                    $registro_current = $registro_Principal;
                    $ubicacion_Current[] = $colegio;
                }
            }
        }
        $registroFull = $registro_current . "|" . $ubicacion . "|" . $curso;
        cargarDatos($registroFull, $link);
        fclose($archivo);
        header("Location: masivoDocentes.php?mensaje=usuarios agregados");
    } else {
        echo "No se pudo abrir el archivo CSV.";
    }

} else {
    echo "Error al subir el archivo.";
}

function nombreColegio($colegio, $link){
    $curso = "";
    $sql = "SELECT colegio FROM colegios WHERE colegioId = $colegio";
    $result = $link->query($sql);
    while($row = $result->fetch_assoc()) {
        $curso = $row["colegio"];
    }

    return $curso;
}

function ubicacion($colegio, $link){
    $ubicacion = "";
    $sql = "SELECT c.colegioId, c.colegio, m.municipioId, m.municipio, d.departamentoId, d.departamento
                FROM colegios As c
                JOIN municipio AS m ON c.municipioId = m.municipioId
                JOIN departamento AS d ON m.departamentoId = d.departamentoId
                WHERE c.colegioId = $colegio
                ";
    $result = $link->query($sql);
    while($row = $result->fetch_assoc()) {
        $ubicacion = $row["departamentoId"].",".$row["departamento"].",".$row["municipioId"].",".$row["municipio"].",".$row["colegioId"].",".$row["colegio"].",NO";
    }

    return $ubicacion;
}

function curso($nivel, $grupo, $colegio, $nombreColegio, $link){
    $curso = "";
    $sql = "SELECT c.CourseId, c.ShortName, a.id_categories, a.name_categories
                FROM Course As c
                JOIN parametrizacion AS p ON c.CourseId = p.CourseId
                JOIN categories AS a ON p.id_categories = a.id_categories
                WHERE c.CourseId = $nivel
            ";
    $result = $link->query($sql);
    while($row = $result->fetch_assoc()) {
        $curso = $colegio.",".$nombreColegio.",".$row["id_categories"].",".$row["name_categories"].",".$row["CourseId"].",".$row["ShortName"].",".$grupo;
    }
    return $curso;
}

function procedeUbicacion($ubicacion_Current, $colegio){
    $proceder = "1";
    $longitud = count($ubicacion_Current);
    for ($i = 0; $i < $longitud; $i++) {
        if($ubicacion_Current[$i] === $colegio){
            $proceder = "0";
        }
    }

    return $proceder;
}

function cargarDatos($registroFull, $link){
    $datosSeparados = explode("|", $registroFull);
    if (count($datosSeparados) == 6) {
        list($email, $nombre, $telefono, $asesor, $ubicacion, $cursos) = $datosSeparados;
        $esAsesor = 0;
        $esSoporte = 0;
    }
    $sql = "INSERT INTO PreDocentes (email, nombre, telefono, asesor, ubicacion, cursos, esAsesor, esSoporte) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("ssssssii", $email, $nombre, $telefono, $asesor, $ubicacion, $cursos, $esAsesor, $esSoporte);
    if ($stmt->execute()) {
        return;
    }
    return;
}
?>