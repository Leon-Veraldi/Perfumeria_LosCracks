<?php include("conexion.php");

$id = (int)$_GET['id'];
$conexion->query("DELETE FROM ventas WHERE id_venta=$id");

header("Location: ventas.php");
exit;
