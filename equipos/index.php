<?php 
require_once '../config/db.php';
include '../includes/header.php'; 

// Obtener registros
$query = "SELECT * FROM equipos_laboratorio ORDER BY id DESC";
$resultado = $conn->query($query);
?>

<div class="d-flex justify-content-between align-items-center mb-4 mt-4">
    <h2>Gestión de Equipos</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearEquipoModal">
        Añadir Nuevo
    </button>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>N° Serie</th>
                <th>Equipo</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $fila['id'] ?></td>
                <td><?= htmlspecialchars($fila['numero_serie']) ?></td>
                <td><?= htmlspecialchars($fila['nombre_equipo']) ?></td>
                <td><span class="badge bg-secondary"><?= $fila['tipo'] ?></span></td>
                <td>
                    <?php if($fila['estado_operativo'] == 1): ?>
                        <span class="badge bg-success">Activo</span>
                    <?php else: ?>
                        <span class="badge bg-danger">En Reparación</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="leer.php?id=<?= $fila['id'] ?>" class="btn btn-sm btn-info">Ver</a>
                    <a href="editar.php?id=<?= $fila['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="eliminar.php?id=<?= $fila['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este equipo?');">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="crearEquipoModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="crear.php" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Registrar Nuevo Equipo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                <div class="mb-3">
                    <label>Número de Serie</label>
                    <input type="text" name="numero_serie" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nombre del Equipo</label>
                    <input type="text" name="nombre_equipo" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Tipo</label>
                    <select name="tipo" class="form-select" required>
                        <option value="Computadora">Computadora</option>
                        <option value="Proyector">Proyector</option>
                        <option value="Servidor">Servidor</option>
                        <option value="Redes">Redes</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Fecha de Adquisición</label>
                    <input type="date" name="fecha_adquisicion" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Estado Operativo</label>
                    <select name="estado_operativo" class="form-select" required>
                        <option value="1">Activo</option>
                        <option value="0">En Reparación</option>
                    </select>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar Equipo</button>
          </div>
      </form>
    </div>
  </div>
</div>

<?php include '../includes/footer.php'; ?>