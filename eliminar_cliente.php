<?php include("conexion.php");

$id = (int)$_GET['id'];
$conexion->query("DELETE FROM ventas WHERE id_cliente=$id");
$conexion->query("DELETE FROM clientes WHERE id_cliente=$id");

header("Location: clientes.php");
exit;
