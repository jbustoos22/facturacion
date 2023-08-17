<?php 
    include("headerslider.php");

    $id = $_POST['idhidden'];
    $nombre = $_POST['nombre'];
    $cedularif = $_POST['cedularif'];
    $cargo = $_POST['cargo'];
    $direccion = $_POST['direccion'];

    if (isset($cargo)) {
        $sqlprov = "SELECT * FROM empleados WHERE id_empleado = $id";
        $resultprov = mysqli_query($conn, $sqlprov);

        while ($rowprov = mysqli_fetch_assoc($resultprov)) {
            $cargo = $rowprov['cargo'];
        }
    }
    echo $sql = "UPDATE empleados SET nombre_empleado = '$nombre', cedularif = $cedularif, cargo = '$cargo', direccion = '$direccion' WHERE id_empleado = $id";

    if (mysqli_query($conn, $sql)) {
        echo '
        <script>
        swal.fire({
            title: "Se registró correctamente :)",
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
            title: "No se registró correctamente :(",
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