<?php
require_once '../config/db.php';
if (!isset($_GET['id'])) { header("Location: index.php"); exit(); }

$stmt = $conn->prepare("SELECT * FROM eventos_academicos WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$evento = $stmt->get_result()->fetch_assoc();

include '../includes/header.php'; 
?>

<div class="card mt-5 shadow mx-auto" style="max-width: 600px;">
  <div class="card-body">
    <h3 class="card-title"><?= htmlspecialchars($evento['titulo_evento']) ?></h3>
    <p class="badge bg-primary"><?= $evento['modalidad'] ?></p>
    <hr>
    <p><strong>Descripción:</strong><br><?= nl2br(htmlspecialchars($evento['descripcion'])) ?></p>
    <p><strong>Fecha:</strong> <?= date('d/m/Y H:i', strtotime($evento['fecha_evento'])) ?></p>
    <p><strong>Cupo Disponible:</strong> <?= $evento['cupo_maximo'] ?> personas</p>
    <a href="index.php" class="btn btn-secondary">Regresar</a>
  </div>
</div>

<?php include '../includes/footer.php'; ?>