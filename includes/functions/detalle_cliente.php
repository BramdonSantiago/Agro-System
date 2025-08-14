<?php
    // MUESTRA LOS DATOS (a detalle) DEL CLIENTE ADMINISTRADOR
    $id_cliente = $_POST['id_cliente'];

    try {
        require_once('bd_conexion.php');
        $sql_cliente = "SELECT id, nombre, apellido, direccion, estado, ciudad, codigo_postal, telefono, email, fecha_registro FROM registro_cliente WHERE id = $id_cliente";
        $resultado_cliente = $conn->query($sql_cliente);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
    $cliente = $resultado_cliente->fetch_assoc();
    
    if ($cliente) {
        echo json_encode($cliente);
    }
    $conn->close();
?>