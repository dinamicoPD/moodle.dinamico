<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $InputTitulo = filter_input(INPUT_POST, 'InputTitulo', FILTER_SANITIZE_STRING);
    $filesToCheck = ['inputImgTitulo', 'inputImgFondo', 'inputImgMedalla1', 'inputImgMedalla2', 'inputImgMedalla3'];
    $allFilesValid = true;
    
    foreach($filesToCheck as $file){
        if(isset($_FILES[$file]) && $_FILES[$file]['error'] === UPLOAD_ERR_OK){
            $fileExtension = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);
            $allowedExtensions = ['svg', 'png'];
            
            if(in_array($fileExtension, $allowedExtensions) && $_FILES[$file]['size'] <= 5242880){ // 5MB
                continue;
            } else {
                $allFilesValid = false;
                break;
            }
        } else {
            $allFilesValid = false;
            break;
        }
    }
    
    if($allFilesValid && !empty($InputTitulo)){

        $carpetaName = str_replace(' ', '_', $InputTitulo);
        $uploadDir = 'diplomas/img/temas/'.$carpetaName.'/';
        
        if(!file_exists($uploadDir)){
            mkdir($uploadDir, 0777, true);
        }
        
        foreach($filesToCheck as $file){
            $uploadFilePath = $uploadDir . ucfirst(substr($file, 8)) . "." . pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES[$file]['tmp_name'], $uploadFilePath);
            chmod($uploadFilePath, 0777);
        }
    }

    header("Location: diplomas.php");
}