<?php
/**
 */
define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWOD','');
define('BD','cybercore');

$URL = 'http://localhost/cybercore';


$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try{
    $pdo = new PDO($servidor,USUARIO,PASSWOD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    // echo "<script>alert('La conexión a la base de datos fue exitosa.')</script>";
}catch (PDOException $e){
    echo "<script>alert('Error a la conexión con la base de datos')</script>";
}

$requestUrl = $_SERVER['REQUEST_URI'];

switch ($requestUrl) {
    case '/api/v1/mi-endpoint':
        // Lógica para manejar la solicitud del endpoint '/api/v1/mi-endpoint'
        echo 'Hola bien y tú';
        break;
    // Agrega más casos para manejar otras rutas aquí
    default:
        // Ruta no encontrada
        http_response_code(404);
        echo '404 - Ruta no encontrada';
        break;
}