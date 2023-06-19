<?php
include("connection.php");
$con = connection();

$forma_pago = $_POST['forma_pago'];
$id_usuario = $_POST['id_usuario'];
$total = $_POST['total'];

// Validación de datos
$errors = array();


if (empty($id_usuario)) {
    $id_usuario = 1;
}

// Verificar si hay errores de validación
if (!empty($errors)) {
    // Convertir el array de errores a una cadena de texto en formato JSON
    $errors_json = json_encode($errors);
    // Redirigir de vuelta al formulario con los mensajes de error como parámetros en la URL
    header("Location: productos.php?errors=$errors_json");
    exit();
}

// Realizar la inserción en la base de datos
$sql = "INSERT INTO Venta (forma_pago, id_usuario, total) VALUES('$forma_pago','$id_usuario','$total')";
$query = mysqli_query($con, $sql);

if ($query) {
    // Redirigir a la página de productos con un mensaje de éxito
    header("Location: ventas.php?success=Venta agregada correctamente");
} else {
    // Error en la consulta SQL
    // Redirigir a la página de productos con un mensaje de error
    header("Location: ventas.php?error=Error al agregar la venta");
}
?>
