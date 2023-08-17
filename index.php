<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php 
        include("headerslider.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio!</title>
</head>
<body>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php 
            $sql = "SELECT * FROM empleados WHERE enviado = 0";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {
                $correo = $row['email'];
                $id = $row['id_empleado'];
                echo '<script>
                    window.open("https://inmovaly.com.ve/mail_toros2.php?receiver_='.$correo.'");
                </script>';
                $sqlUpdate = "UPDATE empleados SET enviado = 1 WHERE id_empleado = $id";
                mysqli_query($conn, $sqlUpdate);
            }
        

            ?>
        </div>
    </div>
</body>
</html>
