<?php
include("conexion.php");

if($_POST){
    $correo = $_POST['correo'];

    $res = $conn->query("SELECT * FROM usuarios WHERE correo='$correo'");
    $user = $res->fetch_assoc();

    if($user){
        $token = bin2hex(random_bytes(16));
        $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

        $conn->query("UPDATE usuarios 
        SET token='$token', token_expira='$expira'
        WHERE correo='$correo'");

        echo "<p>Link de recuperación:</p>";
        echo "<a href='reset.php?token=$token'>Recuperar contraseña</a>";
    } else {
        echo "Correo no encontrado";
    }
}
?>

<form method="POST">
<input type="email" name="correo" placeholder="Correo" required>
<button>Enviar</button>
</form>