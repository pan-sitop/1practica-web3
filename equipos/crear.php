<?php
include '../config/db.php';
include '../includes/header.php';

if(isset($_POST['crear'])){
    $numero_serie = $_POST['numero_serie'];
    $nombre_equipo = $_POST['nombre_equipo'];
    $tipo = $_POST['tipo'];
    $fecha_adquisicion = $_POST['fecha_adquisicion'];
    $estado_operativo = $_POST['estado_operativo'];

    $sql = ("INSERT INTO equipos_laboratorio (numero_serie, nombre_equipo, tipo, fecha_adquisicion, estado_operativo) VALUES ('$numero_serie', '$nombre_equipo', '$tipo', '$fecha_adquisicion', '$estado_operativo')");
    $conn->query($sql);
    header("Location: index.php");
}
?>

<div class="card p-4 shadow-sm mx-auto" style="max-width: 500px;">
    <h3>Registrar Equipo</h3>
    <form action="" method="POST" class="mt-3">
        <div class="mb-3">
            <label class="form-label">Número de Serie</label>
            <input type="text" name="numero_serie" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre del Equipo</label>
            <input type="text" name="nombre_equipo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo de Equipo</label>
            <select name="tipo" class="form-select">
                <option value="Computadora">Computadora</option>
                <option value="Proyector">Proyector</option>
                <option value="Servidor">Servidor</option>
                <option value="Redes">Redes</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de Adquisición</label>
            <input type="date" name="fecha_adquisicion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Estado Operativo</label>
            <select name="estado_operativo" class="form-select">
                <option value="1">Activo</option>
                <option value="0">En Reparación</option>
            </select>
        </div>
        <button type="submit" name="crear" class="btn btn-primary w-100">Guardar Equipo</button>
        <a href="index.php" class="btn btn-link w-100 mt-2 text-decoration-none">Cancelar</a>
    </form>
</div>

<?php include '../includes/footer.php'; ?>