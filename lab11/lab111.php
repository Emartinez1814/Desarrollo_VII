<html lang="es">
    <head>
        <title>Laboratorio 11.1</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>

    <body>
        <h1>Consulta de Noticias</h1>
        

<?php
require_once ("class/noticias.php");

$obj_noticia = new noticia();
$noticias = $obj_noticia->consultar_noticias();
$nfilas = count ($noticias);
//$calculo = new noticia();
$filas = $obj_noticia->calculo();//cantidad de filas en el query
$totalPagina = $obj_noticia->paginaTotal();//cantidad de filas por pagina
$empezarPagina = ($obj_noticia->empezar() + 1);//numero, por la cual iniciara la pagina
$enlace = $obj_noticia->paginaInicio();
//$enlace1 = $obj_noticia->paginaFinal();
//$enlace = 1;
//$enlace1 = 2;

print("<span>Mostrando noticias del ".$empezarPagina." al ".$totalPagina." de un total de ".$filas." ");
print('<a href="lab111.php?pagina='.$enlace.'">[Anterior |</a><a href="lab111.php?pagina='.$enlace.'">Siguiente ]</a>');

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
</body>
</html>