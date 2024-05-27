<?php
include('/var/www/html/moodle/config-ext.php');

$sql = "SELECT u.UserId, p.asesor, p.Id_preDocente
        FROM User AS u
        JOIN PreDocentes AS p ON u.Email = p.email";

$result = $link->query($sql);

if ($result->num_rows > 0) {
    // Procesar los resultados
    while ($row = $result->fetch_assoc()) {
        if($row["asesor"] != NULL || $row["asesor"] != ""){
            agregarAsesor($link, $row["UserId"], $row["asesor"]);
            eliminarPre($link, $row["Id_preDocente"]);
            echo "usuario: ". $row["UserId"] . " - Asesor: " . $row["asesor"] . " - Id PreDocente: " . $row["Id_preDocente"] . "<br>";
        }
    }
} else {
    echo "No se encontraron resultados.";
}

function agregarAsesor($link, $UserId, $asesor){
    $sql = "INSERT INTO asesores (id_docente,id_usuario) VALUES (?,?)";
    if($stmt = mysqli_prepare($link, $sql)){
        $stmt->bind_param("ii",$UserId,$asesor);
        $resultado = mysqli_stmt_execute($stmt);
        if(!$resultado){
            echo "Error de conexión, contacte al servicio de administración";
            return;
        }
        $stmt->close();
    }
    return;
}

function eliminarPre($link, $Id_preDocente){
    $sql = "DELETE FROM PreDocentes WHERE Id_preDocente = $Id_preDocente";

    // Ejecutar la consulta
    if ($link->query($sql) === TRUE) {
        echo "Registro eliminado correctamente.";
        return;
    } else {
        echo "Error al eliminar el registro: " . $link->error;
        return;
    }
    
    $link->close();
    return;
}
?>