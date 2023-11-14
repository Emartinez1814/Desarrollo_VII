<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Tareas</title>
</head>
<body>
    <form method="post" action="tarea.php">
        <div>
            <h1>Tareas por Hacer</h1>
            <?php

                require_once('class/conect.php');

                $obj_noticia = new tareas();
                $tareas = $obj_noticia->consulta_por_hacer(); 
                $nfilas = count($tareas);

                print "<table>\n";
                print "<tr>\n";
                print "<th>Check</th>\n";
                print "<th>Título</th>\n";
                print "<th>Descripción</th>\n";
                print "<th>Fecha de Tarea</th>\n";
                print "<th>Responsable</th>\n";
                print "<th>Tipo de Tarea</th>\n";
                print "<th>Fecha de Edición</th>\n";
                                

                foreach ($tareas as $resultado) {
                    print "<tr>\n";
                    //print "<td><input type='checkbox' name='miCheckbox' value='seleccionado' id='miCheckbox'>".$resultado['Id']."</td>";
                    print "<td><input type='checkbox' name='miCheckbox' value=".$resultado['Id']." id='miCheckbox' >".$resultado['Id']."</td>";
                    print "<td>".$resultado['titulo']."</td>";
                    print "<td>".$resultado['descripcion']."</td>";
                    print "<td>".date("d/m/Y H:i:s",strtotime($resultado['fechaC']))."</td>";
                    print "<td>".$resultado['responsable']."</td>";
                    print "<td>".$resultado['tipo']."</td>";
                    print "<td>".date("d/m/Y H:i:s",strtotime($resultado['fechaE']))."</td>";
                    print "</tr>\n";
                }
                    print "</table>\n";
                    print "<br>";

                    print "<input type='submit' name='enviar' value='Enviar'>";
                    print "<input type='submit' name='editar' value='Editar'>" ;
                    print "<input type='submit' name='eliminar' value='Eliminar' >";

                    if (isset($_POST['miCheckbox'])) {
                        if (isset($_POST['enviar'])) {

                            $actualizar = $_POST['miCheckbox'];
                            $obj_noticia = new tareas();
                            $tareas = $obj_noticia->actualizar($actualizar);
                            header("Location:tarea.php");
                        }  
                        //}else {
                        //  print "NO SE HA ESCOJIDO UNA CASILLA";
                    }
                    if (isset($_POST['miCheckbox'])) {
                        if(isset($_POST['editar'])){
                                        
                            $id = $_POST['miCheckbox'];
                            $obj_noticia = new tareas();
                            //$tareas = $obj_noticia->por_editar($id);
                            //$obj_noticia = new tareas();
                            $tareas = $obj_noticia->por_editar($id);
                            print "<br>";
                            print "<br>";

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
                                print "<td><input type='text' name='id' value=".$resultado['Id']." ></td>";
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
                            print "<br>";
                            
                            //print "<input type='submit' name='enviar' value='Enviar'>";
                            print "<input type='submit' value='Guardar Cambios' name='editar'>";
                            print "<input type='submit' value='Cancelar' name='cancelar'>";
                        }

                        if(isset($_POST['eliminar'])){

                            $id = $_POST['miCheckbox'];
                            $obj_noticia = new tareas();
                            //$tareas = $obj_noticia->por_editar($id);
                            //$obj_noticia = new tareas();
                            $tareas = $obj_noticia->por_editar($id);
                            print "<br>";
                            print "<br>";
        
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
                                print "<td><input type='text' name='titulo' value=".$resultado['titulo']." readonly></td>";
                                print "<td><input type='text' name='descripcion' value=".$resultado['descripcion']." readonly></td>";
                                print "<td><input type='text' name='estado' value=".$resultado['estado']." readonly></td>";
                                print "<td><input type='date' name='fecha' value=".$resultado['fechaC']." readonly></td>";
                                print "<td><input type='text' name='etiqueta' value=".$resultado['etiqueta_editado']." readonly></td>";
                                print "<td><input type='text' name='responsable' value=".$resultado['responsable']." readonly></td>";             
                                print "<td><input type='text' name='tipo' value=".$resultado['tipo']." readonly></td>";
                                print "<td><input type='date' name='fechaE' value=".$resultado['fechaE']." readonly></td>";
        
                                print "</tr>\n";
                            }
                            print "</table>\n";
                            print "<br>";
                                
                            //print "<input type='submit' name='enviar' value='Enviar'>";
                            print "<input type='submit' value='Guardar Cambios' name='eliminar'>";
                            print "<input type='submit' value='Cancelar' name='cancelar'>";
                        }

                    }else{

                        if (isset($_POST['editar'])) {
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
                            header("Location:tarea.php");
                        }else {
                            print "";
                        }

                        if (isset($_POST['eliminar'])) {
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
                            $editar = $obj_tarea->eliminar($id);
                            print "<br>";
                            print "Se han eliminado los datos";
                            header("Location:tarea.php");
                        }else {
                            print "";
                        }
                    }                
            ?>
            <hr>
        </div>
    <!--</form>-->
    <div>
        <h1>Tareas en Proceso </h1>
        
    <?php

        require_once('class/conect.php');

        $obj_noticia = new tareas();
        $tareas = $obj_noticia->consulta_en_proceso(); 
        $nfilas = count($tareas);

        print "<table>\n";
        print "<tr>\n";
        print "<th>Check</th>\n";
        print "<th>Título</th>\n";
        print "<th>Descripción</th>\n";
        print "<th>Fecha de Tarea</th>\n";
        print "<th>Responsable</th>\n";
        print "<th>Tipo de Tarea</th>\n";
        print "<th>Fecha de Edición</th>\n";
                

        foreach ($tareas as $resultado) {
            print "<tr>\n";
            print "<td><input type='checkbox' name='micheckbox' value=".$resultado['Id']." id='micheckbox'>".$resultado['Id']."</td>";
            print "<td>".$resultado['titulo']."</td>";
            print "<td>".$resultado['descripcion']."</td>";
            print "<td>".date("d/m/Y H:i:s",strtotime($resultado['fechaC']))."</td>";
            print "<td>".$resultado['responsable']."</td>";
            print "<td>".$resultado['tipo']."</td>";
            print "<td>".date("d/m/Y H:i:s",strtotime($resultado['fechaE']))."</td>";
            print "</tr>\n";
            
        }
        print "</table>\n";
        print "<br>";
        print "<input type='submit' name='ejecutar' value='Ejecutar' >";

        if (isset($_POST['micheckbox'])) {
            if (isset($_POST['ejecutar'])) {

                $actualizar = $_POST['micheckbox'];
                $obj_noticia = new tareas();
                $tareas = $obj_noticia->actualizar_terminado($actualizar);
                header("Location:tarea.php");
                //print "PRUEBA DE EJECUCION";
            }  
            //}else {
              //  print "NO SE HA ESCOJIDO UNA CASILLA";
        }
    ?>
        <hr>
    </div>
    <div>
        <h1>Tareas Terminadas</h1>
        
        <?php

        require_once('class/conect.php');

        $obj_noticia = new tareas();
        $tareas = $obj_noticia->consulta_terminado(); 
        $nfilas = count($tareas);

        print "<table>\n";
        print "<tr>\n";
        print "<th>ID</th>\n";
        print "<th>Título</th>\n";
        print "<th>Descripción</th>\n";
        print "<th>Fecha de Tarea</th>\n";
        print "<th>Responsable</th>\n";
        print "<th>Tipo de Tarea</th>\n";
        print "<th>Fecha de Edición</th>\n";
                

        foreach ($tareas as $resultado) {
            print "<tr>\n";
            //print "<td><input type='checkbox' name='miCheckbox' value=".$resultado['Id']." id='miCheckbox'>".$resultado['Id']."</td>";
            print "<td>".$resultado['Id']."</td>";
            print "<td>".$resultado['titulo']."</td>";
            print "<td>".$resultado['descripcion']."</td>";
            print "<td>".date("d/m/Y H:i:s",strtotime($resultado['fechaC']))."</td>";
            print "<td>".$resultado['responsable']."</td>";
            print "<td>".$resultado['tipo']."</td>";
            print "<td>".date("d/m/Y H:i:s",strtotime($resultado['fechaE']))."</td>";
            print "</tr>\n";
        }
        print "</table>\n";
        ?>   
        <hr>
    </div>
    <br><br>

    <a href="crear.php"><h4>Asignación de Tareas</h4></a>
    <a href="reporte.php"><h4>Reportes</h4></a>
    </form>
</body>
</html>