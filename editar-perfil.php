<?php 
    session_start();
    if (isset($_SESSION['id_cliente']) && isset($_SESSION['usuario_cliente'])) {
        $id = $_SESSION['id_cliente'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar perfil | Agro-System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-wordpress-admin/wordpress-admin.css">
</head>
<body>
<?php 
    if (isset($_SESSION['usuario_cliente'])) : ?>
        <?php 
            try {
                require_once('includes/functions/bd_conexion.php');
                $sql = "SELECT nombre, apellido, direccion, estado, codigo_postal, ciudad, telefono FROM registro_cliente WHERE id = $id";
                $resultado = $conn->query($sql);
                $cliente = $resultado->fetch_assoc();
                $conn->close();
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        ?>
        <div class="container formulario-registro-usuario">
            <div class="row justify-content-center">
                <div class="col col-md-6">
                    <h1 class="mb-4">Tus datos</h1>
                    <form id="formulario">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="nombre" placeholder="Nombre(s)" value="<?php echo ($cliente['nombre']); ?>" required>
                            </div>
                            <div class="col">
                                <input type="text" name="apellido" placeholder="Apellido(s)" value="<?php echo ($cliente['apellido']); ?>" required>
                            </div>
                        </div>
                        <input type="text" name="direccion" placeholder="Dirección" value="<?php echo ($cliente['direccion']); ?>" required> 
                        <select name="estado" required>
                            <?php 
                                if ($cliente['estado'] == '') : ?>
                                    <option selected disabled>Estado</option>
                                    <?php else : ?>
                                        <option value="<?php echo ($cliente['estado']); ?>"><?php echo ($cliente['estado']); ?></option>
                            <?php endif; ?>
                            <option value="Aguascalientes">Aguascalientes</option>
                            <option value="Baja California">Baja California</option>
                            <option value="Baja California Sur">Baja California Sur</option>
                            <option value="Campeche">Campeche</option>
                            <option value="Chiapas">Chiapas</option>
                            <option value="Chihuahua">Chihuahua</option>
                            <option value="CDMX">Ciudad de México</option>
                            <option value="Coahuila">Coahuila</option>
                            <option value="Colima">Colima</option>
                            <option value="Durango">Durango</option>
                            <option value="Estado de México">Estado de México</option>
                            <option value="Guanajuato">Guanajuato</option>
                            <option value="Guerrero">Guerrero</option>
                            <option value="Hidalgo">Hidalgo</option>
                            <option value="Jalisco">Jalisco</option>
                            <option value="Michoacán">Michoacán</option>
                            <option value="Morelos">Morelos</option>
                            <option value="Nayarit">Nayarit</option>
                            <option value="Nuevo León">Nuevo León</option>
                            <option value="Oaxaca">Oaxaca</option>
                            <option value="Puebla">Puebla</option>
                            <option value="Querétaro">Querétaro</option>
                            <option value="Quintana Roo">Quintana Roo</option>
                            <option value="San Luis Potosí">San Luis Potosí</option>
                            <option value="Sinaloa">Sinaloa</option>
                            <option value="Sonora">Sonora</option>
                            <option value="Tabasco">Tabasco</option>
                            <option value="Tamaulipas">Tamaulipas</option>
                            <option value="Tlaxcala">Tlaxcala</option>
                            <option value="Veracruz">Veracruz</option>
                            <option value="Yucatán">Yucatán</option>
                            <option value="Zacatecas">Zacatecas</option>
                        </select>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="codigo_postal" placeholder="Código postal" value="<?php echo ($cliente['codigo_postal']); ?>" required>
                            </div>
                            <div class="col">
                                <input type="text" name="ciudad" placeholder="Ciudad" value="<?php echo ($cliente['ciudad']); ?>" required>
                            </div>
                        </div>
                        <input type="text" name="telefono" placeholder="Teléfono" value="<?php echo ($cliente['telefono']); ?>" required>
                        <input type="submit" class="btn btn-primary btn-block" name="btn-editar-perfil-cliente" value="GUARDAR INFORMACIÓN">
                    </form>
                    <p class="text-center">¿Guardaste tu información? <a href="/agrosystem">Regresar a la tienda</a></p>
                </div>
            </div>
        </div>

        <?php
            else : ?>
                <div class="container mt-5 text-center no-login">
                    <p><a href="/agrosystem">Inicia sesión</a> o <a href="registro-usuario">registrate</a></p>
                </div>
    <?php endif; ?>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
        <script src="js/editar-perfil-cliente.js"></script>
        

</body>
</html>