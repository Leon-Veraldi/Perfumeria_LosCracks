<?php include("conexion.php"); include("menu.php"); ?>

<h2>Perfumes</h2>

<?php
if ($_POST) {
    $nombre      = $conexion->real_escape_string($_POST['nombre_perfume']);
    $precio      = $conexion->real_escape_string($_POST['precio']);
    $stock       = $conexion->real_escape_string($_POST['stock']);
    $id_prov     = (int)$_POST['id_proveedor'];
    $conexion->query("INSERT INTO perfumes(nombre_perfume,precio,stock,id_proveedor)
        VALUES('$nombre','$precio','$stock','$id_prov')");
}
?>

<form method="POST">
    <div>
        <label>Nombre</label>
        <input type="text" name="nombre_perfume" placeholder="Ej: Eau de Jasmin" required>
    </div>
    <div>
        <label>Precio ($)</label>
        <input type="number" step="0.01" name="precio" placeholder="0.00" required>
    </div>
    <div>
        <label>Stock</label>
        <input type="number" name="stock" placeholder="Cantidad" required>
    </div>
    <div>
        <label>Proveedor</label>
        <select name="id_proveedor">
        <?php
        $res = $conexion->query("SELECT * FROM proveedores");
        while ($p = $res->fetch_assoc()):
        ?>
            <option value="<?= $p['id_proveedor'] ?>"><?= htmlspecialchars($p['nombre_proveedor']) ?></option>
        <?php endwhile; ?>
        </select>
    </div>
    <div>
        <label>&nbsp;</label>
        <button type="submit">Guardar</button>
    </div>
</form>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Perfume</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Proveedor</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $res = $conexion->query("SELECT p.*, pr.nombre_proveedor FROM perfumes p
        LEFT JOIN proveedores pr ON p.id_proveedor = pr.id_proveedor
        ORDER BY p.id_perfume DESC");
    while ($p = $res->fetch_assoc()):
    ?>
    <tr>
        <td><?= $p['id_perfume'] ?></td>
        <td><?= htmlspecialchars($p['nombre_perfume']) ?></td>
        <td>$<?= number_format($p['precio'], 2) ?></td>
        <td><?= $p['stock'] ?></td>
        <td><?= htmlspecialchars($p['nombre_proveedor'] ?? '—') ?></td>
        <td style="display:flex;gap:6px;">
            <a class="btn btn-editar" href="editar_perfume.php?id=<?= $p['id_perfume'] ?>">Editar</a>
            <a class="btn btn-eliminar" href="eliminar_perfume.php?id=<?= $p['id_perfume'] ?>"
               onclick="return confirm('¿Eliminar este perfume?')">Eliminar</a>
        </td>
    </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</div></body></html>
