<?php
    include_once 'includes/templates/header-admin.php';
?>
    <div class="container-fluid admin">
        <div class="row contenido">
            <?php
                include_once 'includes/templates/sidebar-admin.php';
            ?>
            <main class="col py-4 main">
                <div class="container">
                    <?php
                        include_once 'includes/templates/contenido-admin-clientes.php';
                    ?>
                </div>
                <?php
                    include_once 'includes/templates/footer-admin.php';
                ?>
            </main>
        </div>
    </div>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script src="js/data-tables.js"></script>
    <script src="js/detalle-cliente.js"></script>
    <script src="js/eliminar-cliente.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
</body>
</html>