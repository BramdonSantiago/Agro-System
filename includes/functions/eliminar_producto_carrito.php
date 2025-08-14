<?php
    // ELIMINAR PRODUCTO DEL CARRITO
    $id = $_POST['id'];

    $productos = unserialize($_COOKIE['productos']);

    foreach ($productos as $producto => $valor) {
        if ($valor['id'] == $id) {
            unset($productos[$producto]);
        }
    }
    $productos = array_values($productos);
    setcookie("productos", serialize($productos));
    echo json_encode($productos);
?>