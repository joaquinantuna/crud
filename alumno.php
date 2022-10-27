<?php
    include("conexion.php");
    $con=conectar();

    $sql="SELECT * FROM alumno";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
    $inicio=$row
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
                            <h5> Ingrese Datos</h5>
                        </div>
                        <?php
                            while($row==true){
                                $ultimo=(int)$row['cod_estudiante'];
                                $row=mysqli_fetch_array($query); 
                            }
                        ?>
                        <form action="insertar.php" method="POST" class="card-body">
                            <input type="text" class="form-control mb-3" name="cod_estudiante" value="000<?php echo (string)($ultimo+1)?>">
 
                            <input type="text" class="form-control mb-3" name="rut" placeholder="RUT">
                            <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres">
                            <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos">

                            <input type="submit" class="btn btn-primary">
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
                                    $row=mysqli_data_seek($query,0);
                                    while($row=mysqli_fetch_array($query)){
                                ?>
                                <tr>
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