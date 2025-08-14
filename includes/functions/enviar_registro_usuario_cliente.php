<?php 
    // if (isset($_POST['btn-registro-usuario-cliente'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $nombre_usuario = $_POST['nombre_usuario'];
        $password = password_hash($pass, PASSWORD_DEFAULT, [15]);

        try {
            require_once ('bd_conexion.php');
            $stmt = $conn->prepare("INSERT INTO registro_cliente (nombre, apellido, email, pass, nombre_usuario) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $nombre, $apellido, $email, $password, $nombre_usuario);
            $stmt->execute();

            if ($stmt->affected_rows > -1) {
                // header ("Location: /agrosystem/registro-usuario?agrego=true");
                echo ("agrego");
            } else {
                // header ("Location: /agrosystem/registro-usuario?agrego=false");
                // echo ("No se agrego");
            }

            $stmt->close();
            $conn->close();

        } catch (Exception $e) {
            $error = $e -> getMessage();  
        }

    // }
?>