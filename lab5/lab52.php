<?php
if (is_uploaded_file ($_FILES['nombre_archivo_cliente']['tmp_name']))
    {
        $nombreDirectorio = "archivos/";
        $nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
        $nombreCompleto = $nombreDirectorio . $nombrearchivo;
        $permitidos = array ("image/gif","image/png","image/jpg","image/jpeg");
        $limite = 1000;
        if (is_file($nombreCompleto))
           {
                $idUnico = time();
                $nombrearchivo = $idUnico . "-" . $nombrearchivo;
                echo "Archivo repetido, se cambiara el nombre a $nombrearchivo <br><br>";
           }
                if(in_array($_FILES['nombre_archivo_cliente']['type'], $permitidos) 
                && $_FILES['nombre_archivo_cliente']['size'] <= $limite * 1024)
                {
                move_uploaded_file ($_FILES['nombre_archivo_cliente']['tmp_name'], $nombreDirectorio . $nombrearchivo);
                echo "El archivo se ha subido satisfactoriamente al directorio $nombreCompleto <br>";
                } else
                echo "El archivo no es un formato valido o es demasiado grande";
    }
    else
        echo "No se ha podido subir el archivo <br>";
?>