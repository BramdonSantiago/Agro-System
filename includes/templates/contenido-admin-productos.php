<h3 class="mb-4">Productos</h3>
<div class="row">
    <div class="col">
        <div class="table-responsive mb-5">
            <table class="table text-center productos" id="data-table">
                <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acción</th>
                        <?php 
                        // MUESTRA LOS PRODUCTOS EN EL ADMINISTRADOR
                            try {
                                require_once('includes/functions/bd_conexion.php');
                                $sql = "SELECT productos.id, imagen, nombre, marca, categoria, precio, estado FROM productos INNER JOIN categoria_producto ON productos.id_categoria = categoria_producto.id INNER JOIN estado_inventario_producto ON productos.id_estado_inventario = estado_inventario_producto.id";
                                $resultado = $conn->query($sql);
                            } catch (\Exception $e) {
                                echo $e->getMessage();
                            }
                        ?>
                        <tbody>
                        <?php 
                            while($productos = $resultado->fetch_assoc()) : ?>
                            <tr data-aos="fade">
                                <td>
                                <img src="img/<?php echo ($productos['imagen']); ?>">
                                <p><a href="editar-producto?id=<?php echo ($productos['id']); ?>" class="editar">Editar</a></p>
                                </th>
                                <td><?php echo ($productos['nombre']); ?></td>
                                <td><?php echo ($productos['marca']); ?></td>
                                <td><?php echo ($productos['categoria']); ?></td>
                                <td>$<?php echo ($productos['precio']); ?> MXN</td>
                                <th scope="row"><?php echo ($productos['estado']); ?></td>
                                <td><a class="eliminar-producto"><i class="icono basura fas fa-trash-alt" data-id="<?php echo($productos['id']); ?>"></i></a></td>
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