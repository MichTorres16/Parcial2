<?php
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$basededatos = "empresa";
$puerto = "3306";

$conn = new mysqli($servidor, $usuario, $contraseña, $basededatos, $puerto);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>