<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $requestUsername = mysqli_real_escape_string($koneksi, $_POST['username']); // Mencegah SQL Injection
    $requestPassword = $_POST['password'];

    // Ambil data user berdasarkan username
    $sql = "SELECT user_id, username, password FROM tb_users WHERE username = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "s", $requestUsername);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($requestPassword, $row['password'])) {
            // Simpan data pengguna dalam sesi
            $_SESSION['user_id'] = $row['user_id']; // Simpan user_id
            $_SESSION['username'] = $row['username']; // Simpan username

            header('location:dashboard.php'); // Arahkan ke dashboard
            exit();
        } else {
            echo "<script>
                alert('Password Anda salah, silakan coba lagi.');
                window.location = 'login.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Username tidak ditemukan, silakan coba lagi.');
            window.location = 'login.php';
        </script>";
    }
}
?>
