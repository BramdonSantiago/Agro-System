<?php
        $url = $_SERVER["REQUEST_URI"];
        if ($url == '/agrosystem/login?login=true'): ?>
            
        <script>

            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '¡BIENVENIDO!',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                allowOutsideClick: false,
                allowEscapeKey: false
            })

            <?php 
                header("refresh:5;url=administracion");
            ?>
                
        </script> <?php endif; ?> 
    
    
    <?php
        $url = $_SERVER["REQUEST_URI"];
        if ($url == '/agrosystem/login?login=false'): ?>
            
        <script>

            Swal.fire({
                icon: 'error',
                title: '¡Ups...!',
                text: 'Usuario y/o contraseña incorrecta',
                showConfirmButton: false,
                timer: 4000,
                allowOutsideClick: false,
                allowEscapeKey: false
            })

            <?php 
                header("refresh:5;url=login");
            ?>
                
        </script> <?php endif; ?> 