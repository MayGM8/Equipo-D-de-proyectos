<?php
include("connection.php");
$con = connection();

$name = $_POST['nombre'];
$lastname = $_POST['marca'];
$descripcion = $_POST['descripcion'];
$password = $_POST['costo'];
$email = $_POST['stock'];

/*    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50),
    marca VARCHAR(150),
    descripcion TEXT,
    costo DECIMAL(10,2)
    stock ENUM ('disponible', 'agotado')*/

$sql = "INSERT INTO products VALUES('$nombre','$lastname','$username','$password','$email')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>