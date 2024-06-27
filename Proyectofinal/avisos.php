<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Avisos</title>
    <link rel="stylesheet" href="angie.css">
</head>
<body>
<header>
        <!-- <img src="img/cbtis.jpg" class="left-img" width="150px" alt="cbtis"> -->
        <h1>Cuidado Del Medio Ambiente</h1>
        <nav>
            <ul>
                <ul>
                    <li><a href="inicio.html">Inicio</a></li>
                    <li><a href="Causas y Consecuencias.html">Causas y Consecuencias</a></li>
                    <li><a href="Qué debemos hacer.html">¿Qué debemos hacer?</a></li>
                    <li><a href="Sostenibilidad.html">Sostenibilidad</a></li>
                    <li><a href="Concientización.html">Concientización</a></li>
                    <li><a href="contacto.html">contacto</a></li>
                    <li><a href="avisos.php">Avisos</a></li>
                </ul>
            </ul>
        </nav>
    </header>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    color: #343a40;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
}

.avisos-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.aviso-box {
    padding: 20px;
    background-color: #e9ecef;
    border-radius: 8px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.aviso-box h3 {
    margin-top: 0;
    color: #007bff;
}

.aviso-box p {
    margin: 10px 0;
    color: #343a40;
}

.aviso-box .fecha {
    display: block;
    margin-top: 10px;
    font-size: 0.9em;
    color: #6c757d;
}

form {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
}

label {
    margin-top: 10px;
}

input, textarea, button {
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ced4da;
    border-radius: 4px;
}

button {
    background-color: #007bff;
    color: #ffffff;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

.success {
    color: green;
    margin-bottom: 15px;
}

.error {
    color: red;
    margin-bottom: 15px;
}


    </style>
    <div class="container">
        <h1>Avisos</h1>
        <div class="avisos-container">
            <?php
            $sql = "SELECT * FROM avisos ORDER BY fecha DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='aviso-box'>";
                    echo "<h3>" . $row["titulo"] . "</h3>";
                    echo "<p>" . $row["texto"] . "</p>";
                    echo "<span class='fecha'>" . $row["fecha"] . "</span>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay avisos.</p>";
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>

