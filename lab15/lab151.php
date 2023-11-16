<html lang="es">
    <head>
        <title>Ejemplo Data Table Jquery</title>
        <link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css">
        <script type="text/javascript" language="javascript" src="jquery-3.1.1.js"></script>
        <script type="text/javascript" language="javascript" src="jquery.dataTables.min.js"></script>
    </head>
    <body>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#grid').DataTable ({
                "lengthMenu":[5,10,20,50],
                "order":[[0,"asc"]],
                "language":{
                    "lengthMenu": "Mostrar _MENU_ registro por pagina",
                    "zeroRecords": "No existen resultados en su busqueda",
                    "info": "Mostrando _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "Buscando entre _MAX_ registros en total",
                    "search": "Buscar: ",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                }
            });
           $("*").css("font-family","arial").css('font-size','12px'); 
        });
    </script>
        <h1>Consulta de Noticias</h1>
<?php
require_once ("class/noticias.php");

$obj_noticia = new noticia();
$noticias = $obj_noticia->consultar_noticias();
$nfilas = count ($noticias);

if($nfilas>0){
    print("<table id='grid' class='display' cellspacing='0'>\n");
    print("<thead>");
    print("<tr>\n");
    print("<th>Titulo</th>\n");
    print("<th>Texto</th>\n");
    print("<th>Categoria</th>\n");
    print("<th>Fecha</th>\n");
    print("<th>Imagen</th>\n");
    print("</tr>\n");
    print("</thead>");
    print("<tbody>");

    foreach($noticias as $resultado){
        print("<tr>\n");
        print("<td>".$resultado['titulo']."</td>\n");
        print("<td>".$resultado['texto']."</td>\n");
        print("<td>".$resultado['categoria']."</td>\n");
        print("<td>".date("j/n/Y",strtotime($resultado['categoria']))."</td>\n");

        if($resultado['imagen']!=""){
            print("<td><a target='_blank' href='img/".$resultado['imagen']."'><img border='0' src='img/iconotexto.gif'></a></td>\n");
        }
        else{
            print("<td>&nbsp</td>\n");
        }
        print("<tr>\n");
        print("</tbody>");
    }
    print("</table>\n");
}
else{
    print("No hay noticias disponibles");
}
?>
</body>
</html>