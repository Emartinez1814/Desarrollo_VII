<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$numeros = array();
$i=0;

while ( $i <5)
{
	$num = readline("Ingrese un numero");
    array_push($numeros,$num);
	$i = $i + 1;
}

$j=0;
while ( $j <count($numeros))
{
    echo "valor es: ".($j + 1)." : ".$numeros[$j]."<br>";
    $j = $j + 1;

}
  
?>
    
</body>
</html>
