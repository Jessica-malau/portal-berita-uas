<?php include '../db/config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Portal-Berita Terkini</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
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
    .search-container {
      position: relative;
      width: 100%;
      max-width: 500px;
    }
    .search-input {
      padding-left: 40px;
      border-radius: 25px !important;
      border: 2px solid rgba(255,255,255,0.2);
      background-color: rgba(255,255,255,0.1);
      color: white;
      transition: all 0.4s ease;
      height: 45px;
    }
    .search-input::placeholder {
      color: rgba(255,255,255,0.7);
    }
    .search-input:focus {
      background-color: rgba(255,255,255,0.2);
      border-color: rgba(255,255,255,0.4);
      box-shadow: 0 0 0 0.25rem rgba(255,255,255,0.25);
      color: white;
    }
    .search-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: rgba(255,255,255,0.8);
      z-index: 4;
    }
    .search-btn {
      position: absolute;
      right: 5px;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(255,255,255,0.9);
      border: none;
      border-radius: 20px !important;
      width: 40px;
      height: 40px;
      color: #0d6efd;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
    }
    .search-btn:hover {
      background: white !important;
      transform: translateY(-50%) scale(1.05);
    }
    @media (max-width: 992px) {
      .navbar-brand {
        font-size: 1.5rem;
      }
      .search-container {
        margin-top: 10px;
      }
    }

    /* Styling untuk form tambah kategori */
    .card-header.bg-warning {
      background: linear-gradient(45deg, #f9d976, #f39f86);
      font-weight: 600;
      letter-spacing: 0.05em;
    }

    .btn-warning {
      background: #f39f86;
      border: none;
      transition: background-color 0.3s ease;
      font-weight: 600;
    }
    .btn-warning:hover {
      background: #d9775f;
      color: white;
    }

    /* Tabel kategori warna biru muda */
    table.table-kategori {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1.5rem;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      border-radius: 8px;
      overflow: hidden;
      font-size: 1rem;
    }
    table.table-kategori th,
    table.table-kategori td {
      padding: 12px 20px;
      border-bottom: 1px solid #d1d5db;
      text-align: left;
      transition: background-color 0.3s ease;
    }
    table.table-kategori th {
      background-color: #3b82f6;
      color: white;
      font-weight: 600;
      letter-spacing: 0.05em;
    }
    table.table-kategori tbody tr:hover {
      background-color: #bfdbfe;
    }

    /* Footer kecil */
    footer.footer {
      background: #0b5ed7;
      color: white;
      text-align: center;
      padding: 8px 0;
      font-size: 0.875rem;
      font-weight: 500;
      margin-top: auto; /* Supaya sticky bottom */
      box-shadow: 0 -2px 8px rgba(11, 94, 215, 0.4);
    }

    /* Body layout agar footer selalu bawah */
    body.d-flex {
      min-height: 100vh;
      flex-direction: column;
    }
    main.flex-grow-1 {
      flex-grow: 1;
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
        </ul>
        
        <form class="d-flex ms-lg-3 my-2 my-lg-0" action="search.php" method="GET">
          <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input class="form-control search-input" type="search" placeholder="Cari berita..." name="q" aria-label="Search" />
            <button class="btn search-btn" type="submit">
              <i class="fas fa-arrow-right"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </nav>

  <main class="flex-grow-1">
    <div class="container mt-4 mb-5">
      <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
          <h5 class="mb-0">Tambah Kategori</h5>
        </div>
        <div class="card-body">
          <form action="kategori_action.php" method="POST" id="formKategori">
            <div class="mb-3">
              <label for="nama_kategori" class="form-label">Nama Kategori</label>
              <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required placeholder="Masukkan nama kategori" />
            </div>
            <button type="submit" class="btn btn-warning">Simpan</button>
          </form>

          <!-- Contoh tabel kategori (jika ingin tampilkan daftar kategori) -->
          <table class="table-kategori mt-4">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
  <?php
  $no = 1;
  $query = mysqli_query($conn, "SELECT * FROM kategori ORDER BY id DESC");
  while ($row = mysqli_fetch_assoc($query)) :
  ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= htmlspecialchars($row['nama_kategori']); ?></td>
      <td>
        <a href="kategori_edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-primary me-2">
          <i class="fas fa-edit"></i>
        </a>
        <a href="kategori_hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
          <i class="fas fa-trash-alt"></i>
        </a>
      </td>
    </tr>
  <?php endwhile; ?>
</tbody>

          </table>
        </div>
      </div>
    </div>
  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

  <script>
    // Efek scroll navbar
    window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.style.padding = '8px 0';
        navbar.style.background = 'linear-gradient(135deg, #0b5ed7 0%, #084298 100%)';
      } else {
        navbar.style.padding = '15px 0';
        navbar.style.background = 'linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%)';
      }
    });

    // Animasi saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
      const navbarBrand = document.querySelector('.navbar-brand');
      const searchContainer = document.querySelector('.search-container');
      
      navbarBrand.style.opacity = '0';
      navbarBrand.style.transform = 'translateY(-20px)';
      searchContainer.style.opacity = '0';
      searchContainer.style.transform = 'translateY(20px)';
      
      setTimeout(() => {
        navbarBrand.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        navbarBrand.style.opacity = '1';
        navbarBrand.style.transform = 'translateY(0)';
        
        searchContainer.style.transition = 'opacity 0.5s ease 0.2s, transform 0.5s ease 0.2s';
        searchContainer.style.opacity = '1';
        searchContainer.style.transform = 'translateY(0)';
      }, 300);
    });
  </script>
  
  <?php include '../inc/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>



</body>
</html>
