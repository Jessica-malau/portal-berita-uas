<?php include 'inc/header.php'; include 'db/config.php'; ?>
<div class="container mt-4">
<?php
$id = $_GET['id'];
$sql = $conn->query("SELECT * FROM berita WHERE id_kategori=$id ORDER BY tanggal DESC");

if ($sql->num_rows > 0) {
  while($b = $sql->fetch_assoc()) {
    echo "<div class='card mb-4 shadow-sm'>
            <div class='row g-0'>
              <div class='col-md-4'>
                <img src='uploads/{$b['gambar']}' class='img-fluid rounded-start' alt='...' style='object-fit: cover; height: 100%; width: 100%;'>
              </div>
              <div class='col-md-8'>
                <div class='card-body'>
                  <h5 class='card-title'><a href='detail.php?slug={$b['slug']}' class='text-decoration-none'>{$b['judul']}</a></h5>
                  <p class='card-text'><small class='text-muted'>Diposting pada: {$b['tanggal']}</small></p>
                  <p class='card-text'>".substr(strip_tags($b['isi']), 0, 150)."...</p>
                  <a href='detail.php?slug={$b['slug']}' class='btn btn-primary btn-sm'>Baca Selengkapnya</a>
                </div>
              </div>
            </div>
          </div>";
  }
} else {
  echo "<div class='alert alert-warning'>Tidak ada berita dalam kategori ini.</div>";
}
?>
</div>
<?php include 'inc/footer.php'; ?>