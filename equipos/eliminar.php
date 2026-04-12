<?php
require_once '../config/db.php';

if (isset($_GET['id'])) {
    $stmt = $conn->prepare("DELETE FROM equipos_laboratorio WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $stmt->close();
}

header("Location: index.php");
exit();
?>