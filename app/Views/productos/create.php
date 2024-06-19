<?= $this->extend('layouts/adminlte') ?>

<?= $this->section('title') ?>Agregar Producto<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Agregar Producto</h3>
    </div>
    <div class="card-body">
        <?php if (session()->get('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->get('errors') as $error): ?>
                    <p><?= $error ?></p>
                <?php endforeach ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('productos/store') ?>" method="post">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?= old('nombre') ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" class="form-control" value="<?= old('descripcion') ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" name="precio" class="form-control" value="<?= old('precio') ?>" required>
            </div>
            <div class="form-group">
                <label for="sabor">Sabor</label>
                <input type="text" name="sabor" class="form-control" value="<?= old('sabor') ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>