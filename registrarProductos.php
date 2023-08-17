<!DOCTYPE html>
<html lang="en">

<head>
<?php include('headerslider.php') ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registrar Nuevo Producto</title>
</head>

<body class="bg-gradient-primary">
<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Registro de Producto</h1>
                    </div>
                    <form action="registrarp.php" method="post" id="form" class="user">
                        <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="nombre" placeholder="Nombre del Producto">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <select class="form-control" name="categoria" id="nivel">
                                    <option selected disabled>Selecciona la Categoria del producto</option>
                                    <?php
                                        $sql = "SELECT * FROM categorias";
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
                                        <option selected disabled>Selecciona el distribuidor</option>
                                        <?php
                                            $sql = "SELECT * FROM distribuidor";
                                            $result = mysqli_query($conn, $sql);

                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<option value="'.$row['id_distribuidor'].'">'.$row['id_distribuidor']."- ".$row['nombre_distribuidor'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="password" name="precio" placeholder="Precio">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="password" name="stock" placeholder="Stock">
                            </div>
                        </div>
                        <a id="submit-btn" onclick="hola()" class="btn btn-primary btn-user btn-block">
                            Crear Producto
                        </a>

                        <script>

                            function hola() {
                                Swal.fire({
                                    title: '¿Estás seguro que deseas registrar este producto?',
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