<?php
include("connection.php");
$con = connection();

$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];
$costo = $_POST['costo'];
$stock = $_POST['stock'];

/*    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50),
    marca VARCHAR(150),
    descripcion TEXT,
    costo DECIMAL(10,2)
    stock ENUM ('disponible', 'agotado')*/

$sql = "INSERT INTO producto VALUES('$nombre','$marca','$descripcion','$costo','$stock')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.html");
}else{

}

?>
