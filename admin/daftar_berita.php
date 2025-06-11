<?php include '../db/config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar Berita - Portal Berita</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    /* kamu bisa pakai style navbar dan footer yang sama seperti add_berita.php */
    .navbar {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
    }
    .navbar-brand {
      font-weight: 700;
      font-size: 1.8rem;
      background: linear-gradient(45deg, #ffffff, #e6f7ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      transition: all 0.3s ease;
      text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .footer-primary {
      background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
      color: white;
      padding-top: 2rem;
      padding-bottom: 1rem;
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark py-3">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <i class="fas fa-newspaper me-2"></i>J-News
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="dashboard.php"><i class="fas fa-home me-1"></i> Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="add_berita.php"><i class="fas fa-plus me-1"></i> Tambah Berita</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4 mb-4">
  <h3>Daftar Berita</h3>
  <table class="table table-striped table-bordered align-middle">
    <thead class="table-primary">
      <tr>
        <th>#</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Tanggal</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT berita.id, berita.judul, berita.tanggal, berita.gambar, kategori.nama_kategori 
              FROM berita 
              LEFT JOIN kategori ON berita.id_kategori = kategori.id
              ORDER BY berita.tanggal DESC";
      $result = $conn->query($sql);
      $no = 1;
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $no++ . "</td>";
              echo "<td>" . htmlspecialchars($row['judul']) . "</td>";
              echo "<td>" . htmlspecialchars($row['nama_kategori']) . "</td>";
             echo "<td>" . (!empty($row['tanggal']) ? date('d M Y H:i', strtotime($row['tanggal'])) : '-') . "</td>";
              echo "<td><img src='../uploads/" . htmlspecialchars($row['gambar']) . "' alt='gambar' style='width:100px; height:auto;'></td>";
              echo "<td>
                      <a href='edit_berita.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning me-1'>
                        <i class='fas fa-edit'></i> Edit
                      </a>
                      <a href='hapus_berita.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger' 
                         onclick='return confirm(\"Yakin ingin hapus berita ini?\")'>
                        <i class='fas fa-trash'></i> Hapus
                      </a>
                    </td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='6' class='text-center'>Belum ada berita.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<?php include '../inc/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>
