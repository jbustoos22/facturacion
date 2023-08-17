<!DOCTYPE html>
<html lang="en">
<head>
        
    <?php 
    include("headerslider.php");
    ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
</head>
<body>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabla de Productos</h1>

                    <!-- DataTales Example -->
                    
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Nombre Producto</th>
                                            <th class="text-center">Distribuidor</th>
                                            <th class="text-center">Fecha Registro</th>
                                            <th class="text-center">Categoria</th>
                                            <th class="text-center">Precio</th>
                                            <th class="text-center">Stock</th>
                                            <th class="text-center">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql = "SELECT * FROM productos INNER JOIN distribuidor ON productos.id_distribuidor = distribuidor.id_distribuidor INNER JOIN categorias ON productos.id_categoria = categorias.id_categorias";
                                        $result = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_array($result)) {
                                            $idempleado = $row['id_producto'];
                                            $empleado = $row['nombre_producto'];
                                            $cedula = $row['nombre_categorias'];
                                            $fechaIngreso = $row['fecha_registro'];
                                            $cargo = $row['nombre_distribuidor'];
                                            $direccion = $row['stock'];
                                            $precio = $row['precio'];

                                            echo "<tr>
                                                <td align='center'> $idempleado </td>
                                                <td align='center'> $empleado </td>
                                                <td align='center'> $cargo </td>
                                                <td align='center'> $fechaIngreso </td>
                                                <td align='center'> $cedula </td>
                                                <td align='center'> $precio </td>
                                                <td align='center'> $direccion </td>
                                                <td align='center'>". '<a href="editarProductos.php?id='.$idempleado.'" class="btn btn-info"> Editar </a>'. '<a href="deletep.php?id='.$idempleado.'" class="btn btn-danger"> Borrar </a>'."</td>
                                            </tr>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                                <div class="col-sm-1 ml-auto">
                                    <a href="registrarProductos.php" class="btn btn-info"> Registrar </a>
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
