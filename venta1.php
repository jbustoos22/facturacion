<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("headerslider.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paso 1 - Seleccion de Cliente</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

</head>

<body>
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Proceso de Venta</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <hr>
                <?php
                $sql = "SELECT * FROM control";
                $result = mysqli_query($conn, $sql);

                $row = mysqli_fetch_array($result);

                $noperacion = $row['noperacion'];
                ?>
                <form action="venta2.php?oper=<?php echo $noperacion ?>" method="post">

                    <div class="col-sm-3">
                        <label for="nombre">Ingrese un nombre de Cliente</label>
                        <select class="form-control js-example-basic-single" name="nombre" id="nombre">
                        </select>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <a id="submit-btn" type="submit" data-target="#myModal" data-toggle="modal" class="btn btn-info btn-user btn-block">
                                Cliente Nuevo
                            </a>

                        </div>

                        <div class="col-sm-3 mr-auto">
                            <button id="submit-btn" type="submit" class="btn btn-info btn-user btn-block">
                                Facturar
                            </button>
                        </div>
                    </div>
                </form>
                <div id="myModal" class="modal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header text">
                                <h5 class="modal-title">Registrar nuevo Cliente</h5>
                                <button type="button" class="btn-close" data-target="#myModal" data-toggle="modal" aria-label="Close"></button>
                            </div>
                            <form action="registrarClient.php" method="post">
                                <div class="modal-body" id="hola">
                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-sm-4 mr-auto">
                                            <label for="nombre">Nombre y Apellido</label>
                                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Juan Lopez" aria-describedby="helpId">
                                        </div>
                                        <div class="col-sm-4 mr-auto">
                                            <label for="nombre">Nro Telefono</label>
                                            <input type="text" name="tlf" id="tlf" class="form-control" placeholder="04244509211" aria-describedby="helpId">
                                        </div>
                                        <div class="col-sm-3 mr-auto">
                                            <label for="nombre">Cedula de Identidad</label>
                                            <input type="text" name="ci" id="ci" class="form-control" placeholder="V24875421" aria-describedby="helpId">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6 mr-auto">
                                            <label for="nombre">Direccion Corta</label>
                                            <input type="text" name="dir" id="dir" class="form-control" placeholder="Carabobo, Naguanagua" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                
                                <div class="row">
                                    <div class="col-sm-2 mr-auto">
                                        <button type="button" class="btn btn-secondary" data-target="#myModal" data-toggle="modal">Cancelar</button>
                                    </div>
                                    <div class="col-sm-3 ml-auto">
                                        <button type="submit" id="submit-btn" class="btn btn-info btn-user btn-block">
                                            Registrar Cliente
                                        </button>
                                    </div>
                                </div>
                            </form>
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

                    <?php
                    $sql = "SELECT * FROM clientes";

                    $result = mysqli_query($conn, $sql);

                    // Construir la lista de productos
                    $nombres = array();
                    while ($fila = mysqli_fetch_assoc($result)) {
                        $nombre = array(
                            "id" => $fila["id_cliente"],
                            "text" => "V-".$fila["cedulaRif"]." - ".$fila['nombreApellido']
                        );
                        $nombres[] = $nombre;
                    }

                    ?>
                    $(document).ready(function() {
                        // Cargar los datos de la base de datos en una variable de JavaScript
                        var nombres = <?php echo json_encode($nombres); ?>;

                        // Inicializar el select2
                        $("#nombre").select2({
                            placeholder: "Escriba la C.I del cliente...",
                            data: nombres
                        });
                    });

                    function registrar() {
                        var nombre = document.getElementById("nombre").value;
                        var tlf = document.getElementById("tlf").value;
                        var ci = document.getElementById("ci").value;
                        var dir = document.getElementById("dir").value;

                        $.ajax({
                            url: 'registrarClient.php',
                            type: 'POST',
                            data: {
                                nombre: nombre,
                                tlf: tlf,
                                ci: ci,
                                dir: dir
                            },
                            success: function(result) {
                                if (result === "ok") {
                                    window.location.href = "venta1.php";
                                } else {
                                    alert("No se pudo registrar el usuario");
                                }
                            }
                        });
                    }

                    function procesar_select() {
                        var nombre = getElementById("nombre").value;
                        var tlf = getElementById("tlf").value;
                        var ci = getElementById("ci").value;
                        var dir = getElementById("dir").value;

                        var form = getElementById("registroClient");

                        $.post('registrarClient.php', {
                            nombre: nombre,
                            tlf: tlf,
                            ci: ci,
                            dir: dir
                        }, function(data) {
                            console.log(data);
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