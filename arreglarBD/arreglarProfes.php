<?php
// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "dinamico";
$password = "dinamico12345";
$dbname = "DinamicoDB";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL con JOIN
$sql = "SELECT UserId, City, Rol
        FROM User
        WHERE Rol IN ('Profesor')";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>PROFES</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h2>Profesores</h2>
    <form method="POST" action="procesar_formularioProfe.php">
    <label for="UserId">UserId:</label>
    <textarea name="UserId" id="UserId" required></textarea><br>
        
    <label for="City">City:</label>
    <input type="number" name="City" id="City" required><br>
    
    <input type="submit" value="Guardar">
    </form>
    <h2>Resultados de la consulta</h2>
    <table>
        <tr>
            <th>UserId</th>
            <th>City</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Mostrar los datos en la tabla
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["UserId"] . "</td>";
                echo "<td>" . $row["City"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<tr><td colspan='4'>No se encontraron resultados</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>