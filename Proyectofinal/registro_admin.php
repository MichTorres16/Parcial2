<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empresa";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recuperar datos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$CP = $_POST['CP'];
$direccion = $_POST['direccion'];
$edad = $_POST['edad'];
$nombre_usuario = $_POST['nombre_usuario'];
$password = $_POST['password'];

// Preparar y vincular
$stmt = $conn->prepare("INSERT INTO registros (nombre, apellidos, correo, telefono, CP, direccion, edad, nombre_usuario, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssissss", $nombre, $apellidos, $correo, $telefono, $CP, $direccion, $edad, $nombre_usuario, $password);

// Ejecutar la declaración
if ($stmt->execute()) {
    echo "Nuevo registro creado con éxito";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>

