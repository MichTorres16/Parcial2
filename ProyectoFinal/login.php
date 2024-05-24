<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["nombre"];
    $password = sha1($_POST["password"]); 

    
    $conexion = new mysqli('localhost', 'root', '', 'escuela', 3306);
    if ($conexion->connect_error)
     {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    $consulta = $conexion->prepare("SELECT * FROM Usuarios WHERE login = ? AND password = ?");
    $consulta->bind_param('ss', $login, $password);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0)
     {
        $fila = $resultado->fetch_assoc();
        echo "<h2>Acceso Autorizado</h2>";
        echo "<p>Nombre: " . $fila['nombre'] . "</p>";
        echo "<p>Login: $login</p>";
    } 
    else 
    {
        echo "Error: Usuario no autorizado.";
    }

    $consulta->close();
    $conexion->close();
} else {
    echo "Error: Acceso no autorizado.";
}
?>