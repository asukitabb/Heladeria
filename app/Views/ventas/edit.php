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

        <form action="<?= base_url('ventas/update/' . $venta['id']) ?>" method="post" id="ventaForm">
            <div class="form-group">
                <label for="cliente">Nombre del Cliente</label>
                <input type="text" name="cliente" class="form-control" placeholder="Ingrese el nombre del cliente" value="<?= old('cliente', $venta['cliente']) ?>" required>
            </div>
            <div class="form-group">
                <label for="producto_id">Producto</label>
                <select name="producto_id" class="form-control" id="producto_id" required>
                    <option value="">Seleccione un producto</option>
                    <?php foreach ($productos as $producto): ?>
                        <option value="<?= $producto['id'] ?>" data-precio="<?= $producto['precio'] ?>" <?= $venta['producto_id'] == $producto['id'] ? 'selected' : '' ?>><?= $producto['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
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
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" id="cantidad" value="<?= old('cantidad', $venta['cantidad']) ?>" required>
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input type="text" name="total" class="form-control" id="total" value="<?= old('total', $venta['total']) ?>" readonly required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const productoSelect = document.getElementById('producto_id');
    const cantidadInput = document.getElementById('cantidad');
    const totalInput = document.getElementById('total');

    function calcularTotal() {
        const precio = parseFloat(productoSelect.selectedOptions[0].getAttribute('data-precio')) || 0;
        const cantidad = parseFloat(cantidadInput.value) || 0;
        const total = precio * cantidad;
        totalInput.value = total.toFixed(2);
    }

    productoSelect.addEventListener('change', calcularTotal);
    cantidadInput.addEventListener('input', calcularTotal);
});
</script>

<?= $this->endSection() ?>