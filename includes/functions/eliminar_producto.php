<?php 
    // ELIMINAR UN PRODUCTO DE LA BASE DE DATOS ADMINISTRACIÓN
    $id = $_POST['id'];

    try {
        require_once('bd_conexion.php');
        $stmt = $conn->prepare("DELETE FROM productos WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        if ($stmt->affected_rows > -1) {
            echo ("Producto eliminado");
        }
        $stmt->close();
        $conn->close();
    } catch(Exception $e) {
        echo $e -> getMessage();
    }
?>