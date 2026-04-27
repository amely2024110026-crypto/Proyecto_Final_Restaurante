<?php include("auth.php"); ?>
<?php include("menu.php"); ?>
<?php include("conexion.php"); ?>

$linkCSS = "assets/css/styles.css";
echo "<link rel='stylesheet' href='$linkCSS'>";

$res=$conn->query("SELECT SUM(cantidad*precio) total FROM pedido_detalle");
$d=$res->fetch_assoc();
?>

<div class="main">
<div class="card">
<h2>Total vendido</h2>
<h1>$<?php echo $d['total']??0; ?></h1>
</div>
</div>