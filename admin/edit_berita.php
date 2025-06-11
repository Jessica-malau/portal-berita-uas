<?php 
include '../db/config.php';

// ambil id dari url
$id = $_GET['id'] ?? '';

if (!$id) {
    header('Location: daftar_berita.php');
    exit;
}

// proses update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $id_kategori = $_POST['id_kategori'];
    $tanggal = $_POST['tanggal'];

    // cek jika upload gambar baru
    if (!empty($_FILES['gambar']['name'])) {
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_name = basename($_FILES['gambar']['name']);
        $target_dir = "../uploads/";
        $target_file = $target_dir . $gambar_name;

        // pindahkan file upload
        if (move_uploaded_file($gambar_tmp, $target_file)) {
            // update data termasuk gambar
            $sql = "UPDATE berita SET judul=?, isi=?, id_kategori=?, tanggal=?, gambar=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssissi', $judul, $isi, $id_kategori, $tanggal, $gambar_name, $id);
            $stmt->execute();
        } else {
            $error = "Gagal upload gambar.";
        }
    } else {
        // update tanpa gambar
        $sql = "UPDATE berita SET judul=?, isi=?, id_kategori=?, tanggal=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssisi', $judul, $isi, $id_kategori, $tanggal, $id);
        $stmt->execute();
    }

    if (!isset($error)) {
        header('Location: daftar_berita.php');
        exit;
    }
}

// ambil data berita berdasarkan id
$sql = "SELECT * FROM berita WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$berita = $result->fetch_assoc();

if (!$berita) {
    echo "Berita tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Berita</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-4">
  <h2>Edit Berita</h2>
  <?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php endif; ?>

  <form action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="judul" class="form-label">Judul Berita</label>
      <input type="text" name="judul" id="judul" class="form-control" required value="<?= htmlspecialchars($berita['judul']) ?>" />
    </div>
    <div class="mb-3">
      <label for="isi" class="form-label">Isi Berita</label>
      <textarea name="isi" id="isi" rows="6" class="form-control" required><?= htmlspecialchars($berita['isi']) ?></textarea>
    </div>
    <div class="mb-3">
      <label for="id_kategori" class="form-label">Kategori</label>
      <select name="id_kategori" id="id_kategori" class="form-select" required>
        <option value="">-- Pilih Kategori --</option>
        <?php
        $kat = $conn->query("SELECT * FROM kategori");
        while($k = $kat->fetch_assoc()) {
          $selected = ($k['id'] == $berita['id_kategori']) ? "selected" : "";
          echo "<option value='{$k['id']}' $selected>{$k['nama_kategori']}</option>";
        }
        ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Tanggal</label>
      <input type="datetime-local" name="tanggal" id="tanggal" class="form-control" required 
        value="<?= date('Y-m-d\TH:i', strtotime($berita['tanggal'])) ?>" />
    </div>
    <div class="mb-3">
      <label for="gambar" class="form-label">Ganti Gambar (kosongkan jika tidak diubah)</label>
      <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*" />
      <small>Gambar saat ini: <?= htmlspecialchars($berita['gambar']) ?></small>
    </div>
    <button type="submit" class="btn btn-primary">Update Berita</button>
    <a href="daftar_berita.php" class="btn btn-secondary">Batal</a>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
