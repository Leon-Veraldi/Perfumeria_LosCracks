<?php include("conexion.php"); include("menu.php"); ?>

<?php
$id = (int)$_GET['id'];
$p  = $conexion->query("SELECT * FROM perfumes WHERE id_perfume=$id")->fetch_assoc();

if (!$p) {
    echo "<p>Perfume no encontrado.</p></div></body></html>";
    exit;
}

if ($_POST) {
    $nombre  = $conexion->real_escape_string($_POST['nombre_perfume']);
    $precio  = $conexion->real_escape_string($_POST['precio']);
    $stock   = $conexion->real_escape_string($_POST['stock']);
    $id_prov = (int)$_POST['id_proveedor'];
    $conexion->query("UPDATE perfumes SET
        nombre_perfume='$nombre', precio='$precio', stock='$stock', id_proveedor='$id_prov'
        WHERE id_perfume=$id");
    header("Location: perfumes.php");
    exit;
}
?>

<a class="back-link" href="perfumes.php">← Volver a perfumes</a>

<div class="form-page">
    <h2>Editar Perfume</h2>

    <form method="POST">
        <div>
            <label>Nombre</label>
            <input type="text" name="nombre_perfume" value="<?= htmlspecialchars($p['nombre_perfume']) ?>" required>
        </div>
        <div>
            <label>Precio ($)</label>
            <input type="number" step="0.01" name="precio" value="<?= $p['precio'] ?>" required>
        </div>
        <div>
            <label>Stock</label>
            <input type="number" name="stock" value="<?= $p['stock'] ?>" required>
        </div>
        <div>
            <label>Proveedor</label>
            <select name="id_proveedor">
            <?php
            $res = $conexion->query("SELECT * FROM proveedores");
            while ($prov = $res->fetch_assoc()):
            ?>
                <option value="<?= $prov['id_proveedor'] ?>" <?= $prov['id_proveedor'] == $p['id_proveedor'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($prov['nombre_proveedor']) ?>
                </option>
            <?php endwhile; ?>
            </select>
        </div>
        <div>
            <button type="submit">Actualizar perfume</button>
        </div>
    </form>
</div>

</div></body></html>
