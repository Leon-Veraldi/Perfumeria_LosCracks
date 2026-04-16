<?php include("conexion.php");

$id = (int)$_GET['id'];
$conexion->query("DELETE FROM ventas WHERE id_perfume=$id");
$conexion->query("DELETE FROM perfumes WHERE id_perfume=$id");

header("Location: perfumes.php");
exit;
