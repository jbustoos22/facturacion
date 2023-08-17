<!DOCTYPE html>
<html lang="en">

<head>
<?php include('headerslider.php') ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registrar Usuario Empleado</title>
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
                        <h1 class="h4 text-gray-900 mb-4">Creacion de Usuario</h1>
                    </div>
                    <form action="registraruser.php" method="post" id="form" class="user">
                        <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="form-group">
                                    <select class="form-control" name="empleado" id="empleado">
                                        <option selected disabled>Selecciona un Empleado</option>
                                            <?php 
                                                echo $sql = "SELECT DISTINCT(nombre_empleado), id_empleado FROM empleados";
                                                $result = mysqli_query($conn, $sql);
                                                
                                                while ($rowDescCargo = mysqli_fetch_array($result)) {
                                                    echo '<option value="'.$rowDescCargo['id_empleado'].'">'.$rowDescCargo['nombre_empleado'].'</option>';
                                                }
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user"
                                    id="exampleInputPassword" name="user" placeholder="Usuario">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="form-group">
                                    <select class="form-control" name="nivel" id="nivel">
                                        <option selected disabled>Selecciona el Nivel del Empleado</option>
                                        <option value="1">Soporte</option>
                                        <option value="2">Administrador</option>
                                        <option value="3">Supervisor</option>
                                        <option value="4">Vendedor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user"
                                id="exampleRepeatPassword" id="password" name="password" placeholder="Contraseña">
                            </div>
                        </div>
                        <a id="submit-btn" onclick="hola()" class="btn btn-primary btn-user btn-block">
                            Crear Usuario
                        </a>

                        <script>

                            function hola() {
                                Swal.fire({
                                    title: '¿Estás seguro que deseas registrar este usuario?',
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