<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $UserGrpIds = explode(',', $_POST['UserGrpId']);
  $Institution = mb_strtoupper($_POST['Institution'], 'UTF-8');
  $City = mb_strtoupper($_POST['City'], 'UTF-8');

  $conn = new mysqli('localhost', 'dinamico', 'dinamico12345', 'DinamicoDB');
  if ($conn->connect_error) {
    die('Error al conectar a la base de datos: ' . $conn->connect_error);
  }

  foreach ($UserGrpIds as $UserGrpId) {

    $query = "UPDATE UserGrp SET colegioId = '$Institution' WHERE UserGrpId = '$UserGrpId'";
    $conn->query($query);

    $usuarios = array();

    $query = "SELECT UserId FROM Classroom WHERE UserGrpId = '$UserGrpId'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row['UserId'];
      }
    }

    foreach ($usuarios as $userId) {
      $query = "UPDATE User SET Institution = '$Institution', City = '$City' WHERE UserId = '$userId'";
      $conn->query($query);
    }
  }

  $conn->close();

  header("location: arreglarColegios.php");
}
