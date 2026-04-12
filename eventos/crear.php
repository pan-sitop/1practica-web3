<?php
require_once '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO eventos_academicos (titulo_evento, descripcion, fecha_evento, modalidad, cupo_maximo) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $_POST['titulo_evento'], $_POST['descripcion'], $_POST['fecha_evento'], $_POST['modalidad'], $_POST['cupo_maximo']);
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        die("Error: " . $stmt->error);
    }
}