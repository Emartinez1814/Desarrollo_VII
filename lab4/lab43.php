<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Arreglo Unidimensional de 20 números</h1>
<?php

$listado = [3,5,11,120,2,4,10,17,15,5,1,8,25,9,53,2,30,40,50,93];

$mayor = $listado[0];
$posicion = 0;

foreach ($listado as $clave => $numero) 
{
	if ($numero > $mayor) 
			{

				$mayor = $numero;
				$posicion = $clave;
			}
}
				echo "<br><br>";

	echo "El numero mayor del conjunto de números es: ".$mayor."  en la posición [".$posicion."]";
?>

    
</body>
</html>
