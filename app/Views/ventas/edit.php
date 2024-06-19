<?= $this->extend('layouts/adminlte') ?>

<?= $this->section('title') ?>Editar Venta<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Editar Venta</h3>
    </div>
    <div class="card-body">
        <?php if (session()->get('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->get('errors') as $error): ?>
                    <p><?= $error ?></p>
                <?php endforeach ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('ventas/update/' . $venta['id']) ?>" method="post">
            <div class="form-group">
                <label for="usuario_id">Usuario</label>
                <select name="usuario_id" class="form-control" required>
                    <option value="">Seleccione un usuario</option>
                    <?php foreach ($usuarios as $usuario): ?>
                        <option value="<?= $usuario['id'] ?>" <?= $venta['usuario_id'] == $usuario['id'] ? 'selected' : '' ?>><?= $usuario['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="producto_id">Producto</label>
                <select name="producto_id" class="form-control" required>
                    <option value="">Seleccione un producto</option>
                    <?php foreach ($productos as $producto): ?>
                        <option value="<?= $producto['id'] ?>" <?= $venta['producto_id'] == $producto['id'] ? 'selected' : '' ?>><?= $producto['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" value="<?= old('cantidad', $venta['cantidad']) ?>" required>
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input type="text" name="total" class="form-control" value="<?= old('total', $venta['total']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>