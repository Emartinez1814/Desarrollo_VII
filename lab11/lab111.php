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
$calculo = new noticia();
$filas = $calculo->calculo();
$totalPagina = $calculo->paginaTotal();
$pagina=1;
//$cantPagina=3;
//$totalPagina= ceil($filas/$cantPagina);

print("<span>Mostrando noticias del ".$pagina." al ".$totalPagina." de un total de ".$filas."</span>\n");

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