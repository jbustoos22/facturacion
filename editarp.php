<?php 

include("headerslider.php");

    $id = $_POST['idhidden'];
    $nombreProducto = $_POST['nombre'];
    $idcat = $_POST['categoria'];
    $iddist = $_POST['distribuidor'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $fechaAgregado = date("d-m-Y");

    echo $sql = "UPDATE productos SET nombre_producto = '$nombreProducto', id_distribuidor = $iddist, id_categoria = $idcat, precio = $precio, stock = $stock WHERE id_producto = $id";

    if (mysqli_query($conn, $sql)) {
        echo '
            <script>
            swal.fire({
                title: "Se actualizó correctamente",
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
                title: "No se actualizó correctamente :(",
                icon: "error",
                confirmButtonText: "Volver"
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = "listaProductos.php";
                } else {
                    window.location.href = "listaProductos.php";
                }
    
            });
            </script>
        ';
    }
?>