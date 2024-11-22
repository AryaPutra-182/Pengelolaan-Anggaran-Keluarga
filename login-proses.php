<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $requestUsername = $_POST['username'];
    $requestPassword = $_POST['password'];

    $sql = "SELECT * FROM tb_users WHERE username = '$requestUsername'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($requestPassword, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            header('location:dashboard.php');
            exit();
        } else {
            echo "<script>
                alert('Email atau password Anda salah, Silahkan coba lagi');
                window.location = 'login.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Email atau password Anda salah, Silahkan coba lagi');
            window.location = 'login.php';
        </script>";
    }
}





?>
