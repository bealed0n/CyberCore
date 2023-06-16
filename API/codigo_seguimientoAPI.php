<?php
header('Access-Control-Allow-Origin: *');
include "config.php";
include "utils.php";

$dbConn = connect($db);

/*
  Obtener estado de un pedido específico
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['codigo_seguimiento'])) {
    $codigoSeguimiento = $_GET['codigo_seguimiento'];

    $sql = $dbConn->prepare("SELECT estado FROM estado_pedidos WHERE codigo_seguimiento = :codigo_seguimiento");
    $sql->bindParam(':codigo_seguimiento', $codigoSeguimiento);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_ASSOC);

    header("Content-Type: application/json");
    echo json_encode($result);
    exit();
}

// En caso de que ninguna opción válida se haya ejecutado
header("HTTP/1.1 400 Bad Request");
?>
