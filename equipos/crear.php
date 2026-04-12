<?php
require_once '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO equipos_laboratorio (numero_serie, nombre_equipo, tipo, fecha_adquisicion, estado_operativo) VALUES (?, ?, ?, ?, ?)");
    
    // Las variables provienen del form. s=string, i=integer
    $stmt->bind_param("ssssi", $_POST['numero_serie'], $_POST['nombre_equipo'], $_POST['tipo'], $_POST['fecha_adquisicion'], $_POST['estado_operativo']);
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        die("Error al guardar: " . $stmt->error);
    }
    $stmt->close();
}
$conn->close();
?>