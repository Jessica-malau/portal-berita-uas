<?php
include '../db/config.php';

$nama = htmlspecialchars($_POST['nama_kategori']);

$query = mysqli_query($conn, "INSERT INTO kategori (nama_kategori) VALUES ('$nama')");

header("Location: add_kategori.php");
