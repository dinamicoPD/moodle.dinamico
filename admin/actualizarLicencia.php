<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validFields = true;
    $Type = isset($_POST['Type']) ? $_POST['Type'] : null;
    $Code = isset($_POST['Code']) ? $_POST['Code'] : null;
    $Title = isset($_POST['Title']) ? $_POST['Title'] : null;
    $LicenceId = isset($_POST['LicenceId']) ? $_POST['LicenceId'] : null;

    if (!$Type || !$Code || !$Title || !$LicenceId) {
        $validFields = false;
    }else{
        if (strlen($Code) < 8) {
            $validFields = false;
        }
        if (!preg_match('/[0-9]/', $Code) || !preg_match('/[a-zA-ZñÑ]/', $Code) || !preg_match('/[^a-zA-ZñÑ0-9_]/', $Code)) {
            $validFields = false;
        }
    }

    if ($validFields) {
        include("../../../config-ext.php");

        $proceder = false;

        // Obtener los datos de la licencia
        $stmt = $link->prepare("SELECT * FROM Licence WHERE LicenceId = ?");
        $stmt->bind_param("i", $LicenceId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        if ($result->num_rows == 1) {
            if ($row['Type'] != $Type || $row['Title'] != $Title || $row['Code'] != $Code) {
                $proceder = true;
            }

            if ($row['Code'] != $Code) {
                // Verificar si ya existe un código de licencia igual
                $stmt = $link->prepare("SELECT * FROM Licence WHERE Code = ?");
                $stmt->bind_param("s", $Code);
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close();

                if ($result->num_rows > 0) {
                    echo "off";
                    exit;
                } else {
                    $proceder = true;
                }
            }
        }

        if ($proceder) {
            // Actualizar los datos de la licencia
            $stmt = $link->prepare("UPDATE Licence SET Type = ?, Code = ?, Title = ? WHERE LicenceId = ?");
            $stmt->bind_param("sssi", $Type, $Code, $Title, $LicenceId);
            $stmt->execute();
            $stmt->close();
            echo "on";
        } else {
            $link->close();
            echo "off";
        }
    } else {
        echo "off";
    }
} else {
    return;
}