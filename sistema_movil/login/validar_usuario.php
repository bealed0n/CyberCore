<?php
include ('../../app/config/config.php');

$email = $_POST['email'];
$password = $_POST['password'];

$email_tabla = "";
$password_tabla = "";

$query = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = :email AND estado = '1'");
$query->bindParam(':email', $email);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario) {
    $email_tabla = $usuario['email'];
    $password_tabla = $usuario['password'];
}

if (password_verify($password, $password_tabla) && $email == $email_tabla) {
    session_start();
    $_SESSION['u_usuario'] = $email;
    header("Location: " . $URL . "/sistema_movil/app/pedidos.php");
} else {
    echo "error";
}
?>
