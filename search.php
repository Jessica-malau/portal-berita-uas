<?php include 'inc/header.php'; include 'db/config.php'; ?>
<div class="container mt-4">
<h5>Hasil pencarian untuk "<?= $_GET['q'] ?>"</h5>
<?php
$q = $conn->real_escape_string($_GET['q']);
$sql = $conn->query("SELECT * FROM berita WHERE judul LIKE '%$q%' ORDER BY tanggal DESC");
if ($sql->num_rows > 0) {
  while($b = $sql->fetch_assoc()) {
    echo "<div class='card mb-3'>
            <div class='row g-0'>
              <div class='col-md-4'>
                <img src='uploads/{$b['gambar']}' class='img-fluid rounded-start'>
              </div>
              <div class='col-md-8'>
                <div class='card-body'>
                  <h5><a href='detail.php?slug={$b['slug']}'>{$b['judul']}</a></h5>
                  <p class='card-text'>".substr(strip_tags($b['isi']),0,100)."...</p>
                </div>
              </div>
            </div>
          </div>";
  }
} else {
  echo "<p>Tidak ditemukan.</p>";
}
?>
</div>
<?php include 'inc/footer.php'; ?>