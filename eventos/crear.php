<?php
include '../config/db.php';
include '../includes/header.php';

if(isset($_POST['crear'])){
    $titulo = $_POST['titulo_evento'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha_evento'];
    $modalidad = $_POST['modalidad'];
    $cupo = $_POST['cupo_maximo'];

    $sql = ("INSERT INTO eventos_academicos (titulo_evento, descripcion, fecha_evento, modalidad, cupo_maximo) VALUES ('$titulo', '$descripcion', '$fecha', '$modalidad', '$cupo')");
    $conn->query($sql);
    header("Location: index.php");
}
?>

<div class="card p-4 shadow-sm mx-auto" style="max-width: 600px;">
    <h3>Registrar Nuevo Evento</h3>
    <form action="" method="POST" class="mt-3">
        <div class="mb-3">
            <label class="form-label">Título del Evento</label>
            <input type="text" name="titulo_evento" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha y Hora</label>
            <input type="datetime-local" name="fecha_evento" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Modalidad</label>
            <select name="modalidad" class="form-select">
                <option value="Presencial">Presencial</option>
                <option value="Virtual">Virtual</option>
                <option value="Hibrido">Hibrido</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Cupo Máximo</label>
            <input type="number" name="cupo_maximo" class="form-control" required>
        </div>
        <button type="submit" name="crear" class="btn btn-success w-100">Guardar Evento</button>
        <a href="index.php" class="btn btn-link w-100 mt-2 text-decoration-none text-muted">Cancelar</a>
    </form>
</div>

<?php include '../includes/footer.php'; ?>