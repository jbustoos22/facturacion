<?php 

include("headerslider.php");

    $id = $_POST['idhidden'];
    $nombreProducto = $_POST['nombre'];

    $sql = "UPDATE categorias SET nombre_categorias = '$nombreProducto' WHERE id_categorias = $id";

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