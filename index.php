<?php
    include_once 'includes/templates/header-web.php';
    include_once 'includes/functions/visitas.php';                     
?>
        <div class="hero">
            <!-- CSS -->
            <div class="container">
                <div class="row d-md-flex justify-content-end text-center">
                    <div class="col col-md-6 mt-5 contenido-titulos">
                        <div>
                            <h1 class="mb-4">Empresa Agro, Puruándiro Michoacán México</h1>
                            <p>Agro-System es la empresa lider en la región de Puruándiro que busca ser reconocida pronto en todo el estado de michoacán como tu mejor alternativa para comprar desde la comodidad de tu hogar toda clase de productos relacionados con la actividad agropecuaria; con una muy buena variedad y calidad en productos.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="corte">
                <!-- CSS -->
            </div>
        </div>
    </header>
    <main class="pagina-principal-productos">
        <section class="container quimicos">
            <div class="row text-center">
                <div class="col col-xl-6 bg-titulos-productos bg-quimicos" data-aos="zoom-out-down">
                    <!-- CSS -->
                    <div class="bg-brocha">
                        <img src="img/bg-brocha.png" alt="">
                        <h2>Fertilizantes</h2>
                    </div> 
                </div>
                <div class="col col-xl-6">
                    <?php 
                        try {
                            require_once('includes/functions/bd_conexion.php');
                            $sql = "SELECT id, imagen, marca, nombre, precio FROM productos WHERE id_categoria = 1 AND id_estado_inventario = 1 LIMIT 4";
                            $resultado = $conn->query($sql);
                        } catch (\Exception $e) {
                            echo $e->getMessage();
                        }
                    ?>
                    <div class="d-md-flex justify-content-md-between flex-wrap mb-4 productos">
                        <?php while($fertilizantes = $resultado->fetch_assoc()) : ?>
                                <div data-aos="fade" class="producto-singular">
                                    <div class="producto p-4 mb-2">
                                        <img src="img/<?php echo ($fertilizantes['imagen']); ?>" alt="">
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
        <section class="presentacion contenido-titulos" id="presentacion">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col col-md-8">
                        <h2>Un poco sobre nosotros</h2>
                        <p>Agro-System pone todo su esfuerzo para que tus cultivos sean optimos y la tierra este sanitizada dotando de esta una buena producción. “Haz de Agro-System lo mejor para tu campo”.</p>
                        <a href="" class="btn btn-primary btn-lg"><img src="img/icono-video-presentacion.png" class="icono-video-presentacion" alt="Icono video presentación Agro-System">VER PRESENTACIÓN</a>
                    </div>
                </div>
            </div>
            <div class="corte">
                <!-- CSS -->
            </div>
        </section>
        <section class="container semillas">
            <div class="row flex-column-reverse flex-lg-row text-center">
                <div class="col col-xl-6">
                <?php 
                        try {
                            require_once('includes/functions/bd_conexion.php');
                            $sql = "SELECT id, imagen, marca, nombre, precio FROM productos WHERE id_categoria = 2 AND id_estado_inventario = 1 LIMIT 4";
                            $resultado = $conn->query($sql);
                        } catch (\Exception $e) {
                            echo $e->getMessage();
                        }
                    ?>
                    <div class="d-md-flex justify-content-md-between flex-wrap mb-4 productos">
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
                        <?php $conn->close(); ?>
                    </div>
                </div>
                <div class="col col-xl-6 bg-titulos-productos bg-semillas" data-aos="zoom-out-down">
                    <!-- CSS -->
                    <div class="bg-brocha">
                        <img src="img/bg-brocha.png" alt="">
                        <h2>Semillas</h2>
                    </div> 
                </div>
            </div>
        </section>
        <section class="contador text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-5 mb-md-0">
                        <div class="d-flex justify-content-center align-items-start separador">
                            <p class="numero">5</p>
                            <img src="img/icono-ganador.png" class="img-fluid" alt=""> 
                        </div>
                        <p class="contador-titulo">Reconocimientos</p>
                    </div>
                    <div class="col-md-4 mb-5 mb-md-0">
                        <div class="d-flex justify-content-center align-items-start separador">
                            <div>
                                <span class="signo">+</span><span class="numero">20</span>
                            </div>
                            <img src="img/icono-almacen.png" class="img-fluid" alt=""> 
                        </div>
                        <p class="contador-titulo">Productos</p>
                    </div>
                    <div class="col-md-4 mb-5 mb-md-0">
                        <div class="d-flex justify-content-center align-items-start">
                            <div>
                                <span class="signo">+</span><span class="numero">100</span>
                            </div>
                            <img src="img/icono-cliente.png" class="img-fluid" alt=""> 
                        </div>
                        <p class="contador-titulo">Clientes</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="testimonios">
            <h2>Lo que dicen de nosotros</h2>
            <div class="container testimonio">
                <div class="row justify-content-center">
                    <div class="col-6 testimonio-contenido glide">
                        <div  class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
                                <li class="glide__slide">
                                    <img src="img/testimonial.jpg" alt="">
                                    <p class="texto-testimonio">“Escucharón mis necesidades, siempre dan su punto de vista en función de su experiencia, el resultado de mi producción ha sido excelente”</p>
                                    <p class="mb-0 nombre">Gladiola Crespo</p>
                                    <p class="tipo-cliente">Cliente regular</p>
                                </li>
                                <li class="glide__slide">
                                    <img src="img/testimonial2.jpg" alt="">
                                    <p class="texto-testimonio">“Buen trato, atención rápida y resolutiva, con soluciones flexibles y productos indispensables para la cosecha y el cuidado de esta, muy fácil la compra y todas las entregas siempre realizadas sin ningún inconveniente”</p>
                                    <p class="mb-0 nombre">Javier Guerra</p>
                                    <p class="tipo-cliente">Cliente regular</p>
                                </li>
                                <li class="glide__slide">
                                    <img src="img/testimonial3.jpg" alt="">
                                    <p class="texto-testimonio">“Distintiva, es para mí una empresa con unas características que la hacen única e indispensable son especialistas en esta area y nunca me han quedado mal con ningún pedido, son muy serios”</p>
                                    <p class="mb-0 nombre">Martín Sánchez</p>
                                    <p class="tipo-cliente">Cliente regular</p>
                                </li>
                                <li class="glide__slide">
                                    <img src="img/testimonial4.jpg" alt="">
                                    <p class="texto-testimonio">“Son los mejores y los que más aportan en esta area en todo el estado, son grandes Agro-System”</p>
                                    <p class="mb-0 nombre">Julio Pérez</p>
                                    <p class="tipo-cliente">Cliente regular</p>
                                </li>
                            </ul>
                        </div>
                        <div class="glide__arrows" data-glide-el="controls">
                            <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-arrow-left"></i></button>
                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fas fa-arrow-right"></i></button>
                        </div>
                        <div class="glide__bullets" data-glide-el="controls[nav]">
                            <button class="glide__bullet" data-glide-dir="=0"></button>
                            <button class="glide__bullet" data-glide-dir="=1"></button>
                            <button class="glide__bullet" data-glide-dir="=2"></button>
                            <button class="glide__bullet" data-glide-dir="=3"></button>
                        </div>
                    </div>
                </div>
                <div class="adorno-superior1">
                    <!-- CSS -->
                </div>
                <div class="adorno-superior2">
                    <!-- CSS -->
                </div>
            </div>
            <div class="corte">
                <!-- CSS -->
            </div>
        </section>
        <section class="contactanos text-center">
            <h2 class="">Contactanos</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 bg-contactanos">
                        <!-- CSS -->
                        <!-- <img src="img/bg-mancha.png" class="img-fluid" alt=""> -->
                        <div class="mancha">
                             <!-- CSS -->
                             <img src="img/bg-brocha2.png" class="brocha-verde" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form id="formulario-contacto">
                            <div>
                                <input type="text" placeholder="Nombre" name="nombre" data-aos="fade-down" required>
                            </div>
                            <div>
                                <input type="email" placeholder="Email" name="email" data-aos="fade-down" required>
                            </div>
                            <div>
                                <input type="text" placeholder="Teléfono" name="telefono" data-aos="fade-down" required>
                            </div>
                            <div>
                                <textarea placeholder="Escríbenos tu mensaje" name="mensaje" data-aos="fade-down" required></textarea>
                            </div>
                            <div class="text-right">
                                <input type="submit" id="btn-enviar-email" class="btn btn-primary btn-lg" value="CONTACTAR" data-aos="fade-right">
                            </div>     
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php
    include_once 'includes/templates/footer-web.php';                    
?>
<script src="js/enviar_email.js"></script>