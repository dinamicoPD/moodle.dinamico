<?php
require_once('/var/www/html/moodle/config-ext.php');

if($link){
    $events = array();
    $sql = "SELECT Fecha, Cantidad FROM FestivalApoyo UNION SELECT Fecha, Cantidad FROM FestivalCapacitacion";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $events[] = [
                'title' => "PERSONAL: ".$row['Cantidad'],
                'start' => $row['Fecha'],
                'color' => "#7C7C7B",
                'textColor' => "#FFFFFF",
                'deletable' => "false",
            ];
        }
    }
    
    header('Content-Type: application/json');
    echo json_encode($events);
}else{
    echo "no conexion";
}

?>