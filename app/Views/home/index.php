<?= $this->extend('layouts/adminlte') ?>

<?= $this->section('title') ?>Página Principal<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <?php if (session()->get('rol') == 'admin'): ?>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Usuarios</h3>
                <div class="card-tools">
                    <a href="<?= base_url('usuarios') ?>" class="btn btn-primary">Ver Usuarios</a>
                </div>
            </div>
            <div class="card-body">
                <p>Accede a la gestión de usuarios donde puedes crear, editar y eliminar usuarios.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Productos</h3>
                <div class="card-tools">
                    <a href="<?= base_url('productos') ?>" class="btn btn-primary">Ver Productos</a>
                </div>
            </div>
            <div class="card-body">
                <p>Accede a la gestión de productos donde puedes crear, editar y eliminar productos.</p>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ventas</h3>
                <div class="card-tools">
                    <a href="<?= base_url('ventas') ?>" class="btn btn-primary">Ver Ventas</a>
                </div>
            </div>
            <div class="card-body">
                <p>Accede a la gestión de ventas donde puedes crear, editar y eliminar ventas.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Reporte de Productos por Sabor</h3>
                <div class="card-tools">
                    <a href="<?= base_url('reportes/productosSabor') ?>" class="btn btn-primary">Ver Reporte</a>
                </div>
            </div>
            <div class="card-body">
                <p>Accede a los reportes de productos clasificados por sabor.</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Reporte de Ventas por Producto</h3>
                <div class="card-tools">
                    <a href="<?= base_url('reportes/VentasProducto') ?>" class="btn btn-primary">Ver Reporte</a>
                </div>
            </div>
            <div class="card-body">
                <p>Accede a los reportes de ventas clasificadas por producto.</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>