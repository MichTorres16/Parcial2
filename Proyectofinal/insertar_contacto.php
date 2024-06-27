<?php
// Datos de conexión a la base de datos (ajusta según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empresa";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener y limpiar los datos del formulario
$nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
$apellidos = mysqli_real_escape_string($conn, $_POST['apellidos']);
$correo = mysqli_real_escape_string($conn, $_POST['correo']);
$telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
$codigopostal = mysqli_real_escape_string($conn, $_POST['codigopostal']);
$nombreEmpresa = mysqli_real_escape_string($conn, $_POST['nombreEmpresa']);

// Query SQL para insertar datos en la tabla Contacto
$sql = "INSERT INTO Contacto (nombre, apellidos, correo, telefono, CP, nombre_empresa)
        VALUES ('$nombre', '$apellidos', '$correo', '$telefono', '$codigopostal', '$nombreEmpresa')";

if ($conn->query($sql) === TRUE) {
    echo "¡Datos insertados correctamente!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
