<?php 

include("headerslider.php");

    $id = $_POST['idhidden'];
    $nombreProducto = $_POST['nombre'];
    $tlf = $_POST['tlf'];
    $rif = $_POST['rif'];
    $ubi = $_POST['direccion'];
    $email = $_POST['email'];

    $sql = "UPDATE distribuidor SET nombre_distribuidor = '$nombreProducto', rif = $rif, direccion = '$ubi', telefono = '$tlf', email = '$email' WHERE id_distribuidor = $id";

    if (mysqli_query($conn, $sql)) {
        echo '
            <script>
            swal.fire({
                title: "Se actualizó correctamente",
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
                title: "No se actualizó correctamente :(",
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