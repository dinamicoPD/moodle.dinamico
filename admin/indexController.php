<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cantidad_registros = isset($_POST['cantidad_registros']) ? $_POST['cantidad_registros'] : null;
    $posicion = isset($_POST['posicion']) ? $_POST['posicion'] : null;
    $searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : null;
    $perfil = isset($_POST['perfil']) ? $_POST['perfil'] : null;
} else {
    return;
}

include("../../../config-ext.php");

$cantidad = 0;

if($perfil === "2"){
    $resultado = mysqli_query($link, "SELECT * FROM Licence WHERE UserId IS NULL AND (Code LIKE '%{$searchTerm}%' OR Title LIKE '%{$searchTerm}%') AND Type = 'E'");
} elseif ($perfil === "3"){
    $resultado = mysqli_query($link, "SELECT * FROM Licence WHERE UserId IS NULL AND (Code LIKE '%{$searchTerm}%' OR Title LIKE '%{$searchTerm}%') AND Type = 'P'");
}else{
    $resultado = mysqli_query($link, "SELECT * FROM Licence WHERE UserId IS NULL AND (Code LIKE '%{$searchTerm}%' OR Title LIKE '%{$searchTerm}%')");
}

if ($resultado) {
    $cantidad = mysqli_num_rows($resultado);
}

$totalDivicion = $cantidad / $cantidad_registros;
$totalDivicion = ceil($totalDivicion);

/*------------------------*/
$inicio_registros = ($cantidad_registros * $posicion) - $cantidad_registros;

if($perfil === "2"){
    $consulta = "   SELECT * FROM Licence
                WHERE UserId IS NULL AND 
                (Code LIKE '%{$searchTerm}%'
                OR Title LIKE '%{$searchTerm}%')
                AND Type = 'E'
                LIMIT $inicio_registros, $cantidad_registros";
} elseif ($perfil === "3"){
    $consulta = "   SELECT * FROM Licence
                WHERE UserId IS NULL AND 
                (Code LIKE '%{$searchTerm}%'
                OR Title LIKE '%{$searchTerm}%')
                AND Type = 'P'
                LIMIT $inicio_registros, $cantidad_registros";
}else{
    $consulta = "   SELECT * FROM Licence
                WHERE UserId IS NULL AND 
                (Code LIKE '%{$searchTerm}%'
                OR Title LIKE '%{$searchTerm}%')
                LIMIT $inicio_registros, $cantidad_registros";
}

$licenciasSQL = $link->query($consulta);
$licenciasHTML = "";
while ($row = $licenciasSQL->fetch_assoc()) {
    $licenciasHTML .= "
    <tr>
        <th class='text-center' scope='row'>".$row['LicenceId']."</th>
        <td class='text-center monospaceFont'>".$row['Code']."</td>
        <td class='text-center'>";

        $licenciasHTML .= $row['Type'];

    $licenciasHTML .= 
    "</td>
        <td class='text-center'>".$row['Title']."</td>
        <td class='text-center'><button class='botonDP hover botonDP_4' type='button' onclick=\"actualizarCodeVer('".$row['LicenceId']."','".$row['Code']."','".$row['Title']."','".$row['Type']."')\">Actualizar</button></td>
        <td><div class='form-check form-switch'><input value='".$row['LicenceId']."' class='form-check-input codLicence' type='checkbox' role='switch'></div></td>
    </tr>  
    ";
}

$imprimirHTML = '
    <div class="row">
        <div class="col-md-2">
            <select id="cantidad_registros" onchange="cantidad()" class="form-select form-select-sm">
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="250">250</option>
                <option value="500">500</option>
            </select>
        </div>
        <div class="col-md-5">
            <p><strong>TOTAL REGISTROS: </strong> '.$cantidad.'</p>
        </div>
        <div class="col-md-5">
            <nav>
                <ul id="pagination" class="pagination justify-content-end">
                    <li class="page-item">
                        <button id="inicio" class="page-link" onclick="inicio()">Inicio</button>
                    </li>
                    <li class="page-item"><button id="anterior" class="page-link" onclick="anterior()"><</button></li>
                    <li class="page-item"><input id="indicador" class="indicador" onchange="cantidad2()" type="number" value="'.$posicion.'"></li>
                    <li class="page-item"><button id="siguiente" class="page-link" onclick="siguiente()">></button></li>
                    <li class="page-item">
                        <button id="fin" class="page-link" value="'.$totalDivicion.'" onclick="fin('.$totalDivicion.')">'.$totalDivicion.'</button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" scope="col">Id</th>
                    <th class="text-center" scope="col">Código</th>
                    <th class="text-center" scope="col">Tipo</th>
                    <th class="text-center" scope="col">Titulo</th>
                    <th class="text-center" scope="col">Actualizar</th>
                    <th class="text-center" scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody id="licenciasBuscadas">
                '.$licenciasHTML.' 
            </tbody>
        </table>
    </div>
';

echo $imprimirHTML;