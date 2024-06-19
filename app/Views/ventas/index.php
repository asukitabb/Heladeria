<?= $this->extend('layouts/adminlte') ?>

<?= $this->section('title') ?>Listado de Ventas<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Listado de Ventas</h3>
        <div class="card-tools">
            <a href="<?= base_url('ventas/create') ?>" class="btn btn-primary">Agregar Venta</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventas as $venta): ?>
                    <tr>
                        <td><?= $venta['id'] ?></td>
                        <td><?= $venta['cliente'] ?></td>
                        <td><?= $venta['producto_nombre'] ?></td>
                        <td><?= $venta['cantidad'] ?></td>
                        <td><?= $venta['total'] ?></td>
                        <td><?= $venta['usuario_nombre'] ?></td>
                        <td>
                            <a href="<?= base_url('ventas/edit/' . $venta['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="<?= base_url('ventas/delete/' . $venta['id']) ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>