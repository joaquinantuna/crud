<?php
function conectar(){
    $host="localhost";
    $user="root";
    $pass="";

    $db="crud_alumnos";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);

    $con->set_charset("utf8");

    return $con;
}
?>