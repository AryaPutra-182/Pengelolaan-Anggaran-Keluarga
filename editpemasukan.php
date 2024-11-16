<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Dapatkan data pemasukan berdasarkan ID
if (isset($_GET['id'])) {
    $id_pemasukan = $_GET['id'];
    $sql = "SELECT * FROM tb_pemasukan WHERE id_pemasukan='$id_pemasukan'";
    $result = mysqli_query($koneksi, $sql);
    $pemasukan = mysqli_fetch_assoc($result);

    if (!$pemasukan) {
        echo "<script>alert('Data tidak ditemukan.'); window.location='jumlahPemasukan.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID tidak ditemukan.'); window.location='jumlahPemasukan.php';</script>";
    exit();
}

// Proses update data pemasukan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $jumlah = $_POST['jumlah'];
    $sumber = $_POST['sumber'];

    $sql = "UPDATE tb_pemasukan SET date='$tanggal', jumlah_pemasukan='$jumlah', asal_dana='$sumber' 
            WHERE id_pemasukan='$id_pemasukan'";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Pemasukan berhasil diperbarui!'); window.location='jumlahPemasukan.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat memperbarui data.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pemasukan</title>
    <link rel="stylesheet" href="css/entry.css">
</head>
<body>
    <h1>Edit Pemasukan</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="tanggal">Tanggal Pemasukan:</label>
            <input type="date" id="tanggal" name="tanggal" value="<?php echo htmlspecialchars($pemasukan['date']); ?>" required />
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah Pemasukan (Rp):</label>
            <input type="number" id="jumlah" name="jumlah" value="<?php echo htmlspecialchars($pemasukan['jumlah_pemasukan']); ?>" required />
        </div>
        <div class="form-group">
            <label for="sumber">Sumber Pemasukan:</label>
            <input type="text" id="sumber" name="sumber" value="<?php echo htmlspecialchars($pemasukan['asal_dana']); ?>" required />
        </div>
        <button type="submit" class="btn">Perbarui</button>
        <a href="jumlahPemasukan.php" class="btn">Kembali</a>
    </form>
</body>
</html>
