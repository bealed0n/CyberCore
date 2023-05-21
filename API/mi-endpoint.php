<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/api/v1/mi-endpoint') {
    // Generar la mensaje 
    $mensaje = "Hola bien y tu?";

    // Enviar el mensaje
    echo $mensake;
}
?>