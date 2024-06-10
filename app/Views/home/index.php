<?= $this->extend('layouts/adminlte') ?>

<?= $this->section('title') ?>Página Principal<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Gestión de Usuarios</h3>
                <div class="card-tools">
                    <a href="<?= base_url('usuarios') ?>" class="btn btn-primary">Ver Usuarios</a>
                </div>
            </div>
            <div class="card-body">
                <p>Accede a la gestión de usuarios donde puedes crear, editar y eliminar usuarios.</p>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Gestión de Productos</h3>
                <div class="card-tools">
                    <a href="<?= base_url('productos') ?>" class="btn btn-primary">Ver Productos</a>
                </div>
            </div>
            <div class="card-body">
                <p>Accede a la gestión de productos donde puedes crear, editar y eliminar productos.</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>