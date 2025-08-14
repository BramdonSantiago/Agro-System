<?php
    // if (isset($_POST['btn-editar-perfil-cliente'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $estado = $_POST['estado'];
        $codigo_postal = $_POST['codigo_postal'];
        $ciudad = $_POST['ciudad'];
        $telefono = $_POST['telefono'];
        
        try {
            require_once('bd_conexion.php');
            $stmt = $conn->prepare("UPDATE registro_cliente SET nombre = ?, apellido = ?, direccion = ?, codigo_postal = ?, ciudad = ?, estado = ?, telefono = ? WHERE id = 1");
            $stmt->bind_param("sssssss", $nombre, $apellido, $direccion, $codigo_postal, $ciudad, $estado, $telefono);
            $stmt->execute();
            if ($stmt->affected_rows > -1) {
                echo("edito");
            }
            $stmt->close();
            $conn->close();
        } catch(Exception $e) {
            echo $e -> getMessage();
        }
    // }
?>