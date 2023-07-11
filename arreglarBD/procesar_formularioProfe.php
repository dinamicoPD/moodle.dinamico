<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $UserIds = explode(',', $_POST['UserId']);
  $City = $_POST['City'];

  $conn = new mysqli('localhost', 'dinamico', 'dinamico12345', 'DinamicoDB');
  if ($conn->connect_error) {
    die('Error al conectar a la base de datos: ' . $conn->connect_error);
  }

  foreach ($UserIds as $UserId) {
    $query = "UPDATE User SET City = '$City' WHERE UserId = '$UserId'";
    $conn->query($query);
  }

  $conn->close();

  header("location: arreglarProfes.php");
}
