<?php
include '../db/config.php';

// Hitung jumlah berita
$queryBerita = mysqli_query($conn, "SELECT COUNT(*) AS total_berita FROM berita");
$dataBerita = mysqli_fetch_assoc($queryBerita);
$totalBerita = $dataBerita['total_berita'];

// Hitung jumlah kategori
$queryKategori = mysqli_query($conn, "SELECT COUNT(*) AS total_kategori FROM kategori");
$dataKategori = mysqli_fetch_assoc($queryKategori);
$totalKategori = $dataKategori['total_kategori'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel - J-News</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      padding: 0;
    }

    .navbar {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
    }

    .navbar-brand {
      font-weight: 700;
      font-size: 1.8rem;
      background: linear-gradient(45deg, #ffffff, #e6f7ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    #sidebar {
      width: 250px;
      position: fixed;
      top: 56px; /* tinggi navbar */
      left: 0;
      bottom: 0;
      background-color: #007bff;
      color: white;
      padding-top: 1rem;
    }

    #sidebar .nav-link {
      color: white;
    }

    #sidebar .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    #main-content {
      margin-left: 250px;
      padding: 2rem;
      margin-top: 56px; /* tinggi navbar */
      background-color: #f8f9fa;
      min-height: 100vh;
    }

    footer {
      margin-left: 250px;
    }

    @media (max-width: 768px) {
      #sidebar {
        position: static;
        width: 100%;
      }

      #main-content {
        margin-left: 0;
        margin-top: 0;
      }

      footer {
        margin-left: 0;
      }
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-2">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <i class="fas fa-newspaper me-2"></i>J-News
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      
           <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href='../index.php'><i class="fas fa-home me-1"></i> Beranda</a>
          </li>
        </ul>
         
        </ul>
        <form class="d-flex" role="search">
          <div class="input-group">
            <span class="input-group-text bg-transparent text-white border-0"><i class="fas fa-search"></i></span>
            <input type="search" class="form-control border-0 bg-white rounded-end" placeholder="Cari berita...">
          </div>
        </form>
      </div>
    </div>
  </nav>

  <!-- Sidebar -->
  <div id="sidebar">
    <ul class="nav flex-column px-3">
      <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
      <li class="nav-item"><a class="nav-link" href="add_kategori.php">Tambah Kategori</a></li>
      <li class="nav-item"><a class="nav-link" href="add_berita.php">Tambah Berita</a></li>
      <li class="nav-item"><a class="nav-link" href="daftar_berita.php">Lihat Berita</a></li>
    
    
    </ul>
  </div>
<div id="main-content">
  <h2 class="mb-4"><i class="fas fa-tachometer-alt me-2 text-primary"></i>Dashboard</h2>
  <p class="lead">Selamat datang di <strong>Panel Admin J-News</strong>. Kelola berita dan kategori dengan mudah menggunakan menu di samping.</p>

  <!-- Statistik Otomatis -->
  <div class="row mt-4">
    <div class="col-md-6 col-lg-6 mb-4">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body d-flex align-items-center">
          <div class="me-3">
            <i class="fas fa-newspaper fa-2x text-primary"></i>
          </div>
          <div>
            <h5 class="card-title mb-1">Total Berita</h5>
            <p class="card-text fs-5 fw-bold"><?= $totalBerita ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-6 mb-4">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body d-flex align-items-center">
          <div class="me-3">
            <i class="fas fa-list-alt fa-2x text-success"></i>
          </div>
          <div>
            <h5 class="card-title mb-1">Total Kategori</h5>
            <p class="card-text fs-5 fw-bold"><?= $totalKategori ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Info Tambahan -->
  <div class="alert alert-info mt-4 shadow-sm">
    <i class="fas fa-info-circle me-2"></i>
    Jangan lupa untuk selalu mengecek berita terbaru dan memastikan semua kategori terkelola dengan baik.
  </div>
</div>

  <?php include '../inc/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>

