<!DOCTYPE html>
<html lang="en">

<head>
<?php include('headerslider.php') ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Editar Producto</title>
</head>

<body class="bg-gradient-primary">
<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->

        <?php 
            $id = $_GET['id'];

            $sqlGet = "SELECT * FROM productos WHERE id_producto = $id";
            $resultGet = mysqli_query($conn,$sqlGet);

            while ($rowGet = mysqli_fetch_array($resultGet)) {
                $nombreProducto = $rowGet['nombre_producto'];
                $idDist = $rowGet['id_distribuidor'];
                $idCat = $rowGet['id_categoria'];
                $precio = $rowGet['precio'];
                $stock = $rowGet['stock'];
            }

            $sqlCat = "SELECT * FROM categorias WHERE id_categorias = $idCat";

            $resultCat = mysqli_query($conn, $sqlCat);

            while ($rowCat = mysqli_fetch_array($resultCat)) {
                $id_categoria = $rowCat['id_categorias'];
                $nombreCat = $rowCat['nombre_categorias'];
            }

            
            $sqlDist = "SELECT * FROM distribuidor WHERE id_distribuidor = $idDist";

            $resultDist = mysqli_query($conn, $sqlDist);

            while ($rowDist = mysqli_fetch_array($resultDist)) {
                $id_distribuidor = $rowDist['id_distribuidor'];
                $nombreDist = $rowDist['nombre_distribuidor'];
            }
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Editar Producto</h1>
                    </div>
                    <form action="editarp.php" method="post" id="form" class="user">
                        <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="nombre" value="<?php echo $nombreProducto ?>" placeholder="Nombre del Producto">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" name="idhidden" value="<?php echo $id ?>" hidden>
                                <select class="form-control" name="categoria" id="nivel">
                                    <option value="<?php echo $id_categoria ?>"><?php echo $id_categoria.'- '. $nombreCat?></option>
                                    <?php
                                        $sql = "SELECT * FROM categorias WHERE id_categorias != $id_categoria";
                                        $result = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<option value="'.$row['id_categorias'].'">'.$row['id_categorias']."- ".$row['nombre_categorias'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="form-group">
                                    <select class="form-control" name="distribuidor" id="nivel">
                                        <option value="<?php echo $id_distribuidor ?>"><?php echo $id_distribuidor . '- '. $nombreDist ?></option>
                                        <?php
                                            $sql = "SELECT * FROM distribuidor WHERE id_distribuidor != $id_distribuidor";
                                            $result = mysqli_query($conn, $sql);

                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<option value="'.$row['id_distribuidor'].'">'.$row['id_distribuidor']."- ".$row['nombre_distribuidor'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="password" value="<?php echo $precio ?>" name="precio" placeholder="Precio">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="password" name="stock" value="<?php echo $stock ?>" placeholder="Stock">
                            </div>
                        </div>
                        <a id="submit-btn" onclick="hola()" class="btn btn-primary btn-user btn-block">
                            Editar Producto
                        </a>

                        <script>

                            function hola() {
                                Swal.fire({
                                    title: '¿Estás seguro que deseas editar este producto?',
                                    showDenyButton: true,
                                    confirmButtonText: 'Registrar',
                                    denyButtonText: `Volver`,
                                }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    const form = document.getElementById('form');
                                    form.submit();
                                } else if (result.isDenied) {
                                    Swal.fire('No continuaste con el registro!', '', 'info')
                                }
                                })
                            }

                        </script>
                        <hr>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

    <!-- Bootstrap core JavaScript-->


</body>

</html>