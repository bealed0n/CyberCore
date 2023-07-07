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
              (nombre_origen, direccion_origen, celular_origen, nombre_destino, direccion_destino, celular_destino, obs, estado_pedido, estado, tipo_pedido, codigo_seguimiento)
              VALUES
              (:nombre_origen, :direccion_origen, :celular_origen, :nombre_destino, :direccion_destino, :celular_destino, :obs, 'PREPARANDO', 1, 'BODEGA', :codigo_seguimiento)";
        $statement = $dbConn->prepare($sql);

        // Vincular los valores a los parámetros de la consulta preparada
        $statement->bindParam(':nombre_origen', $nombreOrigen);
        $statement->bindParam(':direccion_origen', $direccionOrigen);
        $statement->bindParam(':celular_origen', $celularOrigen);
        $statement->bindParam(':nombre_destino', $nombreDestino);
        $statement->bindParam(':direccion_destino', $direccionDestino);
        $statement->bindParam(':celular_destino', $celularDestino);
        $statement->bindParam(':obs', $obs);
        $statement->bindParam(':codigo_seguimiento', $codigoSeguimiento);

        // Ejecutar la consulta
        if ($statement->execute()) {
            $postId = $dbConn->lastInsertId();
            if ($postId) {
                $response = array(
                    'status' => 201,
                    'message' => 'correcto',
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

// En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
?>

