<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Resultado de h(x, y, z)</title>
</head>
<body>
<div class="container">
    <h2>Resultado de h(x, y, z)</h2>
    <?php
    function f($a) {
        return 4 * pow($a, 3) + g(2 * $a, -3 * $a);
    }

    function g($b, $c) {
        return (7 * $b - 3) % ($c * $c + 1);
    }

    function h($x, $y, $z) {
        return f($x / $y) + 3 * g($z / $y, $x);
    }
    $x = isset($_POST['x']) ? $_POST['x'] : null;
    $y = isset($_POST['y']) ? $_POST['y'] : null;
    $z = isset($_POST['z']) ? $_POST['z'] : null;

    $resultado = h($x, $y, $z);
    echo "<p>El resultado de h($x, $y, $z) es: $resultado</p>";
    ?>
    <img src="bien.jpg" alt="bien">
    </div>
</body>
</html>