<!DOCTYPE html>
<html lang="en">

<head>
<?php include('headerslider.php') ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registrar Distribuidor</title>
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
                        <h1 class="h4 text-gray-900 mb-4">Registro de Distribuidor</h1>
                    </div>
                    <form action="registrard.php" method="post" id="form" class="user">
                        <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="form-group">
                                    <input type="text"
                                    class="form-control form-control-user" name="nombre" id="" placeholder="Nombre del Distribuidor">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user"
                                    id="exampleInputPassword" name="rif" placeholder="RIF: J-51515151">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="form-group">
                                      <input type="text"
                                        class="form-control form-control-user" name="direccion" id="" placeholder="Direccion">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user"
                                id="exampleRepeatPassword" id="password" name="telefono" placeholder="Telefono">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="form-group">
                                      <input type="email"
                                        class="form-control form-control-user" name="email" id="" placeholder="Correo Electronico">
                                </div>
                            </div>
                        </div>
                        <a id="submit-btn" onclick="hola()" class="btn btn-primary btn-user btn-block">
                            Crear Distribuidor
                        </a>

                        <script>

                            function hola() {
                                Swal.fire({
                                    title: '¿Estás seguro que deseas registrar este Distribuidor?',
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