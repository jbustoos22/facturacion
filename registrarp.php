<?php 

include("headerslider.php");

    $nombreProducto = $_POST['nombre'];
    $idcat = $_POST['categoria'];
    $iddist = $_POST['distribuidor'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $fechaAgregado = date("Y-m-d");

    $sql = "INSERT INTO productos (nombre_producto, id_distribuidor, fecha_registro, id_categoria, precio, stock) VALUES ('$nombreProducto', $iddist, '$fechaAgregado', $idcat, $precio, $stock)";

    if (mysqli_query($conn, $sql)) {
        echo '
            <script>
            swal.fire({
                title: "Se registro correctamente",
                icon: "success",
                confirmButtonText: "Aceptar",
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = "listaProductos.php";
                } else {
                    window.location.href = "listaProductos.php"
                }
            });
            </script>
        ';
    
    } else {
        echo '
            <script>
            swal.fire({
                title: "No se registró correctamente :(",
                icon: "error",
                confirmButtonText: "Volver"
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = "registrarProductos.php";
                } else {
                    window.location.href = "registraProductos.php";
                }
    
            });
            </script>
        ';
    }
?>