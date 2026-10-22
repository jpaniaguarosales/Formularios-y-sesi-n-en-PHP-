<?php
session_start();
    if (isset($_SESSION["usuario"])) {
        header("Location: pedido.php"); 
        exit(); 
    }
?>

<?php

// Variable para el mensaje de error: 
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST["usuario"] ?? "";


    $clave = $_POST["clave"] ?? "";

    if ($usuario === "daw" && $clave === "daw2026") {
        $_SESSION["usuario"] = $usuario;
        header("Location: pedido.php");
        exit();
    } else {
        $mensaje = "Usuario o clave incorrectos";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h3>Login:</h3>
    <hr>

    <form method="post" action="">
        <label>
            Usuario:
            <input type="text" name="usuario">
        </label>
        <label>
            Clave:
            <input type="password" name="clave">
        </label>
        <input type="submit" value="Iniciar sesion">
    </form>

    <?php 
    if ($mensaje != "") {
        echo "<p class='mensaje'>" . htmlspecialchars($mensaje) . "</p>"; 
    }
    ?>


</body>

</html>