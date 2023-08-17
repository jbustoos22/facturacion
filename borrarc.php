<?php 

include("headerslider.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM categorias WHERE id_categorias = $id";

    if (mysqli_query($conn, $sql)) {
        echo '
            <script>
            swal.fire({
                title: "Se elimino correctamente",
                icon: "success",
                confirmButtonText: "Aceptar",
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = "listaCategorias.php";
                } else {
                    window.location.href = "listaCategorias.php"
                }
            });
            </script>
        ';
    
    } else {
        echo '
            <script>
            swal.fire({
                title: "No se elimino correctamente :(",
                icon: "error",
                confirmButtonText: "Volver"
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = "listaCategorias.php";
                } else {
                    window.location.href = "listaCategorias.php";
                }
    
            });
            </script>
        ';
    }
?>