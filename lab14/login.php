<?php
session_start();
if (isset($_REQUEST['usuario']) && isset($_REQUEST['clave'])) {
    $usuario = $_REQUEST['usuario'];
    $clave = $_REQUEST['clave'];

    $salt = substr($usuario,0,2);
    $clave_crypt = crypt($clave,$salt);

    require_once("class/usuario.php");

    $obj_usuarios = new usuarios ();
    $usuarios_validado = $obj_usuarios->validar_usuario($usuario,$clave_crypt);
    
    foreach ($usuarios_validado as $array_resp) {
        foreach ($array_resp as $value) {
            $nfilas = $value;
        }
    }

    if ($nfilas>0) {
        $usuarios_valido = $usuario;
        $_SESSION["usuario_valido"] = $usuarios_valido
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 14</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
<?php
//sesion iniciada
    if (isset($_SESSION["usuario_valido"])) {
?>
<h1>Gestion de Noticias</h1>
<hr>
<ul>
    <li><a href="lab42.php"></a>Listar todas las noticias</li>
    <li><a href="lab43.php"></a>Listarnoticias por partes</li>
    <li><a href="lab44.php"></a>Buscar noticias</li>
</ul>
<hr>
<p>[ <a href="logout.php">Desconectar</a> ]</p>
    
</body>
</html>