<?php
include 'funciones.php';

$mensaje = "";
$clientes = null;
$productos = null;
$detalles = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['cargar_cliente'])) {
        $mensaje = cargarCliente($conn, $_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['calle'], $_POST['numero']);
    } elseif (isset($_POST['cargar_producto'])) {
        $mensaje = cargarProducto($conn, $_POST['nombre'], $_POST['precio']);
    } elseif (isset($_POST['buscar_producto_por_id'])) {
        $productos = buscarProductoPorID($conn, $_POST['id_producto']);
    } elseif (isset($_POST['mostrar_clientes'])) {
        $clientes = leerClientes($conn);
    } elseif (isset($_POST['mostrar_productos'])) {
        $productos = leerProductos($conn);
    } elseif (isset($_POST['mostrar_detalles'])) {
        $detalles = leerDetalles($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Resultados de la Operación</h1>

    <?php if (!empty($mensaje)) { echo "<p>$mensaje</p>"; } ?>

    <?php if (isset($clientes) && $clientes !== null) { 
        echo generarTablaClientes($clientes); } ?>
    <?php if (isset($productos) && $productos !== null && !isset($_POST['buscar_producto_por_id'])) {
         echo generarTablaProductos($productos); } ?>
    <?php if (isset($detalles) && $detalles !== null) { 
        echo generarTablaDetalles($detalles); } ?>
    <?php if (isset($productos) && $productos !== null && isset($_POST['buscar_producto_por_id'])) { 
        echo generarTablaProductos($productos); } ?>

</body>
</html>
