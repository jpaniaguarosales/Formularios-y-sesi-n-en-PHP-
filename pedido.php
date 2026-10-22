<?php 
session_start();

if (!isset($_SESSION["usuario"]) || empty($_SESSION["usuario"])) {
    header("Location: login.php"); 
    exit();

    }
?>


<?php
$productos = [
    "A" => ["nombre" => "Café solo", "precio" => 1.20],
    "B" => ["nombe" => "Café con leche", "precio" => 1.50],
    "C" => ["nombre" => "Bocadillo", "precio" => 2.80], 
    "D" => ["nombre" => "Agua", "precio" => 1.00]
]

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
        <label for="codigo">
            Código:
            <input type="text" name="codigo">
        </label>
        <label for="unidades">
            Unidades:
            <input type="number" name="unidades">
        </label>
        <input type="submit">
    </form>

    <hr>
    <?php 
    
    if (!isset($_POST["codigo"]) || empty($_POST["codigo"]) || $_POST["unidades"] < 1) {
        echo "<p>Ingresa código correcto o cantidad de unidades correcta</p>"; 
    } else {
        $codigo = $_POST["codigo"]; 
        $unidades = $_POST["unidades"]; 
        $prod = $productos[$codigo] ;
    
        echo "Pedido: <br>" . $prod["nombre"] . "<br>Precio " . $prod["precio"];
    }
    ?>
    
</body>
</html>