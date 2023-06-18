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
    <link href="./css/estilos.css" rel="stylesheet">
    <title>Users CRUD</title>
</head>

<body>

    <header>
        <div class="container">
            <p class="logo">Admon. de Usuarios</p>
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

    <section id="hero-usrs">
        <h1>Seccion en construccion<br>disculpe las molestias...</h1>

        <form action="index.html">
            <button>Continuar</button>
        </form>
    </section>

    <!-- <section id="Crud">
        <div class="container">
        </div>
        <div class="products-form">
            <h1>Administracion de productos</h1>
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
                            <th><a href="update.php?id=<?= $row['id'] ?>" class="products-table--edit">Editar</a></th>
                            <th><a href="delete_user.php?id=<?= $row['id'] ?>" class="products-table--delete" >Eliminar</a></th>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    </section> -->

</body>

</html>
