<?php 
require_once '../config/db.php';
include '../includes/header.php'; 

$resultado = $conn->query("SELECT * FROM eventos_academicos ORDER BY fecha_evento ASC");
?>

<div class="d-flex justify-content-between align-items-center mb-4 mt-4">
    <h2>Agenda de Eventos</h2>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearEventoModal">
        Añadir Nuevo Evento
    </button>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Fecha y Hora</th>
                <th>Modalidad</th>
                <th>Cupo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $fila['id'] ?></td>
                <td><?= htmlspecialchars($fila['titulo_evento']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($fila['fecha_evento'])) ?></td>
                <td><span class="badge bg-info text-dark"><?= $fila['modalidad'] ?></span></td>
                <td><?= $fila['cupo_maximo'] ?></td>
                <td>
                    <a href="leer.php?id=<?= $fila['id'] ?>" class="btn btn-sm btn-info">Ver</a>
                    <a href="editar.php?id=<?= $fila['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="eliminar.php?id=<?= $fila['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este evento?');">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="crearEventoModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="crear.php" method="POST">
          <div class="modal-header">
            <h5 class="modal-title">Registrar Evento</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
                <div class="mb-3">
                    <label>Título del Evento</label>
                    <input type="text" name="titulo_evento" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label>Fecha y Hora</label>
                    <input type="datetime-local" name="fecha_evento" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Modalidad</label>
                    <select name="modalidad" class="form-select" required>
                        <option value="Presencial">Presencial</option>
                        <option value="Virtual">Virtual</option>
                        <option value="Hibrido">Hibrido</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Cupo Máximo</label>
                    <input type="number" name="cupo_maximo" class="form-control" required>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success">Guardar</button>
          </div>
      </form>
    </div>
  </div>
</div>

<?php include '../includes/footer.php'; ?>