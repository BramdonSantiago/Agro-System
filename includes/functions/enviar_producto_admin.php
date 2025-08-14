<?php
    if (isset($_POST['agregar-producto'])) {
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $categoria = $_POST['categoria'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];
        $estado = $_POST['estado'];
        $descripcion = $_POST['descripcion'];
        //AGREGAR PRODUCTO NUEVO ADMINISTRADOR 
        try {
            require_once ('bd_conexion.php');
            $stmt = $conn->prepare("INSERT INTO productos (nombre, marca, id_categoria, precio, imagen, descripcion, id_estado_inventario) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $nombre, $marca, $categoria, $precio, $imagen, $descripcion, $estado);
            $stmt->execute();
            if ($stmt->affected_rows > -1) {
                header("Location: /agrosystem/agregar-producto?agrego=true");
            } else {
                header("Location: /agrosystem/agregar-producto?agrego=false");
            }
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            $error = $e -> getMessage();  
        }

    } elseif (isset($_POST['editar-producto'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $categoria = $_POST['categoria'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];
        $estado = $_POST['estado'];
        $descripcion = $_POST['descripcion'];
        // EDITAR PRODUCTO ADMINISTRADOR
        try {
            require_once('bd_conexion.php');
            $stmt = $conn->prepare("UPDATE productos SET nombre = ?, marca = ?, id_categoria = ?, precio = ?, imagen = ?, id_estado_inventario = ?, descripcion = ? WHERE id = $id");
            $stmt->bind_param("sssssss", $nombre, $marca, $categoria, $precio, $imagen, $estado, $descripcion);
            $stmt->execute();
            if ($stmt->affected_rows > -1) {
                header("Location: /agrosystem/editar-producto?id=$id&edito=true");
            } else {
                header("Location: /agrosystem/editar-producto?id=$id&edito=false");
            }
            $stmt->close();
            $conn->close();
        } catch(Exception $e) {
            echo $e -> getMessage();
        }
    }
?>

