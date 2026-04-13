<?php
include '../config/db.php';
include '../includes/header.php';

if(isset($_GET['idEditar'])){
    $id = $_GET['idEditar'];

    $sql = ("SELECT * FROM equipos_laboratorio WHERE id = $id");

    $resultado = $conn->query($sql);
    $equipo = $resultado->fetch_assoc();
}

if(isset($_POST['actualizar'])){
    $id = $_POST['id'];
    $numero_serie = $_POST['numero_serie'];
    $nombre_equipo = $_POST['nombre_equipo'];
    $tipo = $_POST['tipo'];
    $fecha_adquisicion = $_POST['fecha_adquisicion'];
    $estado_operativo = $_POST['estado_operativo'];

    $sql = ("UPDATE equipos_laboratorio SET numero_serie = '$numero_serie', nombre_equipo = '$nombre_equipo', tipo = '$tipo', fecha_adquisicion = '$fecha_adquisicion', estado_operativo = '$estado_operativo' WHERE id = '$id'"); 

    $conn->query($sql);

    header("Location: index.php");
}
?>

<h2>Actualizar equipo</h2>
<form action="" method="POST">
    <label for="">ID:</label>
    <input type="number" name="id" value="<?php echo $equipo['id'];?>" readonly> <br>
    <label for="">N° Serie:</label>
    <input type="text" name="numero_serie" value="<?php echo $equipo['numero_serie'];?>"> <br>
    <label for="">Nombre:</label>
    <input type="text" name="nombre_equipo" value="<?php echo $equipo['nombre_equipo'];?>"> <br>
    <label for="">Tipo:</label>
    <select name="tipo">
        <option value="Computadora" <?php echo($equipo['tipo'] == 'Computadora') ? 'selected' : ''; ?>>Computadora</option>
        <option value="Proyector" <?php echo($equipo['tipo'] == 'Proyector') ? 'selected' : ''; ?>>Proyector</option>
        <option value="Servidor" <?php echo($equipo['tipo'] == 'Servidor') ? 'selected' : ''; ?>>Servidor</option>
        <option value="Redes" <?php echo($equipo['tipo'] == 'Redes') ? 'selected' : ''; ?>>Redes</option>
    </select> <br>
    <label for="">Fecha:</label>
    <input type="date" name="fecha_adquisicion" value="<?php echo $equipo['fecha_adquisicion'];?>"> <br>
    <label for="">Estado Operativo (1 Activo, 0 Reparación):</label>
    <input type="number" name="estado_operativo" min="0" max="1" value="<?php echo $equipo['estado_operativo'];?>"> <br>
    
    <button type="submit" name="actualizar">ACTUALIZAR</button>
</form>

<?php include '../includes/footer.php'; ?>