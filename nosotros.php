<?php
    include_once 'includes/templates/header-web.php';  
    include_once 'includes/functions/visitas.php';                  
?>  
    <div class="hero-general" id="hero-general">
        <!-- CSS -->
        <div class="container h-100">
            <div class="row h-100">
                <div class="col d-flex justify-content-center align-items-center text-center">
                    <h1>Acerca de nosotros</h1>
                </div>
            </div>
        </div>
    </div> 
</header>

<main class="pagina-nosotros">
    <section class="py-5 mision-vision-valores">
        <div class="container">
            <div class="col">
                <div class="row">
                    <div class="col-md-6">
                        <img src="img/galeria2thumb.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-6">
                        <ul class="nav nav-tabs d-flex justify-content-between" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Acerca de</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Visión</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Misión</a>
                            </li>
                        </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <p class="mt-4 mb-0">Agro-System es una plataforma web con la que los propietarios de tierras productoras del campo podrán realizar la Compra de productos relacionados con la agricultura, la siembra, etc.  Además de ofrecer la plataforma a negocios dedicados a la venta de estos productos, para que cuenten con la administración de sus clientes, ventas y productos.</p>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <p class="mt-4 mb-0">Crear una Plataforma web para facilitar la compra o distribución de productos relacionados con actividades agropecuarias, semillas, agroquímicos, etc. Además de gestionar y llevar una administración relacionada con los productos, clientes y ventas de la empresa o negocio a la que se le ofrezca este servicio.</p>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <p class="mt-4 mb-0">Implementar esta plataforma en todos los ayuntamientos, locales o negocios que se dediquen a la venta de productos agropecuarios y  semillas (maíz, sorgo etc.) del estado de Michoacán y posteriormente a las principales entidades federativas del país que se dedican a estos negocios.</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    <section class="py-5 nuestro-equipo">
        <div class="container text-center fotos-equipo">
            <h2 class="mb-5">Nuestro equipo</h2>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <img src="img/bramdon-santiago2.jpg" class="mb-2 img-fluid" alt="Foto de perfil de Bramdon Santiago">
                    <h3>Bramdon Santiago</h3>
                </div>
                <div class="col-md-4 mb-5">
                    <img src="img/lorena-diaz.jpg" class="mb-2 img-fluid" alt="Foto de perfil de Lorena Díaz">
                    <h3>Lorena Díaz</h3>
                </div>
                <div class="col-md-4 mb-5">
                    <img src="img/armando-espinoza.jpg" class="mb-2 img-fluid" alt="Foto de perfil de Armando Espinoza">
                    <h3>Armando Espinoza</h3>
                </div>
                <div class="col-md-4 mb-4">
                    <img src="img/enrique-rodriguez.jpg" class="mb-2 img-fluid" alt="Foto de perfil de Enrique Rodríguez">
                    <h3>Enrique Rodríguez</h3>
                </div>
                <div class="col-md-4 mb-4">
                    <img src="img/carmen-maqueda.jpg" class="mb-2 img-fluid" alt="Foto de perfil de Carmen Maqueda">
                    <h3>Carmen Maqueda</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="categorias-productos">
        <div class="container text-center categorias">
            <h2 class="titulo-nosotros">Las categorías de nuestros productos</h2>
            <div class="row">
                <div class="col-md-4">
                    <img src="img/fertilizantes.png" class="mb-4" alt="">
                    <h3 class="mb-4 subtitulo">Fertilizantes</h3>
                    <p>
                        Los fertilizantes son uno de los insumos agrícolas indispensables para que los cultivos tengan un mayor rendimiento.
                        Los fertilizantes son sustancias ricas en nutrientes que se utilizan para mejorar las características del suelo para un mayor desarrollo de los cultivos agrícolas.
                    </p>
                </div>
                <div class="col-md-4"> 
                    <img src="img/semillas2.png" class="mb-4" alt="">
                    <h3 class="mb-4 subtitulo">Semillas</h3>
                    <p>
                        La semilla, simiente, pepa, pipa o pepita es cada uno de los cuerpos que forman parte del fruto que da origen a una nueva planta.
                        Una semilla contiene un embrión del que puede desarrollarse una nueva planta bajo condiciones apropiadas (maíz, sorgo, frijol, garbanzo, entre muchas otras).
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="img/toxicos.png" class="mb-4" alt="">
                    <h3 class="mb-4 subtitulo">Tóxicos</h3>
                    <p>Tienen la finalidad de matar insectos o cualquier otro organismo que los afecte de manera negativa a su cosecha y también para eliminar de plano las malezas y los hongos (herbicidas, fungicidas, insecticidas, rodenticidas, entre muchos otros).</p>
                </div>
            </div>
        </div>
    </section>
    <section class="mapa mt-5">
        <iframe class="google-maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3747.1388063440713!2d-101.52015888560778!3d20.08648362465217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842c51d123e8247f%3A0x9975ca03b2723f3!2sCalle%20Corregidora%2054%2C%20Centro%2C%2058500%20Puru%C3%A1ndiro%2C%20Mich.!5e0!3m2!1ses!2smx!4v1608942728620!5m2!1ses!2smx" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </section>
</main>

<?php
    include_once 'includes/templates/footer-web.php';                    
?>