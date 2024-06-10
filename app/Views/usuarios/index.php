<?= $this->extend('layouts/adminlte') ?>

<?= $this->section('title') ?>Lista de Usuarios<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Usuarios</h3>
        <div class="card-tools">
            <a href="<?= base_url('usuarios/create') ?>" class="btn btn-primary">Agregar Usuario</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Username</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['id'] ?></td>
                        <td><?= $usuario['nombre'] ?></td>
                        <td><?= $usuario['username'] ?></td>
                        <td><?= $usuario['rol'] ?></td>
                        <td>
                            <a href="<?= base_url('usuarios/edit/' . $usuario['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="<?= base_url('usuarios/delete/' . $usuario['id']) ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>