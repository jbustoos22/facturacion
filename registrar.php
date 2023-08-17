<?php
include("headerslider.php");

$name = $_POST['nombre'];
$cedula = $_POST['cedularif'];
$fechaHoy = date("Y-m-d");
$cargo = $_POST['cargo'];
$direccion = $_POST['direccion'];

$sql = "INSERT INTO empleados (nombre_empleado, cedularif, fecha_ingreso, cargo, direccion) VALUES('$name', '$cedula', '$fechaHoy', $cargo, '$direccion')";

if (mysqli_query($conn, $sql)) {
    echo '
        <script>
        swal.fire({
            title: "Se registro correctamente",
            icon: "success",
            confirmButtonText: "Aceptar",
        }).then((result) => {
            if(result.isConfirmed){
                window.location.href = "listaUsuarios.php";
            } else {
                window.location.href = "listaUsuarios.php"
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
                window.location.href = "registrarUsuario.php";
            } else {
                window.location.href = "registrarUsuario.php";
            }

        });
        </script>
    ';
}