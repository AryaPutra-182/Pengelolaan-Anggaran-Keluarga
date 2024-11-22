<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id_pengeluaran = $_GET['id'];
    $sql = "SELECT * FROM tb_pengeluaran WHERE id_pengeluaran = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_pengeluaran);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $pengeluaranData = mysqli_fetch_assoc($result);

    if (!$pengeluaranData) {
        echo "Data tidak ditemukan!";
        exit();
    }
} else {
    header("Location: jumlahPengeluaran.php");
    exit();
}

// Proses update data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggal = $_POST['tanggal'];
    $pengeluaran = $_POST['pengeluaran'];
    $kegunaan = $_POST['kegunaan'];

    $update_sql = "UPDATE tb_pengeluaran SET tanggal = ?, pengeluaran = ?, kegunaan = ? WHERE id_pengeluaran = ?";
    $stmt = mysqli_prepare($koneksi, $update_sql);
    mysqli_stmt_bind_param($stmt, "sisi", $tanggal, $pengeluaran, $kegunaan, $id_pengeluaran);

    if (mysqli_stmt_execute($stmt)) {
        // Redirect ke halaman pengeluaran
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
    <title>Edit Pengeluaran</title>
    <link rel="stylesheet" href="css/entry.css">
</head>
<body>
        <h1>Edit Pengeluaran</h1>
        <form method="POST" action="editPengeluaran.php?id=<?php echo $id_pengeluaran; ?>">
            <div class = "form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" value="<?php echo htmlspecialchars($pengeluaranData['tanggal']); ?>" required>
            </div>
            <div class = "form-group">
            <label for="pengeluaran">Jumlah Pengeluaran:</label>
            <input type="number" id="pengeluaran" name="pengeluaran" value="<?php echo htmlspecialchars($pengeluaranData['pengeluaran']); ?>" required>
            </div>
            <div class = "form-group">
            <label for="kegunaan">Kegunaan:</label>
            <input type="text" id="kegunaan" name="kegunaan" value="<?php echo htmlspecialchars($pengeluaranData['kegunaan']); ?>" required>
</div>
            <button type="submit" class="btn">Update</button>
            <a href="jumlahPengeluaran.php" class="btn">Kembali</a>
        </form>
</body>
</html>
