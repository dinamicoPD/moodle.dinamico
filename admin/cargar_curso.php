<?php
require_once('../../../config-ext.php');
$categoriaId = $_POST['datoId'];

$query = "  SELECT parametrizacion.CourseId, Course.FullName FROM parametrizacion
            INNER JOIN Course ON parametrizacion.CourseId = Course.CourseId
            INNER JOIN categories ON parametrizacion.id_categories = categories.id_categories
            WHERE categories.id_categories = ?
";
$stmt = $link->prepare($query);
$stmt->bind_param("i", $categoriaId);
$stmt->execute();
$result = $stmt->get_result();

if(!$result) {
    die("ERROR: Could not execute $query. " . mysqli_error($link));
}

if($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
}

$stmt->free_result();
$categoriaSelect = "<option selected disabled value=\"\">Seleccionar</option>";
foreach($categorias as $categoria):
    $categoriaSelect .= "
        <option value=\"".$categoria['CourseId']."\">".$categoria['FullName']."</option>
    ";
endforeach;

echo $categoriaSelect;

?>