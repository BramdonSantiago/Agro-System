<?php
    $id = $_POST['id'];
    $tipo = $_POST['tipo'];

    $productos = unserialize($_COOKIE['productos']);

    foreach ($productos as $producto => $valor) {
        if ($valor['id'] == $id) {
            if ($tipo == 'incremento') {
                $productos[$producto]['cantidad']++;
                $productos[$producto]['subtotal'] = $productos[$producto]['cantidad']* $productos[$producto]['precio'];
            } elseif ($tipo == 'decremento') {
                if ($productos[$producto]['cantidad'] > 1) {
                    $productos[$producto]['cantidad']--;
                    $productos[$producto]['subtotal'] = $productos[$producto]['cantidad']* $productos[$producto]['precio'];
                }
            }   
        }
    }
    setcookie("productos", serialize($productos));
    echo json_encode($productos);
?>