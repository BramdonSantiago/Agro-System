<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago | Agro-System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/confirmar_pedido.css">
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>

<?php 
    if (isset($_POST['btn_realizar_pedido'])) : ?> 
        <?php
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $direccion = $_POST['direccion'];
            $estado = $_POST['estado'];
            $codigo_postal = $_POST['codigo_postal'];
            $ciudad = $_POST['ciudad'];
            $telefono = $_POST['telefono'];
            $id_cliente = $_POST['id_cliente'];
            $total = $_POST['total'];
            $metodo_pago = $_POST['metodo_pago'];
        ?>
        <?php 
        if ($metodo_pago == 'Contra entrega') : ?>
        <div class="container mt-5">
            <h1 class="mb-4">Pago contra entrega</h1>
            <div class="row no-gutters">
                <div class="col columna-datos">
                    <h2 class="titulo mb-4">Revisa tus datos y confirma el pedido</h2>
                    <div class="d-flex align-items-center tus-datos">
                        <p class="subtitulo">Tús datos</p>
                        <ul>
                            <li><?php echo ($nombre . " " . $apellido); ?></li>
                            <li><?php echo($direccion); ?></li>
                            <li><?php echo ($ciudad . " " . $estado .", " . $codigo_postal); ?></li>
                            <li><?php echo ($telefono); ?></li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center justify-content-between tus-datos total">
                        <p class="subtitulo">Tú compra</p>
                        <p>$<?php echo ($total); ?> MXN</p>
                    </div>
                    <form action="includes/functions/enviar-pedido" method="POST">
                        <input type="hidden" name="id_cliente" value="<?php echo($id_cliente); ?>">
                        <input type="hidden" name="metodo_pago" value="2">
                        <input type="hidden" name="total" value="<?php echo ($total); ?>">
                        <input type="submit" class="btn btn-primary pedido" name="btn_confirmar_pedido_contra_entrega" value="CONFIRMAR PEDIDO">
                    </form>
                </div>
            </div>
            <a href="/agrosystem/resumen-pedido" class="btn btn-secondary mt-4">REGRESAR AL RESUMEN DEL PEDIDO</a>
        </div>
        <?php endif; ?>
        <?php 
        if ($metodo_pago == 'Tarjeta') : ?>
        <div class="container mt-5">
            <h1 class="mb-4">Pago con tarjeta</h1>
            <div class="row no-gutters">
                <div class="col columna-datos">
                    <h2 class="titulo mb-4">Revisa tus datos y confirma el pedido</h2>
                    <div class="d-flex align-items-center tus-datos">
                        <p class="subtitulo">Tús datos</p>
                        <ul>
                            <li><?php echo ($nombre . " " . $apellido); ?></li>
                            <li><?php echo($direccion); ?></li>
                            <li><?php echo ($ciudad . " " . $estado .", " . $codigo_postal); ?></li>
                            <li><?php echo ($telefono); ?></li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center justify-content-between tus-datos total">
                        <p class="subtitulo">Tú compra</p>
                        <p>$<?php echo ($total); ?> MXN</p>
                    </div>
                    <form action="includes/functions/enviar-pedido" method="POST" id="payment-form">
                        <div class="form-row">
                            <label for="card-element" style="font-weight: bold;">
                                Tarjeta de crédito o débito
                            </label>
                            <div id="card-element" class="w-100">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <input type="hidden" name="id_cliente" value="<?php echo($id_cliente); ?>">
                        <input type="hidden" name="metodo_pago" value="1">
                        <input type="hidden" name="total" value="<?php echo ($total); ?>">
                        <input type="submit" class="btn btn-primary pedido" name="btn_confirmar_pedido" value="CONFIRMAR PEDIDO">
                    </form>
                </div>
            </div>
            <a href="/agrosystem/resumen-pedido" class="btn btn-secondary mt-4">REGRESAR AL RESUMEN DEL PEDIDO</a>
        </div>
        <script src="/agrosystem/js/stripe.js"></script>
        <?php endif; ?>
    
    <?php endif; ?>

</body>
</html>