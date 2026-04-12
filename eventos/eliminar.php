<?php
require_once '../config/db.php';
if (isset($_GET['id'])) {
    $stmt = $conn->prepare("DELETE FROM eventos_academicos WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
}
header("Location: index.php");
exit();
?>