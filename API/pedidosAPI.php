<?php
include "config.php";
include "utils.php";

$dbConn = connect($db);

/*
  listar todos los pedidos o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        // Mostrar un pedido específico
        $sql = $dbConn->prepare("SELECT * FROM tb_pedidos WHERE id_pedido=:id");
        $sql->bindValue(':id', $_GET['id']);
        $sql->execute();
        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetch(PDO::FETCH_ASSOC));
        exit();
    } else {
        // Mostrar lista de pedidos
        $sql = $dbConn->prepare("SELECT * FROM tb_pedidos");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetchAll());
        exit();
    }
}

// Leer los datos enviados en formato JSON
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

// Crear un nuevo pedido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Generar código de seguimiento
    $codigoSeguimiento = generarCodigoSeguimiento(12);

    // Verificar el tipo de pedido
    $tipoPedido = $_GET['tipo_pedido']; // Obtener el valor del parámetro tipo_pedido de la URL

    $sql = "INSERT INTO tb_pedidos
          (codigo_seguimiento, nombre_cliente, rut_cliente, celular_cliente, celular_referencia_cliente, email_cliente, direccion_cliente, costo_pedido, costo_delivery, obs, tipo_pedido)
          VALUES
          (:codigo_seguimiento, :nombre_cliente, :rut_cliente, :celular_cliente, :celular_referencia_cliente, :email_cliente, :direccion_cliente, :costo_pedido, :costo_delivery, :obs, :tipo_pedido)";
    $statement = $dbConn->prepare($sql);
    $statement->bindValue(':codigo_seguimiento', $codigoSeguimiento);
    bindAllValues($statement, $input);
    $statement->bindValue(':tipo_pedido', $tipoPedido); // Asignar el tipo de pedido

    $statement->execute();
    $postId = $dbConn->lastInsertId();
    if ($postId) {
        $input['id'] = $postId;
        $input['codigo_seguimiento'] = $codigoSeguimiento;
        header("HTTP/1.1 200 OK");
        echo json_encode($input);
        exit();
    }
}

// Borrar
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $id = $_GET['id'];
    $statement = $dbConn->prepare("DELETE FROM tb_pedidos WHERE id_pedido=:id");
    $statement->bindValue(':id', $id);
    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}

// Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $input = $_GET;
    $postId = $input['id'];
    $fields = getParams($input);

    $sql = "
          UPDATE tb_pedidos
          SET $fields
          WHERE id_pedido='$postId'
           ";

    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);

    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}

// En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");

// Función para generar el código de seguimiento aleatorio
function generarCodigoSeguimiento($longitud = 12) {
    $caracteres = '0123456789';
    $codigo = '';
    $max = strlen($caracteres) - 1;
    for ($i = 0; $i < $longitud; $i++) {
        $codigo .= $caracteres[random_int(0, $max)];
    }
    return $codigo;
}
?>
