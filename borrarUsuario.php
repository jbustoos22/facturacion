<?php 
    include("headerslider.php");
    $id = $_GET['id'];
    
    $sql = "DELETE FROM usuarios WHERE id = $id";
    
    if (mysqli_query($conn,$sql)) {
        echo '
        <script>
            swal.fire({
                title: "Se elminó correctamente :)",
                icon: "success",
                confirmButtonText: "Aceptar"
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = "listaUsuarios.php";
                } else {
                    window.location.href = "listaUsuarios.php";
                }
            });
        </script>
        ';
    } else {
        echo '
        <script>
        swal.fire({
            title: "No se pudo borrar este Empleado :(",
            icon: "error",
            confirmButtonText: "Volver"
        }).then((result) => {
            if(result.isConfirmed){
                window.location.href = "listaUsuarios.php";
            } else {
                window.location.href = "listaUsuarios.php";
            }
        });
        </script>
    ';
    }
?>