<?php
include("conexion.php");
$con=conectar();

$id=$_GET['id'];

$sql1="SELECT * FROM alumno WHERE cod_estudiante='$id'";
$sql2="SELECT * FROM alumno";
$query1=mysqli_query($con,$sql1);
$query2=mysqli_query($con,$sql2);

$row=mysqli_fetch_array($query1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Alumno</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header text-bolded bg-success bg-opacity-25">
                            <h5>Actualizar alumno <?php echo $row['cod_estudiante'] ?></h5>
                        </div>  

                        <form action="update.php" method="POST" class="card-body">
                            <input type="hidden" name="cod_estudiante" value="<?php echo $row['cod_estudiante'] ?>">

                            <input type="text" class="form-control mb-3" name="rut" placeholder="RUT" value="<?php echo $row['rut'] ?>">
                            <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres" value="<?php echo $row['nombres'] ?>">
                            <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos" value="<?php echo $row['apellidos'] ?>">
                            <div class="d-flex justify-content-between">
                                <input type="submit" class="btn btn-primary" value="Actualizar">
                                <input type="button" onclick="history.back()" name="Volver" value="Volver" class="btn btn-info">
                            </div>
                        </form>
                    </div>
                </div>
        
                <div class="col-md-8">
                    <div class="card">
                        <table class="table">
                            <thead class="table-success table-striped align-middle" style="height: 50px;">
                                <tr>
                                    <th>Codigo</th>
                                    <th>RUT</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody class="align-middle">
                                <?php
                                    while($row=mysqli_fetch_array($query2)){
                                        if($row['cod_estudiante']==$id){
                                            $color="table-warning";
                                        }else {
                                            $color="";
                                        }
                                ?>
                                <tr class="<?php echo $color ?>">
                                    <th><?php echo $row['cod_estudiante']?></th>
                                    <th><?php echo $row['rut']?></th>
                                    <th><?php echo $row['nombres']?></th>
                                    <th><?php echo $row['apellidos']?></th>
                                    <th><a href="actualizar.php?id=<?php echo $row['cod_estudiante'] ?>" class="btn btn-info">Editar</a></th>
                                    <th><a href="delete.php?id=<?php echo $row['cod_estudiante'] ?>" class="btn btn-danger">Eliminar</a></th>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>   
</body>         
</html>