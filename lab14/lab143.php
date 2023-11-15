<?php
session_start();
?>
<html lang="es">
    <head>
        <title>Laboratorio 14</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>

    <body>
<?php
    if (isset($_SESSION["usuario_valido"])) {
?>
    <h1>Consulta de Noticias</h1>

<?php
require_once ("class/noticias2.php");

$obj_noticia = new noticia2();
$noticias = $obj_noticia->consultar_noticias();
$nfilas = count ($noticias);
//$i = $obj_noticia->paginacion();//cantidad de filas en el query
$filas = $obj_noticia->calculo();//cantidad de filas en el query
$totalPagina = $obj_noticia->paginaTotal();//cantidad de filas por pagina
$empezarPagina = ($obj_noticia->empezar() + 1);//numero, por la cual iniciara la pagina
$enlace = $obj_noticia->paginaInicio();
$cantFilas= $obj_noticia->cantFilas();

if ($enlace==$totalPagina) {
    print("<span>Mostrando noticias del ".$empezarPagina." al ".$filas." de un total de ".$filas." ");
}else {
    print("<span>Mostrando noticias del ".$empezarPagina." al ".($cantFilas * $enlace)." de un total de ".$filas." ");
}

if ($enlace ==1) {
    print('[Anterior |<a href="lab143.php?pagina='.($enlace + 1).'">Siguiente ]</a>');
}elseif($enlace ==$totalPagina) {
    print('<a href="lab143.php?pagina='.($enlace - 1).'">[Anterior |</a>Siguiente ]');
}else {
    print('<a href="lab143.php?pagina='.($enlace - 1).'">[Anterior |</a><a href="lab143.php?pagina='.($enlace + 1).'">Siguiente ]</a>');
}

if($nfilas>0){
    print("<table>\n");
    print("<tr>\n");
    print("<th>Titulo</th>\n");
    print("<th>Texto</th>\n");
    print("<th>Categoria</th>\n");
    print("<th>Fecha</th>\n");
    print("<th>Imagen</th>\n");
    print("</tr>\n");

    foreach($noticias as $resultado){
        print("<tr>\n");
        print("<td>".$resultado['titulo']."</td>\n");
        print("<td>".$resultado['texto']."</td>\n");
        print("<td>".$resultado['categoria']."</td>\n");
        print("<td>".date("j/n/Y",strtotime($resultado['fecha']))."</td>\n");

        if($resultado['imagen']!=""){
            print("<td><a target='_blank' href='img/".$resultado['imagen']."'><img border='0' src='img/iconotexto.gif'></a></td>\n");
        }
        else{
            print("<td>&nbsp</td>\n");
        }
        print("<tr>\n");
    }
    print("</table>\n");
}
else{
    print("No hay noticias disponibles");
}
?>
<?php
print("<p>[ <a href='login.php'>Menu principal</a> ]</p>\n");
}else {
    print("<br><br>");
    print("<p align='center'>Acceso no Autorizado</p>\n");
    print("<p align='center'>[ <a href='login.php' target='_top'>Conectar</a> ]</p>\n");
}
?>
</body>
</html>