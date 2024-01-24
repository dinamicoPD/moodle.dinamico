<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $idSelect = isset($_POST['idSelect']) ? $_POST['idSelect'] : null;
    if (!$idSelect){
        return;
    }

    include("../../../config-ext.php");
    $idSelectValores = explode(", ", $idSelect);

    for ($i = 0; $i < count($idSelectValores); $i++) {
        $idSelectValor = $idSelectValores[$i];
        $sql = "DELETE FROM Licence WHERE LicenceId = $idSelectValor";
        $link->query($sql);
    }

    $link->close();

}else{
    return;
}