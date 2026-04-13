<?php
include '../config/db.php';
if(isset($_GET['idEliminar'])){
    $id = $_GET['idEliminar'];
    $conn->query("DELETE FROM eventos_academicos WHERE id = '$id'");
    header("Location: index.php");
}
?>