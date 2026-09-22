<?php
session_start();

$error = "";

// Jika form di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['pw'];

    // 1. Pengecekan Khusus Admin
    if ($username === "admin" && $password === "admin123") {
        $_SESSION['role'] = 'admin';
        header("Location:../halaman_dasboard/dasboard.php");
        exit();
    } 
    // 2. Pengecekan Peminjam (Atau User Lainnya)
    else if ($username === "peminjam" && $password === "12345") {
        $_SESSION['role'] = 'peminjam';
        header("Location: ../halaman_Utama/index.php");
        exit();
    } 
    // 3. Jika Username / Password Salah
    else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sederhana</title>
</head>
<body>
    <h2>Form Login</h2>
    
    <?php if ($error): ?>
        <p style="color: red;"><?= $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <div>
            <label>Username:</label><br>
            <input type="text" name="username" required>
        </div>
        <br>
        <div>
            <label>Password:</label><br>
            <input type="password" name="pw" required>
        </div>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>