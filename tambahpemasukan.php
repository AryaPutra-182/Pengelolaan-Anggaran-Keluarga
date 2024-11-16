<?php
session_start();
include 'koneksi.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Proses penyimpanan data pemasukan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $jumlah = $_POST['jumlah'];
    $sumber = $_POST['sumber'];

    // Query untuk memasukkan data tanpa kolom `username`
    $sql = "INSERT INTO tb_pemasukan (date, jumlah_pemasukan, asal_dana) 
            VALUES ('$tanggal', '$jumlah', '$sumber')";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Pemasukan berhasil disimpan!'); window.location='jumlahPemasukan.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menyimpan data: " . mysqli_error($koneksi) . "');</script>";
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
