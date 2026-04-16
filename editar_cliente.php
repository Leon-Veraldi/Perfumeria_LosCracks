<?php include("conexion.php"); include("menu.php"); ?>

<?php
$id = (int)$_GET['id'];
$c  = $conexion->query("SELECT * FROM clientes WHERE id_cliente=$id")->fetch_assoc();

if (!$c) {
    echo "<p>Cliente no encontrado.</p>";
    echo "</div></body></html>";
    exit;
}

if ($_POST) {
    $nombre   = $conexion->real_escape_string($_POST['nombre']);
    $apellido = $conexion->real_escape_string($_POST['apellido']);
    $email    = $conexion->real_escape_string($_POST['email']);
    $telefono = $conexion->real_escape_string($_POST['telefono']);
    $conexion->query("UPDATE clientes SET
        nombre='$nombre', apellido='$apellido',
        email='$email', telefono='$telefono'
        WHERE id_cliente=$id");
    header("Location: clientes.php");
    exit;
}
?>

<a class="back-link" href="clientes.php">← Volver a clientes</a>

<div class="form-page">
    <h2>Editar Cliente</h2>

    <form method="POST">
        <div>
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?= htmlspecialchars($c['nombre']) ?>" required>
        </div>
        <div>
            <label>Apellido</label>
            <input type="text" name="apellido" value="<?= htmlspecialchars($c['apellido']) ?>" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($c['email']) ?>" required>
        </div>
        <div>
            <label>Teléfono</label>
            <input type="text" name="telefono" value="<?= htmlspecialchars($c['telefono']) ?>" required>
        </div>
        <div>
            <button type="submit">Actualizar cliente</button>
        </div>
    </form>
</div>

</div></body></html>
