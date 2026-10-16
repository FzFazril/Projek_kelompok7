<?php
session_start();
include "../config/koneksi.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['pw'];

    // Menggunakan Prepared Statement untuk mencegah SQL Injection
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM admin WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Cek apakah password input cocok dengan hash di database
        if (password_verify($password, $row['password'])) {
            $_SESSION['status_login'] = true;
            $_SESSION['id_admin']     = $row['id_admin'];
            $_SESSION['nama_admin']   = $row['nama_admin'];
            $_SESSION['role']         = 'admin';

            header("Location: ../halaman_dasboard/dasboard.php");
            exit();
        } else {
            $error = "Username atau Password salah!";
        }
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