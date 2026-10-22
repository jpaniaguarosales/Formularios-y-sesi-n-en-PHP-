<?php 

/* 
El Se utiliza POST para que el usuario y la contraseña no aparezcan en la URL
ni visibles en el historial del navegador o enlaces compartidos 
POST no cifra los datos por si solos, para rpotegerlos durante el envío
necesita el protocolo HTTPS 
*/
session_start();

if (!isset($_SESSION["usuario"]) || empty($_SESSION["usuario"])) {
    header("Location: login.php"); 
    exit();

    }
?>


<?php
$productos = [
    "A" => ["nombre" => "Café solo", "precio" => 1.20],
    "B" => ["nomrbe" => "Café con leche", "precio" => 1.50],
    "C" => ["nombre" => "Bocadillo", "precio" => 2.80], 
    "D" => ["nombre" => "Agua", "precio" => 1.00]
];

$mensaje = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $codigo = $_POST["codigo"] ?? ""; 
    $unidades = $_POST["unidades"] ?? ""; 

    if (!isset($productos[$codigo]))  {
        $mensaje = "Introduce código correcto"; 
    } elseif ($unidades < 1) {
        $mensaje = "Introduce unidades"; 
    } else {
        // Producto e importe (donde me he liado)
        $prod = $productos[$codigo]; 
        $total = $prod["precio"] * $unidades; 

        $mensaje = "Pedido: " . htmlspecialchars($prod["nombre"]) . 
                "<br>Unidades: " . $unidades . 
                "<br>Precio " . number_format($total, 2, ",", ".") . " €"; 
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>Pedido:</h3>
    <hr>

    <form method="post" action="">
        <label>
            Código:
            <input type="text" name="codigo">
        </label>
        <label>
            Unidades:
            <input type="number" name="unidades">
        </label>
        <input type="submit">
    </form>

    <hr>
    <?php 
        if($mensaje != "") {
            echo "<p class='mensaje'>" . $mensaje . "<p>"; 
        }
    
    ?>

    <p><a href="logout.php">Cerar sesión</a></p>    
</body>
</html>