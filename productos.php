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
            <p class="logo">Admon. de Productos</p>
            <nav>
                <a href="index.html">Home</a>
                <a href="productos.php">Admon. de productos</a>
                <a href="ventas.php">Admon. de ventas</a>
                <a href="clientes.php">Admon. de clientes</a>
                <a href="usuarios.php">Admon. de usuarios</a>
            
            </nav>
        </div>
    </header>

    <section id="hero-prods">
        <h1>Administracion<br>de productos</h1>

        <form action="#Crud">
            <button>Continuar</button>
        </form>
    </section>

    <section id="Crud">
        <div class="container">
        </div>
        <div class="products-form">
            <br>
            <br>
            <h2>Agregar Productos</h2>
            <br>
            <br>
            <br>
            <form action="insert_product.php" method="POST">
                <input type="text" name="nombre" placeholder="Nombre">
                <input type="text" name="marca" placeholder="Marca">
                <input type="text" name="descripcion" placeholder="Descripcion">
                <input type="number" name="costo"  placeholder="Costo">

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
                        <th>Marca</th>
                        <th>Descripcion</th>
                        <th>Costo</th>
                        <th>Stock</th>
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
                            <!-- Open this php file as a pop up window -->
                            <th><a href="update.php?id=<?= $row['id'] ?>" class="products-table--edit">Editar</a></th>
                            <th><a href="delete_product.php?id=<?= $row['id'] ?>" class="products-table--delete" >Eliminar</a></th>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    </section>
<!-- Dentro del formulario en la página productos.php -->
<script>
    <?php if (isset($_GET['errors'])): ?>
    // Obtener los mensajes de error del parámetro 'errors' en la URL
    var errors = <?php echo $_GET['errors']; ?>;
    
    // Mostrar los mensajes de error en una ventana emergente
    Object.keys(errors).forEach(function (key) {
        var errorMessage = errors[key];
        alert(errorMessage);
    });
    <?php endif; ?>
</script>


</body>

</html>

