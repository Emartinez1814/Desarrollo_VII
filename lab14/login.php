<?php
session_start();
if (isset($_REQUEST['usuario']) && isset($_REQUEST['clave'])) {
    $usuario = $_REQUEST['usuario'];
    $clave = $_REQUEST['clave'];

    $salt = substr($usuario,0,2);
    $clave_crypt = crypt($clave,$salt);

    require_once("class/usuarios.php");

    $obj_usuarios = new usuarios ();
    $usuario_validado = $obj_usuarios->validar_usuario($usuario,$clave_crypt);
    
    foreach ($usuario_validado as $array_resp) {
        foreach ($array_resp as $value) {
            $nfilas = $value;
        }
    }
    if ($nfilas>0) {
        $usuario_valido = $usuario;
        $_SESSION["usuario_valido"] = $usuario_valido;
    }
}
?>
<!DOCTYPE html public "-//W3C/DTD HTML 4.0//EN" 
"http://www.w3.org/TR/html4/strict.dtd">
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
    <li><a href="lab42.php">Listar todas las noticias</a></li>
    <li><a href="lab43.php">Listarnoticias por partes</a></li>
    <li><a href="lab44.php">Buscar noticias</a></li>
</ul>
<hr>
<p>[ <a href="logout.php">Desconectar</a> ]</p>
<?php
    }
//intento de entrada fallida
    elseif (isset($usuario)) {
        print("<br><br>\n");
        print("<p align='center'>Acceso no autorizado</p>\n");
        print("<p align='center'>[ <a href='logout.php'>Desconectar</a> ]</p>\n");
    }
    //Sesion no iniciada
    else {
        print("<br><br>\n");
        print("<p class='parrafocentrado'>Esta zona tiene el acceso restringido.<br>"." Para entrar debe identificarse</p>\n");
        print("<form class='entrada' name='login' actio n='login.php' method='post'>\n");
        print("<p><label class='etiqueta-entrada'>Usuario:</label>\n");
        print("<input type='text' name='usuario' size='15'></p>\n");
        print("<p><label class='etiqueta-entrada'>Clave:</label>\n");
        print("<input type='password' name='clave' size='15'></p>\n");
        print("<p><input type='submit' value='entrar' size='15'></p>\n");
        print("</form>\n");
        print("<p class='parrafocentrado'>NOTA: si no dispone de identificacion o tiene problemas ". 
        "para entrar<br> pongase en contacto con el ".
        "<a href='MAILTO:webmaster@localhost'>Administrador</a> del sitio</p>\n");
    }
    ?>
</body>
</html>