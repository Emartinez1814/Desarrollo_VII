<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>REPORTES</title>
</head>
<body>
    <form method="post" action="reporte.php">
    <div>
        <h1>Reporte</h1>
        Filtrar por: <select name="campo" >
            <option value="estado">Estado</option>
            <option value="tipo">Tipo</option>
            <option value="fechaC">Fecha de Creación</option>
        </select>

        Con el Valor: <input type="text" name="valor">
        <input type="submit" name="filtrar" value="Filtrar">
        <input type="submit" name="todos" value="Ver todos">
        
        <?php

        require_once('class/conect.php');
        if (isset($_POST['todos'])) {
            $obj_noticia = new tareas();
            $tareas = $obj_noticia->consulta(); 
            $nfilas = count($tareas);
    
            print "<table>\n";
            print "<tr>\n";
            print "<th>ID</th>\n";
            print "<th>Título</th>\n";
            print "<th>Descripción</th>\n";
            print "<th>Estado</th>\n";
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
                print "<td>".$resultado['estado']."</td>";
                print "<td>".date("d/m/Y H:i:s",strtotime($resultado['fechaC']))."</td>";
                print "<td>".$resultado['responsable']."</td>";
                print "<td>".$resultado['tipo']."</td>";
                print "<td>".date("d/m/Y H:i:s",strtotime($resultado['fechaE']))."</td>";
                print "</tr>\n";
            }
            print "</table>\n";  
        }
        if (isset($_POST['filtrar'])) {
            $obj_noticia = new tareas();
            $tareas = $obj_noticia->filtrar($_REQUEST['campo'],$_REQUEST['valor']); 
    
            print "<table>\n";
            print "<tr>\n";
            print "<th>ID</th>\n";
            print "<th>Título</th>\n";
            print "<th>Descripción</th>\n";
            print "<th>Estado</th>\n";
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
                print "<td>".$resultado['estado']."</td>";
                print "<td>".date("d/m/Y H:i:s",strtotime($resultado['fechaC']))."</td>";
                print "<td>".$resultado['responsable']."</td>";
                print "<td>".$resultado['tipo']."</td>";
                print "<td>".date("d/m/Y H:i:s",strtotime($resultado['fechaE']))."</td>";
                print "</tr>\n";
            }
            print "</table>\n";  
        }
        
        ?>   
        <hr>
    </div>
    <br><br>

    <a href="crear.php"><h4>Asignación de Tareas</h4></a>
    <a href="tarea.php"><h4>Tarea</h4></a>
    </form>
</body>
</html>