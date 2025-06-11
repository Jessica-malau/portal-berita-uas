<?php
include '../db/config.php';

$id = $_GET['id'];

// Update semua berita yang terkait untuk mengosongkan kategori
mysqli_query($conn, "UPDATE berita SET id_kategori = NULL WHERE id_kategori = $id");

// Baru hapus kategorinya
mysqli_query($conn, "DELETE FROM kategori WHERE id = $id");

header("Location: add_kategori.php");