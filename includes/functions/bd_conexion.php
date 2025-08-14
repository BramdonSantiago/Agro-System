<?php  
    //CONEXIÓN CON LA BASE DE DATOS
    $conn = new mysqli('localhost', 'root', '', 'agrosystem');
    $conn->set_charset("utf8");
    if ($conn -> connect_error) {
        echo $error -> $conn -> connect_error;
    }
?>
