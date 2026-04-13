<?php
include '../config/db.php';
include '../includes/header.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $resultado = $conn->query("SELECT * FROM eventos_academicos WHERE id = $id");
    $evento = $resultado->fetch_assoc();
}
?>

<div class="card mt-5 mx-auto shadow" style="max-width: 600px;">
    <div class="card-header bg-success text-white">Detalle del Evento</div>
    <div class="card-body">
        <h4 class="card-title"><?php echo htmlspecialchars($evento['titulo_evento']); ?></h4>
        <hr>
        <p><strong>Descripción:</strong><br><?php echo nl2br(htmlspecialchars($evento['descripcion'])); ?></p>
        <p><strong>Fecha y Hora:</strong> <?php echo date('d/m/Y H:i', strtotime($evento['fecha_evento'])); ?></p>
        <p><strong>Modalidad:</strong> <?php echo $evento['modalidad']; ?></p>
        <p><strong>Cupo Máximo:</strong> <?php echo $evento['cupo_maximo']; ?> personas</p>
        <div class="mt-4">
            <a href="index.php" class="btn btn-secondary w-100">Volver al listado</a>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>