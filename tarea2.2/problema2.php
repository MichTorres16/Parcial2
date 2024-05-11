<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>resultado del problema 2</title>
</head>
<body>
<div class="container">
<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);
$palabra = $_POST['palabra'];

$valor = 0;
foreach (str_split($palabra) as $letra) {
    switch ($letra) {
        case 'Q':
        case 'A':
        case 'Z':
            $valor += 1;
            break;
        case 'W':
        case 'S':
        case 'X':
            $valor += 2;
            break;
        case 'E':
        case 'D':
        case 'C':
            $valor += 3;
            break;
        case 'R':
        case 'F':
        case 'V':
            $valor += 4;
            break;
        case 'T':
        case 'G':
        case 'B':
            $valor += 5;
            break;
        case 'Y':
        case 'H':
        case 'N':
            $valor += 6;
            break;
        case 'U':
        case 'J':
        case 'M':
            $valor += 7;
            break;
        case 'I':
        case 'K':
            $valor += 8;
            break;
        case 'O':
        case 'L':
            $valor += 9;
            break;
        case 'P':
            $valor += 0;
            break;
        default:
            $valor += ord($letra) - 64;
            break;
    }
}

echo "El valor de la palabra $palabra es: $valor";
?>
 <div class="container">
        <img src="p2.jpg" alt="p2">    
    </div>
</div>
</body>
</html>

