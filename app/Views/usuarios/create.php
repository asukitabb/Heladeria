<?= $this->extend('layouts/adminlte') ?>

<?= $this->section('title') ?>Agregar Usuario<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Agregar Usuario</h3>
    </div>
    <div class="card-body">
        <?php if (session()->get('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->get('errors') as $error): ?>
                    <p><?= $error ?></p>
                <?php endforeach ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('usuarios/store') ?>" method="post">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?= old('nombre') ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="<?= old('username') ?>" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <select name="rol" class="form-control" required>
                    <option value="">Seleccione un rol</option>
                    <option value="admin">Admin</option>
                    <option value="cajero">Cajero</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>