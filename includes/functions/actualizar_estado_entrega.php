<?php
    if (isset($_POST['btn_guardar_cambios_estado_pedido'])) {
        $numero_pedido = $_POST['numero_pedido'];
        $estado_entrega = $_POST['estado_entrega'];
        // ACTUALIZA EL ESTADO DEL PEDIDO ADMINISTRADOR
        try {
            require_once('bd_conexion.php');
            for ($i = 0; $i < sizeof($numero_pedido); $i++) {
                $actualizar_estado_pedido = $conn->prepare("UPDATE pedidos SET id_estado_entrega = ? WHERE numero_pedido = $numero_pedido[$i]");
                $actualizar_estado_pedido->bind_param("s", $estado_entrega[$i]);
                $actualizar_estado_pedido->execute();
            }
            if ($actualizar_estado_pedido->affected_rows > -1) {
                header("Location: /agrosystem/pedidos?estado_entrega=true");
            }
            $actualizar_estado_pedido->close();
            $conn->close();
        } catch(Exception $e) {
            echo $e -> getMessage();
        }
    }
?>