<?php
session_start();
include "../config/koneksi.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, trim($_POST['username']));
    $password = mysqli_real_escape_string($koneksi, $_POST['pw']);

    // Cek username dan password langsung ke tabel admin
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $hasil = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($hasil) > 0) {
        $data_admin = mysqli_fetch_assoc($hasil);

        // Simpan status login di session
        $_SESSION['status_login'] = true;
        $_SESSION['id_admin']     = $data_admin['id_admin'];
        $_SESSION['nama_admin']   = $data_admin['nama_admin'];
        $_SESSION['role']         = 'admin';

        header("Location: ../halaman_dasboard/dasboard.php");
        exit();
    } else {
        $error = "Username atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Petugas - BacaGrid</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Link CSS Form Login -->
    <link rel="stylesheet" href="../asett/login.css?v=2">
    <!--animasi AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body>

    <div class="login-card" data-aos="fade-up">
        <div class="login-header">
            <img src="../asett/logo_Invers_horizontal.jpg" alt="BacaGrid Logo" class="login-logo">
        </div>

        <?php if ($error): ?>
            <div class="alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span><?= htmlspecialchars($error); ?></span>
            </div>
        <?php endif; ?>

        <form method="POST" action="" class="login-form">
            <div class="form-group">
                <label for="username"><i class="fa-solid fa-user"></i> Username</label>
                <div class="input-wrapper">
                    <input type="text" id="username" name="username" placeholder="Masukkan username" required autocomplete="off">
                </div>
            </div>

            <div class="form-group">
                <label for="pw"><i class="fa-solid fa-lock"></i> Password</label>
                <div class="input-wrapper">
                    <input type="password" id="pw" name="pw" placeholder="Masukkan password" required>
                </div>
            </div>

            <button type="submit" class="btn-login-submit">
                <i class="fa-solid fa-right-to-bracket"></i> Masuk ke Dashboard
            </button>
        </form>

        <div class="login-footer">
            <a href="../halaman_Utama/index.php"><i class="fa-solid fa-arrow-left"></i> Kembali ke Halaman Utama</a>
        </div>
    </div>
<script>
    AOS.init({
        duration: 1000,
        once: true
    })
</script>
</body>
</html>