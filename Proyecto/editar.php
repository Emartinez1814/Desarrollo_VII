<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Crear Tarea</title>
</head>
<body>

    <form name="checklis" method="post" action="editar.php">
        <div>
            <h1>Editar Tarea</h1>
            <h3>* Seleccione la tarea que se editará</h3>
        </div>
        <?php
        require_once('class/conect.php');
        
            $obj_noticia = new tareas();
            $tareas = $obj_noticia->por_editar($id);

            print "<table>\n";
            print "<tr>\n";
            print "<th>Id</th>\n";
            print "<th>Título</th>\n";
            print "<th>Descripción</th>\n";
            print "<th>Estado</th>\n";
            print "<th>Fecha de Tarea</th>\n";
            print "<th>Etiqueta</th>\n";
            print "<th>Responsable</th>\n";  
            print "<th>Tipo de Tarea</th>\n";
            print "<th>Fecha de Edición</th>\n";
                    

            foreach ($tareas as $resultado) {
                print "<tr>\n";
                //print "<td><input type='checkbox' name='miCheckbox' value='seleccionado' id='miCheckbox'>".$resultado['Id']."</td>";
                print "<td><input type='text' name='id' value=".$resultado['Id']." readonly></td>";
                print "<td><input type='text' name='titulo' value=".$resultado['titulo']."></td>";
                print "<td><input type='text' name='descripcion' value=".$resultado['descripcion']."></td>";
                print "<td><input type='text' name='estado' value=".$resultado['estado']."></td>";
                print "<td><input type='date' name='fecha' value=".$resultado['fechaC']."></td>";
                print "<td><input type='text' name='etiqueta' value=".$resultado['etiqueta_editado']."></td>";
                print "<td><input type='text' name='responsable' value=".$resultado['responsable']."></td>";             
                print "<td><input type='text' name='tipo' value=".$resultado['tipo']."></td>";
                print "<td><input type='date' name='fechaE' value=".$resultado['fechaE']."></td>";

                print "</tr>\n";
            }
            print "</table>\n";
            
            //print "<input type='submit' name='enviar' value='Enviar'>";
            print "<input type='submit' value='Guardar Cambios' name='enviar'>";

            if (isset($_POST['enviar'])) {
                $id = $_POST['id'];
                $ti = $_POST['titulo'];
                $des = $_POST['descripcion'];
                $es = $_POST['estado'];
                $fec  = $_POST['fecha'];
                $et = $_POST['etiqueta'];
                $res = $_POST['responsable'];
                $tip = $_POST['tipo'];
                $fecE = $_POST['fechaE'];

                $obj_tarea = new tareas();
                $editar = $obj_tarea->editar($id,$ti,$des,$es,$fec,$et,$res,$tip,$fecE);
                print "<br>";
                print "Se han actualizado los datos";
            }else {
                print "";
            }
        ?>

        <hr>
        <a href="crear.php"><h4>Asignación de Tareas</h4></a>
        <a href="tarea.php"><h4>Tareas</h4></a><br>
        <a href="reporte.php"><h4>Reportes</h4></a>
    </form>
</body>
</html>
