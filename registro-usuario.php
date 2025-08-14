<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro usuario | Agro-System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/registro-usuario.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-wordpress-admin/wordpress-admin.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css"> -->
</head>
<body>
<?php
    if (isset($_SESSION['usuario_cliente'])) : ?>
        <!-- <div class="text-center">
            <p>Ya estas registrado</p>
            <a href="/agrosystem">REGRESAR A LA TIENDA</a>
        </div> -->
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-6">
                    <p>Ya iniciaste sesión</p>
                    <a href="/agrosystem">Regresar a la tienda</a>  
                </div>
            </div>
        </div>
        <?php 
            else : ?>
                <div class="container formulario-registro-usuario">
                    <div class="row justify-content-center">
                        <div class="col col-md-6">
                        <h1 class="mb-4">Registro</h1>
                            <form id="formulario">
                                <div class="form-row">
                                <div class="col">
                                    <input type="text" class="" name="nombre" placeholder="Nombre(s)" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="" name="apellido" placeholder="Apellido(s)" required>
                                </div>
                                </div>
                                <input type="email" class="" name="email" placeholder="Email" required>
                                <input type="password" name="password" placeholder="Contraseña" required>
                                <input type="text" name="nombre_usuario" placeholder="Nombre de usuario" required>
                                <input type="submit" class="btn btn-primary btn-block" name="btn-registro-usuario-cliente" value="REGISTRARME">
                            </form>
                            <p class="text-center">¿Ya tienes cuenta? <a href="/agrosystem">Regresar a la tienda</a></p>
                        </div>
                    </div>
                </div>
    <?php endif ?>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
    <script src="js/notificacion-registro-cliente.js"></script>

</body>
</html>