<?php
    error_reporting(0);
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];
    $para = "bramdsantiago@gmail.com";
    $descripcion = "Mensaje de Agro-System";
    $encabezado = "De:" . $nombre . "Email: " . $email;
    
    $enviar_email = mail($para, $descripcion , $mensaje, $encabezado);
    
    if ($enviar_email) {
        echo ("El correo se ha enviado");
    }
?>