<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include("headerslider.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paso 3 - Factura</title>
</head>
<body>
    <?php 
        $noperacion = $_POST['oper'];
        $codcliente = $_POST['codcliente'];
        $datetime = $_POST['diahora'];

        $sql = "SELECT * FROM clientes WHERE id_cliente = $codcliente";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $nombre = $row['nombreApellido'];
            $cedularif = $row['cedulaRif'];
            $ubicacion = $row['direccion'];
        }

        $sql2 = "SELECT * FROM control";
        $result2 = mysqli_query($conn, $sql2);

        while ($row2 = mysqli_fetch_assoc($result2)) {
            $factfinal = $row2['ultfactura']+1;
            $tasausd = $row2['tasausd'];
        }

        $sql3 = "UPDATE control SET ultfactura = $factfinal WHERE id = 1";
        
        if ($factfinal > 0) {
            mysqli_query($conn, $sql3);
        }

        $sql4 = "SELECT *, seleccion.id_producto as idproduc FROM seleccion INNER JOIN productos ON seleccion.id_producto = productos.id_producto WHERE seleccion.nro_control = $noperacion GROUP BY seleccion.id_producto";
        $result4 = mysqli_query($conn, $sql4);

        while ($row4 = mysqli_fetch_assoc($result4)) {
            $idproducto = $row4['idproduc'];
            $cantidad = $row4['cantidad'];
            $monto = $row4['precio'] * $tasausd;
            $montoTotal = ($row4['precio']*$row4['cantidad']) * $tasausd;
            $sql5 = "INSERT INTO detalles_factura (nro_factura, id_producto, precio_unit, cantidad, total) VALUES ($factfinal, $idproducto, $monto, $cantidad, $montoTotal)";
            mysqli_query($conn, $sql5);
        }
        $fecha_emision = date("d-m-Y");

        $sql7 = "SELECT *, SUM(total) AS montoTotalTotal FROM detalles_factura WHERE nro_factura = $factfinal";
        $result7 = mysqli_query($conn, $sql7);

        while ($row7 = mysqli_fetch_assoc($result7)) {
            $nro_factura = $row7['nro_factura'];
            $total = $row7['montoTotalTotal'];
            $baseImponible = $total * 0.84;
            $iva = $total * 0.16;
        }

        $sql8 = "INSERT INTO encabezado_factura (fecha_emision, id_cliente, numero_factura, numero_control, base_imponible, iva, total_general, id_empleado) VALUES ('$fecha_emision', $codcliente, $factfinal, $noperacion, $baseImponible, $iva, $total, null)";
        mysqli_query($conn,$sql8);
    ?>

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h3 class="text-center"> Resumen de compra</h3>
                <hr>
                <form action="factura.php" method="post" id="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 mr-auto">
                                <label for="cliente">N~ de Operacion: </label>
                                <input type="text" class="form-control" name="oper" value="<?php echo $noperacion ?>" id="" placeholder="" readonly>
                            </div>
                            <div class="col-sm-3 ml-auto">
                                <label for="cliente">N~ de Factura: </label>
                                <input type="text" class="form-control" name="fact" value="<?php echo $factfinal ?>" id="" placeholder="" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3 mr-auto">
                                <label for="cliente">Nombre del Cliente: </label>
                                <input type="text" class="form-control" name="nombreclient" value="<?php echo $nombre ?>" id="" placeholder="" readonly>
                            </div>
                            <div class="col-sm-6 ml-auto">
                                <label for="cliente">Ubicacion del Cliente: </label>
                                <input type="text" class="form-control" name="direccionclient" value="<?php echo $ubicacion ?>" id="" placeholder="" readonly>
                            </div>
                            <div class="col-sm-3 ml-auto">
                                <label for="cliente">C.I del Cliente: </label>
                                <input type="text" class="form-control" name="ciclient" value="<?php echo $cedularif ?>" id="" placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                <br>
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
                            <?php
                                $sql5 = "SELECT *, seleccion.id_producto as idproduc FROM seleccion INNER JOIN productos ON seleccion.id_producto = productos.id_producto WHERE seleccion.nro_control = $noperacion GROUP BY seleccion.id_producto";
                                $result5 = mysqli_query($conn, $sql5);
                                while ($row4 = mysqli_fetch_assoc($result5)) {
                                    echo "
                                    <tr>
                                        <td align='center'>". $row4['id_producto'] ."</td>
                                        <td align='center'>". $row4['nombre_producto'] ."</td>
                                        <td align='center'>". $row4['cantidad'] ."</td>
                                        <td align='center'>". $row4['precio']*$row4['cantidad'] ."</td>
                                    </tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-1 ml-auto">
                    <button class="btn btn-info" type="submit">Facturar</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</body>

<script>
    function factFinal() {
        swal.fire({
            title: "Se generara la factura!",
            icon: "info",
            confirmButtonText: "Aceptar"
        }).then((result) => {
            if(result.isConfirmed){
                const form = document.getElementById("form");
                form.submit();
            }
        });
    }
</script>
</html>