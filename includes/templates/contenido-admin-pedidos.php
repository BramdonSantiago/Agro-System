<h3 class="mb-4">Pedidos</h3>
<div class="row">
    <div class="col">
        <form action="includes/functions/actualizar_estado_entrega.php" method="POST">
            <div class="table-responsive mb-4">
                <table class="table text-center" id="data-table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Fecha</th>
                            <th scope="col">#Pedido</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">#Productos</th>
                            <th scope="col">Total</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                            <?php 
                            // OBTENER LOS PEDIDOS ADMINISTRADOR
                                try {
                                    require_once('includes/functions/bd_conexion.php');
                                    $sql_pedidos = "SELECT fecha, hora, numero_pedido, nombre_usuario, numero_productos, total, estado_entrega FROM pedidos INNER JOIN registro_cliente ON pedidos.id_cliente = registro_cliente.id INNER JOIN estado_entrega_pedido ON pedidos.id_estado_entrega = estado_entrega_pedido.id";
                                    $resultado = $conn->query($sql_pedidos);
                                } catch (\Exception $e) {
                                    echo $e->getMessage();
                                }
                            ?>
                            <tbody id="pedidos" class="pedidos">
                            <?php 
                                while ($pedidos = $resultado->fetch_assoc()) : ?>
                                    <tr>
                                        <td><i class="icono ojo far fa-eye" data-numero-pedido="<?php echo ($pedidos['numero_pedido']); ?>" data-toggle="modal" data-target=".bd-example-modal-lg"></i></td>
                                        <td><?php echo ($pedidos['fecha'] . " " . $pedidos['hora']); ?></td>
                                        <td><?php echo ($pedidos['numero_pedido']); ?></td>
                                        <td><?php echo ($pedidos['nombre_usuario']); ?></td>
                                        <td class="numero-productos" data-numero-productos="<?php echo ($pedidos['numero_productos']); ?>"><?php echo($pedidos['numero_productos']); ?></td>
                                        <td class="totales" data-total="<?php echo ($pedidos['total']); ?>">$<?php echo($pedidos['total']); ?> MXN</td>
                                        <td style="font-weight: bold;"><?php echo ($pedidos['estado_entrega']); ?></td>
                                        <td>
                                        <select name="estado_entrega[]" class="estado-pedido">
                                        <?php 
                                            if ($pedidos['estado_entrega'] == 'Entregado') : ?>
                                                <option value="2"><?php echo ($pedidos['estado_entrega']); ?></option>
                                                <option value="1">No entregado</option>
                                                <?php else: ?>
                                                <option value="1"><?php echo ($pedidos['estado_entrega']); ?></option>
                                                <option value="2">Entregado</option>
                                        <?php endif; ?>
                                            </select>
                                            <i class="icono basura fas fa-trash-alt" data-id="<?php echo ($pedidos['numero_pedido']); ?>"></i>
                                        <input type="hidden" name="numero_pedido[]" value="<?php echo ($pedidos['numero_pedido']); ?>">
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                                <?php $conn->close(); ?>
                            </tbody>
                        </tr>
                    </thead>
                </table>
            </div>
            <input type="submit" class="btn btn-primary mb-5" name="btn_guardar_cambios_estado_pedido" value="GUARDAR CAMBIOS">
        </form>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-5 detalles-cliente">
            <div id="detalle-pedido">
                <!-- JavaScript -->
            </div>
            <table class="table text-center detalles-pedido">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th></th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody id="detalle-pedido-productos">
            </tbody>
        </table>
        </div>
    </div>
</div>