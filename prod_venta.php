<?php
include("connection.php");
$con = connection();

$sql = "SELECT *
        FROM prod_venta pv
        INNER JOIN Producto p ON pv.id_producto = p.id
        INNER JOIN Venta v ON pv.id_venta = v.id";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilos.css" rel="stylesheet">
    <title>Productos en Venta</title>
</head>
<body>

    <header>
        <div class="container">
            <p class="logo">Productos en Venta</p>
            <nav>
                <a href="index.html">Home</a>
                <a href="productos.php">Admon. de productos</a>
                <a href="ventas.php">Admon. de ventas</a>
                <a href="clientes.php">Admon. de clientes</a>
                <a href="usuarios.php">Admon. de usuarios</a>
                <a href="#a-trabajar">Comenzemos</a>
                <a href="#Integrantes">Integrantes</a>
            </nav>
        </div>
    </header>

    <section id="hero-prod-venta">
        <h1>Productos<br>en Venta</h1>
        <form action="#ProductosVenta">
            <button>Continuar</button>
        </form>
    </section>

    <section id="ProductosVenta">
        <div class="container">
        </div>
        <div class="products-table">
            <h2>Productos en Venta</h2>
            <table>
                <thead>
                    <tr>
                        <th>No. Ticket</th>
                        <th>Producto</th>
                        <th>ID Usuario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($query)): ?>
                        <tr>
                            <th><?= $row['no_ticket'] ?></th>
                            <th><?= $row['nombre'] ?></th>
                            <th><?= $row['id_usuario'] ?></th>
                            <th><?= $row['total'] ?></th>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>

</body>
</html>
