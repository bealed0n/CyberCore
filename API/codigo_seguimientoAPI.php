<?php
header('Access-Control-Allow-Origin: *');
include "config.php";
include "utils.php";

$dbConn = connect($db);

/*
  Obtener estado y número de seguimiento de un pedido específico
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['codigo_seguimiento'])) {
        $codigoSeguimiento = $_GET['codigo_seguimiento'];

        $sql = $dbConn->prepare("SELECT estado FROM tb_pedidos WHERE codigo_seguimiento = :codigo_seguimiento");
        $sql->bindParam(':codigo_seguimiento', $codigoSeguimiento);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            header("Content-Type: application/json");
            echo json_encode($result);
            exit();
        } else {
            // Si no se encuentra un estado con el código de seguimiento proporcionado
            header("HTTP/1.1 404 Not Found");
            echo json_encode(array('error' => 'Estado no encontrado'));
            exit();
        }
    } elseif (isset($_GET['pedido_id'])) {
        $pedidoId = $_GET['pedido_id'];

        $sql = $dbConn->prepare("SELECT codigo_seguimiento, estado FROM tb_pedidos WHERE id_pedido = :pedido_id");
        $sql->bindParam(':pedido_id', $pedidoId);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            header("Content-Type: application/json");
            echo json_encode($result);
            exit();
        } else {
            // Si no se encuentra un registro con el pedido_id proporcionado
            header("HTTP/1.1 404 Not Found");
            echo json_encode(array('error' => 'Pedido no encontrado'));
            exit();
        }
    }
}

// En caso de que ninguna opción válida se haya ejecutado
header("HTTP/1.1 400 Bad Request");
?>
