<?php 

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'videojuegos';

$conn = mysqli_connect($hostname,$username,$password,$database);

if (!$conn) {
    echo 'FALLO LA CONEXION';
} else {
    
}