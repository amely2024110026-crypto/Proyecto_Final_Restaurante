<?php include("auth.php"); ?>
<?php include("menu.php"); ?>
<?php include("config.php"); ?>

<link rel="stylesheet" href="<?php echo $base; ?>assets/css/styles.css">

<div class="main">

<div class="nav">
<span>👋 <?php echo $_SESSION['usuario']; ?></span>
<span><?php echo $_SESSION['rol']; ?></span>
</div>

<div class="card">
<h2>Panel Principal</h2>
<p>Sistema funcionando correctamente</p>
</div>

</div>