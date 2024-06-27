<?php
session_start();

//administrador
$admin_username = 'Angie';
$admin_password = 'abc123';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['username'];
    $contraseña = $_POST['password'];

    // Validación
    if ($usuario == $admin_username && $contraseña == $admin_password) {
        $_SESSION['loggedin'] = true;
        header('Location: admin.php');
        exit;
    } else {
        echo "<div class='error'>Usuario o contraseña incorrectos.</div>";
    }
}
?>
