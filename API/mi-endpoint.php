<?php
// Definir el mensaje a devolver en el endpoint
$mensaje = "Hola, bien y tu?";

// Establecer las cabeceras para permitir el acceso desde otros dominios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Crear el array de respuesta
$respuesta = array("mensaje" => $mensaje);

// Devolver la respuesta en formato JSON
echo json_encode($respuesta);
