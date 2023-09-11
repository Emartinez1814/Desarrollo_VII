<!DOCTYPE html>
<head>
    <title>Laboratorio 4.1</title>
</head>
<body>
<form action="lab41.php" method="post">

Ingrese el Valor: <input type="number" name="Valor"><br>
<input type="submit" name="enviar" value="Enviar datos">
</form>
<?php
$valor=0;
$valor = $_POST['Valor'];
       
    if($valor=="")
    {
        echo "Favor coloque el Valor"; 
    }
    elseif($valor>=80)
    {
        echo '<img src="verde.jpg" alt="" name="Verde">';
    }
    elseif($valor<=79 && $valor>=50)
    {
        echo '<img src="amarillo.jpg" alt="" name="Amarillo">';
    }
    else
    {
        echo '<img src="rojo.jpg" alt="" name="Rojo">';
    }
    
?>


</body>
</html>