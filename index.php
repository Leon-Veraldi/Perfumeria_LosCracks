<?php include("conexion.php"); include("menu.php"); ?>

<h1>Panel de Gestión</h1>
<p class="page-subtitle">Sistema interno · Perfumería Los Cracks</p>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">🧴</div>
        <div class="stat-label">Perfumes</div>
        <div class="stat-value"><?= $conexion->query("SELECT COUNT(*) c FROM perfumes")->fetch_assoc()['c'] ?? '—' ?></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">👤</div>
        <div class="stat-label">Clientes</div>
        <div class="stat-value"><?= $conexion->query("SELECT COUNT(*) c FROM clientes")->fetch_assoc()['c'] ?? '—' ?></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">🏭</div>
        <div class="stat-label">Proveedores</div>
        <div class="stat-value"><?= $conexion->query("SELECT COUNT(*) c FROM proveedores")->fetch_assoc()['c'] ?? '—' ?></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">💳</div>
        <div class="stat-label">Ventas</div>
        <div class="stat-value"><?= $conexion->query("SELECT COUNT(*) c FROM ventas")->fetch_assoc()['c'] ?? '—' ?></div>
    </div>
</div>

</div></body></html>
