<?php 
    $email_cliente = $_POST['email-cliente'];
    $password_cliente = $_POST['password-cliente'];
    
    try {
        require_once('bd_conexion.php');
        $stmt = $conn->prepare("SELECT id, email, pass, nombre_usuario FROM registro_cliente WHERE email = ?");
        $stmt->bind_param("s", $email_cliente);
        $stmt->execute();
        $stmt->bind_result($id, $email, $password, $nombre_usuario);
        $stmt->fetch();

        if ($email_cliente == $email && password_verify($password_cliente, $password)) {
            session_start();
            $_SESSION["usuario_cliente"] = $nombre_usuario;
            $_SESSION["id_cliente"] = $id;
            echo ("logueado");
        } 
            
        $stmt->close();
        $conn->close();
        
    } catch (Exception $e) {
        echo $e -> getMessage();
    }
?>
