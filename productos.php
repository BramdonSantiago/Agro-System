<?php
    include_once 'includes/templates/header-web.php';
    include_once 'includes/functions/visitas.php';                    
?>

    <div class="hero-general" id="hero-general">
        <!-- CSS -->
        <div class="container h-100">
            <div class="row h-100">
                <div class="col d-flex justify-content-center align-items-center text-center">
                    <h1>Productos</h1>
                </div>
            </div>
        </div>
    </div>
    
</header>

<main class="pagina-productos">
    <section class="titulos-categoria-productos mt-5">
        <div class="container">
            <h2>Semillas</h2>
            <div class="row productos text-center">
                <?php 
                    try {
                        require_once('includes/functions/bd_conexion.php');
                        $sql = "SELECT id, imagen, marca, nombre, precio FROM productos WHERE id_categoria = 2 AND id_estado_inventario = 1";
                        $resultado = $conn->query($sql);
                    } catch (\Exception $e) {
                        echo $e->getMessage();
                    }
                ?>
                <div class="col d-flex flex-column flex-md-row justify-content-md-between flex-wrap">
                    <?php while($semillas = $resultado->fetch_assoc()) : ?>
                        <div data-aos="fade" class="producto-singular">
                            <div class="producto p-4 mb-2">
                                <img src="img/<?php echo ($semillas['imagen']); ?>" class="img-fluid" alt="">
                                <div class="bg-hover">
                                    <a href="detalle-producto?id=<?php echo ($semillas['id']); ?>" class="btn btn-primary ver-producto-lg">VER PRODUCTO</a>
                                </div>
                            </div>
                            <div>
                            <h3 class="nombre"><?php echo ($semillas['marca']." " .$semillas['nombre']); ?></h3>
                            <p>$<?php echo ($semillas['precio']); ?> MXN</p>
                                <a href="detalle-producto?id=<?php echo ($semillas['id']); ?>" class="btn btn-primary ver-producto mb-4">VER PRODUCTO</a>  
                            </div>   
                        </div>
                    <?php endwhile; ?>                   
                </div>
            </div>
        </div>    
    </section>
    <section class="titulos-categoria-productos mt-5">
        <div class="container">
            <h2>Fertilizantes</h2>
            <div class="row productos text-center">
                <?php 
                    try {
                        require_once('includes/functions/bd_conexion.php');
                        $sql = "SELECT id, imagen, marca, nombre, precio FROM productos WHERE id_categoria = 1 AND id_estado_inventario = 1";
                        $resultado = $conn->query($sql);
                    } catch (\Exception $e) {
                        echo $e->getMessage();
                    }
                ?>
                <div class="col d-flex flex-column flex-md-row justify-content-md-between flex-wrap">
                    <?php while($fertilizantes = $resultado->fetch_assoc()) : ?>
                        <div data-aos="fade" class="producto-singular">
                            <div class="producto p-4 mb-2">
                                <img src="img/<?php echo ($fertilizantes['imagen']); ?>" class="img-fluid" alt="">
                                <div class="bg-hover">
                                <a href="detalle-producto?id=<?php echo ($fertilizantes['id']); ?>" class="btn btn-primary ver-producto-lg">VER PRODUCTO</a>
                                </div>
                            </div>
                            <div>
                            <h3 class="nombre"><?php echo ($fertilizantes['marca']." " .$fertilizantes['nombre']); ?></h3>
                            <p>$<?php echo ($fertilizantes['precio']); ?> MXN</p>
                                <a href="detalle-producto?id=<?php echo ($fertilizantes['id']); ?>" class="btn btn-primary ver-producto mb-4">VER PRODUCTO</a>  
                            </div>   
                        </div>
                    <?php endwhile; ?>                   
                </div>
            </div>
        </div>    
    </section>
    <section class="titulos-categoria-productos mt-5">
        <div class="container">
            <h2>Tóxicos</h2>
            <div class="row productos text-center">
                <?php 
                    try {
                        require_once('includes/functions/bd_conexion.php');
                        $sql = "SELECT id, imagen, marca, nombre, precio FROM productos WHERE id_categoria = 3 AND id_estado_inventario = 1";
                        $resultado = $conn->query($sql);
                    } catch (\Exception $e) {
                        echo $e->getMessage();
                    }
                ?>
                <div class="col d-flex flex-column flex-md-row justify-content-md-between flex-wrap">
                    <?php while($toxicos = $resultado->fetch_assoc()) : ?>
                        <div data-aos="fade" class="producto-singular">
                            <div class="producto p-4 mb-2">
                                <img src="img/<?php echo ($toxicos['imagen']); ?>" class="img-fluid" alt="">
                                <div class="bg-hover">
                                <a href="detalle-producto?id=<?php echo ($toxicos['id']); ?>" class="btn btn-primary ver-producto-lg">VER PRODUCTO</a>
                                </div>
                            </div>
                            <div>
                                <h3 class="nombre"><?php echo ($toxicos['marca']." " .$toxicos['nombre']); ?></h3>
                                <p>$<?php echo ($toxicos['precio']); ?> MXN</p>
                                <a href="detalle-producto?id=<?php echo ($toxicos['id']); ?>" class="btn btn-primary ver-producto mb-4">VER PRODUCTO</a>  
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