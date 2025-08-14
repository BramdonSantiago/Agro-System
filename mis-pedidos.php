<?php 
    session_start();
    if (isset($_SESSION['id_cliente']) && isset($_SESSION['usuario_cliente'])) {
        $id = $_SESSION['id_cliente'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis pedidos | Agro-System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/mis_pedidos.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
</head>
<body>
    <?php 
        if (isset($_SESSION['usuario_cliente'])) : ?>
            <div class="container mt-5">
                <h1 class="mb-4">Mis pedidos</h1>
                <div class="row">
                    <div class="col">
                    <?php 
                    // MUESTRA LOS PEDIDOS (HISTORIAL) DEL CLIENTE ORDENADOS POR FECHA
                        try {
                            require_once('includes/functions/bd_conexion.php');
                            $sql_pedidos = "SELECT imagen, marca, nombre, detalle_pedido.precio, detalle_pedido.cantidad, detalle_pedido.subtotal, fecha, referencia_pago, numero_pedido, estado_entrega FROM detalle_pedido INNER JOIN pedidos ON detalle_pedido.id_numero_pedido = pedidos.numero_pedido INNER JOIN productos ON detalle_pedido.id_producto = productos.id INNER JOIN estado_entrega_pedido ON pedidos.id_estado_entrega = estado_entrega_pedido.id WHERE id_cliente = $id";
                            $resultado_pedidos = $conn->query($sql_pedidos);
                            $por_fecha = array();

                            while ($pedidos = $resultado_pedidos->fetch_assoc()) {
                                $fecha = $pedidos['fecha'];

                                $pedido = array(
                                    'imagen' => $pedidos['imagen'],
                                    'marca' => $pedidos['marca'],
                                    'nombre' => $pedidos['nombre'],
                                    'precio' => $pedidos['precio'],
                                    'cantidad' => $pedidos['cantidad'],
                                    'subtotal' => $pedidos['subtotal'],
                                    'referencia_pago' => $pedidos['referencia_pago'],
                                    'numero_pedido' => $pedidos['numero_pedido'],
                                    'referencia_pago' => $pedidos['referencia_pago'],
                                    'estado_entrega' => $pedidos['estado_entrega']
                                );
                                $por_fecha[$fecha][] = $pedido;
                            }
                    ?>
                    <?php 
                        foreach ($por_fecha as $fecha => $lista_pedido) : ?>
                            <div class="table-responsive">
                                <table class="table text-center mis-pedidos data-table">
                                    <p class="text-right"><span class="fecha">Fecha:</span> <?php echo ($fecha); ?></p>
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th></th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Subtotal</th>
                                            <!-- <th class="referencia_pago">Referencia de pago</th> -->
                                            <th class="numero_pedido">#Pedido</th>
                                            <th class="estado-entrega-th">Referencia de pago</th>
                                            <th class="estado-entrega-th">Estado entrega</th>
                                        </tr>
                                    </thead>
                    <?php  
                        foreach ($lista_pedido as $pedido) : ?>
                            <tbody>
                                <td><img src="img/<?php echo ($pedido['imagen']); ?>" alt=""></td>
                                <td class="text-left"><?php echo ($pedido['marca'] . " " . $pedido['nombre']); ?></td>
                                <td>$<?php echo ($pedido['precio']); ?> MXN</td>
                                <td><?php echo ($pedido['cantidad']); ?></td>
                                <td>$<?php echo ($pedido['subtotal']); ?> MXN</td>
                                <!-- <td><//?php echo ($pedido['referencia_pago']); ?></td> -->
                                <td><?php echo ($pedido['numero_pedido']); ?></td>
                                <td><?php echo ($pedido['referencia_pago']); ?></td>
                                <td class="estado-entrega-td"><?php echo ($pedido['estado_entrega']); ?></td>  
                        <?php endforeach; ?>
                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <a href="/agrosystem" class="btn btn-primary my-4">REGRESAR A LA TIENDA</a>
                    <?php
                        $conn->close();
                        } catch (\Exception $e) {
                            echo $e->getMessage();
                        }
                    ?>
                    </div>
                </div>
            </div>
        <?php 
            else : ?>
                <p>No has iniciado sesión</p>
        <?php endif; ?>
    <script src="js/estado-entrega.js"></script>
</body>
</html>