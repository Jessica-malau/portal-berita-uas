<?php
include '../db/config.php';

$id = $_POST['id'];
$nama = htmlspecialchars($_POST['nama_kategori']);

$query = mysqli_query($conn, "UPDATE kategori SET nama_kategori='$nama' WHERE id=$id");

header("Location: add_kategori.php");
