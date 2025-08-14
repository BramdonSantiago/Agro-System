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
                        include_once 'includes/templates/contenido-admin-pedidos.php';
                    ?>
                </div>
                <?php
                    include_once 'includes/templates/footer-admin.php';
                ?>
            </main>
        </div>
    </div>
    <script src="js/mayores-pedidos.js"></script>
    <script src="js/detalle-pedido.js"></script>
    <script src="js/eliminar-pedido.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script src="js/data-tables.js"></script>
    <?php
        if (isset($_GET['estado_entrega'])) : ?>
        <?php 
            $estado_entrega = $_GET['estado_entrega'];
        ?>
        <?php
        if ($estado_entrega == 'true') : ?>
            <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
            <script> 
                Swal.fire({
                    toast: true,
                    position: 'bottom-start',
                    icon: 'success',
                    title: 'Los estados de entrega se han actualizado correctamente',
                    showConfirmButton: false,
                    timer: 6000,
                    // timerProgressBar: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                })
            </script>      
        <?php endif; ?>
        <?php
        if ($estado_entrega == 'false') : ?>
            <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
            <script> 
                Swal.fire({
                    toast: true,
                    position: 'bottom-start',
                    icon: 'error',
                    title: 'Los estados de entrega no se pudieron actualizar',
                    showConfirmButton: false,
                    timer: 6000,
                    // timerProgressBar: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                })
            </script>      
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>