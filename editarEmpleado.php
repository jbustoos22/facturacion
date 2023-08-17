

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
                        <h1 class="h4 text-gray-900 mb-4">Editar Empleado</h1>
                    </div>
                    <form action="editar1.php" method="post" id="form" class="user">
                        <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="form-group">
                                <?php 

                                    $id = $_GET['id'];
                                    $sql = "SELECT * FROM empleados WHERE id_empleado = $id";
                                    $result = mysqli_query($conn,$sql);

                                    while ($row = mysqli_fetch_array($result)) {
                                        $id_empleado = $row['id_empleado'];
                                        $nombre = $row['nombre_empleado'];
                                        $cedularif = $row['cedularif'];
                                        $cargo = $row['cargo'];
                                        $direccion = $row['direccion'];

                                        $sql2 = "SELECT * FROM tipo_cargo WHERE id_cargo = $cargo";
                                        $result2 = mysqli_query($conn, $sql2);
                                        while ($row2 = mysqli_fetch_array($result2)) {
                                            $idcargo = $row2['id_cargo'];
                                            $desccargo = $row2['desc_cargo'];
                                        }
                                    }
                                ?>
                                <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="idhidden" value="<?php echo $id; ?>" placeholder="Nombre y Apellido" hidden>
                                <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="nombre" value="<?php echo $nombre; ?>" placeholder="Nombre y Apellido">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="cedularif" value="<?php echo $cedularif; ?>" placeholder="Documento de Identidad">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="form-group">
                                    <select class="form-control" name="cargo" id="nivel">
                                        <option value="<?php $idcargo; ?>" selected><?php echo $idcargo.'- '. $desccargo; ?></option>
                                        <?php
                                            $sql = "SELECT * FROM tipo_cargo WHERE id_cargo != $idcargo";
                                            $result = mysqli_query($conn, $sql);

                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<option value="'.$row['id_cargo'].'">'.$row['id_cargo']."- ".$row['desc_cargo'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="password" name="direccion" value="<?php echo $direccion; ?>" placeholder="Direccion Corta">
                            </div>
                        </div>
                        <a id="submit-btn" onclick="hola()" class="btn btn-primary btn-user btn-block">
                            Crear Usuario
                        </a>

                        <script>

                            function hola() {
                                Swal.fire({
                                    title: '¿Estás seguro que deseas editar este usuario?',
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