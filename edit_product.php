<?php

include("connection.php");
$con = connection();

$id = $_POST["id"];
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];
$costo = $_POST['costo'];
$stock = $_POST['stock'];


$sql="UPDATE producto SET nombre='$nombre', marca='$marca', descripcion='$descripcion', costo='$costo', stock='$stock' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.html");
}else{

}

?>