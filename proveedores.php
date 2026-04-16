<?php include("conexion.php"); include("menu.php"); ?>

<h2>Proveedores</h2>

<?php
if ($_POST) {
    $nombre    = $conexion->real_escape_string($_POST['nombre_proveedor']);
    $email     = $conexion->real_escape_string($_POST['email']);
    $direccion = $conexion->real_escape_string($_POST['direccion']);
    $conexion->query("INSERT INTO proveedores(nombre_proveedor,email,direccion)
        VALUES('$nombre','$email','$direccion')");
}
?>

<form method="POST">
    <div>
        <label>Nombre</label>
        <input type="text" name="nombre_proveedor" placeholder="Nombre del proveedor" required>
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" placeholder="correo@proveedor.com" required>
    </div>
    <div>
        <label>Dirección</label>
        <input type="text" name="direccion" placeholder="Dirección completa" required>
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
            <th>Nombre</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $res = $conexion->query("SELECT * FROM proveedores ORDER BY id_proveedor DESC");
    while ($p = $res->fetch_assoc()):
    ?>
    <tr>
        <td><?= $p['id_proveedor'] ?></td>
        <td><?= htmlspecialchars($p['nombre_proveedor']) ?></td>
        <td><?= htmlspecialchars($p['email']) ?></td>
        <td><?= htmlspecialchars($p['direccion']) ?></td>
        <td style="display:flex;gap:6px;">
            <a class="btn btn-editar" href="editar_proveedor.php?id=<?= $p['id_proveedor'] ?>">Editar</a>
            <a class="btn btn-eliminar" href="eliminar_proveedor.php?id=<?= $p['id_proveedor'] ?>"
               onclick="return confirm('¿Eliminar este proveedor?')">Eliminar</a>
        </td>
    </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</div></body></html>
