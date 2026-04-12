<?php
require_once '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE eventos_academicos SET titulo_evento=?, descripcion=?, fecha_evento=?, modalidad=?, cupo_maximo=? WHERE id=?");
    $stmt->bind_param("ssssii", $_POST['titulo_evento'], $_POST['descripcion'], $_POST['fecha_evento'], $_POST['modalidad'], $_POST['cupo_maximo'], $_POST['id']);
    if ($stmt->execute()) { header("Location: index.php"); exit(); }
}

$stmt = $conn->prepare("SELECT * FROM eventos_academicos WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$evento = $stmt->get_result()->fetch_assoc();

include '../includes/header.php'; 
?>

<div class="mt-4">
    <h2>Editar Evento</h2>
    <form action="editar.php" method="POST" class="mt-3">
        <input type="hidden" name="id" value="<?= $evento['id'] ?>">
        <div class="mb-3">
            <label>Título</label>
            <input type="text" name="titulo_evento" class="form-control" value="<?= htmlspecialchars($evento['titulo_evento']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3" required><?= htmlspecialchars($evento['descripcion']) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Fecha y Hora</label>
            <input type="datetime-local" name="fecha_evento" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($evento['fecha_evento'])) ?>" required>
        </div>
        <div class="mb-3">
            <label>Modalidad</label>
            <select name="modalidad" class="form-select">
                <option value="Presencial" <?= $evento['modalidad']=='Presencial'?'selected':'' ?>>Presencial</option>
                <option value="Virtual" <?= $evento['modalidad']=='Virtual'?'selected':'' ?>>Virtual</option>
                <option value="Hibrido" <?= $evento['modalidad']=='Hibrido'?'selected':'' ?>>Hibrido</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Cupo Máximo</label>
            <input type="number" name="cupo_maximo" class="form-control" value="<?= $evento['cupo_maximo'] ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php include '../includes/footer.php'; ?>