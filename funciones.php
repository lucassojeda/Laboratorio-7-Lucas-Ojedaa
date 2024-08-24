<?php
include 'db.php';

function cargarCliente($conn, $nombre, $apellido, $email, $calle, $numero) {
    $sql = "INSERT INTO Cliente (Nombre, Apellido, Email, Calle, Numero)
            VALUES ('$nombre', '$apellido', '$email', '$calle', '$numero')";
    if ($conn->query($sql) === TRUE) {
        return "Cliente agregado con éxito :)";
    } else {
        return "Error:( " ;
    }
}

function cargarProducto($conn, $nombre, $precio) {
    $sql = "INSERT INTO Producto (Nombre, Precio)
            VALUES ('$nombre', '$precio')";
    if ($conn->query($sql) === TRUE) {
        return " producto agregado con exito :)";
    } else {
        return "Error:( ";
    }
}

function leerClientes($conn) {
    $sql = "SELECT * FROM Cliente";
    return $conn->query($sql);
}

function leerProductos($conn) {
    $sql = "SELECT * FROM Producto";
    return $conn->query($sql);
}

function leerDetalles($conn) {
    $sql = "SELECT Producto.Nombre, Detalle.Descripcion, Detalle.Origen 
            FROM Detalle 
            INNER JOIN Producto ON Detalle.Cod_p = Producto.Cod_p";
    return $conn->query($sql);
}

function buscarProductoPorID($conn, $id) {
    $sql = "SELECT * FROM Producto WHERE Cod_p = $id";
    return $conn->query($sql);
}

function generarTablaClientes($clientes) {
    $html = "<table><tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Email</th>
    <th>Calle</th>
    <th>Número</th>
    </tr>";
    while($fila = $clientes->fetch_assoc()) {
        $html .= "<tr>
        <td>{$fila['Cod_cli']}</td>
        <td>{$fila['Nombre']}</td>
        <td>{$fila['Apellido']}</td>
        <td>{$fila['Email']}</td>
        <td>{$fila['Calle']}</td>
        <td>{$fila['Numero']}</td>
        </tr>";
    }
    $html .= "</table>";
    return $html;
}

function generarTablaProductos($productos) {
    $html = "<table><tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Precio</th>
    </tr>";
    while($fila = $productos->fetch_assoc()) {
        $html .= "<tr>
        <td>{$fila['Cod_p']}</td>
        <td>{$fila['Nombre']}</td>
        <td>{$fila['Precio']}</td>
        </tr>";
    }
    $html .= "</table>";
    return $html;
}

function generarTablaDetalles($detalles) {
    $html = "<table><tr>
    <th>Producto</th>
    <th>Descripción</th>
    <th>Origen</th>
    </tr>";
    while($fila = $detalles->fetch_assoc()) {
        $html .= "<tr>
        <td>{$fila['Nombre']}</td>
        <td>{$fila['Descripcion']}</td>
        <td>{$fila['Origen']}</td>
        </tr>";
    }
    $html .= "</table>";
    return $html;
}
?>
