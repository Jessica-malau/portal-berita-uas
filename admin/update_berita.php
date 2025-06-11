<?php
include '../db/config.php';

$judul_lama = $_POST['judul_lama'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$id_kategori = $_POST['id_kategori'];
$tanggal = $_POST['tanggal'];

$conn->query("UPDATE berita SET judul='$judul', isi='$isi', id_kategori='$id_kategori', tanggal='$tanggal' WHERE judul='$judul_lama'");
header("Location: berita_list.php");
