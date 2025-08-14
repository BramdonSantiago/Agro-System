<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    
        try {
            require_once('includes/functions/bd_conexion.php');
            $sql = "SELECT productos.id, nombre, marca, precio, imagen, descripcion, id_categoria, categoria, id_estado_inventario, estado FROM productos INNER JOIN estado_inventario_producto ON productos.id_estado_inventario = estado_inventario_producto.id INNER JOIN categoria_producto ON productos.id_categoria = categoria_producto.id  WHERE productos.id = $id";
            $resultado = $conn->query($sql);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        $producto = $resultado->fetch_assoc();
        // var_dump($producto);
        $conn->close();
    }     
?>

<?php 
    if(isset($_GET['id'])) : ?>
        <h3 class="mb-4">Editar producto</h3>
        <div class="row editar-producto">
            <div class="col">
            <img src="img/<?php echo ($producto['imagen']); ?>" alt="">
                <form action="includes/functions/enviar_producto_admin.php" method="POST" class="d-flex justify-content-between flex-wrap">
                    <div>
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo ($producto['nombre']); ?>" required>
                    </div>
                    <div>
                        <label for="marca">Marca</label>
                        <input type="text" id="marca" name="marca" class="form-control" value="<?php echo ($producto['marca']); ?>" required>
                    </div>
                    <div>
                        <label for="categoria">Categoría</label>
                        <select name="categoria" id="categoria" class="form-control" required>
                            <option value="<?php echo ($producto['id_categoria']); ?>"><?php echo ($producto['categoria']); ?></option>
                            <?php 
                                if ($producto['id_categoria'] == 1) : ?>
                                    <option value="2">Semilla</option>
                                    <option value="3">Tóxico</option>
                                <?php 
                                    elseif ($producto['id_categoria'] == 2) : ?>
                                        <option value="1">Fertilizante</option>
                                        <option value="3">Tóxico</option>
                                <?php 
                                    elseif ($producto['id_categoria'] == 3) : ?>
                                        <option value="1">Fertilizante</option>
                                        <option value="2">Semilla</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div>
                        <label for="precio">Precio</label>
                        <input type="text" id="precio" name="precio" class="form-control" value="<?php echo ($producto['precio']); ?>" required>
                    </div>
                    <div>
                        <label for="imagen">Imagen</label>
                        <input type="text" id="imagen" name="imagen" class="form-control" value="<?php echo ($producto['imagen']); ?>" required>
                    </div>
                    <div>
                        <label for="estado">Estado</label>
                        <select id="estado" name="estado" class="form-control" required>
                            <option value="<?php echo ($producto['id_estado_inventario']); ?>"><?php echo ($producto['estado']); ?> </option>
                            <?php 
                                if ($producto['id_estado_inventario'] == 1) : ?>
                                    <option value="2">No disponible</option>
                                <?php  
                                    elseif ($producto['id_estado_inventario'] == 2) : ?>
                                        <option value="1">Disponible</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="descripcion">
                        <label for="descripcion">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-control" <?php echo ($producto['descripcion']); ?> required><?php echo ($producto['descripcion']); ?></textarea>
                    </div>
                    <div>
                        <input type="hidden" name="id" value="<?php echo ($producto['id']); ?>" >
                        <input type="submit" class="btn btn-primary mb-5" name="editar-producto" value="EDITAR">
                    </div>
                </form>
            </div>
        </div>
<?php endif; ?>
