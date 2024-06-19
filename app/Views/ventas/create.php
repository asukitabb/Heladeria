<?= $this->extend('layouts/adminlte') ?>

<?= $this->section('title') ?>Agregar Venta<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Agregar Venta</h3>
    </div>
    <div class="card-body">
        <?php if (session()->get('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->get('errors') as $error): ?>
                    <p><?= $error ?></p>
                <?php endforeach ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('ventas/store') ?>" method="post">
            <div class="form-group">
                <label for="cliente">Nombre del Cliente</label>
                <input type="text" name="cliente" class="form-control" placeholder="Ingrese el nombre del cliente" required>
            </div>
            <div class="form-group">
                <label for="producto_id">Producto</label>
                <select name="producto_id" class="form-control" required>
                    <option value="">Seleccione un producto</option>
                    <?php foreach ($productos as $producto): ?>
                        <option value="<?= $producto['id'] ?>"><?= $producto['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input type="text" name="total" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>