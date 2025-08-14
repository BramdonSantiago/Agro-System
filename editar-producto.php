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
                        include_once 'includes/templates/contenido-admin-editar-producto.php';
                    ?>
                </div>
                <?php
                    include_once 'includes/templates/footer-admin.php';
                ?>
            </main>
        </div>
    </div>
    
    <?php
        if (isset($_GET['id']) && isset($_GET['edito'])) : ?>
        <?php 
            $edito = $_GET['edito'];
        ?>
        <?php
        if ($edito == 'true') : ?>
            <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
            <script> 
                Swal.fire({
                    toast: true,
                    position: 'bottom-start',
                    icon: 'success',
                    title: 'Producto actualizado correctamente',
                    showConfirmButton: false,
                    timer: 6000,
                    // timerProgressBar: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                })
            </script>      
        <?php endif; ?>
        <?php
        if ($edito == 'false') : ?>
            <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
            <script> 
                Swal.fire({
                    toast: true,
                    position: 'bottom-start',
                    icon: 'error',
                    title: 'El producto no ha podido ser actualizado',
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