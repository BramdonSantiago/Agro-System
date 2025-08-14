<?php 
    // ELIMINAR UNA CUENTA O CLIENTE ADMINISTRACIÓN
    $id = $_POST['id'];

    try {
        require_once('bd_conexion.php');
        $stmt = $conn->prepare("DELETE FROM registro_cliente WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        if ($stmt->affected_rows > -1) {
            echo ("Cliente eliminado");
        } 
        $stmt->close();
        $conn->close();
    } catch(Exception $e) {
        echo $e -> getMessage();
    }
?>