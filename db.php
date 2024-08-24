<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "root";
$nombreBD = "tienda20244";

$conn = new mysqli($servidor, $usuario, $contrasena, $nombreBD);

if (mysqli_connect_error()) {
    die("Conexión fallida:( " . mysqli_connect_error());
}
?>
