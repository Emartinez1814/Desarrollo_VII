<?php
session_start();    
?>
<!DOCTYPE html>
<html XMLNS="HTTP://www.w3.org/1999/xhtml" xml:lang="en" lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 12</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <h1>Manejo de Sesiones</h1>
    <h2>Paso 1: se crea la variable de sesion y se almacena</h2>
    <?php
    $var = "Ejemplo de sesiones";
    $_SESSION['var']=$var;
    print ("<p>Valor de la variable de sesion :  $var</p>\n");
    ?>

    <a href="lab122.php">Paso 2</a>
    
</body>
</html>