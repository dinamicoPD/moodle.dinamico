<?php
include("../../config-ext.php");
mysqli_set_charset($link, "utf8");

$option = $_GET["op"];

switch ($option){
    case 1: // agrega categoria
        $categ = htmlspecialchars($_POST['c'],ENT_QUOTES,'UTF-8');

        $insertar = "INSERT INTO categories(name_categories) VALUES('$categ')";

        $resultado = mysqli_query($link, $insertar);
        break;
    case 2: // actualiza seccion de catagorias
        $categories="SELECT * FROM categories";

        $res_course = mysqli_query($link, $categories);
        $foundCategories = "";

        while($row=mysqli_fetch_assoc($res_course)){

            $foundCategories .="<tr>";
            $foundCategories .="<td><input id=ca".$row["id_categories"]." type='text' class='form-control' value='".$row["id_categories"]."' readonly></td>";
            $foundCategories .="<td><input id=cb".$row["id_categories"]." type='text' class='form-control' value='".$row["name_categories"]."' readonly></td>";
            $foundCategories .="<td><button class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#Editar_categorias' onclick='categ_llenar(".$row["id_categories"].");'>Editar</button></td>";
            $foundCategories .="<td><input class='ch' value=".$row["id_categories"]." class='form-check-input' type='checkbox'></td>";
            $foundCategories .="</tr>";

        }

        mysqli_free_result($res_course);

        echo $foundCategories;
        break;

    case 3:
        $categ_cambia = htmlspecialchars($_POST['cat_cam'],ENT_QUOTES,'UTF-8');
        $categ_cambia_id = htmlspecialchars($_POST['id_cat_cam'],ENT_QUOTES,'UTF-8');

        $cambia_categoria_sql = "UPDATE categories SET name_categories='$categ_cambia' WHERE id_categories='$categ_cambia_id'";
        $resultado = mysqli_query($link, $cambia_categoria_sql);
        mysqli_free_result($resultado);
        break;

    case 4:
        $idCateg_array = $_REQUEST['idCateg_array'];
        foreach ($idCateg_array as $registro_categ){
            $delete_idCateg = ("DELETE FROM categories WHERE id_categories='" .$registro_categ. "' ");
            mysqli_query($link, $delete_idCateg);
        }

        break;

    case 5:
        $idCateg_array = $_REQUEST['idCateg_array'];
        foreach ($idCateg_array as $registro_categ){
            $delete_idCateg = ("DELETE FROM categories WHERE id_categories='" .$registro_categ. "' ");
            mysqli_query($link, $delete_idCateg);
        }


        $eliminarTabla = "ALTER TABLE categories AUTO_INCREMENT=1";
        mysqli_query($link, $eliminarTabla);

        break;

    case 6:
        
        $parametrizacion="SELECT Co.CourseId, Co.FullName,
                         Ca.id_categories, Ca.name_categories,
                         Pa.CourseId, Pa.id_categories, Pa.id_parametro
                  FROM parametrizacion Pa
                  INNER JOIN Course Co ON Pa.CourseId = Co.CourseId
                  INNER JOIN categories Ca ON Pa.id_categories = Ca.id_categories";

        $foundParametrizacion="";

        $res_parametrizacion = mysqli_query($link, $parametrizacion);

        while($row=mysqli_fetch_assoc($res_parametrizacion)){
    
            $foundParametrizacion .= "<tr>";
            $foundParametrizacion .= "<td><input id='pa".$row["id_parametro"]."' type='text' class='form-control' value='".$row["id_parametro"]."' readonly></td>";
            $foundParametrizacion .= "<td><input id='pb'".$row["CourseId"]."  type='text' class='form-control' value='".$row["FullName"]."' readonly></td>";
            $foundParametrizacion .= "<td><input id='pc'".$row["id_categories"]." type='text' class='form-control' value='".$row["name_categories"]."' readonly></td>";
            $foundParametrizacion .= "<td><input class='pa' value=".$row["id_parametro"]." type='checkbox'></td>";
            $foundParametrizacion .= "</tr>";
        
        }

        mysqli_free_result($res_parametrizacion);

        echo $foundParametrizacion;
        break;

    case 7:
        $categories="SELECT * FROM categories";
        $foundselectCategorias="";

        $res_selectCategorias = mysqli_query($link, $categories);
        
        $foundselectCategorias .= "<label class='input-group-text' for='inputGroupCategoria'>Categoria</label>";
        $foundselectCategorias .= "<select class='form-select' id='inputGroupCategoria'>";
        $foundselectCategorias .= "<option selected>Elegir...</option>";
        
        while($row=mysqli_fetch_assoc($res_selectCategorias)){
            $foundselectCategorias .= "<option value='".$row["id_categories"]."'>".$row["name_categories"]."</option>";
        }
        
        $foundselectCategorias .= "</select>";
        
        mysqli_free_result($res_selectCategorias);

        echo $foundselectCategorias;
        break;
    case 8:
        $course="SELECT * FROM Course";
        $foundselectCurso="";

        $res_selectCurso = mysqli_query($link, $course);

        $foundselectCurso .= "<label class='input-group-text' for='inputGroupCursos'>Cursos</label>";
        $foundselectCurso .= "<select class='form-select' id='inputGroupCursos'>";
        $foundselectCurso .= "<option selected>Elegir...</option>";

        while($row=mysqli_fetch_assoc($res_selectCurso)){
            $foundselectCurso .= "<option value='".$row["CourseId"]."'>".$row["FullName"]."</option>";
        }

        $foundselectCurso .= "</select>";

        mysqli_free_result($res_selectCurso);

        echo $foundselectCurso;
        break;
    case 9:
        $categoriaModal= htmlspecialchars($_POST['categoriaModal'],ENT_QUOTES,'UTF-8');
        $cursoModal= htmlspecialchars($_POST['cursoModal'],ENT_QUOTES,'UTF-8');

        $insertarModal = "INSERT INTO parametrizacion(CourseId, id_categories) VALUES('$cursoModal','$categoriaModal')";

        $resultadoModal = mysqli_query($link, $insertarModal);
        break;

    case 10:
        $idCateg_array = $_REQUEST['idCateg_array'];
        foreach ($idCateg_array as $registro_categ){
            $delete_idCateg = ("DELETE FROM parametrizacion WHERE id_parametro='" .$registro_categ. "' ");
            mysqli_query($link, $delete_idCateg);
        }
    
    
            $eliminarTabla = "ALTER TABLE parametrizacion AUTO_INCREMENT=1";
            mysqli_query($link, $eliminarTabla);
    
            break;
    case 11:
        $idSTD_array = $_REQUEST['idSTD_array'];
        foreach ($idSTD_array as $registro_STD){
            $delete_idSTD = ("DELETE FROM Classroom WHERE UserId='" .$registro_STD. "' ");
            mysqli_query($link, $delete_idSTD);
        }

        $eliminarTablaClss = "ALTER TABLE Classroom AUTO_INCREMENT=1";
        mysqli_query($link, $eliminarTablaClss);

        foreach ($idSTD_array as $registro_STD){
            $delete_idSTD = ("DELETE FROM Licence WHERE UserId='" .$registro_STD. "' ");
            mysqli_query($link, $delete_idSTD);
        }

        $eliminarTablaLic = "ALTER TABLE Licence AUTO_INCREMENT=1";
        mysqli_query($link, $eliminarTablaLic);

        foreach ($idSTD_array as $registro_STD){
            $delete_idSTD = ("DELETE FROM User WHERE UserId='" .$registro_STD. "' ");
            mysqli_query($link, $delete_idSTD);
        }

        $eliminarTablaStd = "ALTER TABLE User AUTO_INCREMENT=1";
        mysqli_query($link, $eliminarTablaStd);

        break;
    case 12:

        $BD_User_Std="SELECT Li.UserId, Li.Code, Li.Type,
                     Us.UserId, Us.FirstName, Us.MiddleName, Us.LastName, Us.SecondLastName, Us.Institution, Us.Email, Us.UserName
                FROM Licence Li
                INNER JOIN User Us ON Li.UserId = Us.UserId
                WHERE Li.Type LIKE 'E'";

        $foundUserStd ="";

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
        echo $foundUserStd;
        
        mysqli_free_result($res_User_Std);
        break;
    case 13:
            $idPFE_array = $_REQUEST['idPFE_array'];
            foreach ($idPFE_array as $registro_PFE){
                $delete_idPFE = ("DELETE FROM Enrolment WHERE UserId='" .$registro_PFE. "' ");
                mysqli_query($link, $delete_idPFE);
            }
    
            $eliminarTablaEnr = "ALTER TABLE Enrolment AUTO_INCREMENT=1";
            mysqli_query($link, $eliminarTablaEnr);
    
            foreach ($idPFE_array as $registro_PFE){
                $delete_idPFE = ("DELETE FROM Licence WHERE UserId='" .$registro_PFE. "' ");
                mysqli_query($link, $delete_idPFE);
            }
    
            $eliminarTablaLic = "ALTER TABLE Licence AUTO_INCREMENT=1";
            mysqli_query($link, $eliminarTablaLic);
    
            foreach ($idPFE_array as $registro_PFE){
                $delete_idPFE = ("DELETE FROM User WHERE UserId='" .$registro_PFE. "' ");
                mysqli_query($link, $delete_idPFE);
            }
    
            $eliminarTablaPFE = "ALTER TABLE User AUTO_INCREMENT=1";
            mysqli_query($link, $eliminarTablaPFE);
    
            break;
    case 14:

                $BD_User_Pfe="SELECT Li.UserId, Li.Code, Li.Type,
                             Us.UserId, Us.FirstName, Us.MiddleName, Us.LastName, Us.SecondLastName, Us.City, Us.Email, Us.UserName
                        FROM Licence Li
                        INNER JOIN User Us ON Li.UserId = Us.UserId
                        WHERE Li.Type LIKE 'P'";
        
                $foundUserPfe ="";
        
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
                echo $foundUserPfe;
                
                mysqli_free_result($res_User_Pfe);
                break;
}


mysqli_close($link);


?>