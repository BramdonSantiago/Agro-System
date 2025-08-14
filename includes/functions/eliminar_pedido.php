<?php 
    // ELIMINAR PEDIDOS ADMINISTRACIÓN
    $numero_pedido = $_POST['numero_pedido'];

    try {
        require_once('bd_conexion.php');
        $stmt = $conn->prepare("DELETE FROM pedidos WHERE numero_pedido = ?");
        $stmt->bind_param("s", $numero_pedido);
        $stmt->execute();
        if ($stmt->affected_rows > -1) {
            echo ("Pedido eliminado");
        } 
        $stmt->close();
        $conn->close();
    } catch(Exception $e) {
        echo $e -> getMessage();
    }
?>