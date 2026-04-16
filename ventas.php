<?php include("conexion.php"); include("menu.php"); ?>

<h2>Ventas</h2>

<?php
if ($_POST) {
    $fecha      = $conexion->real_escape_string($_POST['fecha']);
    $id_cliente = (int)$_POST['id_cliente'];
    $id_perfume = (int)$_POST['id_perfume'];
    $total      = $conexion->real_escape_string($_POST['total']);
    $conexion->query("INSERT INTO ventas(fecha,id_cliente,id_perfume,total)
        VALUES('$fecha','$id_cliente','$id_perfume','$total')");
}
?>

<form method="POST">
    <div>
        <label>Fecha</label>
        <input type="date" name="fecha" required>
    </div>
    <div>
        <label>Cliente</label>
        <select name="id_cliente">
        <?php
        $c = $conexion->query("SELECT * FROM clientes ORDER BY nombre");
        while ($x = $c->fetch_assoc()):
        ?>
            <option value="<?= $x['id_cliente'] ?>"><?= htmlspecialchars($x['nombre'] . ' ' . $x['apellido']) ?></option>
        <?php endwhile; ?>
        </select>
    </div>
    <div>
        <label>Perfume</label>
        <select name="id_perfume">
        <?php
        $p = $conexion->query("SELECT * FROM perfumes ORDER BY nombre_perfume");
        while ($x = $p->fetch_assoc()):
        ?>
            <option value="<?= $x['id_perfume'] ?>"><?= htmlspecialchars($x['nombre_perfume']) ?></option>
        <?php endwhile; ?>
        </select>
    </div>
    <div>
        <label>Total ($)</label>
        <input type="number" step="0.01" name="total" placeholder="0.00" required>
    </div>
    <div>
        <label>&nbsp;</label>
        <button type="submit">Registrar venta</button>
    </div>
</form>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Perfume</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $res = $conexion->query("SELECT v.id_venta, v.fecha, v.total,
        CONCAT(c.nombre,' ',c.apellido) AS cliente, p.nombre_perfume
        FROM ventas v
        JOIN clientes c ON v.id_cliente = c.id_cliente
        JOIN perfumes p ON v.id_perfume = p.id_perfume
        ORDER BY v.id_venta DESC");
    while ($v = $res->fetch_assoc()):
    ?>
    <tr>
        <td><?= $v['id_venta'] ?></td>
        <td><?= date('d/m/Y', strtotime($v['fecha'])) ?></td>
        <td><?= htmlspecialchars($v['cliente']) ?></td>
        <td><?= htmlspecialchars($v['nombre_perfume']) ?></td>
        <td>$<?= number_format($v['total'], 2) ?></td>
        <td>
            <a class="btn btn-eliminar" href="eliminar_venta.php?id=<?= $v['id_venta'] ?>"
               onclick="return confirm('¿Eliminar esta venta?')">Eliminar</a>
        </td>
    </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</div></body></html>
