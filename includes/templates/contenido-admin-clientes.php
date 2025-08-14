<h3 class="mb-4">Clientes</h3>
<div class="row">
    <div class="col">
        <div class="table-responsive mb-5">
            <table class="table text-center" id="data-table">
                <thead>
                    <tr>
                        <th scope="col">Detalles</th>
                        <th scope="col">Fecha registro</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Email</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Acción</th>
                        <?php 
                            try {
                                require_once('includes/functions/bd_conexion.php');
                                $sql_clientes = "SELECT id, nombre_usuario, fecha_registro, email, telefono FROM registro_cliente";
                                $resultado_clientes = $conn->query($sql_clientes);
                            } catch (\Exception $e) {
                                echo $e->getMessage();
                            }
                        ?>
                        <tbody id="clientes">
                        <?php 
                            while ($clientes = $resultado_clientes->fetch_assoc()) : ?>
                                <tr>
                                    <td><i class="icono ojo far fa-eye" data-id="<?php echo ($clientes['id']); ?>" data-toggle="modal" data-target=".bd-example-modal-lg"></i></td>
                                    <td><?php echo ($clientes['fecha_registro']); ?></td>
                                    <td><?php echo ($clientes['nombre_usuario']); ?></td>
                                    <td><?php echo ($clientes['email']); ?></td>
                                    <td><?php echo ($clientes['telefono']); ?></td>
                                    <td><i class="icono basura fas fa-trash-alt" data-id="<?php echo ($clientes['id']); ?>"></i></td>
                                </tr>
                            <?php endwhile; ?>
                            <?php $conn->close(); ?>
                        </tbody>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-5 detalles-cliente">
            <div id="detalle-cliente">
                <!-- JavaScript -->
            </div>
        </div>
    </div>
</div>