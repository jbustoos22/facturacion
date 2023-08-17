<?php

include ("conexion.php");

$termino = $_POST['termino'];

$sql = "SELECT * FROM clientes WHERE nombreApellido LIKE '%$termino%'";
$result = mysqli_query($conn, $sql);

while ($fila = mysqli_fetch_assoc($result)) {
    echo '<select class="js-example-basic-single" name="state">
            <option value="'.$fila['id_cliente'].'">'.$fila['nombreApellido'].'</option>
        </select>';
}


?>