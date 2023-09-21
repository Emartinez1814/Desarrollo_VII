<!DOCTYPE html>
<html>
<head>
    <title>Laboratorio 4.4</title>
</head>
<body>
	<h1>Llenar Arreglo con Varios Números (Par)</h1>
    <form method="POST" action="lab44.php">
        <label for="numeros">Ingrese el número:</label>
        <input type="number" name="numero" id="numero">
        <input type="submit" value="Agregar al arreglo">
    </form>
<?php


session_start(); // Inicia la sesión para mantener el arreglo entre solicitudes

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$arreglo = [];
    $numeroIngresado = $_POST["numero"];


    if (!isset($_SESSION["contador"])) 
    {
        $_SESSION["contador"] = 0;
    }

	//$_SESSION["arreglo"] = [];


    if ($numeroIngresado % 2 ==0) 
    {

        $arreglo = $numeroIngresado;
        $_SESSION["contador"]++;


        if ($_SESSION["contador"] == 5) 
        {
        	

            echo "Se han ingresado 5 números. El arreglo está completo.";
            echo "<br><br>";

        	session_destroy();

        } else 
        {
            echo "Número de ingresos: " . $_SESSION["contador"];
            echo "<br><br>";
            echo "Número agregado al arreglo: " .$numeroIngresado;
        }

    } else 
    {
        echo "El valor ingresado no es un número PAR.";
    }
}


?>

</body>
</html>