<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: loginF.php');
    exit;
}
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $fecha = $_POST['fecha'];

    $sql = "INSERT INTO avisos (titulo, texto, fecha) VALUES ('$titulo', '$texto', '$fecha')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='success'>Aviso añadido correctamente</div>";
    } else {
        echo "<div class='error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin - Avisos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Panel de Administración</h1>
        <form action="admin.php" method="post">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
            <label for="texto">Texto:</label>
            <textarea id="texto" name="texto" required></textarea>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>
            <button type="submit">Agregar Aviso</button>
        </form>
        <h2>Lista de Avisos</h2>
        <ul>
            <?php
            $sql = "SELECT * FROM avisos ORDER BY fecha DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li><strong>" . $row["fecha"] . " - " . $row["titulo"] . ":</strong> " . $row["texto"] . "</li>";
                }
            } else {
                echo "<li>No hay avisos.</li>";
            }
            $conn->close();
            ?>
        </ul>
    </div>
    <a href="avisos.php" class="button-link">Pagina del Aviso</a>
</body>
</html>
