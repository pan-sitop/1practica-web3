<?php include 'includes/header.php'; ?>

<div class="row mt-5 text-center">
    <div class="col-12 mb-4">
        <h1 class="display-5">Panel de Control Principal</h1>
        <p class="lead">Seleccione el módulo que desea gestionar.</p>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body d-flex flex-column justify-content-center">
                <h3 class="card-title">Equipos de Laboratorio</h3>
                <p class="card-text text-muted">Gestión de inventario y estado operativo.</p>
                <a href="equipos/index.php" class="btn btn-primary mt-auto">Ir a Equipos</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body d-flex flex-column justify-content-center">
                <h3 class="card-title">Eventos Académicos</h3>
                <p class="card-text text-muted">Programación y modalidades de eventos.</p>
                <a href="eventos/index.php" class="btn btn-success mt-auto">Ir a Eventos</a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>