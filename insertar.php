<?php
include("conexion.php");
$con=conectar();

$cod_estudiante=$_POST['cod_estudiante'];
$rut=$_POST['rut'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];

$sql="INSERT INTO alumno VALUES('$cod_estudiante','$rut','$nombres','$apellidos')";
$query=mysqli_query($con,$sql);

if($query){
    Header("Location: alumno.php");

}else {

}
?>