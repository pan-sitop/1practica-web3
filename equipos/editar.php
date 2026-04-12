<?php
require_once '../config/db.php';

// Si es POST, procesar la actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE equipos_laboratorio SET numero_serie=?, nombre_equipo=?, tipo=?, fecha_adquisicion=?, estado_operativo=? WHERE id=?");
    $stmt->bind_param("ssssii", $_POST['numero_serie'], $_POST['nombre_equipo'], $_POST['tipo'], $_POST['fecha_adquisicion'], $_POST['estado_operativo'], $_POST['id']);
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        die("Error al actualizar: " . $stmt->error);
    }
}

// Si es GET, mostrar el formulario precargado
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM equipos_laboratorio WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$equipo = $stmt->get_result()->fetch_assoc();

include '../includes/header.php'; 
?>

<div class="mt-4">
    <h2>Editar Equipo</h2>
    <form action="editar.php" method="POST" class="mt-4">
        <input type="hidden" name="id" value="<?= $equipo['id'] ?>">
        
        <div class="mb-3">
            <label>Número de Serie</label>
            <input type="text" name="numero_serie" class="form-control" value="<?= htmlspecialchars($equipo['numero_serie']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Nombre del Equipo</label>
            <input type="text" name="nombre_equipo" class="form-control" value="<?= htmlspecialchars($equipo['nombre_equipo']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Tipo</label>
            <select name="tipo" class="form-select" required>
                <option value="Computadora" <?= $equipo['tipo'] == 'Computadora' ? 'selected' : '' ?>>Computadora</option>
                <option value="Proyector" <?= $equipo['tipo'] == 'Proyector' ? 'selected' : '' ?>>Proyector</option>
                <option value="Servidor" <?= $equipo['tipo'] == 'Servidor' ? 'selected' : '' ?>>Servidor</option>
                <option value="Redes" <?= $equipo['tipo'] == 'Redes' ? 'selected' : '' ?>>Redes</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Fecha de Adquisición</label>
            <input type="date" name="fecha_adquisicion" class="form-control" value="<?= $equipo['fecha_adquisicion'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Estado Operativo</label>
            <select name="estado_operativo" class="form-select" required>
                <option value="1" <?= $equipo['estado_operativo'] == 1 ? 'selected' : '' ?>>Activo</option>
                <option value="0" <?= $equipo['estado_operativo'] == 0 ? 'selected' : '' ?>>En Reparación</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar Equipo</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php include '../includes/footer.php'; ?>