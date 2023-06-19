<?php
include("connection.php");
$con = connection();

$id=$_GET['id'];

$sql = "SELECT p.nombre, pv.cantidad, p.costo 
    FROM eqe.Producto AS p 
    INNER JOIN eqe.prod_venta AS pv 
        ON pv.id_producto = p.id 
    WHERE pv.id_venta = '$id';";


$sql2 = "SELECT total FROM eqe.Venta WHERE id = '$id';";

$query = mysqli_query($con, $sql);

$query2 = mysqli_query($con, $sql2);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/estilos.css" rel="stylesheet">
    <title>Productos en Venta</title>
</head>
<body>
    <section id="ProductosVenta">
        <br>
        <a href="ventas.php?#Crud">Volver</a>
        <br>
        <div class="container">
        </div>
        <div class="products-table">
            <h2>Productos de la Venta no: <?php $id ?> </h2>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>cantidad</th>
                        <th>costo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($query)): ?>
                        <tr>
                            <th><?= $row['nombre'] ?></th>
                            <th><?= $row['cantidad'] ?></th>
                            <th><?= $row['costo'] ?></th>
                            <th></th>
                            <th></th>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Total Venta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($query2)): ?>
                        <tr>
                            <th><?= $row['total'] ?></th>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>


        </div>
    </section>
</body>
</html>
