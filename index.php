<?php include 'inc/header.php'; include 'db/config.php'; ?>
<div class="container mt-4">
  <div class="row">
    <div class="col-md-3">
      <div class="card kategori">
        <div class="card-header text-danger fw-bold">Kategori</div>
        <ul class="list-group list-group-flush">
        <?php
        $kategori = $conn->query("SELECT * FROM kategori");
        while($kat = $kategori->fetch_assoc()) {
          echo "<a href='kategori.php?id={$kat['id']}' class='list-group-item'>{$kat['nama_kategori']}</a>";
        }
        ?>
        </ul>
      </div>
    </div>
    <div class="col-md-6">
      <?php
      $batas = 5;
      $hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
      $mulai = ($hal - 1) * $batas;
      $berita = $conn->query("SELECT * FROM berita ORDER BY tanggal DESC LIMIT $mulai, $batas");
      while($b = $berita->fetch_assoc()) {
        echo "<div class='card mb-4'>
                <img src='uploads/{$b['gambar']}' class='card-img-top'>
                <div class='card-body'>
                  <h5><a href='detail.php?slug={$b['slug']}'>{$b['judul']}</a></h5>
                  <small class='text-muted'>Dipublikasikan: {$b['tanggal']}</small>
                  <p class='mt-2'>".substr(strip_tags($b['isi']),0,150)."...</p>
                </div>
              </div>";
      }
      $total = $conn->query("SELECT COUNT(*) as total FROM berita")->fetch_assoc()['total'];
      $pages = ceil($total / $batas);
      echo "<nav><ul class='pagination'>";
      for($i=1;$i<=$pages;$i++){
        echo "<li class='page-item'><a class='page-link' href='?hal=$i'>$i</a></li>";
      }
      echo "</ul></nav>";
      ?>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header text-danger fw-bold">Hot News 🔥</div>
        <ul class="list-group list-group-flush">
        <?php
        $hot = $conn->query("SELECT * FROM berita ORDER BY tanggal DESC LIMIT 5");
        while($h = $hot->fetch_assoc()) {
          echo "<li class='list-group-item'>
                  <div class='d-flex'>
                    <img src='uploads/{$h['gambar']}' width='60' height='40' class='me-2 rounded'>
                    <div>
                      <a href='detail.php?slug={$h['slug']}' class='fw-semibold d-block'>{$h['judul']}</a>
                      <small class='text-muted'>{$h['tanggal']}</small>
                    </div>
                  </div>
                </li>";
        }
        ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php include 'inc/footer.php'; ?>