<option selected disabled hidden>Seleccione un producto</option>

<?php 



include("conexion.php");

$catproducto = $_POST['catproducto'];

$sql = "SELECT * FROM productos WHERE id_categoria = $catproducto";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $nombre = $row['nombre_producto'];
    $id_producto = $row['id_producto'];
    echo '<option value="'.$id_producto.'">'.$id_producto. "- ".$nombre.'</option>';
}

?>