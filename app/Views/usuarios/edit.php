<?= $this->extend('layouts/adminlte') ?>

<?= $this->section('title') ?>Editar Usuario<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Editar Usuario</h3>
    </div>
    <div class="card-body">
        <?php if (session()->get('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->get('errors') as $error): ?>
                    <p><?= $error ?></p>
                <?php endforeach ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('usuarios/update/' . $usuario['id']) ?>" method="post">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?= old('nombre', $usuario['nombre']) ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="<?= old('username', $usuario['username']) ?>" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" class="form-control" value="<?= old('contrasena', $usuario['contrasena']) ?>" required>
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <select name="rol" class="form-control" required>
                    <option value="">Seleccione un rol</option>
                    <option value="admin" <?= $usuario['rol'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="cajero" <?= $usuario['rol'] == 'cajero' ? 'selected' : '' ?>>Cajero</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>