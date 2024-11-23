<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username']) || !isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $jumlah = $_POST['jumlah'];
    $sumber = $_POST['sumber'];
    $user_id = $_SESSION['user_id']; // Ambil user_id dari sesi

    $sql = "INSERT INTO tb_pemasukan (date, jumlah_pemasukan, asal_dana, user_id) 
            VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sisi", $tanggal, $jumlah, $sumber, $user_id);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Pemasukan berhasil disimpan!'); window.location='jumlahPemasukan.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat menyimpan data: " . mysqli_error($koneksi) . "');</script>";
        }
    } else {
        echo "<script>alert('Gagal menyiapkan statement: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pemasukan</title>
    <link rel="stylesheet" href="css/entry.css">
</head>
<body>
    <h1>Tambah Pemasukan</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="tanggal">Tanggal Pemasukan:</label>
            <input type="date" id="tanggal" name="tanggal" required />
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah Pemasukan (Rp):</label>
            <input type="number" id="jumlah" name="jumlah" required />
        </div>
        <div class="form-group">
            <label for="sumber">Sumber Pemasukan:</label>
            <input type="text" id="sumber" name="sumber" required />
        </div>
        <button type="submit" class="btn">Simpan</button>
        <a href="jumlahPemasukan.php" class="btn">Kembali</a>
    </form>
</body>
</html>
