<?php
include("headerslider.php");

$empleado = $_POST['empleado'];
$nivel = $_POST['nivel'];
$user = $_POST['user'];
$password = $_POST['password'];

$sql = "INSERT INTO usuarios (user, password, id_empleado, nivel) VALUES('$user', '$password', $empleado, $nivel)";

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