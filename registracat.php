<?php
include("headerslider.php");


$nombre = $_POST['nombre'];

$sql = "INSERT INTO categorias (nombre_categorias) VALUES('$nombre')";

if (mysqli_query($conn, $sql)) {
    echo '
        <script>
        swal.fire({
            title: "Se registro correctamente",
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
            title: "No se registró correctamente :(",
            icon: "error",
            confirmButtonText: "Volver"
        }).then((result) => {
            if(result.isConfirmed){
                window.location.href = "registrarCategoria.php";
            } else {
                window.location.href = "registrarCategoria.php";
            }

        });
        </script>
    ';
}