<?php
session_start();

if (!isset($_SESSION['username']) && isset($_COOKIE['remembered_username']) && $_COOKIE['remembered_username'] !== '') {
    $_SESSION['username'] = $_COOKIE['remembered_username'];
}

$isLoggedIn = isset($_SESSION['username']);
$displayUsername = $isLoggedIn ? htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') : 'Tamu';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Land Rover Rental - Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
      <img src="land-rover-logo-png_seeklogo-201638.png" width="50px" gap="30px"></i> Land Rover Rental</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-lg-center">
          <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="booking.html">Booking</a></li>
          <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
            <span class="nav-link text-white"><i class="bi bi-person-circle"></i> <?= $displayUsername; ?></span>
          </li>
          <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
            <button id="themeToggleBtn" class="btn btn-outline-light btn-sm" type="button">
              <i class="bi bi-moon-stars-fill"></i> Dark Mode
            </button>
          </li>
          <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
            <?php if ($isLoggedIn): ?>
              <a href="logout.php" class="btn btn-outline-light btn-sm" type="button">
                <i class="bi bi-box-arrow-right"></i> Logout
              </a>
            <?php else: ?>
              <a href="proses_login.php" class="btn btn-outline-light btn-sm" type="button">
                <i class="bi bi-box-arrow-in-right"></i> Login
              </a>
            <?php endif; ?>
          </li>
          <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
            <button id="wishlistNavBtn" class="btn btn-warning btn-sm position-relative" type="button" data-bs-toggle="modal" data-bs-target="#wishlistModal">
              <i class="bi bi-heart-fill"></i> Wishlist
              <span id="wishlistBadge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
            </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="hero-section py-5 d-flex align-items-center" style="background-image: url('hero-section.jpg'); background-size: cover; background-position: center; position: relative;">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.6); z-index: 1;"></div>
    <div class="container position-relative" style="z-index: 2;">
      <div class="row">
        <div class="col-lg-8 text-white">
          <h1 class="display-4 fw-bold">Sewa Land Rover <br>Untuk Petualangan Anda</h1>
          <p class="lead">Nikmati pengalaman berkendara mewah dan tangguh dengan armada Land Rover pilihan. Tersedia Range Rover, Discovery, Sport, dan Defender dari tahun 2005-2007.</p>
          <a href="booking.html" class="btn btn-primary btn-lg"><i class="bi bi-calendar-check"></i> Pesan Sekarang</a>
        </div>
      </div>
    </div>
  </section>

  <section class="product-section py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-5">Armada Kami <i class="bi bi-car-front-fill"></i></h2>
      <div class="row g-4">
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm" data-item-name="Range Rover 2005" data-stock="5">
            <img src="disco3.png" class="card-img-top" alt="Range Rover 2005">
            <div class="card-body">
              <h5 class="card-title">Range Rover 2005</h5>
              <p class="card-text">Kemewahan klasik dengan performa off-road mumpuni. Interior kulit, mesin V8.</p>
              <p class="mb-2 fw-semibold">Stok: <span class="stock-count">5</span> unit</p>
              <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <span class="h5 text-primary mb-0">Rp 1.500.000/hari</span>
                <button class="btn btn-sm btn-warning btn-stock-action" type="button">Sewa</button>
                <button class="btn btn-sm btn-outline-primary btn-wishlist" type="button">Tambah ke Wishlist</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm" data-item-name="Range Rover 2007" data-stock="4">
            <img src="discov3.png" class="card-img-top" alt="Range Rover 2007">
            <div class="card-body">
              <h5 class="card-title">Range Rover 2007</h5>
              <p class="card-text">Model facelift dengan teknologi lebih modern, tetap elegan dan tangguh.</p>
              <p class="mb-2 fw-semibold">Stok: <span class="stock-count">4</span> unit</p>
              <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <span class="h5 text-primary mb-0">Rp 1.700.000/hari</span>
                <button class="btn btn-sm btn-warning btn-stock-action" type="button">Sewa</button>
                <button class="btn btn-sm btn-outline-primary btn-wishlist" type="button">Tambah ke Wishlist</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm" data-item-name="Range Rover Sport 2005" data-stock="6">
            <img src="disco333.png" class="card-img-top" alt="Range Rover Sport 2005">
            <div class="card-body">
              <h5 class="card-title">Range Rover Sport 2005</h5>
              <p class="card-text">Dinamis dan sporty, cocok untuk perjalanan berkecepatan tinggi dengan gaya.</p>
              <p class="mb-2 fw-semibold">Stok: <span class="stock-count">6</span> unit</p>
              <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <span class="h5 text-primary mb-0">Rp 1.600.000/hari</span>
                <button class="btn btn-sm btn-warning btn-stock-action" type="button">Sewa</button>
                <button class="btn btn-sm btn-outline-primary btn-wishlist" type="button">Tambah ke Wishlist</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm" data-item-name="Discovery 3" data-stock="3">
            <img src="disco333333.png" class="card-img-top" alt="Discovery 3">
            <div class="card-body">
              <h5 class="card-title">Discovery 3</h5>
              <p class="card-text">Ruang lega, mampu membawa keluarga besar dengan kenyamanan terbaik.</p>
              <p class="mb-2 fw-semibold">Stok: <span class="stock-count">3</span> unit</p>
              <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <span class="h5 text-primary mb-0">Rp 1.400.000/hari</span>
                <button class="btn btn-sm btn-warning btn-stock-action" type="button">Sewa</button>
                <button class="btn btn-sm btn-outline-primary btn-wishlist" type="button">Tambah ke Wishlist</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm" data-item-name="Discovery 4" data-stock="4">
            <img src="discovery33.png" class="card-img-top" alt="Discovery 4">
            <div class="card-body">
              <h5 class="card-title">Discovery 4</h5>
              <p class="card-text">Perpaduan kemewahan dan teknologi canggih, siap menemani petualangan Anda.</p>
              <p class="mb-2 fw-semibold">Stok: <span class="stock-count">4</span> unit</p>
              <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <span class="h5 text-primary mb-0">Rp 1.800.000/hari</span>
                <button class="btn btn-sm btn-warning btn-stock-action" type="button">Sewa</button>
                <button class="btn btn-sm btn-outline-primary btn-wishlist" type="button">Tambah ke Wishlist</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm" data-item-name="Land Rover Defender 2007" data-stock="2">
            <img src="defender.png" class="card-img-top" alt="Land Rover Defender 2007">
            <div class="card-body">
              <h5 class="card-title">Land Rover Defender 2007</h5>
              <p class="card-text">Ikon off-road sejati, kokoh dan tangguh di segala medan. Pilihan tepat untuk petualangan ekstrem.</p>
              <p class="mb-2 fw-semibold">Stok: <span class="stock-count">2</span> unit</p>
              <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <span class="h5 text-primary mb-0">Rp 1.900.000/hari</span>
                <button class="btn btn-sm btn-warning btn-stock-action" type="button">Sewa</button>
                <button class="btn btn-sm btn-outline-primary btn-wishlist" type="button">Tambah ke Wishlist</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer bg-dark text-white py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h5><i class="bi bi-truck"></i> Land Rover Rental</h5>
          <p>Rental mobil khusus Land Rover terpercaya sejak 2005. Melayani petualangan dan bisnis Anda.</p>
        </div>
        <div class="col-md-3">
          <h5>Menu</h5>
          <ul class="list-unstyled">
            <li><a href="index.php" class="text-white text-decoration-none">Home</a></li>
            <li><a href="booking.html" class="text-white text-decoration-none">Booking</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Ikuti Kami</h5>
          <a href="#" class="text-white me-2"><i class="bi bi-facebook fs-4"></i></a>
          <a href="#" class="text-white me-2"><i class="bi bi-instagram fs-4"></i></a>
          <a href="#" class="text-white me-2"><i class="bi bi-twitter fs-4"></i></a>
        </div>
      </div>
      <hr class="bg-light">
      <p class="text-center mb-0">&copy; 2025 Land Rover Rental. All rights reserved.</p>
    </div>
  </footer>

  <div class="modal fade" id="wishlistModal" tabindex="-1" aria-labelledby="wishlistModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="wishlistModalLabel"><i class="bi bi-heart-fill text-danger"></i> Wishlist Anda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="wishlistEmptyText" class="text-muted mb-0">Wishlist masih kosong.</p>
          <ul id="wishlistItems" class="list-group"></ul>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>
</html>
