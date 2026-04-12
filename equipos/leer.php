<?php
require_once '../config/db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM equipos_laboratorio WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$resultado = $stmt->get_result();
$equipo = $resultado->fetch_assoc();

if (!$equipo) {
    die("Equipo no encontrado.");
}

include '../includes/header.php'; 
?>

<div class="card mt-5 max-w-50 mx-auto">
  <div class="card-header">
    Detalles del Equipo: <?= htmlspecialchars($equipo['numero_serie']) ?>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>Nombre:</strong> <?= htmlspecialchars($equipo['nombre_equipo']) ?></li>
    <li class="list-group-item"><strong>Tipo:</strong> <?= $equipo['tipo'] ?></li>
    <li class="list-group-item"><strong>Fecha de Adquisición:</strong> <?= $equipo['fecha_adquisicion'] ?></li>
    <li class="list-group-item"><strong>Estado:</strong> <?= $equipo['estado_operativo'] == 1 ? 'Activo' : 'En Reparación' ?></li>
  </ul>
  <div class="card-body">
    <a href="index.php" class="btn btn-secondary">Volver</a>
  </div>
</div>

<?php include '../includes/footer.php'; ?>