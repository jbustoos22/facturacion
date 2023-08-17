<!DOCTYPE html>
<html lang="en">
<head>
        
    <?php 
    include("headerslider.php");
    ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Categorias</title>
</head>
<body>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabla de Categorias</h1>

                    <!-- DataTales Example -->
                    
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Nombre Distribuidor</th>
                                            <th class="text-center">RIF</th>
                                            <th class="text-center">Direccion</th>
                                            <th class="text-center">Telefono</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql = "SELECT * FROM distribuidor";
                                        $result = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_array($result)) {
                                            $idempleado = $row['id_distribuidor'];
                                            $precio = $row['nombre_distribuidor'];
                                            $rif = $row['rif'];
                                            $dir = $row['direccion'];
                                            $tlf = $row['telefono'];
                                            $email = $row['email'];
                                            echo "<tr>
                                                <td align='center'> $idempleado </td>
                                                <td align='center'> $precio </td>
                                                <td align='center'> J-$rif </td>
                                                <td align='center'> $dir </td>
                                                <td align='center'> $tlf </td>
                                                <td align='center'> $email </td>
                                                <td align='center'>". '<a href="editarDist.php?id='.$idempleado.'" class="btn btn-info"> Editar </a>'. '<a href="deleted.php?id='.$idempleado.'" class="btn btn-danger"> Borrar </a>'."</td>
                                            </tr>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                                <div class="col-sm-1 ml-auto">
                                    <a href="registrarDist.php" class="btn btn-info"> Registrar </a>
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
