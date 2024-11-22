<?php
    require_once('/var/www/html/moodle/config-ext.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $identificador = $_POST["valor"];

        $sql = "SELECT
            g.id,
            g.titulo,
            g.qr,
            g.fecha,
            a.enlace,
            GROUP_CONCAT(u.url SEPARATOR ', ') AS urls,
            GROUP_CONCAT(u.tituloQR SEPARATOR ', ') AS urlTitulo
        FROM
            QR_generado g
        LEFT JOIN
            QR_aterrizaje a ON g.id_aterrizaje = a.id
        LEFT JOIN 
            QR_enlaces u ON g.id = u.id_generado
        WHERE
            g.id_proyecto = $identificador
        GROUP BY 
            g.id,
            g.titulo,
            g.qr,
            g.fecha,
            a.enlace
        ORDER BY g.titulo ASC";
        
        $registrosQR = "";

        $result = $link->query($sql);
        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $urls = $row['urls'];
                    $urls = explode(",", $urls);
                    $urlTitulo = $row["urlTitulo"];
                    $urlTitulo = explode(",", $urlTitulo);

                    $variableUrl = [];
                    $countUrls = count($urls);
                    $countTitulos = count($urlTitulo);

                    for ($i = 0; $i < $countUrls; $i++) {
                        if (isset($urlTitulo[$i])) {
                            $variableUrl[] = '<a href="' .$urls[$i]. '" class="btn btn-outline-dark m-1" target="_blank">' . htmlspecialchars(trim($urlTitulo[$i])) . '</a>';
                        }
                    }

                    $variableUrl = implode('', $variableUrl);


                    $registrosQR .= '<tr>
                        <td><input class="form-check-input checkqr" type="checkbox" value="'.$row['qr'].'" onchange="buscarcheckqr()"></td>
                        <td>'.$row['titulo'].' <img src="qr/'.$row['qr'].'" style="width:64px; height: auto;" class="img-thumbnail"></td>
                        <td>'.$row['enlace'].'</td>
                        <td>'.$variableUrl.'</td>
                        <td>'.$row['fecha'].'</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example" style="float: right">
                                <a href="qr/'.$row['qr'].'" class="btn btn-dark" download>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
                                    </svg>
                                    Descargar
                                </a>
                                <button type="button" class="btn btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                                        <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1z"/>
                                    </svg> 
                                    Estadística
                                </button>
                                <button type="button" class="btn btn-dark" onclick="editarQR('.$row['id'].')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                    </svg>
                                    Editar
                                </button>
                            </div>
                        </td>
                    </tr>';
                }
            }
        }

        $btnEditores = '<tr>
            <td colspan="6" class="table-light">
                <div class="btn-group" role="group" aria-label="Basic example" style="float: right">
                    <button type="button" class="btn btn-dark" onclick="crearQR(\''.$identificador.'\')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-qr-code" viewBox="0 0 16 16">
                            <path d="M2 2h2v2H2z"/>
                            <path d="M6 0v6H0V0zM5 1H1v4h4zM4 12H2v2h2z"/>
                            <path d="M6 10v6H0v-6zm-5 1v4h4v-4zm11-9h2v2h-2z"/>
                            <path d="M10 0v6h6V0zm5 1v4h-4V1zM8 1V0h1v2H8v2H7V1zm0 5V4h1v2zM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8zm0 0v1H2V8H1v1H0V7h3v1zm10 1h-1V7h1zm-1 0h-1v2h2v-1h-1zm-4 0h2v1h-1v1h-1zm2 3v-1h-1v1h-1v1H9v1h3v-2zm0 0h3v1h-2v1h-1zm-4-1v1h1v-2H7v1z"/>
                            <path d="M7 12h1v3h4v1H7zm9 2v2h-3v-1h2v-1z"/>
                        </svg>
                        Crear Qr
                    </button>
                    <button type="button" class="btn btn-dark actualizar" onclick="miFuncion(\''.$identificador.',QR_proyectos\')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                        </svg>
                        Modificar proyecto
                    </button>
                </div>
            </td>
        </tr>';

        $btnDescargas = '<tr class="table-light">
            <td colspan="6">
                <button type="button" class="btn btn-dark" style="float: right" onclick="downloadQR()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"/></svg> Descargar</button>
            </td>
        </tr>';

        echo $btnEditores.$registrosQR.$btnDescargas;
    }else{
        $sql = "SELECT * FROM QR_proyectos ORDER BY titulo DESC";
        $result = $link->query($sql);
        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $btnProyectos .= '<button class="btn btn-outline-secondary m-1" type="button" data-bs-toggle="button" onclick="verProyecto('.$row["id"].',\''.$row["titulo"].'\')">'.$row["titulo"].'</button><br>';
                }
            }
        }
    }
?>