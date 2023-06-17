<?php
include("connection.php");
$con = connection();

$sql = "SELECT * FROM Producto";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilos.css" rel="stylesheet">
    <title>Users CRUD</title>
</head>

<body>
    <div class="users-form">
        <h1>Administraciòn de productos</h1>
        <form action="insert_product.php" method="POST">
            <input type="text" name="nombre" placeholder="nombre">
            <input type="text" name="marca" placeholder="marca">
            <input type="text" name="descripcion" placeholder="Descripcion">
            <input type="text" name="costo"  placeholder="costo">

            <select id="stock" name="stock">
                <option value="">Seleccione una opción...</option>
                <option value="disponible">Disponible</option>
                <option value="agotado">Agotado</option>
            </select>

            <input type="submit" value="Agregar">
        </form>
    </div>

    <div class="products-table">
        <h2>PRODUCTOS REGISTRADOS</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['id'] ?></th>
                        <th><?= $row['nombre'] ?></th>
                        <th><?= $row['marca'] ?></th>
                        <th><?= $row['descripcion'] ?></th>
                        <th><?= $row['costo'] ?></th>
                        <th><?= $row['stock'] ?></th>
                        <th><a href="update.php?id=<?= $row['id'] ?>" class="users-table--edit">Editar</a></th>
                        <th><a href="delete_user.php?id=<?= $row['id'] ?>" class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>
