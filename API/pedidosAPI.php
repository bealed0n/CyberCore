<?php
header('Access-Control-Allow-Origin: *');
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
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/json");
        echo json_encode($result);
        exit();
    } else {
        // Mostrar lista de pedidos
        $sql = $dbConn->prepare("SELECT * FROM tb_pedidos");
        $sql->execute();
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        header("Content-Type: application/json");
        echo json_encode($results);
        exit();
    }
}

// Crear un nuevo pedido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Generar código de seguimiento
    function generarCodigoSeguimiento($longitud = 12)
    {
        $caracteres = '0123456789';
        $codigo = '';
        $max = strlen($caracteres) - 1;
        for ($i = 0; $i < $longitud; $i++) {
            $codigo .= $caracteres[random_int(0, $max)];
        }
        return $codigo;
    }

    $codigoSeguimiento = generarCodigoSeguimiento(12);

    // Verificar si los datos del pedido se enviaron correctamente
    if (isset($_POST['nombre_cliente']) && isset($_POST['rut_cliente']) && isset($_POST['celular_cliente']) && isset($_POST['celular_referencia_cliente']) && isset($_POST['email_cliente']) && isset($_POST['direccion_cliente']) && isset($_POST['costo_pedido']) && isset($_POST['costo_delivery']) && isset($_POST['obs'])) {

        // Obtener los datos del pedido del cuerpo de la solicitud
        $nombreCliente = $_POST['nombre_cliente'];
        $rutCliente = $_POST['rut_cliente'];
        $celularCliente = $_POST['celular_cliente'];
        $celularReferenciaCliente = $_POST['celular_referencia_cliente'];
        $emailCliente = $_POST['email_cliente'];
        $direccionCliente = $_POST['direccion_cliente'];
        $costoPedido = $_POST['costo_pedido'];
        $costoDelivery = $_POST['costo_delivery'];
        $obs = $_POST['obs'];

        // Preparar la consulta SQL para insertar el pedido
        $sql = "INSERT INTO tb_pedidos
              (nombre_cliente, rut_cliente, celular_cliente, celular_referencia_cliente, email_cliente, direccion_cliente, costo_pedido, costo_delivery, obs, estado, tipo_pedido)
              VALUES
              (:nombre_cliente, :rut_cliente, :celular_cliente, :celular_referencia_cliente, :email_cliente, :direccion_cliente, :costo_pedido, :costo_delivery, :obs, 1, 'sucursal')";
        $statement = $dbConn->prepare($sql);

        // Vincular los valores a los parámetros de la consulta preparada
        $statement->bindParam(':nombre_cliente', $nombreCliente);
        $statement->bindParam(':rut_cliente', $rutCliente);
        $statement->bindParam(':celular_cliente', $celularCliente);
        $statement->bindParam(':celular_referencia_cliente', $celularReferenciaCliente);
        $statement->bindParam(':email_cliente', $emailCliente);
        $statement->bindParam(':direccion_cliente', $direccionCliente);
        $statement->bindParam(':costo_pedido', $costoPedido);
        $statement->bindParam(':costo_delivery', $costoDelivery);
        $statement->bindParam(':obs', $obs);

        // Ejecutar la consulta
        if ($statement->execute()) {
            $postId = $dbConn->lastInsertId();
            if ($postId) {
                // Insertar el código de seguimiento y el estado de delivery en la tabla correspondiente
                $estadoDelivery = 'En proceso de entrega'; // Estado descriptivo relacionado con el delivery
                $estadoPedidoSql = "INSERT INTO estado_pedidos (pedido_id, estado, codigo_seguimiento) VALUES (:pedido_id, :estado, :codigo_seguimiento)";
                $estadoPedidoStatement = $dbConn->prepare($estadoPedidoSql);
                $estadoPedidoStatement->bindValue(':pedido_id', $postId);
                $estadoPedidoStatement->bindValue(':estado', $estadoDelivery);
                $estadoPedidoStatement->bindValue(':codigo_seguimiento', $codigoSeguimiento);
                $estadoPedidoStatement->execute();

                $response = array(
                    'id_pedido' => $postId,
                    'nombre_cliente' => $nombreCliente,
                    'rut_cliente' => $rutCliente,
                    'celular_cliente' => $celularCliente,
                    'celular_referencia_cliente' => $celularReferenciaCliente,
                    'email_cliente' => $emailCliente,
                    'direccion_cliente' => $direccionCliente,
                    'costo_pedido' => $costoPedido,
                    'costo_delivery' => $costoDelivery,
                    'obs' => $obs,
                    'codigo_seguimiento' => $codigoSeguimiento
                );

                header("Content-Type: application/json");
                echo json_encode($response);
                exit();
            }
        }
    }

    // Si hay algún error en los datos del pedido o en la ejecución de la consulta
    header("HTTP/1.1 400 Bad Request");
}


// Borrar
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $statement = $dbConn->prepare("DELETE FROM tb_pedidos WHERE id_pedido=:id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        header("HTTP/1.1 200 OK");
        exit();
    }
}

// Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $input = $_GET;
    $postId = $input['id'];
    $fields = getParams($input);

    $sql = "UPDATE tb_pedidos SET $fields WHERE id_pedido=:id";
    $statement = $dbConn->prepare($sql);
    $statement->bindParam(':id', $postId);
    bindValues($statement, $input);

    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}

// En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
?>
