<h3 class="mb-4">Inicio</h3>
    <div class="row align-items-center">
        <div class="col col-xl-6 d-flex flex-wrap">
            <div class="dashboard cuadrado">
            <?php  
            // OBTENER EL NÚMERO DE CLIENTES EN EL PANEL DE ADMINISTRACIÓN
                try {
                    require_once('includes/functions/bd_conexion.php');
                    $sql_clientes = "SELECT COUNT(id) FROM registro_cliente";
                    $resultado_clientes = $conn->query($sql_clientes);
                    $clientes = $resultado_clientes->fetch_assoc();
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            ?>
                <p class="numero"><?php echo ($clientes['COUNT(id)']); ?></p>
                <div>
                    <span>Clientes</span>
                    <div class="bg-arbol">
                        <!-- CSS -->
                    </div>
                </div>
            </div>
            <div class="dashboard cuadrado">
            <?php  
            // OBTENER EL INGRESO EN EL PANEL DE ADMINISTRACIÓN
                try {
                    require_once('includes/functions/bd_conexion.php');
                    $sql_visitas = "SELECT COUNT(id) FROM visitas";
                    $resultado_visitas = $conn->query($sql_visitas);
                    $visitas = $resultado_visitas->fetch_assoc();
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            ?>
                <p class="numero"><?php echo ($visitas['COUNT(id)']); ?></p>
                <div>
                    <span>Visitas</span>
                    <div class="bg-arbol">
                        <!-- CSS -->
                    </div>
                </div>
            </div>
            <div class="dashboard rectangulo mb-5">
            <?php  
            // OBTENER EL INGRESO EN EL PANEL DE ADMINISTRACIÓN
                try {
                    require_once('includes/functions/bd_conexion.php');
                    $sql_ingresos = "SELECT SUM(total) FROM pedidos";
                    $resultado_ingresos = $conn->query($sql_ingresos);
                    $ingresos = $resultado_ingresos->fetch_assoc();
                    $conn->close();
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            ?>
                <p class="numero">$<?php echo ($ingresos['SUM(total)']); ?>.00</p>
                <div>
                    <span>Ingresos</span>
                    <div class="bg-arbol">
                        <!-- CSS -->
                    </div>
                </div>
            </div>
        </div>
    </div>