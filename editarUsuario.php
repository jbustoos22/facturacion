<!DOCTYPE html>
<html lang="en">

<head>
<?php include('headerslider.php') ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Editar Usuario Empleado</title>
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
                        <h1 class="h4 text-gray-900 mb-4">Editar Usuario</h1>
                    </div>

                    <?php 
                        $id = $_GET['id'];
                    ?>
                    <form action="editar2.php" method="post" id="form" class="user">
                        <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="form-group">
                                    <input type="text" name="idhidden" value="<?php echo $id ?>" hidden>

                                    <?php 
                                        $sql1 = "SELECT * FROM empleados INNER JOIN usuarios ON usuarios.id_empleado = empleados.id_empleado WHERE id = $id";

                                        $result = mysqli_query($conn, $sql1);

                                        while ($row = mysqli_fetch_array($result)) {
                                            $nombre = $row['nombre_empleado'];
                                            $idempleado = $row['id_empleado'];
                                            $cedularif = $row['cedularif'];
                                        }

                                        $userS = "SELECT * FROM usuarios WHERE id = $id";
                                        $rs = mysqli_query($conn, $userS);

                                        while ($filas = mysqli_fetch_array($rs)) {
                                            $usuario = $filas['user'];
                                            $nivel = $filas['nivel'];
                                            $pw = $filas['password'];

                                            if ($nivel == 1) {
                                                $txtnivel = "Soporte";
                                            } else if ($nivel == 2) {
                                                $txtnivel = "Administrador";
                                            } else if ($nivel == 3) {
                                                $txtnivel = "Supervisor";
                                            } else {
                                                $txtnivel = "Vendedor";
                                            }
                                        }
                                    ?>
                                    <select class="form-control" name="empleado" id="empleado">
                                        <option value="<?php echo $idempleado; ?>" selected><?php echo $cedularif.'- '. $nombre; ?></option>
                                            <?php 
                                                echo $sql = "SELECT DISTINCT(nombre_empleado), id_empleado, cedularif FROM empleados WHERE id_empleado != $idempleado";
                                                $result = mysqli_query($conn, $sql);
                                                while ($rowDescCargo = mysqli_fetch_array($result)) {
                                                    echo '<option value="'.$rowDescCargo['id_empleado'].'">'.$rowDescCargo['cedularif'].'- '.$rowDescCargo['nombre_empleado'].'</option>';
                                                }
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user"
                                    id="exampleInputPassword" name="user" value="<?php echo $usuario; ?>" placeholder="Usuario">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="form-group">
                                    <select class="form-control" name="nivel" id="nivel">
                                        <option value="<?php $nivel; ?>" selected><?php echo $txtnivel;?></option>
                                        <option value="1">Soporte</option>
                                        <option value="2">Administrador</option>
                                        <option value="3">Supervisor</option>
                                        <option value="4">Vendedor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user"
                                id="exampleRepeatPassword" id="password" name="password" value="<?php echo $pw ?>" placeholder="Contraseña">
                            </div>
                        </div>
                        <a id="submit-btn" onclick="hola()" class="btn btn-primary btn-user btn-block">
                            Editar Usuario
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