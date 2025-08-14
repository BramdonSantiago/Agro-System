<?php 
    $id_producto = $_GET['id'];
?>

<?php
    include_once 'includes/templates/header-web.php';                    
?>

    <div class="hero-general" id="hero-general">
        <!-- CSS -->
        <div class="container h-100">
            <div class="row h-100">
                <div class="col d-flex justify-content-center align-items-center text-center">
                    <h1>Detalles del producto</h1>
                </div>
            </div>
        </div>
    </div>
    
</header>

<main class="mt-5 detalle-producto">
    <?php 
        try {
            require_once('includes/functions/bd_conexion.php');
            // $sql = "SELECT id, imagen, marca, nombre, precio, descripcion, categoria FROM productos WHERE id = $id_producto";
            $sql = "SELECT productos.id, imagen, marca, nombre, precio, descripcion, categoria, estado FROM productos INNER JOIN categoria_producto ON productos.id_categoria = categoria_producto.id INNER JOIN estado_inventario_producto ON productos.id_estado_inventario = estado_inventario_producto.id WHERE productos.id = $id_producto";
            $resultado = $conn->query($sql);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    ?>
    <?php 
        $producto = $resultado->fetch_assoc();
        $conn->close();
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="img/<?php echo ($producto['imagen']); ?>" class="img-fluid" alt="">
            </div>
            <div class="col-md-6">
                <h3 class="nombre"><?php echo ($producto['marca']." " .$producto['nombre']); ?></h3>
                <p class="precio">$<?php echo ($producto['precio']); ?> MXN</p>
                <p class="descripcion"><?php echo ($producto['descripcion']); ?></p>
                <p class="marca"><span>Marca:</span> <?php echo ($producto['marca']); ?></p>
                <p class="categoria"><span>Categoría:</span> <?php echo ($producto['categoria']) ?></p>
                <p class="estado-inventario"><span>En existencia:</span> <?php echo ($producto['estado']) ?></p>
                <a class="btn btn-primary" id="agregar-carrito" data-id="<?php echo ($producto['id']); ?>" data-imagen="<?php echo ($producto['imagen']); ?>" data-marca="<?php echo ($producto['marca']); ?>" data-nombre="<?php echo ($producto['nombre']); ?>" data-precio="<?php echo ($producto['precio']); ?>" data-aos="fade-right">AÑADIR AL CARRITO</a>
            </div>
        </div>
    </div>
</main>

<?php
    include_once 'includes/templates/footer-web.php';                    
?>