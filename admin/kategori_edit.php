<?php
include '../db/config.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori WHERE id=$id"));
?>

<h4>Edit Kategori</h4>
<form action="kategori_update.php" method="POST">
  <input type="hidden" name="id" value="<?= $data['id']; ?>">
  <div class="mb-3">
    <label for="nama_kategori">Nama Kategori</label>
    <input type="text" class="form-control" name="nama_kategori" value="<?= $data['nama_kategori']; ?>" required>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="add_kategori.php" class="btn btn-secondary">Batal</a>
</form>
