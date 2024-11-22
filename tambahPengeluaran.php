<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggal = $_POST['tanggal'];
    $pengeluaran = $_POST['pengeluaran'];
    $kegunaan = $_POST['kegunaan'];

    $sql = "INSERT INTO tb_pengeluaran (tanggal, pengeluaran, kegunaan) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "sis", $tanggal, $pengeluaran, $kegunaan);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: jumlahPengeluaran.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengeluaran</title>
    <link rel="stylesheet" href="css/entry.css">
</head>
<body>
        <h1>Tambah Pengeluaran</h1>
        <form method="POST" action="tambahPengeluaran.php">
            <div class = "form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" required>
            </div>
            <div class = "form-group">
            <label for="pengeluaran">Jumlah Pengeluaran:</label>
            <input type="number" id="pengeluaran" name="pengeluaran" required>
            </div>
            <div class = "form-group">
            <label for="kegunaan">Kegunaan:</label>
            <input type="text" id="kegunaan" name="kegunaan" required>
            </div>

            <button type="submit" class="btn">Simpan</button>
            <a href="jumlahPengeluaran.php" class="btn">Kembali</a>
        </form>
       
    </div>
</body>
</html>
