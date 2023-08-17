<?php
    include("conexion.php");

    $idProducto = $_POST['idProducto'];
    $noperacion = $_POST['noperacion'];
    $datetime = $_POST['datetime'];
    $cantidad = $_POST['cantidad'];

    $sql = "INSERT INTO seleccion (nro_control, id_producto, cantidad, fecha_hora) VALUES ($noperacion, $idProducto, $cantidad, '$datetime')";
    mysqli_query($conn, $sql);

    $sql2 = "SELECT * FROM seleccion INNER JOIN productos ON seleccion.id_producto = productos.id_producto WHERE nro_control = $noperacion";
    $result = mysqli_query($conn, $sql2);
    echo '                                
    <thead>
        <tr>
            <th class="text-center">Codigo Producto</th>
            <th class="text-center">Nombre Producto</th>
            <th class="text-center">Cantidad</th>
            <th class="text-center">Precio</th>
        </tr>
    </thead>
    <tbody>';
    while ($row = mysqli_fetch_array($result)) {
        echo "
        <tr>
            <td align='center'>". $row['id_producto'] ."</td>
            <td align='center'>". $row['nombre_producto'] ."</td>
            <td align='center'>". $row['cantidad'] ."</td>
            <td align='center'>". $row['precio']*$row['cantidad'] ."</td>
        </tr>";
    }

    echo "</tbody>";
?>