<?php

// Abrir conexión a la base de datos
function connect($db)
{
    try {
        $conn = new PDO("mysql:host={$db['host']};dbname={$db['db']}", $db['username'], $db['password']);

        // Establecer el modo de errores de PDO a excepción
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    } catch (PDOException $exception) {
        exit($exception->getMessage());
    }
}

// Obtener parámetros para updates
function getParams($input)
{
    $filterParams = [];
    foreach ($input as $param => $value) {
        $filterParams[] = "$param=:$param";
    }
    return implode(", ", $filterParams);
}

// Asociar todos los parámetros a un SQL
function bindAllValues($statement, $params)
{
    if ($params) {
        foreach ($params as $param => $value) {
            $statement->bindValue(':' . $param, $value);
        }
    }
    return $statement;
}
?>
