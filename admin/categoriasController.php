<?php
require_once('/var/www/html/moodle/config-ext.php');
mysqli_set_charset($link, "utf8");


if($link){
    $foundParametrizacion = parametrizacion($link);
    $foundCategories = ediciones($link);
    $foundCourse = cursos($link);
}

// ------ funciones

function parametrizacion($link){
    $sql="  SELECT Co.CourseId, Co.FullName, Ca.id_categories, Ca.name_categories, Pa.CourseId, Pa.id_categories, Pa.id_parametro
            FROM parametrizacion Pa
            INNER JOIN Course Co ON Pa.CourseId = Co.CourseId
            INNER JOIN categories Ca ON Pa.id_categories = Ca.id_categories";

    $respuesta = mysqli_query($link, $sql);

    while($row=mysqli_fetch_assoc($respuesta)){
    
        $foundParametrizacion .= "<tr>";
            $foundParametrizacion .= "<td>";
                $foundParametrizacion .= "<p>".$row["id_parametro"]."</p>";
            $foundParametrizacion .= "</td>";
            $foundParametrizacion .= "<td>";
                $foundParametrizacion .= "<p>".$row["FullName"]."</p>";
            $foundParametrizacion .= "</td>";
            $foundParametrizacion .= "<td>";
                $foundParametrizacion .= "<p>".$row["name_categories"]."</p>";
            $foundParametrizacion .= "</td>";
            $foundParametrizacion .= "<td>";
                $foundParametrizacion .= "<input class='pa' value=".$row["id_parametro"]." type='checkbox'>";
            $foundParametrizacion .= "</td>";    
        $foundParametrizacion .= "</tr>";    
    }

    return $foundParametrizacion;
}

function ediciones($link){
    $categories="SELECT * FROM categories";
    $res_categories = mysqli_query($link, $categories);
    while($row=mysqli_fetch_assoc($res_categories)){

        $foundCategories .="<tr>";
        $foundCategories .="<td><p>".$row["id_categories"]."</p></td>";
        $foundCategories .="<td><p>".$row["name_categories"]."</p></td>";
        $foundCategories .="<td><button class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#Editar_categorias' onclick='categ_llenar(\"".$row["id_categories"]."\",\"".$row["name_categories"]."\");'>Editar</button></td>";
        $foundCategories .="<td><input class='ch' value=".$row["id_categories"]." class='form-check-input' type='checkbox'></td>";
        $foundCategories .="</tr>";
    
    }
    mysqli_free_result($res_categories);
    return $foundCategories;
}

function cursos($link){
    $course="SELECT * FROM Course";
    $res_course = mysqli_query($link, $course);

    while($row=mysqli_fetch_assoc($res_course)){

        $foundCourse .= "<tr>";
        $foundCourse .="<td><p>".$row["CourseId"]."</p></td>";
        $foundCourse .="<td><p>".$row["FullName"]."</p></td>";
        $foundCourse .="</tr>";

    }

    return $foundCourse;

    mysqli_free_result($res_course);
}
?>