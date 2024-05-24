<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
    
</head>
<body>

        <?php
        //CONEXION CON EL FORMULARIO
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Acceso Autorizado</h2>";

    // Recibir datos del formulario
    $nombre = $_POST["txtNombre"];
    $apellidos = $_POST["txtapellidos"];
    $telefono = $_POST["txttelefono"];
    $direccion = $_POST["txtdireccion"];
    $correo = $_POST["txtcorreo"];
    $matricula = $_POST["txtmatricula"];
    $padre = $_POST["txtpadre"];
    $fecha_nac = $_POST["txtfecha_nac"];

    echo "<p>Nombre: $nombre</p>";
    echo "<p>Apellidos: $apellidos</p>";
    echo "<p>Telefono: $telefono</p>";
    echo "<p>Direccion: $direccion</p>";
    echo "<p>Correo: $correo</p>";
    echo "<p>Matricula: $matricula</p>";
    echo "<p>Padre/Tutor: $padre</p>";
    echo "<p>Fecha de Nacimiento: $fecha_nac</p>";

    //CONEXION A MySQL
    $conexion = mysqli_connect('localhost', 'root', '', 'escuela', 3306);
    
    // Verificando la conexión
    if (!$conexion) {
        echo("La conexión ha fallado: " . mysqli_connect_error());
    }

    //CONSULTA
    $consulta = "INSERT INTO Alumnos (Nombre, Apellidos, Telefono, Direccion, Correo, Matricula, Padre, Fecha_nac) VALUES ('$nombre', '$apellidos', '$telefono', '$direccion', '$correo', '$matricula', '$padre', '$fecha_nac')";

    // Ejecutar consulta
    if (mysqli_query($conexion, $consulta)) {
        echo "REGISTRO INSERTADO EN LA TABLA ALUMNOS.";
    } 
    else 
    {
        echo "Error_ al insertar EL  registro: " . mysqli_error($conexion);
    }

    // Cerrar conexión
    mysqli_close($conexion);
} 
else 
{
    echo "Error: Acceso no autorizado.";
}
        ?>


</body>
</html>
