<html>
    <head>
        <title>laboratorio 2.4</title>
    </head>
    <body>
        <?php
        //creacion del arreglo array("clave"=>"valor")

        $personas = array ("juan"=>"Panama","john"=>"USA","eica"=>"finlandia","juan"=>"Panama","kusanagi"=>"japon");

        //Recorrer todo el arreglo

        foreach ($personas as $persona => $pais)
        {
            print " $persona es de $pais<br>";
        }
        //Impresion especifica
        echo "<br>".$personas["juan"];
        echo "<br>".$personas["eica"];
        ?>
    </body>
</html>