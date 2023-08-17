<?php 
    include("headerslider.php");
    $id = $_GET['id'];
    
    $sql = "DELETE FROM empleados WHERE id_empleado = $id";
    
    if (mysqli_query($conn,$sql)) {
        echo '
        <script>
            swal.fire({
                title: "Se elminó correctamente :)",
                icon: "success",
                confirmButtonText: "Aceptar"
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = "listaEmpleados.php";
                } else {
                    window.location.href = "listaEmpleados.php";
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
                window.location.href = "listaEmpleados.php";
            } else {
                window.location.href = "listaEmpleados.php";
            }
        });
        </script>
    ';
    }
?>