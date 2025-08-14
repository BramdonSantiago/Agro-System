<?php
    // MUESTRA LOS PRODUCTOS DEL PEDIDO ADMINISTRADOR
    $numero_pedido = $_POST['numero_pedido'];
    try {
        require_once('bd_conexion.php');
        $sql_detalle_pedido = "SELECT imagen, marca, nombre, detalle_pedido.precio, cantidad, subtotal FROM detalle_pedido INNER JOIN productos ON detalle_pedido.id_producto = productos.id WHERE id_numero_pedido = $numero_pedido";
        $resultado_detalle_pedido = $conn->query($sql_detalle_pedido);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }

    $productos = array();
    while ($detalle_pedido = $resultado_detalle_pedido->fetch_assoc()) {
        $nuevo = array(
            "imagen" => $detalle_pedido['imagen'],
            "marca" => $detalle_pedido['marca'],
            "nombre" => $detalle_pedido['nombre'],
            "precio" => $detalle_pedido['precio'],
            "cantidad" => $detalle_pedido['cantidad'],
            "subtotal" => $detalle_pedido['subtotal']
        );
        array_push($productos, $nuevo);
    }
    echo json_encode($productos);
    $conn->close();
?>