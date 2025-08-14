<?php 
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: login");
    }
    $url = $_SERVER["REQUEST_URI"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/logo.ico">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <?php
        if ($url == '/agrosystem/administracion') : ?>
            <title>Inicio | Agro-System</title>
        <?php
            elseif ($url == '/agrosystem/pedidos') : ?>
                <title>Pedidos | Agro-System</title>
        <?php
            elseif ($url == '/agrosystem/pedidos?estado_entrega=true') : ?>
                <title>Pedidos | Agro-System</title>
        <?php
            elseif ($url == '/agrosystem/pedidos?estado_entrega=false') : ?>
                <title>Pedidos | Agro-System</title>
        <?php
            elseif ($url == '/agrosystem/clientes') : ?>
                <title>Clientes | Agro-System</title>
        <?php
            elseif ($url == '/agrosystem/productos-admin') : ?>
                <title>Productos | Agro-System</title>
        <?php
            elseif ($url == '/agrosystem/agregar-producto') : ?>
                <title>Agregar producto | Agro-System</title>
        <?php
            elseif ($url && isset($_GET['id'])) : ?>
                <title>Editar producto | Agro-System</title>
    <?php endif; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-wordpress-admin/wordpress-admin.css">
</head>
<body>
    <header class="header py-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 mb-4 mb-lg-0">
                    <a href="administracion.html"><img src="img/logo2.png" alt=""></a>
                </div>
                <div class="col d-flex justify-content-between align-items-center">
                    <i class="icono fas fa-arrow-circle-left flecha-circular-izquierda" id="flecha-circular-izquierda"></i>
                    <i class="icono fas fa-arrow-circle-right flecha-circular-derecha no-active" id="flecha-circular-derecha"></i>
                    <div>
                        <?php  
                        // OBTENER NÚMERO DE PEDIDOS EN NOTIFICACIÓN DEL ADMINISTRADOR
                            try {
                                require_once('includes/functions/bd_conexion.php');
                                $sql_numero_pedidos = "SELECT COUNT(numero_pedido) FROM pedidos WHERE id_estado_entrega = 1";
                                $resultado_numero_pedidos = $conn->query($sql_numero_pedidos);
                                $numero_pedidos = $resultado_numero_pedidos->fetch_assoc();
                            } catch (\Exception $e) {
                                echo $e->getMessage();
                            }
                        ?>
                        <div class="mb-2 mb-lg-0">
                            <span>Pedidos</span><span class="pedidos-numero"><?php echo($numero_pedidos['COUNT(numero_pedido)']); ?></span>
                            <a href="login?cerrar-sesion=true">CERRAR SESIÓN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>