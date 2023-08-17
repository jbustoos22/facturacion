<?php

    include("conexion.php");
    $noperacion = $_POST['oper'];
    $fact = $_POST['fact'];
    $nombre = $_POST['nombreclient'];
    $ci = $_POST['ciclient'];
    $direccion = $_POST['direccionclient'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Factura</title>        
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script src="extensions/auto-refresh/bootstrap-table-auto-refresh.js"></script>
            <link href="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.css" rel="stylesheet">

        <script src="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/auto-refresh/bootstrap-table-auto-refresh.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">
        <br>
    <h1 class="text-center">Factura</h1>
    <hr>
      <div class="row mb-4">
        <div class="col-md-6">
          <!-- <img src="https://via.placeholder.com/150x50" alt="Logo" class="img-fluid" /> -->
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-6 ml-auto">
          <h5><b>Detalles de la empresa</b></h5>
          <p>Nombre del cliente: <?php echo $nombre ?></p>
          <p>Dirección: <?php echo $direccion ?></p>
        </div>
        <div class="col-sm-2 mr-auto">
          <h5><b>Detalles de la factura</b></h5>
          <p>Fecha: <?php echo date("d-m-Y") ?></p>
          <p>Número de factura: <?php echo "00000".$fact;?></p>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-12">
            
          <table class="table">
            <thead>
              <tr>
                <th>Cod Producto</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                    
                    $sql = "SELECT *, SUM(total) as preciototal, detalles_factura.id_producto as idproduc FROM detalles_factura INNER JOIN productos ON detalles_factura.id_producto = productos.id_producto WHERE nro_factura = $fact GROUP BY detalles_factura.id_producto";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        echo "
                            <tr>
                                <td>".$row['idproduc']."</td>
                                <td>".$row['nombre_producto']."</td>
                                <td>".$row['cantidad']."</td>
                                <td>Bs.".number_format($row['precio']*27.27, 2)."</td>
                                <td>Bs.".number_format(($row['precio']*$row['cantidad'])*27.27, 2)."</td>
                            </tr>
                        ";

                        $montoTotal = $row['preciototal'];
                    }
                ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2 ml-auto">
          <p>Total: Bs<?php echo number_format($montoTotal,2); ?></p>
        </div>
      </div>
      <a href="venta1.php"> Volver a Ventas</a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js" integrity="sha512-siZI0W7BxT8tHf2Kf6z21C0Cq8f2L5qf6i4K6i0lFy0buGQjJy5wEdcCgJj0KvLwS2fL4zqr7l1bqoB8kRtU+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>