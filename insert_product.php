<?php
include("connection.php");
$con = connection();

$id = null;
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];
$costo = $_POST['costo'];
$stock = $_POST['stock'];

// Validación de datos
$errors = array();

if (empty($nombre)) {
    $errors['nombre'] = "El campo 'Nombre' es requerido.";
}

if (empty($marca)) {
    $errors['marca'] = "El campo 'Marca' es requerido.";
}

if (empty($descripcion)) {
    $errors['descripcion'] = "El campo 'Descripción' es requerido.";
}

if (empty($costo)) {
    $errors['costo'] = "El campo 'Costo' es requerido.";
} elseif (!is_numeric($costo)) {
    $errors['costo'] = "El campo 'Costo' debe ser un número válido.";
}

if (empty($stock)) {
    $errors['stock'] = "El campo 'Stock' es requerido.";
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
$sql = "INSERT INTO Producto (nombre, marca, descripcion, costo, stock) VALUES('$nombre','$marca','$descripcion',$costo,'$stock')";
$query = mysqli_query($con, $sql);

if ($query) {
    // Redirigir a la página de productos con un mensaje de éxito
    header("Location: productos.php?success=Producto agregado correctamente");
} else {
    // Error en la consulta SQL
    // Redirigir a la página de productos con un mensaje de error
    header("Location: productos.php?error=Error al agregar el producto");
}
?>
