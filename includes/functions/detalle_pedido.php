<?php
    // MUESTRA LOS DATOS DEL CLIENTE DEL PEDIDO ADMINISTRADOR
    $numero_pedido = $_POST['numero_pedido'];
    try {
        require_once('bd_conexion.php');
        $sql_pedido = "SELECT numero_pedido, total, fecha, hora, referencia_pago, nombre, apellido, direccion, estado, ciudad, codigo_postal, telefono, email, metodo_pago FROM pedidos INNER JOIN registro_cliente ON pedidos.id_cliente = registro_cliente.id INNER JOIN metodos_pago ON pedidos.id_metodo_pago = metodos_pago.id WHERE numero_pedido = $numero_pedido";
        $resultado_pedido = $conn->query($sql_pedido);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
    
    $pedido = $resultado_pedido->fetch_assoc();
    if ($pedido) {
        echo json_encode($pedido);
    }
    $conn->close();
?>