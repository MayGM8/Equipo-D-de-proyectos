<?php
include("connection.php");
$con = connection();

$sql = "SELECT v.id, v.forma_pago, u.nombre, v.total 
    FROM eqe.Venta AS v 
    LEFT JOIN eqe.Usuario AS u 
        ON v.id_usuario = u.id;";
$sql2 = "SELECT id, nombre, costo FROM eqe.Producto;";

$query2 = mysqli_query($con, $sql2);
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
            <h2>Registrar Venta</h2>
            <br>
            <br>
            <table id="tablaProductosVenta">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <br>
            
            <form action="insert_venta.php" method="POST">

                <label for="total">Total</label>
                <input id="total" type="text" readonly value="">
                
                <select id="forma_pago" name="forma_pago">
                    <option value="">Seleccione forma de pago</option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Tarjeta de credito">Tarjeta de credito</option>
                    <option value="Tarjeta de debito">Tarjeta de debito</option>
                    <option value="Transferencia bancaria">Transferencia bancaria</option>
                </select>
                <label for="id_usuario">Usuario Predeterminado</label>
                <input id="id_usuario" type="text" readonly value="1">

                <input type="submit" value="Finalizar Venta">
            </form>

            <div id="tablaProductos">
                <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Producto</th>
                        <th>costo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($query2)): ?>
                        <tr>
                            <th><?= $row['id'] ?></th>
                            <th><?= $row['nombre'] ?></th>
                            <th><?= $row['costo'] ?></th>
                            <th><a href="#Crud" onclick="addProduct(<?= $row['id'] ?>,<?= $row['costo'] ?>,'<?= $row['nombre'] ?>' )" class="products-table--edit">+</a></th>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                </table>
            </div>

        </div>

        <div class="products-table"> 
            <h2>Ventas Registradas</h2>
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
    
    <script src="./js/Venta.js"></script>
</body>

</html>
