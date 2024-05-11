<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>resultado del problema</title>
</head>
<body>
<div class="container">
<h2>Resultadooo</h2>

 <?php   
 error_reporting(E_ALL); 
 ini_set('display_errors', 1);
 $x = $_POST['x'];

if ($x <= 0) {
    $resultado = $x ** 2 - $x;
} else {
    $resultado = -$x ** 2 + 3 * $x;
}

echo "El resultado de f($x) es: $resultado";
?>
 <div class="container">
        <img src="p1.jpg" alt="p1">    
    </div>
</div>
</body>
</html>
