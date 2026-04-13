<?php
include '../config/db.php';
if(isset($_GET['idEliminar'])){
    $id = $_GET['idEliminar'];
    $conn->query("DELETE FROM equipos_laboratorio WHERE id = '$id'");
    header("Location: index.php");
}
?>