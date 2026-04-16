<?php include("conexion.php"); include("menu.php"); ?>

<h2>Clientes</h2>

<?php
if ($_POST) {
    $nombre   = $conexion->real_escape_string($_POST['nombre']);
    $apellido = $conexion->real_escape_string($_POST['apellido']);
    $email    = $conexion->real_escape_string($_POST['email']);
    $telefono = $conexion->real_escape_string($_POST['telefono']);
    $conexion->query("INSERT INTO clientes(nombre,apellido,email,telefono)
        VALUES('$nombre','$apellido','$email','$telefono')");
}
?>

<form method="POST">
    <div>
        <label>Nombre</label>
        <input type="text" name="nombre" placeholder="Ej: María" required>
    </div>
    <div>
        <label>Apellido</label>
        <input type="text" name="apellido" placeholder="Ej: González" required>
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" placeholder="correo@ejemplo.com" required>
    </div>
    <div>
        <label>Teléfono</label>
        <input type="text" name="telefono" placeholder="Ej: 011-4567-8900" required>
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
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $res = $conexion->query("SELECT * FROM clientes ORDER BY id_cliente DESC");
    while ($c = $res->fetch_assoc()):
    ?>
    <tr>
        <td><?= $c['id_cliente'] ?></td>
        <td><?= htmlspecialchars($c['nombre'] . ' ' . $c['apellido']) ?></td>
        <td><?= htmlspecialchars($c['email']) ?></td>
        <td><?= htmlspecialchars($c['telefono']) ?></td>
        <td style="display:flex;gap:6px;">
            <a class="btn btn-editar" href="editar_cliente.php?id=<?= $c['id_cliente'] ?>">Editar</a>
            <a class="btn btn-eliminar" href="eliminar_cliente.php?id=<?= $c['id_cliente'] ?>"
               onclick="return confirm('¿Eliminar este cliente?')">Eliminar</a>
        </td>
    </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</div></body></html>
