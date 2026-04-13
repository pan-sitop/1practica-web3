<?php
include '../config/db.php';
include '../includes/header.php';

if(isset($_GET['idEditar'])){
    $id = $_GET['idEditar'];
    $resultado = $conn->query("SELECT * FROM eventos_academicos WHERE id = $id");
    $evento = $resultado->fetch_assoc();
}

if(isset($_POST['actualizar'])){
    $id = $_POST['id'];
    $titulo = $_POST['titulo_evento'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha_evento'];
    $modalidad = $_POST['modalidad'];
    $cupo = $_POST['cupo_maximo'];

    $sql = ("UPDATE eventos_academicos SET titulo_evento='$titulo', descripcion='$descripcion', fecha_evento='$fecha', modalidad='$modalidad', cupo_maximo='$cupo' WHERE id='$id'"); 
    $conn->query($sql);
    header("Location: index.php");
}
?>

<div class="card p-4 shadow-sm mx-auto" style="max-width: 600px;">
    <h3>Actualizar Evento</h3>
    <form action="" method="POST" class="mt-3">
        <input type="hidden" name="id" value="<?php echo $evento['id'];?>">
        <div class="mb-3">
            <label class="form-label">Título del Evento</label>
            <input type="text" name="titulo_evento" class="form-control" value="<?php echo htmlspecialchars($evento['titulo_evento']);?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3" required><?php echo htmlspecialchars($evento['descripcion']);?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha y Hora</label>
            <input type="datetime-local" name="fecha_evento" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($evento['fecha_evento']));?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Modalidad</label>
            <select name="modalidad" class="form-select">
                <option value="Presencial" <?php echo ($evento['modalidad']=='Presencial') ? 'selected' : ''; ?>>Presencial</option>
                <option value="Virtual" <?php echo ($evento['modalidad']=='Virtual') ? 'selected' : ''; ?>>Virtual</option>
                <option value="Hibrido" <?php echo ($evento['modalidad']=='Hibrido') ? 'selected' : ''; ?>>Hibrido</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Cupo Máximo</label>
            <input type="number" name="cupo_maximo" class="form-control" value="<?php echo $evento['cupo_maximo'];?>" required>
        </div>
        <button type="submit" name="actualizar" class="btn btn-warning w-100">Actualizar Cambios</button>
        <a href="index.php" class="btn btn-link w-100 mt-2 text-decoration-none text-muted">Cancelar</a>
    </form>
</div>

<?php include '../includes/footer.php'; ?>