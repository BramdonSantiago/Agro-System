<?php
    session_start();
    if (isset($_SESSION['id_cliente']) && isset($_SESSION['usuario_cliente'])) {
        $id = $_SESSION['id_cliente'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen pedido | Agro-System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/pago.css">
</head>
<body>
<?php
    if (isset($_SESSION['usuario_cliente'])) : ?>
        <?php 
            try {
                require_once('includes/functions/bd_conexion.php');
                $sql = "SELECT id, nombre, apellido, direccion, estado, codigo_postal, ciudad, telefono FROM registro_cliente WHERE id = $id";
                $resultado = $conn->query($sql);
                $cliente = $resultado->fetch_assoc();
                $conn->close();
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        ?>
        <div class="container formulario-datos-usuario mt-5">
            <div class="row">
                <div class="col col-md-8">
                    <form action="pago" method="POST" id="formulario">
                        <h2 class="mb-4">Tus datos</h2>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="nombre" placeholder="Nombre(s)" value="<?php echo ($cliente['nombre']); ?>" readonly required>
                            </div>
                            <div class="col">
                                <input type="text" name="apellido" placeholder="Apellido(s)" value="<?php echo ($cliente['apellido']); ?>" readonly required>
                            </div>
                        </div>
                        <input type="text" name="direccion" placeholder="Dirección" value="<?php echo ($cliente['direccion']); ?>" readonly required> 
                        <input type="text" name="estado" value="<?php echo ($cliente['estado']); ?>" readonly required>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="codigo_postal" placeholder="Código postal" value="<?php echo ($cliente['codigo_postal']); ?>" readonly required>
                            </div>
                            <div class="col">
                                <input type="text" name="ciudad" placeholder="Ciudad" value="<?php echo ($cliente['ciudad']); ?>" readonly required>
                            </div>
                        </div>
                        <input type="text" name="telefono" placeholder="Teléfono" value="<?php echo ($cliente['telefono']); ?>" readonly required>
                    <p class="text-center text-md-left">¿Tu información no esta completa o no es la correcta? <a href="editar-perfil">Actualiza aquí</a></p>
                </div>
                <div class="col-md-4 resumen-pedido">
                    <h2 class="mb-4">Resumen del pedido</h2>
                    <div class="d-flex justify-content-between total">
                        <p>Total:</p>
                        <p id="total-valor"></p>
                    </div>
                    <h2 class="mb-4">Metodo de pago</h2>
                    <ul class="metodos-pago mb-5">
                        <li>
                            <label for="tarjeta" class="opcion-pago">
                                <input type="radio" name="metodo_pago" id="tarjeta" value="Tarjeta" required>
                                <img src="img/tarjeta.png" alt="icono tarjeta">
                                Tarjeta de débito o crédito
                            </label>
                        </li>
                        <li>
                            <label for="contra-entrega" class="opcion-pago">
                                <input type="radio" name="metodo_pago" id="contra-entrega" value="Contra entrega">
                                <img src="img/contra-entrega.png" alt="icono contra entrega">
                                Contra entrega
                            </label>
                        </li>
                    </ul>
                    <input type="hidden" name="id_cliente" value="<?php echo ($cliente['id']); ?>">
                    <input type="hidden" name="total" value="" id="total-valor-envio">
                    <div id="valores-hidden">
                        <!-- JavaScript -->
                    </div>
                    <input type="submit" class="m-0 btn btn-primary" name="btn_realizar_pedido" value="REALIZAR PEDIDO">
                    </form>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <h2 class="mb-4">Tus productos / Lo que vas a comprar</h2>
            
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th></th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-lista-carrito">
                        <!-- JavaScript -->
                    </tbody>
                </table>
            </div>
            <a href="carrito" class="btn btn-secondary my-4">REGRESAR AL CARRITO</a>
        </div>
        
        <?php
            else : ?>
                <div class="container mt-5 text-center no-login">
                    <p><a href="carrito">Inicia sesión</a> o <a href="registro-usuario">registrate</a></p>
                </div>
    <?php endif; ?>

    <script src="js/pago.js"></script>
</body>
</html>

