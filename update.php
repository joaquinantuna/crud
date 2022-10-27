<?php
    include("conexion.php");
    $con=conectar();

    $cod_estudiante=$_POST['cod_estudiante'];
    $rut=$_POST['rut'];
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];

    $sql="UPDATE alumno SET rut='$rut',nombres='$nombres',apellidos='$apellidos' WHERE cod_estudiante='$cod_estudiante'";
    $query=mysqli_query($con,$sql);

    if($query){
    Header("Location: alumno.php");

}else {

}
?>