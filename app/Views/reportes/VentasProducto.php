<?= $this->extend('layouts/adminlte') ?>

<?= $this->section('title') ?>Reporte de Ventas por Producto<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ventas por Producto</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Total Vendido</th>
                    <th>Ingresos</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventas as $venta): ?>
                    <tr>
                        <td><?= $venta['nombre'] ?></td>
                        <td><?= $venta['total_vendido'] ?></td>
                        <td><?= $venta['ingresos'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>