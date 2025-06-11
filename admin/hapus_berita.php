<?php
include '../db/config.php';

$id = $_GET['id'] ?? '';

if ($id) {
    $sql = "DELETE FROM berita WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

header('Location: daftar_berita.php');
exit;
