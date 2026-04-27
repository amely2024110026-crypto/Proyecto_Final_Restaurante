<?php
// 1. Iniciar sesión antes que cualquier otra cosa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Incluir conexión (asegúrate que el archivo esté en la misma carpeta)
include("conexion.php");

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'] ?? '';
    $pass = $_POST['password'] ?? '';

    if (!empty($correo) && !empty($pass)) {
        // Escapar datos para evitar errores básicos
        $correo_limpio = mysqli_real_escape_string($conn, $correo);
        
        $res = $conn->query("SELECT * FROM usuarios WHERE correo='$correo_limpio'");
        $u = $res->fetch_assoc();

        if ($u && password_verify($pass, $u['password'])) {
            $_SESSION['usuario'] = $u['nombre'];
            $_SESSION['rol'] = $u['rol'];
            
            // Redirigir al dashboard
            header("Location: dashboard.php");
            exit(); 
        } else {
            $error = "Datos incorrectos";
        }
    } else {
        $error = "Por favor, llena todos los campos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sakura Sushi - Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1e1e2f, #ff4d4d);
        }
        .box {
            background: white;
            padding: 40px;
            border-radius: 12px;
            width: 300px;
            text-align: center;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
        }
        h2 { color: #333; margin-top: 0; }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* IMPORTANTE: evita que el input se salga del cuadro */
        }
        .btn {
            background: #ff4d4d;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }
        .btn:hover {
            background: #e63939;
        }
        .error-msg {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
        a {
            display: block;
            margin-top: 15px;
            color: #666;
            font-size: 13px;
            text-decoration: none;
        }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="box">
    <h2>💮 Sakura Sushi 💮</h2>
    
    <?php if(!empty($error)): ?>
        <p class="error-msg"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <input type="email" name="correo" placeholder="Correo" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit" class="btn">Entrar</button>
    </form>

    <a href="recuperar.php">¿Olvidaste tu contraseña?</a>
</div>

</body>
</html>