<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<?php 
    $url = $_SERVER["REQUEST_URI"];

    if ($url == '/agrosystem/?cerrar-sesion=true') {
        unset($_SESSION['usuario_cliente']);
        unset($_SESSION["id_cliente"]);
        header("Location: /agrosystem/");
    } 
?>
    <?php
        if ($url == '/agrosystem/') : ?>
            <title>Inicio | Agro-System</title>
        <?php
            elseif ($url == '/agrosystem/productos') : ?>
                <title>Productos | Agro-System</title>
        <?php
            elseif ($url == '/agrosystem/nosotros') : ?>
                <title>Nosotros | Agro-System</title>
        <?php
            elseif ($url && isset($_GET['id'])) : ?>
                <title>Detalle producto | Agro-System</title>
        <?php
            elseif ($url == '/agrosystem/carrito') : ?>
                <title>Carrito | Agro-System</title>
    <?php endif; ?>

    <meta charset="UTF-8">
    <link rel="icon" href="img/logo.ico">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Mansalva&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link rel="stylesheet" href="css/simple-lightbox.min.css">
    <link rel="stylesheet" href="css/glide.core.min.css">
    <link rel="stylesheet" href="css/glide.theme.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-wordpress-admin/wordpress-admin.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
</head>
<body>
    <header>
        <div class="menu-principal">
            <div class="container menu">
                <div class="row align-items-center">
                    <div class="col">
                        <nav class="navbar navbar-expand-md">
                            <div>
                                <a href="/agrosystem" class="animate__animated animate__fadeInDown animate__delay-5s"><img src="img/logo2.png" alt="logo" class="img-fluid"></a>
                            </div>
                            <button class="navbar-toggler d-md-none third-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent22"
                            aria-controls="navbarSupportedContent22" aria-expanded="false" aria-label="Toggle navigation">
                            <div class="animated-icon3"><span></span><span></span><span></span></div>
                            </button>
                            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent22">
                                <nav class="navbar-nav ml-auto mr-auto">
                                    <a class="nav-link animate__animated animate__fadeInDown animate__delay-1s" href="nosotros">Nosotros</a>
                                    <a class="nav-link animate__animated animate__fadeInDown animate__delay-2s" href="productos">Productos</a>
                                    <?php 
                                        if (!isset($_SESSION['usuario_cliente'])) : ?>
                                            <a class="nav-link btn-iniciar-sesion animate__animated animate__fadeInDown animate__delay-4s" href="#" id="btn-iniciar-sesion">INICIAR SESIÓN</a>
                                            <?php 
                                                else : ?>
                                                <span class="nav-link animate__animated animate__fadeInDown animate__delay-4s nombre-usuario" id="btn-iniciar-sesion"><i class="icono usuario far fa-user"></i><?php echo ($_SESSION["usuario_cliente"]); ?></span>
                                    <?php endif; ?>
                                </nav>
                                <div class="btn-carrito-busqueda animate__animated animate__fadeInDown animate__delay-5s mt-4 mt-md-0">
                                    <img src="img/carrito2.png" alt="carrito" class="btn-img-carrito" id="btn-img-carrito">
                                    <span class="notificacion-numero-productos-carrito" id="notificacion-numero-productos-carrito"></span>
                                    <img src="img/buscador2.png" alt="buscador" class="btn-img-buscar" id="btn-img-buscar">
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="iniciar-sesion p-4 text-center" id="iniciar-sesion">
            <?php 
                if (!isset($_SESSION['usuario_cliente'])) : ?>    
                    <form id="iniciar-sesion-cliente">
                        <input type="email" name="email-cliente" placeholder="Email" required>
                        <input type="password" name="password-cliente" placeholder="Contraseña" required>
                        <input type="submit" name="btn-iniciar-sesion-usuario-cliente" value="INICIAR SESIÓN" class="btn btn-primary btn-lg btn-block">
                        <p class="m-0 mt-2">¿No tienes cuenta? <a href="registro-usuario" class="registrate">Regístrate</a></p>
                    </form>
                    <?php 
                        else: ?>
                            <div class="usuario-cliente-acciones text-center">
                                <div class="mb-4 acciones">
                                    <a href="editar-perfil" class="mr-5"><i class="icono fas fa-user-edit"></i>Editar perfil</a>
                                    <a href="mis-pedidos"><i class="icono fas fa-truck-loading"></i>Mis pedidos</a>
                                </div>
                                <a href="/agrosystem?cerrar-sesion=true" class="cerrar-sesion-cliente"><i class="icono fas fa-door-closed"></i>CERRAR SESIÓN</a>
                            </div>
            <?php endif; ?>
        </div>
        <div class="carrito translate" id="carrito">
            <div class="p-4" id="cantidad-carrito-total">
                <!-- JavaScript -->
            </div>
            <hr class="m-0">
            <div class="container text-center">
                <div class="table-responsive">
                    <table class="table">
                        <tbody id="lista-productos">
                            <!-- JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center my-4" id="enlaces-carrito"> 
                <!-- JavaScript -->
            </div>
        </div>
        <div class="buscar" id="buscar">
            <form action="busqueda-producto" method="GET">
                <input type="text" placeholder="¿Qué compraré hoy...?" name="producto" required>
                <i class="icono fas fa-search"></i>
            </form>
        </div>