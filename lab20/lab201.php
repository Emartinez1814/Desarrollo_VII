<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 20</title>
</head>
<body>
    <form action="lab201.php" method="POST">
    Nombre: <input type="text" name="nombre" require>
    Apellido: <input type="text" name="nombre" require>
    Email: <input type="email" name="email">
    Edad: <input type="submit" name="guardar" value="Guardar datos">
    </form>
    <?php
    include("UsuarioMDB.php");
    $usrs = new UsuarioMDB;

    if (array_key_exists('guardar', $_POST)) {
        $usrs->insertarRegistro($_REQUEST['nombre'],$_REQUEST['apellido'],$_REQUEST['email'],$_REQUEST['edad']);
        echo "Registro insertado exitosamente <br><br>";
    }
    echo "Registros en la coleccion usuarios: <br>";
    $usrs->obtenerRegistros();
    ?>
</body>
</html>