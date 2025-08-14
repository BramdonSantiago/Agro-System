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
                        include_once 'includes/templates/contenido-admin-inicio.php';
                    ?>
                </div>
                <?php
                    include_once 'includes/templates/footer-admin.php';
                ?>
            </main>
        </div>
    </div>
</body>
</html>