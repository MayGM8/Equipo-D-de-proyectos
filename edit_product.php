<?php
include("connection.php");
$con = connection();

$id = $_POST["id"];
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];
$costo = $_POST['costo'];
$stock = $_POST['stock'];

$errors = array(); // Arreglo para almacenar los mensajes de error

if (empty($nombre)) {
    $errors['nombre'] = "El campo 'Nombre' es obligatorio.";
}

if (empty($marca)) {
    $errors['marca'] = "El campo 'Marca' es obligatorio.";
}

if (empty($descripcion)) {
    $errors['descripcion'] = "El campo 'Descripción' es obligatorio.";
}

if (empty($costo)) {
    $errors['costo'] = "El campo 'Costo' es obligatorio.";
}

if (empty($stock)) {
    $errors['stock'] = "Debe seleccionar una opción para 'Stock'.";
}

if (count($errors) === 0) {
    // No hay errores, realizar la actualización en la base de datos
    $sql = "UPDATE producto SET nombre='$nombre', marca='$marca', descripcion='$descripcion', costo='$costo', stock='$stock' WHERE id='$id'";
    $query = mysqli_query($con, $sql);

    if ($query) {
        Header("Location: productos.php?#Crud");
    } else {
        // Error al ejecutar la consulta
    }
} else {
    // Redireccionar a update.php con los errores en la URL
    $errorsParam = urlencode(json_encode($errors));
    Header("Location: update.php?id=$id&errors=$errorsParam");
}

?>
