<?php
include("headerslider.php");

$name = $_POST['nombre'];
$rif = $_POST['rif'];
$tlf = $_POST['telefono'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];

$sql = "INSERT INTO distribuidor (nombre_distribuidor, rif, direccion, telefono, email) VALUES('$name', $rif, '$direccion', $tlf, '$email')";

if (mysqli_query($conn, $sql)) {
    echo '
        <script>
        swal.fire({
            title: "Se registro correctamente",
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
            title: "No se registró correctamente :(",
            icon: "error",
            confirmButtonText: "Volver"
        }).then((result) => {
            if(result.isConfirmed){
                window.location.href = "registrarDist.php";
            } else {
                window.location.href = "registrarDist.php";
            }

        });
        </script>
    ';
}