<?php
include ('../app/config/config.php');

$email = $_POST['email'];
$password = $_POST['password'];

session_start();
$email_tabla = '';
$password_tabla = '';

$query = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = :email AND estado = '1' ");
$query->bindParam(':email', $email);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario) {
    $email_tabla = $usuario['email'];
    $password_tabla = $usuario['password'];
}

if (($email == $email_tabla) && password_verify($password, $password_tabla)) {
    echo "success";
    $_SESSION['u_usuario'] = $email;
    header("Location: " . $URL . "/web/");
} else {
    echo "error";
    header("Location: " . $URL . "/login/");
}
?>
