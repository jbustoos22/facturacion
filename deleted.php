<?php 

include("headerslider.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM distribuidor WHERE id_distribuidor = $id";

    if (mysqli_query($conn, $sql)) {
        echo '
            <script>
            swal.fire({
                title: "Se elimino correctamente",
                icon: "success",
                confirmButtonText: "Aceptar",
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = "listaDistribuidores.php";
                } else {
                    window.location.href = "listaDistribuidores.php"
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
                    window.location.href = "listaDistribuidores.php";
                } else {
                    window.location.href = "listaDistribuidores.php";
                }
    
            });
            </script>
        ';
    }
?>