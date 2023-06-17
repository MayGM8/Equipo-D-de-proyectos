<?php 
    include("connection.php");
    $con=connection();

    $id=$_GET['id'];

    $sql="SELECT * FROM Producto WHERE id='$id'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="estilos.css" rel="stylesheet">
        <title>Editar producto</title>
        
    </head>
    <body>
        <div class="products-form">
            <form action="edit_product.php" method="POST">
                <input type="hidden" name="id" value="<?= $row['id']?>">
                <input type="text" name="nombre" placeholder="Nombre" value="<?= $row['nombre']?>">
                <input type="text" name="marca" placeholder="Marca" value="<?= $row['marca']?>">
                <input type="text" name="descripcion" placeholder="Descripcion" value="<?= $row['descripcion']?>">
                <input type="number" name="costo" placeholder="Costo" value="<?= $row['costo']?>">
                <select id="stock" name="stock">
                    <option value="">Seleccione una opción...</option>
                    <option value="disponible">Disponible</option>
                    <option value="agotado">Agotado</option>
                </select>

                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>