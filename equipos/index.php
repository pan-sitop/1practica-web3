<?php 
include '../config/db.php'; 
include '../includes/header.php'; 
?>

<div class="d-flex justify-content-between align-items-center mb-4 mt-4">
    <h2>Gestión de Equipos</h2>
    <a href="crear.php" class="btn btn-primary">Añadir Nuevo</a>
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
            <?php
            $resultado = $conn->query("SELECT * FROM equipos_laboratorio");
            while($fila = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['numero_serie']; ?></td>
                <td><?php echo $fila['nombre_equipo']; ?></td>
                <td><span class="badge bg-secondary"><?php echo $fila['tipo']; ?></span></td>
                <td>
                    <?php if($fila['estado_operativo'] == 1): ?>
                        <span class="badge bg-success">Activo</span>
                    <?php else: ?>
                        <span class="badge bg-danger">En Reparación</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="leer.php?id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-info">Ver</a>
                    <a href="editar.php?idEditar=<?php echo $fila['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="eliminar.php?idEliminar=<?php echo $fila['id']; ?>" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>