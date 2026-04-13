<?php 
include '../config/db.php'; 
include '../includes/header.php'; 
?>

<div class="d-flex justify-content-between align-items-center mb-4 mt-4">
    <h2>Agenda de Eventos</h2>
    <a href="crear.php" class="btn btn-success">Añadir Nuevo Evento</a>
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
            <?php
            $resultado = $conn->query("SELECT * FROM eventos_academicos");
            while($fila = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo htmlspecialchars($fila['titulo_evento']); ?></td>
                <td><?php echo date('d/m/Y H:i', strtotime($fila['fecha_evento'])); ?></td>
                <td><span class="badge bg-info text-dark"><?php echo $fila['modalidad']; ?></span></td>
                <td><?php echo $fila['cupo_maximo']; ?></td>
                <td>
                    <a href="leer.php?id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-info">Ver</a>
                    <a href="editar.php?idEditar=<?php echo $fila['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="eliminar.php?idEliminar=<?php echo $fila['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar evento?');">Eliminar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>