<!DOCTYPE html>
<html lang="en">
<head>
        
    <?php 
    include("headerslider.php");
    ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabla de Usuarios</h1>

                    <!-- DataTales Example -->
                    
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Nombre Y Apellido</th>
                                            <th class="text-center">Nivel</th>
                                            <th class="text-center">Fecha Ingreso</th>
                                            <th class="text-center">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql = "SELECT * FROM usuarios INNER JOIN empleados ON empleados.id_empleado = usuarios.id_empleado";
                                        $result = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_usuario = $row['id'];
                                            $usuario = $row['user'];
                                            $idempleado = $row['id_empleado'];
                                            $empleado = $row['nombre_empleado'];
                                            $cargo = $row['nivel'];
                                            $fechaIngreso = $row['fecha_ingreso'];

                                            echo "<tr>
                                                <td align='center'> $idempleado </td>
                                                <td align='center'> $usuario </td>
                                                <td align='center'> $cargo </td>
                                                <td align='center'> $fechaIngreso </td>
                                                <td align='center'>". '<a href="editarUsuario.php?id='.$id_usuario.'" class="btn btn-info"> Editar </a>'. '<a href="borrarUsuario.php?id='.$id_usuario.'" class="btn btn-danger"> Borrar </a>'."</td>
                                            </tr>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                                <div class="col-sm-1 ml-auto">
                                    <a href="registrarUsuario.php" class="btn btn-info"> Registrar </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
</body>
</html>
