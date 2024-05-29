<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['texto'])){
        $texto = $_POST['texto'];
        $texto2 = conviertaCaracteres($texto);
        require_once('/var/www/html/moodle/config-ext.php');
        if($link){
            $sql = "SELECT Code FROM Licence WHERE Code LIKE ?";
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $texto2);
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_bind_result($stmt, $code);
                    if(mysqli_stmt_fetch($stmt)){
                        $longitud = min(strlen($texto), strlen($code));
                        $proceso = true;
                        $proceso_2 = true;
                        for ($i = 0; $i < $longitud; $i++) {
                            if ($texto[$i] === $code[$i]) {
                                $coincidencias .= $texto[$i];
                            } else {
                                $coincidencias_1 = ["l", "1", "i", "I"];
                                $coincidencias_2 = ["o", "O", "0"];

                                $proceso_2 = false;

                                if(in_array($code[$i], $coincidencias_1)){
                                    if(in_array($texto[$i], $coincidencias_1)){
                                        $coincidencias .= $code[$i];
                                    }else{
                                        $proceso = false;
                                    }
                                }

                                if(in_array($code[$i], $coincidencias_2)){
                                    if(in_array($texto[$i], $coincidencias_2)){
                                        $coincidencias .= $code[$i];
                                    }else{
                                        $proceso = false;
                                    }
                                }
                            }
                        }
                        if($proceso_2){
                            echo "NO";
                        }else{
                            if($proceso){
                                echo "<p class=\"p-3 text-center\">Código de la Cartilla ingresado ".$texto." es <span class=\"bg-light text-danger p-1\">incorrecto</span>. Prueba con este <span class=\"bg-light text-danger p-1\">(Cópialo y pégalo)</span></p><p class=\"p-3 text-center\"><span class=\"bg-light text-dark fs-2 p-1 font-monospace\">".$coincidencias."</span></p>";
                            }else{
                                echo "NO";
                            }
                        }
                    }else{
                       echo "NO";
                    }
                }else{
                    echo "NO";
                }
                mysqli_stmt_close($stmt);
            }
        }else{
            echo "NO";
        }
    } else {
        echo "NO";
    }
}else{
    echo "NO";
}

function conviertaCaracteres($inputString){
    $search = array('l', '1', 'i', 'I', 'o', 'O', '0');
    $replace = '_';
    $outputString = str_replace($search, $replace, $inputString);
    return $outputString;
}
?>