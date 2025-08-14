<?php
    $id = $_POST['id'];
    $imagen = $_POST['imagen'];
    $marca = $_POST['marca'];
    $nombre = $_POST['nombre'];
    $precio = (int) $_POST['precio'];
    $cantidad = (int) $_POST['cantidad'];
    $productos = (unserialize($_COOKIE['productos']));
    
    if (is_array($productos) == false) 
        $productos = array();
        $agrego = false;
        foreach ($productos as $producto => $valor) {
            if ($valor['id'] == $id) {
                $agrego = true;
            }
        }
        if ($agrego == false) {
            // $cantidad++;
            $nuevo = array(
                "id"=>$id,
                "imagen"=>$imagen,
                "marca"=>$marca,
                "nombre"=>$nombre,
                "precio"=>$precio,
                "cantidad"=>$cantidad,
                "subtotal"=>$precio*$cantidad
            );
            if (sizeof($productos) < 10) {
                array_push($productos, $nuevo);
            } 
        }
    setcookie("productos", serialize($productos));
    echo json_encode($productos);     
?>