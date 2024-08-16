<?php
require_once('/var/www/html/moodle/config-ext.php');
$totalDocentes = "";
$areas = "";

if ($link) {
    $sql = "SELECT total FROM FestivalPersonal LIMIT 1";
    $result = $link->query($sql);
    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $totalDocentes = $row["total"];
        }
    } else {
        echo "Error en la consulta: " . $link->error;
    }

    $sql_2 = "SELECT * FROM FestivalArea";
    $result_2 = $link->query($sql_2);
    if ($result_2) {
        if ($result_2->num_rows > 0) {
            while ($row_2 = $result_2->fetch_assoc()) {
                $areas .= "<tr>
                                <td class='text-center'>" . $row_2["area"] . "</td>
                                <td class='text-center'>
                                    <button type='button' class='btn btn-primary actualizar' value='".$row_2["id_festival"].",FestivalArea'>
                                        Actualizar
                                    </button>
                                </td>
                                <td class='text-center'>
                                    <button type='button' class='btn btn-danger'>
                                        Eliminar
                                    </button>
                                </td>
                            </tr>";
            }
        }
    } else {
        echo "Error en la consulta: " . $link->error;
    }

    $sql_3 = "SELECT * FROM FestivalTipo";
    $result_3 = $link->query($sql_3);
    if ($result_3) {
        if ($result_3->num_rows > 0) {
            while ($row_3 = $result_3->fetch_assoc()) {
                $tipo .= "<tr>
                            <td class='text-center'>" . $row_3["Actividad"] . "</td>
                            <td class='text-center'>
                                <button type='button' class='btn btn-primary actualizar' value='".$row_3["id_Actividad"].",FestivalTipo'>
                                    Actualizar
                                </button>
                            </td>
                            <td class='text-center'>
                                <button type='button' class='btn btn-danger' onclick='eliminar(".$row_3["id_Actividad"].")'>
                                    Eliminar
                                </button>
                            </td>
                        </tr>";
            }
        }
    } else {
        echo "Error en la consulta: " . $link->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["personalTotal"])) {
        $nuevoTotal = $_POST["personalTotal"];
        $sql = "UPDATE FestivalPersonal SET total = $nuevoTotal WHERE id = 1";
    
        if ($link->query($sql) === TRUE) {
            $totalDocentes = $nuevoTotal;
        } else {
            echo "Error al actualizar el valor: " . $link->error;
        }

    }
}

?>