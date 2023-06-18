<?php

include("connection.php");
$con = connection();

$id=$_GET["id"];
//softdelete implemented in products table for db relational integrity
// $sql="DELETE FROM Producto WHERE id='$id'";
$sql="UPDATE Producto SET status_prod ='eliminado' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: productos.php?#Crud");
}else{

}

?>