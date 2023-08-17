<?php 
    include("conexion.php");
    $noperacion = $_POST['noperacion'];


    $sql = "DELETE FROM seleccion WHERE nro_control = $noperacion";
    
    mysqli_query($conn, $sql);

    echo '                                
    <thead>
        <tr>
            <th class="text-center">Codigo Producto</th>
            <th class="text-center">Nombre Producto</th>
            <th class="text-center">Cantidad</th>
            <th class="text-center">Precio</th>
        </tr>
    </thead>';

?>
