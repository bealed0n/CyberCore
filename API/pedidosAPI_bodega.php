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
        $sql = $dbConn->prepare("SELECT * FROM tb_pedidos WHERE id_pedido=:id and tipo_pedido='bodega'");
        $sql->bindValue(':id', $_GET['id']);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/json");
        echo json_encode($result);
        exit();
    } else {
        // Mostrar lista de pedidos
        $sql = $dbConn->prepare("SELECT * FROM tb_pedidos where tipo_pedido='bodega'");
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
    if (isset($_POST['nombre_origen']) && isset($_POST['direccion_origen']) && isset($_POST['celular_origen']) && isset($_POST['nombre_destino']) && isset($_POST['direccion_destino']) && isset($_POST['celular_destino']) && isset($_POST['obs'])) {

        // Obtener los datos del pedido del cuerpo de la solicitud
        $nombreOrigen = $_POST['nombre_origen'];
        $direccionOrigen = $_POST['direccion_origen'];
        $celularOrigen = $_POST['celular_origen'];
        $nombreDestino = $_POST['nombre_destino'];
        $direccionDestino = $_POST['direccion_destino'];
        $celularDestino = $_POST['celular_destino'];
        $obs = $_POST['obs'];

        // Preparar la consulta SQL para insertar el pedido
        $sql = "INSERT INTO tb_pedidos
              (nombre_origen, direccion_origen, celular_origen, nombre_destino, direccion_destino, celular_destino, obs, estado_pedido, estado, tipo_pedido)
              VALUES
              (:nombre_origen, :direccion_origen, :celular_origen, :nombre_destino, :direccion_destino, :celular_destino, :obs, 'PREPARANDO' , 1, 'BODEGA')";
        $statement = $dbConn->prepare($sql);

        // Vincular los valores a los parámetros de la consulta preparada
        $statement->bindParam(':nombre_origen', $nombreOrigen);
        $statement->bindParam(':direccion_origen', $direccionOrigen);
        $statement->bindParam(':celular_origen', $celularOrigen);
        $statement->bindParam(':nombre_destino', $nombreDestino);
        $statement->bindParam(':direccion_destino', $direccionDestino);
        $statement->bindParam(':celular_destino', $celularDestino);
        $statement->bindParam(':obs', $obs);

        // Ejecutar la consulta
        if ($statement->execute()) {
            $postId = $dbConn->lastInsertId();
            if ($postId) {
                // Insertar el código de seguimiento y el estado de delivery en la tabla correspondiente
                $estadoPedidoSql = "INSERT INTO estado_pedidos (pedido_id, estado, codigo_seguimiento) VALUES (:pedido_id, 'Preparando pedido', :codigo_seguimiento)";
                $estadoPedidoStatement = $dbConn->prepare($estadoPedidoSql);
                $estadoPedidoStatement->bindValue(':pedido_id', $postId);
                $estadoPedidoStatement->bindValue(':codigo_seguimiento', $codigoSeguimiento);
                $estadoPedidoStatement->execute();

                $response = array(
                    'id_pedido' => $postId,
                    'nombre_origen' => $nombreOrigen,
                    'direccion_origen' => $direccionOrigen,
                    'celular_origen' => $celularOrigen,
                    'nombre_destino' => $nombreDestino,
                    'direccion_destino' => $direccionDestino,
                    'celular_destino' => $celularDestino,
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
    parse_str(file_get_contents("php://input"), $putData);
    $input = $putData;
    $postId = $input['id'];
    $fields = getParams($input);

    $sql = "UPDATE tb_pedidos SET $fields WHERE id_pedido=:id";
    $statement = $dbConn->prepare($sql);
    $statement->bindParam(':id', $postId);
    bindAllValues($statement, $input);

    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}

// En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
?>