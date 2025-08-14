<?php
    include_once 'includes/templates/header-web.php';                    
?>

<?php
    $producto = $_GET['producto'];      
?>

    <div class="hero-general" id="hero-general">
        <!-- CSS -->
        <div class="container h-100">
            <div class="row h-100">
                <div class="col d-flex justify-content-center align-items-center text-center">
                    <h1>Resultados de la búsqueda</h1>
                </div>
            </div>
        </div>
    </div>
    
</header>

<main class="pagina-productos">
    <section class="titulos-categoria-productos mt-5">
    <?php 
        try {
            require_once('includes/functions/bd_conexion.php');
            $sql = "SELECT id, imagen, marca, nombre, precio FROM productos WHERE nombre LIKE '%$producto%' AND id_estado_inventario = 1 OR marca LIKE '%$producto%'";
            // $sql = "SELECT * FROM productos INNER JOIN categoria_producto ON productos.id_categoria = categoria_producto.id WHERE categoria LIKE '%$producto%' AND id_estado_inventario = 1";
            $resultado = $conn->query($sql);
            $numero_resultados = $resultado->num_rows;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    ?>
        <div class="container">
            <h2><?php echo ($numero_resultados); ?> resultados</h2>
            <div class="row productos text-center">
                <div class="col d-flex justify-content-between flex-wrap">
                    <?php while($productos = $resultado->fetch_assoc()) : ?>
                        
                        <div data-aos="fade" class="producto-singular">
                            <div class="producto p-4 mb-2">
                                <img src="img/<?php echo ($productos['imagen']); ?>" class="img-fluid" alt="">
                                <div class="bg-hover">
                                    <a href="detalle-producto?id=<?php echo ($productos['id']); ?>" class="btn btn-primary ver-producto-lg">VER PRODUCTO</a>
                                </div>
                            </div>
                            <div>
                                <h3 class="nombre"><?php echo ($productos['marca']." " .$productos['nombre']); ?></h3>
                                <p>$<?php echo ($productos['precio']); ?> MXN</p>
                                <a href="" class="btn btn-primary ver-producto mb-4">VER PRODUCTO</a>  
                            </div>   
                        </div>
                    <?php endwhile; ?>   
                    <?php $conn->close(); ?>                
                </div>
            </div>
        </div>    
    </section>
</main>

<?php
    include_once 'includes/templates/footer-web.php';                    
?>