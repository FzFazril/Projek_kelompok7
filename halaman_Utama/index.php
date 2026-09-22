<?php
include "../config/koneksi.php";

$query = "SELECT * FROM buku";
$hasil = mysqli_query($koneksi, $query);
$data_buku = mysqli_fetch_all($hasil, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BacaGrid - Perpustakaan Digital</title>
  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../asett/style_lp.css">
</head>
<body>

  <!-- Top Navigation Bar -->
  <nav class="navbar">
    <div class="brand">
      <span class="brand-img"><i><img src="../asett/logo_Invers_horizontal.jpg" alt="logo" style="max-height: 40px; width: auto;"></i></span>
    </div>

    <ul class="nav-links">
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#petugas">Petugas</a></li>
      <li><a href="#aturan">Aturan</a></li>
      <li><a href="#katalog">Pilih Buku</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="../form_login/login.php" class="btn-login"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
    </ul>
  </nav>

  <!-- 1. HOME SECTION -->
  <section class="hero" id="home">
    <div class="hero-content">
      <span class="hero-badge"><i class="fa-solid fa-shield-halved"></i> Perpustakaan Digital BacaGrid</span>
      <h1>Jelajahi Ilmu, Temukan Inspirasi</h1>
      <p><strong>BacaGrid</strong> adalah ruang digital untuk menjelajahi berbagai koleksi buku dengan mudah. Temukan bacaan favoritmu, tambah wawasan, dan nikmati pengalaman membaca dalam satu tempat.</p>
      
      <form class="search-box" action="#katalog">
        <input type="text" placeholder="Cari judul buku, penulis, atau ISBN...">
        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
      </form>
    </div>
    
    <div class="hero-image">
      <img src="https://cdni.iconscout.com/illustration/premium/thumb/online-library-4438847-3684841.png" alt="Ilustrasi BacaGrid">
    </div>
  </section>

  <!-- 2. ABOUT SECTION -->
  <section id="about">
    <div class="section-title">
      <h2>Tentang BacaGrid</h2>
      <p>Mengenal sistem perpustakaan modern yang siap membantu literasi Anda</p>
    </div>
    <div class="about-container">
      <div class="about-text">
        <h3>Perpustakaan BacaGrid: Ruang Literasi Tanpa Batas</h3>
        <p><strong>Perpustakaan BacaGrid</strong> hadir sebagai pusat literasi modern yang dirancang untuk mempermudah akses informasi dan pengetahuan bagi semua orang. Mengusung konsep keterbukaan dan kemudahan akses, BacaGrid menyediakan ribuan koleksi buku digital, dokumen pengetahuan, hingga ruang baca fisik yang nyaman.</p>
        <p>Melalui platform yang terintegrasi, BacaGrid memungkinkan setiap pembaca menjelajahi berbagai genre—mulai dari sains, teknologi, pendidikan, hingga karya fiksi—kapan saja dan di mana saja. Kami percaya bahwa setiap lembar buku adalah langkah awal menuju wawasan yang lebih luas.</p>
      </div>
    </div>
  </section>

  <!-- 3. PETUGAS SECTION (BARU) -->
  <section id="petugas">
    <div class="section-title">
      <h2>Tim Petugas Perpustakaan</h2>
      <p>Petugas kami yang siap membantu segala kebutuhan literasi Anda</p>
    </div>
    <div class="petugas-grid">
      
      <div class="petugas-card">
        <div class="petugas-avatar">
          <i class="fa-solid fa-user-shield"></i>
        </div>
        <h3>Budi Santoso</h3>
        <span class="role">Kepala Perpustakaan</span>
        <p>Bertanggung jawab atas operasional dan pengembangan koleksi perpustakaan.</p>
      </div>

      <div class="petugas-card">
        <div class="petugas-avatar">
          <i class="fa-solid fa-user-gear"></i>
        </div>
        <h3>Siti Aminah</h3>
        <span class="role">Administrator Sistem</span>
        <p>Mengelola keanggotaan dan pembaruan data digital pada sistem BacaGrid.</p>
      </div>

      <div class="petugas-card">
        <div class="petugas-avatar">
          <i class="fa-solid fa-user-check"></i>
        </div>
        <h3>Rian Pratama</h3>
        <span class="role">Petugas Pelayanan</span>
        <p>Membantu proses sirkulasi peminjaman dan pengembalian buku fisik.</p>
      </div>

      <div class="petugas-card">
        <div class="petugas-avatar">
          <i class="fa-solid fa-user-astronaut"></i>
        </div>
        <h3>Dewi Lestari</h3>
        <span class="role">Pustakawan Referensi</span>
        <p>Siap membantu pencarian literatur dan karya ilmiah untuk kebutuhan riset.</p>
      </div>

    </div>
  </section>

  <!-- 4. ATURAN PERPUSTAKAAN SECTION -->
  <section id="aturan">
    <div class="section-title">
      <h2>Aturan Perpustakaan</h2>
      <p>Ketentuan yang wajib dipatuhi oleh seluruh anggota perpustakaan</p>
    </div>
    <div class="rules-grid">
      <div class="rule-card">
        <i class="fa-solid fa-id-card rule-icon"></i>
        <h3>Kartu Anggota</h3>
        <p>Wajib menunjukkan kartu anggota digital/fisik atau telah terdaftar dan login di portal BacaGrid saat transaksi peminjaman.</p>
      </div>
      <div class="rule-card">
        <i class="fa-solid fa-clock rule-icon"></i>
        <h3>Batas Waktu Peminjaman</h3>
        <p>Batas waktu peminjaman buku fisik maksimal 7 hari. Perpanjangan dapat dilakukan online melalui sistem sebelum jatuh tempo.</p>
      </div>
      <div class="rule-card">
        <i class="fa-solid fa-hand-holding-heart rule-icon"></i>
        <h3>Merawat Buku</h3>
        <p>Anggota bertanggung jawab penuh atas keutuhan buku. Dilarang mencoret, melipat, atau merusak fisik buku yang dipinjam.</p>
      </div>
      <div class="rule-card">
        <i class="fa-solid fa-triangle-exclamation rule-icon"></i>
        <h3>Denda Keterlambatan</h3>
        <p>Keterlambatan pengembalian akan dikenakan denda sesuai dengan ketentuan administratif yang berlaku pada sistem.</p>
      </div>
    </div>
  </section>

  <!-- 5. TEMPAT PILIH BUKU (KATALOG BUKU) -->
  <section id="katalog">
    <div class="section-title">
      <h2>Pilihan Buku Populer</h2>
      <p>Pilih buku yang ingin Anda baca atau pinjam</p>
    </div>
    <div class="book-grid">
      <?php if (!empty($data_buku)): ?>
        <?php foreach ($data_buku as $buku): ?>
          <div class="book-card">
          <div class="book-cover">
            <?php 
            // 1. Laluan fail secara fizikal di dalam pelayan (Server File System)
            $path_fizikal = __DIR__ . '/../asett/uploads/' . $buku['cover'];
            
            // 2. Laluan URL untuk paparan di pelayar web (Browser)
            $url_gambar = '../asett/uploads/' . $buku['cover'];
            ?>

            <?php if (!empty($buku['cover']) && file_exists($path_fizikal)): ?>
              <img src="<?= $url_gambar; ?>" alt="<?= htmlspecialchars($buku['judul_buku']); ?>" style="width: 100%; height: 220px; object-fit: cover; border-radius: 8px;">
            <?php else: ?>
              <!-- Paparan alternatif sekiranya imej tidak wujud dalam folder uploads -->
              <div style="height: 220px; display: flex; align-items: center; justify-content: center; background-color: #f0f0f0; border-radius: 8px;">
                <i class="fa-solid fa-book" style="font-size: 3rem; color: #ccc;"></i>
              </div>
            <?php endif; ?>
          </div>
            
            <div class="book-info">
              <div>
                <!-- Jika ada kolom kategori di DB bisa dipakai, jika tidak bisa disesuaikan/dihapus -->
                <span class="book-category"><?= htmlspecialchars($buku['penerbit']); ?></span>
                <h4 class="book-title"><?= htmlspecialchars($buku['judul_buku']); ?></h4>
                <p class="book-author">Oleh: <?= htmlspecialchars($buku['pengarang']); ?></p>
                <small>Stok: <?= $buku['stok']; ?></small>
              </div>
              <a href="dasboard.php" class="btn-pinjam"><i class="fa-solid fa-bookmark"></i> Pinjam Buku</a>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p style="text-align: center; width: 100%;">Belum ada buku yang tersedia.</p>
      <?php endif; ?>
    </div>
  </section>
  
  <!-- 6. CONTACT SECTION -->
  <section id="contact">
    <div class="section-title">
      <h2>Hubungi Kami</h2>
      <p>Punya pertanyaan atau butuh bantuan terkait layanan BacaGrid?</p>
    </div>
    <div class="contact-container">
      <div class="contact-info">
        <div class="contact-item">
          <i class="fa-solid fa-location-dot"></i>
          <div>
            <h4>Alamat</h4>
            <p style="color: var(--text-muted); font-size: 0.9rem;">Jl. Perpustakaan Utama No. 12, Indonesia</p>
          </div>
        </div>
        <div class="contact-item">
          <i class="fa-solid fa-envelope"></i>
          <div>
            <h4>Email</h4>
            <p style="color: var(--text-muted); font-size: 0.9rem;">support@bacagrid.ac.id</p>
          </div>
        </div>
        <div class="contact-item">
          <i class="fa-solid fa-phone"></i>
          <div>
            <h4>Telepon / WhatsApp</h4>
            <p style="color: var(--text-muted); font-size: 0.9rem;">+62 812-3456-7890</p>
          </div>
        </div>
      </div>

      <div class="contact-form">
        <form action="#" method="POST">
          <input type="text" placeholder="Nama Lengkap" required>
          <input type="email" placeholder="Email Anda" required>
          <textarea rows="4" placeholder="Pesan atau Pertanyaan Anda..." required></textarea>
          <button type="submit"><i class="fa-solid fa-paper-plane"></i> Kirim Pesan</button>
        </form>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2026 BacaGrid Perpustakaan Digital. Hak Cipta Dilindungi Undang-Undang.</p>
  </footer>

</body>
</html>