<?php
include("conexion.php");

$token = $_GET['token'];

$res = $conn->query("SELECT * FROM usuarios WHERE token='$token'");
$user = $res->fetch_assoc();

if(!$user){
    die("Token inválido");
}

// Validar expiración
if(strtotime($user['token_expira']) < time()){
    die("Token expirado");
}

if($_POST){
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn->query("UPDATE usuarios 
    SET password='$password', token=NULL, token_expira=NULL
    WHERE id=".$user['id']);

    echo "Contraseña actualizada <a href='login.php'>Login</a>";
}
?>

<form method="POST">
<input type="password" name="password" placeholder="Nueva contraseña" required>
<button>Cambiar</button>
</form>