<?php
    include_once 'includes/templates/header-web.php';                    
?>

    <div class="hero-general" id="hero-general">
        <!-- CSS -->
        <div class="container h-100">
            <div class="row h-100">
                <div class="col d-flex justify-content-center align-items-center text-center">
                    <h1>Carrito</h1>
                </div>
            </div>
        </div>
    </div>
    
</header>

<main class="mt-5 container pagina-ver-carrito">
    <div class="table-responsive">
        <table class="table ver-carrito text-center">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th></th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="tabla-lista-carrito">
                <!-- JavaScript -->
            </tbody>
        </table>
    </div>
    <div class="text-right" id="total-enlace-pagar">
    <!-- JavaScript -->
    </div>
</main>

<?php
    include_once 'includes/templates/footer-web.php';                    
?>