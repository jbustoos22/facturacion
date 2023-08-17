<?php 
include("headerslider.php");

$nombre = $_POST['nombre'];
$tlf = $_POST['tlf'];
$ci = $_POST['ci'];
$dir = $_POST['dir'];

$sql = "INSERT INTO clientes (nombreApellido, cedulaRif, direccion, telefono) VALUES('$nombre', $ci, '$dir', '$tlf')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo '
        <script>
            swal.fire({
                title: "Se registro correctamente",
                icon: "success",
                confirmButtonText: "Aceptar",
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = "venta1.php";
                } else {
                    window.location.href = "venta1.php"
                }
            });
        </script>
    ';
} else {
    echo '
        <script>
        swal.fire({
            title: "No se registró :(",
            icon: "error",
            confirmButtonText: "Volver"
        }).then((result) => {
            if(result.isConfirmed){
                window.location.href = "venta1.php";
            } else {
                window.location.href = "venta1.php";
            }

        });
        </script>
    ';
}

?>