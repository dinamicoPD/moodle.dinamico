<?php
if (isset($_POST['submit'])) {
    include('crearQRControll.php');

    if (isset($_FILES['csvFile']) && $_FILES['csvFile']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['csvFile']['tmp_name'];
        $fileName = $_FILES['csvFile']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        if ($fileExtension === 'csv') {

            require_once('/var/www/html/moodle/config-ext.php');

            if (($handle = fopen($fileTmpPath, 'r')) !== false) {

                $isHeader = true;
                
                while (($data = fgetcsv($handle, 0, ";")) !== false) {  
                    $lineNumber = 0;
                    $nombreEnlaces = "";
                    $enlaces = "";
                    $identificadorEnlace = true;                
                    foreach ($data as $cell) {
                        if (!$isHeader) {
                            if(htmlspecialchars($cell) != ""){
                                $lineNumber++;
                                switch ($lineNumber) {
                                    case "1":
                                        $tituloQR = htmlspecialchars($cell);
                                        break;
                                    case "2":
                                        $aterrizaje = buscarAterrizaje(htmlspecialchars($cell), $link);                        
                                        break;
                                    default:
                                        
                                        if ($identificadorEnlace){
                                            $nombreEnlaces .= htmlspecialchars($cell).",";
                                            $identificadorEnlace = false;
                                        }else{
                                            $enlaces .= htmlspecialchars($cell).",";
                                            $identificadorEnlace = true;
                                        }
                                        
                                        break;
                                }
                            }
                        }
                    }

                    if (!$isHeader) {
                        $proyectoQR_crear = trim($_POST['proyectoQR_id']);
                        $aterrizaje = explode(",", $aterrizaje);
                        $nombreQR = "QR_".str_replace(' ', '_', $tituloQR)."_".$proyectoQR_crear.".png";

                        $nombreEnlaces = substr($nombreEnlaces, 0, -1);
                        $nombreEnlaces = explode(",", $nombreEnlaces);

                        $enlaces = substr($enlaces, 0, -1);
                        $enlaces = explode(",", $enlaces);

                        $id_generado = generado($nombreQR, $tituloQR, $aterrizaje[0], $proyectoQR_crear, $link);
                        $generarEnlaces = generarEnlaces($id_generado, $nombreEnlaces, $enlaces, $link);
                        $url = 'https://dinamicopd.com/codeQR/'.$aterrizaje[1].'?qr='.$id_generado;

                        $generado = generarQR($url, $nombreQR);

                        header("Location: generadorQR.php?proyecto=".$proyectoQR_crear);
                    }
                    
                    $isHeader = false;
                }

                fclose($handle);
            } else {
                echo "No se pudo leer el archivo.";
            }
        } else {
            echo "El archivo no es un CSV válido.";
        }
    } else {
        echo "No se subió ningún archivo o hubo un error durante la subida.";
    }
} else {
    echo "Acceso no válido al script.";
}

function buscarAterrizaje($valor, $link) {
    $stmt = $link->prepare("SELECT enlace FROM QR_aterrizaje WHERE id = ?");
    $stmt->bind_param("i", $valor);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $enlace = $row['enlace'];
        return $valor . "," . $enlace;
    }
}
?>
