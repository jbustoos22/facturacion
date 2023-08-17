

<!DOCTYPE html>
<html lang="en">

<head>
<?php include('headerslider.php') ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Editar Distribuidor</title>
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
                        <h1 class="h4 text-gray-900 mb-4">Editar Distribuidor</h1>
                    </div>
                    <form action="editard.php" method="post" id="form" class="user">
                        <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="form-group">
                                <?php 

                                    $id = $_GET['id'];
                                    $sql = "SELECT * FROM distribuidor WHERE id_distribuidor = $id";
                                    $result = mysqli_query($conn,$sql);

                                    while ($row = mysqli_fetch_array($result)) {
                                        $nombre = $row['nombre_distribuidor'];
                                        $rif = $row['rif'];
                                        $tlf = $row['telefono'];
                                        $email = $row['email'];
                                        $direccion = $row['direccion'];
                                    }
                                ?>
                                <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="idhidden" value="<?php echo $id; ?>" placeholder="Nombre y Apellido" hidden>
                                <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="nombre" value="<?php echo $nombre; ?>" placeholder="Nombre y Apellido">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="rif" value="<?php echo $rif; ?>" placeholder="Documento de Identidad">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="tlf" value="<?php echo $tlf; ?>" placeholder="Telefono">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="password" name="direccion" value="<?php echo $direccion; ?>" placeholder="Direccion Corta">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="email" value="<?php echo $email; ?>" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <a id="submit-btn" onclick="hola()" class="btn btn-primary btn-user btn-block">
                            Editar Distribuidor
                        </a>

                        <script>

                            function hola() {
                                Swal.fire({
                                    title: '¿Estás seguro que deseas editar este Distribuidor?',
                                    showDenyButton: true,
                                    confirmButtonText: 'Editar',
                                    denyButtonText: `Volver`,
                                }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    const form = document.getElementById('form');
                                    form.submit();
                                    
                                } else if (result.isDenied) {
                                    Swal.fire('No continuaste con la edicion :(!', '', 'info')
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