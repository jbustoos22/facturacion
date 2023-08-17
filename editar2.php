<?php 
    include("headerslider.php");

    $id = $_POST['idhidden'];
    $user = $_POST['user'];
    $id_empleado = $_POST['empleado'];
    $nivel = $_POST['nivel'];
    $pw = $_POST['password'];

    if (isset($nivel)) {
        $sqlprov = "SELECT * FROM usuarios WHERE id = $id";
        $resultprov = mysqli_query($conn, $sqlprov);

        while ($rowprov = mysqli_fetch_assoc($resultprov)) {
            $nivel = $rowprov['nivel'];
        }
    }

    if (isset($id_empleado)) {
        $sqlprov = "SELECT * FROM usuarios WHERE id = $id";
        $resultprov = mysqli_query($conn, $sqlprov);

        while ($rowprov = mysqli_fetch_assoc($resultprov)) {
            $nivel = $rowprov['id_empleado'];
        }
    }
    echo $sql = "UPDATE usuarios SET user = '$user', id_empleado = $id_empleado, nivel = $nivel, password = '$pw' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo '
        <script>
        swal.fire({
            title: "Se cambio correctamente :)",
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
            title: "No se cambio correctamente :(",
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