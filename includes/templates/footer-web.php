<footer class="footer">
        <img src="img/bg-rama-superior.png" class="rama superior" alt="">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="img/logo2.png" class="img-fluid mb-4" alt="">
                    <p>Agro-System es la tienda líder de la región que ofrece a las personas productos para su campo de acuerdo con los altos estándares.</p>
                </div>
                <div class="col-md-4">
                    <h3 class="mb-4">Contactanos</h3>
                    <p><i class="fas fa-map-marker-alt icono verde"></i>Corregidora #54 Puruándiro Michoacán, México</p>
                    <p><i class="fas fa-phone-alt icono verde"></i>4381121181</p>
                    <p class="mb-4"><i class="fas fa-envelope icono verde"></i>agrosystem2@gmail.com</p>
                    <div class="mb-4 mb-md-0 text-center text-md-left redes-sociales">
                        <h3 class="mb-4">Siguenos en</h3>
                        <a href="https://www.facebook.com/Agro-System-106060798037171" target="_blank"><i class="fab fa-facebook-f icono redes-sociales"></i></a>
                        <a href="https://www.tiktok.com/@agrosystem2" target="_blank"><i class="fab fa-tiktok icono redes-sociales"></i></a>
                        <a href="https://www.instagram.com/agrosystem2/" target="_blank"><i class="fab fa-instagram icono redes-sociales"></i></a>
                        <a href="https://www.youtube.com/channel/UC73lwi0I0xuukABf7paPSew" target="_blank"><i class="fab fa-youtube icono redes-sociales"></i></a>
                        <a href="https://twitter.com/SystemAgro" target="_blank"><i class="fab fa-twitter icono redes-sociales"></i></a>
                    </div>
                </div>
                <div class="col-md-4 text-center text-md-left gallery">
                    <h3 class="mb-4">Galería</h3>
                    <a href="img/galeria1thumb.jpg">
                        <img src="img/galeria1.jpg">
                    </a>
                    <a href="img/galeria2thumb.jpg">
                        <img src="img/galeria2.jpg">
                    </a>
                    <a href="img/galeria3thumb.jpg">
                        <img src="img/galeria3.jpg">
                    </a>
                    <a href="img/galeria4thumb.jpg">
                        <img src="img/galeria4.jpg">
                    </a>
                </div>
            </div>
        </div>
        <img src="img/hoja-separador-footer2.png" class="hoja-separador-footer" class="img-fluid" alt="">
        <img src="img/bg-rama-inferior.png" class="rama inferior" alt="">
    </footer>
    <div class="copy">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>Agro-System. Todos los derechos reservados 2021 ©</p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/menu-hamburguesa.js"></script>
    <script src="js/carrito-iniciar-sesion.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/simple-lightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script src="js/glide.modular.esm.js"></script>
    <script src="js/carrito.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
    <script src="js/notificacion-login-cliente.js"></script>
    
    <script>
        AOS.init();
    </script>
    <script>
        $(document).ready(function() {
            $('.numero').counterUp({
                    delay: 10,
                    time: 6000
            });
        });
    </script>
    <script>
        var lightbox = new SimpleLightbox('.gallery a', { /* options */ });
    </script>
    <script>
        new Glide('.glide', {
            autoplay: 6000
        }).mount();
    </script>

    <?php 
        $url = $_SERVER["REQUEST_URI"];
        if ($url != '/agrosystem/') {
            ?>
                <script src="js/mover-header.js"></script>
            <?php             
        } 
    ?>

</body>
</html>