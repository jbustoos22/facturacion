<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("headerslider.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceso de Ventas</title>
</head>

<body>
    <?php
    $noperacion = $_GET['oper'] + 1;

    $sqlOp = "UPDATE control SET noperacion = $noperacion WHERE id = 1";
    mysqli_query($conn, $sqlOp);

    $codcliente = $_POST['nombre'];

    $sqlNombre = "SELECT * FROM clientes WHERE id_cliente = $codcliente";
    $result = mysqli_query($conn, $sqlNombre);

    $row = mysqli_fetch_array($result);

    $nombreApellido = $row['nombreApellido'];
    $idcliente = $row['id_cliente'];
    ?>
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Proceso de Venta</h1>
        <form action="venta3.php" id="formu" method="post">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="hola">

                        <div class="col-sm-3 mr-auto">
                            <label for="oper"> Nro de Control: </label>
                            <input type="text" class="form-control form-control-user" id="noperacion" name="oper" value="<?php echo $noperacion; ?>" readonly>
                        </div>
                        <div class="col-sm-3">
                            <label for="nombre"> Cliente: </label>
                            <input type="text" class="form-control form-control-user" id="nombre" name="nombre" value="<?php echo $nombreApellido; ?>" readonly>
                            <input type="hidden" name="codcliente" value="<?php echo $idcliente; ?>">
                        </div>
                        <div class="col-sm-3 ml-auto">
                            <label for="oper"> Fecha y Hora: </label>
                            <input type="text" class="form-control form-control-user" id="datetime" name="diahora" value="<?php date_default_timezone_set('America/Caracas');
                                                                                                                        echo date("d-m-Y H:i:s"); ?>" readonly>
                        </div>
                    </div>
                    <hr>
        </form>

        <div class="form-group row">
            <div class="col-sm-3">
                <label for="categoria">Categoria</label>
                <select class="form-control" name="categoria" id="catproducto" onchange="procesar_select()">
                    <option selected disabled hidden>Selecciona una Categoria</option>
                    <?php
                    $sql1 = "SELECT * FROM categorias";
                    $result = mysqli_query($conn, $sql1);

                    while ($row = mysqli_fetch_array($result)) {
                        $nombreCat = $row['nombre_categorias'];
                        $id = $row['id_categorias'];
                        echo '<option value="' . $id . '">' . $nombreCat . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-3">
                <label for="producto">Nombre Producto</label>
                <select class="form-control" name="producto" id="producto">
                    <option selected disabled>Seleccione un Producto</option>
                </select>
            </div>

            <div class="col-sm-3">
                <label for="cantidad">Cantidad</label>
                <select class="form-control" name="cantidad" id="cantidad">
                    <option selected disabled>Selecciona la Cantidad</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                </select>
            </div>
            <div class="col-sm-3" style="margin-top: 31px;">

                <a id="submit-btn" onclick="agregar_producto()" class="btn btn-info btn-user btn-block">
                    Agregar
                </a>
            </div>
        </div>
        <br>

        <!-- DataTales Example -->
        <div class="table-responsive">
            <table class="table table-bordered" data-auto-refresh="true" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">Codigo Producto</th>
                        <th class="text-center">Nombre Producto</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Precio</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <br>
        <div class="row">

            <div class="col-sm-3 ml-auto">
                <a id="submit-btn" onclick="limpiar()" class="btn btn-secondary btn-block">
                    Limpiar
                </a>
            </div>
            <div class="col-sm-3">

                <a id="submit-btn" data-target="#myModal" data-toggle="modal" class="btn btn-info btn-user btn-block">
                    Facturar
                </a>
            </div>
        </div>

    </div>


    <div id="myModal" class="modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text">
                    <h5 class="modal-title">Verifica antes de Continuar</h5>
                    <button type="button" class="btn-close" data-target="#myModal" data-toggle="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped" id="dataTable2">

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-target="#myModal" data-toggle="modal">Cancelar</button>
                    <button type="button" onclick="facturar();" class="btn btn-primary">Facturar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Main Content -->

    <script type="text/javascript">
        function procesar_select() {
            var catproducto = document.getElementById("catproducto").value;
            $.post('ajax.php', {
                catproducto: catproducto
            }, function(data) {
                $("#producto").html(data);
            });
        }

        function agregar_producto() {
            var idProducto = document.getElementById("producto").value;
            var noperacion = document.getElementById("noperacion").value;
            var datetime = document.getElementById("datetime").value;
            var cantidad = document.getElementById("cantidad").value;
            $.post('rproduc.php', {
                idProducto: idProducto,
                noperacion: noperacion,
                datetime: datetime,
                cantidad: cantidad
            }, function(data) {
                document.getElementById("catproducto").selectedIndex = 0;
                document.getElementById("producto").selectedIndex = 0;
                document.getElementById("cantidad").selectedIndex = 0;
                $("#dataTable").html(data);
                $("#dataTable2").html(data);
            });
        }

        function limpiar() {
            var noperacion = document.getElementById("noperacion").value;
            $.post('procesar.php', {
                noperacion: noperacion
            }, function(data) {
                $("#dataTable").html(data);
                $("#dataTable2").html(data);
            });
        }

        function facturar() {
            swal.fire({
                title: "Seguro que desea Continuar?",
                icon: "info",
                confirmButtonText: "Continuar",
            }).then((result) => {
                if (result.isConfirmed) {
                    const formu = document.getElementById("formu");
                    formu.submit();
                    //window.location.href = "venta3.php";
                } else if (result.isDenied) {
                    Swal.fire('No continuaste con el registro!', '', 'info')
                }
            });
        }
    </script>
    </div>
    </div>
    </div>
</body>

<style>
    .hola {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

</html>