<?php 
    session_start();
    $url = $_SERVER["REQUEST_URI"];
    if ($url == '/agrosystem/login?cerrar-sesion=true') {
        unset($_SESSION['usuario']);
    } 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Login | Agro-System</title>
    <link rel="icon" href="img/logo.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
</head>
<body class="d-flex justify-content-center aling-items-center align-items-center">
    <form action="includes/functions/enviar_login" method="post">
        <h1>Login</h1>
        <div>
            <input type="text" name="nombre_usuario" placeholder="Usuario" required>
            <i class="icono fas fa-user"></i> 
        </div>
        <div>
            <input type="password" name="password" placeholder="Contraseña" required>
            <i class="icono fas fa-lock"></i>  
        </div>
        <input type="submit" class="mb-5" name="boton_login_administrador" value="INICIAR SESIÓN">
    </form>
    <p class="text-center">Agro-System. Todos los derechos reservados. 2021 &copy</p>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
    
    <?php
        include_once 'includes/functions/alerta.php';
    ?>
    
</body>
</html>