<?php
include("../../config-ext.php");
mysqli_set_charset($link, "utf8");

$course="SELECT * FROM Course";
$categories="SELECT * FROM categories";
$parametrizacion="SELECT Co.CourseId, Co.FullName,
                         Ca.id_categories, Ca.name_categories,
                         Pa.CourseId, Pa.id_categories, Pa.id_parametro
                  FROM parametrizacion Pa
                  INNER JOIN Course Co ON Pa.CourseId = Co.CourseId
                  INNER JOIN categories Ca ON Pa.id_categories = Ca.id_categories";

$BD_User_Std="SELECT Li.UserId, Li.Code, Li.Type,
                     Us.UserId, Us.FirstName, Us.MiddleName, Us.LastName, Us.SecondLastName, Us.Institution, Us.Email, Us.UserName
                FROM Licence Li
                INNER JOIN User Us ON Li.UserId = Us.UserId
                WHERE Li.Type LIKE 'E'";

$BD_User_Pfe ="SELECT Li.UserId, Li.Code, Li.Type,
                        Us.UserId, Us.FirstName, Us.MiddleName, Us.LastName, Us.SecondLastName, Us.City, Us.Email, Us.UserName
                        FROM Licence Li
                        INNER JOIN User Us ON Li.UserId = Us.UserId
                        WHERE Li.Type LIKE 'P'";

$foundParametrizacion="";
$foundCourse="";
$foundCategories="";
$foundUserStd ="";
$foundUserPfe ="";


$res_parametrizacion = mysqli_query($link, $parametrizacion);

while($row=mysqli_fetch_assoc($res_parametrizacion)){
    
    $foundParametrizacion .= "<tr>";
    $foundParametrizacion .= "<td><input id='pa".$row["id_parametro"]."' type='text' class='form-control' value='".$row["id_parametro"]."' readonly></td>";
    $foundParametrizacion .= "<td><input id='pb".$row["CourseId"]."'  type='text' class='form-control' value='".$row["FullName"]."' readonly></td>";
    $foundParametrizacion .= "<td><input id='pc".$row["id_categories"]."' type='text' class='form-control' value='".$row["name_categories"]."' readonly></td>";
    $foundParametrizacion .= "<td><input class='pa' value=".$row["id_parametro"]." type='checkbox'></td>";
    $foundParametrizacion .= "</tr>";

}

mysqli_free_result($res_parametrizacion);

$res_course = mysqli_query($link, $course);

while($row=mysqli_fetch_assoc($res_course)){

    $foundCourse .= "<tr>";
    $foundCourse .="<td><input id=ga".$row["CourseId"]." type='text' class='form-control' value='".$row["CourseId"]."' readonly></td>";
    $foundCourse .="<td><input id=gb".$row["CourseId"]." type='text' class='form-control' value='".$row["FullName"]."' readonly></td>";
    $foundCourse .="</tr>";

}

mysqli_free_result($res_course);

$res_categories = mysqli_query($link, $categories);

while($row=mysqli_fetch_assoc($res_categories)){

    $foundCategories .="<tr>";
    $foundCategories .="<td><input id=ca".$row["id_categories"]." type='text' class='form-control' value='".$row["id_categories"]."' readonly></td>";
    $foundCategories .="<td><input id=cb".$row["id_categories"]." type='text' class='form-control' value='".$row["name_categories"]."' readonly></td>";
    $foundCategories .="<td><button class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#Editar_categorias' onclick='categ_llenar(".$row["id_categories"].");'>Editar</button></td>";
    $foundCategories .="<td><input class='ch' value=".$row["id_categories"]." class='form-check-input' type='checkbox'></td>";
    $foundCategories .="</tr>";

}

mysqli_free_result($res_categories);

$res_User_Std = mysqli_query($link, $BD_User_Std);

while($row=mysqli_fetch_assoc($res_User_Std)){

    $foundUserStd .="<tr>";
    $foundUserStd .="<td><input class='form-control' readonly value='".$row["FirstName"]." ".$row["MiddleName"]." ".$row["LastName"]." ".$row["SecondLastName"]."'></td>";
    $foundUserStd .="<td><input class='form-control' readonly value='".$row["Email"]."'></td>";
    $foundUserStd .="<td><input class='form-control' readonly value='".$row["UserName"]."'></td>";
    $foundUserStd .="<td><input class='form-control' readonly value='".$row["Institution"]."'></td>";
    $foundUserStd .="<td><input class='form-control' readonly value='".$row["Code"]."'></td>";
    $foundUserStd .="<td><input class='std' value=".$row["UserId"]." class='form-check-input' type='checkbox'></td>";
    $foundUserStd .="</tr>";

}

mysqli_free_result($res_User_Std);

$res_User_Pfe = mysqli_query($link, $BD_User_Pfe);

while($row=mysqli_fetch_assoc($res_User_Pfe)){

    $foundUserPfe .="<tr>";
    $foundUserPfe .="<td><input class='form-control' readonly value='".$row["FirstName"]." ".$row["MiddleName"]." ".$row["LastName"]." ".$row["SecondLastName"]."'></td>";
    $foundUserPfe .="<td><input class='form-control' readonly value='".$row["Email"]."'></td>";
    $foundUserPfe .="<td><input class='form-control' readonly value='".$row["UserName"]."'></td>";
    $foundUserPfe .="<td><input class='form-control' readonly value='".$row["City"]."'></td>";
    $foundUserPfe .="<td><input class='form-control' readonly value='".$row["Code"]."'></td>";
    $foundUserPfe .="<td><input class='pfe' value=".$row["UserId"]." class='form-check-input' type='checkbox'></td>";
    $foundUserPfe .="</tr>";

}

mysqli_free_result($res_User_Pfe);


?>