
    <?php
// Verificar si se ha enviado un valor desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inicializar el arreglo (si no existe todavía)
    if (!isset($_SESSION['arreglo'])) {
        $_SESSION['arreglo'] = array();
    }

    // Obtener el valor ingresado desde el formulario
    $valor = $_POST["valor"];

    // Agregar el valor al arreglo
    $_SESSION['arreglo'][] = $valor;

    // Redirigir de nuevo al formulario o a otra página
    header("Location: formulario.html");
    exit; // Asegura que el script se detenga después de la redirección
    echo $valor;
}
?>
