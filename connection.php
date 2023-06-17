<?php

function connection(){
    $host = "localhost";
    $user = "invitado";
    $pass = "invitado";

    $bd = "eqe";

    $connect=mysqli_connect($host, $user, $pass);

    mysqli_select_db($connect, $bd);

    return $connect;

}


?>
