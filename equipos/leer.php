<?php
include '../config/db.php';
include '../includes/header.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $resultado = $conn->query("SELECT * FROM equipos_laboratorio WHERE id = $id");
    $equipo = $resultado->fetch_assoc();
}
?>

<div class="card mt-5 mx-auto" style="max-width: 500px;">
    <div class="card-header bg-info text-dark">Detalle del Equipo</div>
    <div class="card-body">
        <p><strong>N° Serie:</strong> <?php echo $equipo['numero_serie']; ?></p>
        <p><strong>Nombre:</strong> <?php echo $equipo['nombre_equipo']; ?></p>
        <p><strong>Tipo:</strong> <?php echo $equipo['tipo']; ?></p>
        <p><strong>Fecha:</strong> <?php echo $equipo['fecha_adquisicion']; ?></p>
        <p><strong>Estado:</strong> <?php echo ($equipo['estado_operativo'] == 1) ? 'Activo' : 'En Reparación'; ?></p>
        <hr>
        <a href="index.php" class="btn btn-secondary w-100">Regresar</a>
    </div>
</div>

<?php include '../includes/footer.php'; ?>