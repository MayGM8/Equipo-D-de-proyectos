<?php
include("connection.php");
$con = connection();

$sql = "SELECT v.id, v.forma_pago, u.nombre, v.total 
    FROM eqe.Venta AS v 
    LEFT JOIN eqe.Usuario AS u 
        ON v.id_usuario = u.id;";

$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/estilos.css" rel="stylesheet">
    <title>Users CRUD</title>
</head>

<body>

    <header>
        <div class="container">
            <p class="logo">Admon. de ventas</p>
            <nav>
                <a href="index.html">Home</a>
                <a href="productos.php">Admon. de productos</a>
                <a href="ventas.php">Admon. de ventas</a>
                <a href="clientes.php">Admon. de clientes</a>
                <a href="usuarios.php">Admon. de usuarios</a>
            
            </nav>
        </div>
    </header>

    <section id="hero-venta">
        <h1>Administracion<br>de Ventas</h1>
        <form action="#Crud">
            <button>Continuar</button>
        </form>
    </section>

    <section id="Crud">
        <div class="container">
        </div>
        <div class="products-form">
            <br>
            <h2>Administracion de Ventas</h2>
            <br>
            <br>
            <br>
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
            <h2>Productos Registrados</h2>
            <table>
                <thead>
                    <tr>
                        <th>No. Venta</th>
                        <th>Forma de pago</th>
                        <th>Vendedor</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($query)): ?>
                        <tr>
                            <th><?= $row['id'] ?></th>
                            <th><?= $row['forma_pago'] ?></th>
                            <th><?= $row['nombre'] ?></th>
                            <th><?= $row['total'] ?></th>
                            <th><a href="prod_venta.php?id=<?= $row['id'] ?>" class="products-table--edit">Ver</a></th>
                            <th><a href="delete_venta.php?id=<?= $row['id'] ?>" class="products-table--delete" >Eliminar</a></th>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    </section>

</body>

</html>
