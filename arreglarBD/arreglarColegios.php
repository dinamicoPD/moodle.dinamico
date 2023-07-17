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
$sql = "SELECT User.UserId, Classroom.UserGrpId, User.Institution, User.City
        FROM User
        LEFT JOIN Classroom ON User.UserId = Classroom.UserId
        LEFT JOIN UserGrp ON Classroom.UserGrpId = UserGrp.UserGrpId
        LEFT JOIN Enrolment ON User.UserId = Enrolment.UserId AND UserGrp.UserGrpId = Enrolment.UserGrpId
        WHERE User.Rol IN ('Estudiante')
        ORDER BY UserGrp.UserGrpId ASC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Estudiantes</title>
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
    <h2>Estudiantes</h2>
    <form method="POST" action="procesar_formulario.php">
    <label for="UserGrpId">UserGrpId:</label>
    <textarea name="UserGrpId" id="UserGrpId" required></textarea><br>
    
    <label for="Institution">Institution:</label>
    <input type="number" name="Institution" id="Institution" required><br>
    
    <label for="City">City:</label>
    <input type="number" name="City" id="City" required><br>
    
    <input type="submit" value="Guardar">
    </form>
    <h2>Resultados de la consulta</h2>
    <table>
        <tr>
            <th>UserId</th>
            <th>UserGrpId</th>
            <th>Institution</th>
            <th>City</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Mostrar los datos en la tabla
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["UserId"] . "</td>";
                echo "<td>" . $row["UserGrpId"] . "</td>";
                echo "<td>" . ($row["Institution"] ?? "") . "</td>";
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