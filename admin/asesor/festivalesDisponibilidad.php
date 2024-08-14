<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedDate = filter_input(INPUT_POST, 'selectedDate', FILTER_SANITIZE_STRING);
    require_once('/var/www/html/moodle/config-ext.php');

    if($link){
        $query = "
            SELECT 
                TotalCantidad, fp.total AS TotalFinal
            FROM 
                FestivalPersonal fp,
                (
                    SELECT 
                        SUM(CantidadTotal) AS TotalCantidad
                    FROM (
                        SELECT 
                            Cantidad AS CantidadTotal
                        FROM 
                            FestivalApoyo
                        WHERE 
                            Fecha = ?
                        
                        UNION ALL
                        
                        SELECT 
                            Cantidad AS CantidadTotal
                        FROM 
                            FestivalCapacitacion
                        WHERE 
                            Fecha = ?
                    ) AS UnionTablas
                ) AS SumaTotal;
        ";

        // Preparar la consulta
        $stmt = mysqli_prepare($link, $query);

        // Vincular parámetros (la fecha) a la consulta
        mysqli_stmt_bind_param($stmt, 'ss', $selectedDate, $selectedDate);

        // Ejecutar la consulta
        mysqli_stmt_execute($stmt);

        // Obtener los resultados
        mysqli_stmt_bind_result($stmt, $TotalCantidad, $total);
        mysqli_stmt_fetch($stmt);

        // Cerrar la sentencia
        mysqli_stmt_close($stmt);

        if ($TotalCantidad === null) {
            echo $total;
        }else{
            echo $total-$TotalCantidad;
        }
        // Ahora $TotalCantidad y $total contienen los valores resultantes
        
    }else{
        return;
    }

} else {
    return;
}

?>