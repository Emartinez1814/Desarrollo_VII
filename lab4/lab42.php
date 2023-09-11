<?php
$i=1;
$num=1;
//$numero = 5;
$numero = $_POST['num'];

while ( $i <= $numero){
	$num = $num * $i;
	$i = $i + 1;
}

echo "El factorial del numero ".$numero." es = $num";
       
    
?>