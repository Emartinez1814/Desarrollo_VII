<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Crear Tarea</title>
</head>
<body>

    <form name="checklis" method="post" action="crear.php">
        <div>
            <h1>Asignación de Tarea</h1>
            <h3>* Determine la tarea, que sera asignada a cada usuario</h3>
        </div>
        <table>
            <tr>
            <th>Título</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Fecha de Tarea</th>
            <th>Etiqueta de Editado</th>
            <th>Responsable</th>
            <th>Tipo de Tarea</th>
            <th>Fecha de Edición</th>
            </tr>

            <tr>
                <td><input type="text" name="titulo"></td>
                <td><input type="text" name="descripcion"></td>
                <td><select name="estado" id="estado">
                    <option value="Por Hacer">Por Hacer</option>
                    <option value="En Proceso">En Proceso</option>
                    <option value="Terminado">Terminado</option>
                </select></td>
                <!--<td><input type="text" name="estado"></td>-->
                <td><input type="date" name="fecha"></td>
                <td><input type="text" name="etiqueta"></td>
                <td><input type="text" name="responsable"></td>
                <td><input type="text" name="tipo"></td>
                <td><input type="date" name="fechaE"></td>
            </tr>
            
        </table>
        <input type="submit" value="agregar" name="agregar">

        <hr>
        <a href="tarea.php"><h4>Tareas</h4></a><br>
        
    </form>
</body>
</html>
<?php
require_once('class/conect.php');

if(isset($_POST['agregar'])){
$ti = $_POST['titulo'];
$des = $_POST['descripcion'];
$es = $_POST['estado'];
$fec  = $_POST['fecha'];
$et = $_POST['etiqueta'];
$res = $_POST['responsable'];
$tip = $_POST['tipo'];
$fecE = $_POST['fechaE'];

$obj_tarea = new tareas();
$insert = $obj_tarea->insertar($ti,$des,$es,$fec,$et,$res,$tip,$fecE);
print "<br>";
print "El registro ha sido exitosa";
}else {
    print "";
}

?>