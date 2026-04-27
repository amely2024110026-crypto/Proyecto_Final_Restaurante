<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION)) session_start();
include(__DIR__ . "/config.php");
?>

<link rel="stylesheet" href="<?php echo $base; ?>assets/css/styles.css">

<div class="sidebar">

<h2 color: #f3258c00> 💮桜 Sakura_Sushi💮</h2>

<?php if($_SESSION['rol']=='gerente'){ ?>
<a href="<?php echo $base; ?>dashboard.php">🏠 Dashboard</a>
<a href="<?php echo $base; ?>usuarios/listar.php">👤 Usuarios</a>
<a href="<?php echo $base; ?>categorias/listar.php">📂 Categorías</a>
<a href="<?php echo $base; ?>platillos/listar.php">🍱 Platillos</a>
<a href="<?php echo $base; ?>pedidos/listar.php">📦 Pedidos</a>
<a href="<?php echo $base; ?>reportes.php">📊 Reportes</a>
<?php } ?>

<?php if($_SESSION['rol']=='mesero'){ ?>
<a href="<?php echo $base; ?>dashboard.php">🏠 Dashboard</a>
<a href="<?php echo $base; ?>pedidos/crear.php">➕ Nuevo Pedido</a>
<a href="<?php echo $base; ?>pedidos/listar.php">📦 Pedidos</a>
<?php } ?>

<?php if($_SESSION['rol']=='cocinero'){ ?>
<a href="<?php echo $base; ?>dashboard.php">🏠 Dashboard</a>
<a href="<?php echo $base; ?>pedidos/listar.php">🍳 Cocina</a>
<?php } ?>

<hr>
<a href="<?php echo $base; ?>logout.php">🚪 Salir</a>

</div>