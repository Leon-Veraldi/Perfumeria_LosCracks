<?php include("conexion.php");

$id = (int)$_GET['id'];
$conexion->query("DELETE FROM perfumes WHERE id_proveedor=$id");
$conexion->query("DELETE FROM proveedores WHERE id_proveedor=$id");

header("Location: proveedores.php");
exit;
