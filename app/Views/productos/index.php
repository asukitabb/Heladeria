<?= $this->extend('layouts/adminlte') ?>

<?= $this->section('title') ?>Lista de Productos<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Productos</h3>
        <div class="card-tools">
            <a href="<?= base_url('productos/create') ?>" class="btn btn-primary">Agregar Producto</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= $producto['id'] ?></td>
                        <td><?= $producto['nombre'] ?></td>
                        <td><?= $producto['descripcion'] ?></td>
                        <td><?= $producto['precio'] ?></td>
                        <td>
                            <a href="<?= base_url('productos/edit/' . $producto['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="<?= base_url('productos/delete/' . $producto['id']) ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>