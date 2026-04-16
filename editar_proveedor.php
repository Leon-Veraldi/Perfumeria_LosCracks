<?php include("conexion.php"); include("menu.php"); ?>

<?php
$id = (int)$_GET['id'];
$p  = $conexion->query("SELECT * FROM proveedores WHERE id_proveedor=$id")->fetch_assoc();

if (!$p) {
    echo "<p>Proveedor no encontrado.</p></div></body></html>";
    exit;
}

if ($_POST) {
    $nombre    = $conexion->real_escape_string($_POST['nombre_proveedor']);
    $email     = $conexion->real_escape_string($_POST['email']);
    $direccion = $conexion->real_escape_string($_POST['direccion']);
    $conexion->query("UPDATE proveedores SET
        nombre_proveedor='$nombre', email='$email', direccion='$direccion'
        WHERE id_proveedor=$id");
    header("Location: proveedores.php");
    exit;
}
?>

<a class="back-link" href="proveedores.php">← Volver a proveedores</a>

<div class="form-page">
    <h2>Editar Proveedor</h2>

    <form method="POST">
        <div>
            <label>Nombre</label>
            <input type="text" name="nombre_proveedor" value="<?= htmlspecialchars($p['nombre_proveedor']) ?>" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($p['email']) ?>" required>
        </div>
        <div>
            <label>Dirección</label>
            <input type="text" name="direccion" value="<?= htmlspecialchars($p['direccion']) ?>" required>
        </div>
        <div>
            <button type="submit">Actualizar proveedor</button>
        </div>
    </form>
</div>

</div></body></html>
