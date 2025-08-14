<?php if (isset($_POST['boton_login_administrador'])): ?>
    <?php   
        $usuario = $_POST['nombre_usuario'];
        $password = $_POST['password'];
        
        try {
            require_once('bd_conexion.php');
            $stmt = $conn -> prepare("SELECT * FROM usuario_admin WHERE usuario = ?");
            $stmt -> bind_param("s", $usuario);
            $stmt -> execute();
            $stmt -> bind_result($usuario_admin, $password_admin);
            
            if ($stmt -> affected_rows) {
                $existe = $stmt -> fetch();
                
                if ($existe) {
                    if ($password == $password_admin) {
                        session_start();
                        $_SESSION['usuario'] = $usuario;
                        header("Location: login?login=true");
                        header("Location: /agrosystem/login?login=true");
                    } else {
                        header("Location: login?login=false");
                        header("Location: /agrosystem/login?login=false");
                    }  
                } else {
                    header("Location: /agrosystem/login?login=false");
                }
            }
            $stmt -> close();
            $conn -> close();
            
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    ?>   
<?php endif ?>
