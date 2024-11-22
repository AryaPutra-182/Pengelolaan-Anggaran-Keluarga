<?php
session_start();
include 'koneksi.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Cek apakah ada permintaan untuk menghapus data
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM tb_pemasukan WHERE id_pemasukan = ?";
    $stmt = mysqli_prepare($koneksi, $delete_sql);
    mysqli_stmt_bind_param($stmt, "i", $delete_id);
    
    if (mysqli_stmt_execute($stmt)) {
        // Berhasil dihapus, redirect ke halaman yang sama untuk memuat ulang data
        header("Location: jumlahPemasukan.php");
        exit();
    } else {
        echo "Error dalam penghapusan: " . mysqli_error($koneksi);
    }
}

// Ambil semua data pemasukan dari `tb_pemasukan` tanpa filter pengguna
$sql = "SELECT * FROM tb_pemasukan";
$result = mysqli_query($koneksi, $sql);

if (!$result) {
    die("Error dalam query: " . mysqli_error($koneksi));
}

$pemasukanList = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemasukan Bulan Ini</title>
    <link rel="stylesheet" href="css/management.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-home-smile"></i>
            <span class="logo_name">SmartFamily</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php">
                    <i class="bx bx-home-alt"></i>
                    <span class="links_name">Home</span>
                </a>
            </li>
            <li>
                <a href="content.php">
                    <i class="bx bx-bar-chart-alt-2"></i>
                    <span class="links_name">Managemen</span>
                </a>
            </li>
            <li>
                <a href="jumlahPemasukan.php" class="active">
                    <i class="bx bx-money"></i>
                    <span class="links_name">Pemasukan Bulan Ini</span>
                </a>
            </li>
            <li>
                <a href="tambahkeluarga.php">
                    <i class="bx bx-laugh"></i>
                    <span class="links_name">Keluarga</span>
                </a>
            </li>
        </ul>
        <div class="logout-button-container">
            <a href="logout.php"><button class="logout-button">Logout</button></a>
        </div>
    </div>

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
            </div>
            <div class="profile-details">
                <span class="admin_name">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            </div>
        </nav>

        <div class="home-content">
            <h1>Pemasukan Bulan Ini</h1>
            <a href="tambahPemasukan.php" class="btn">Tambah Pemasukan</a>

            <h2>Daftar Pemasukan:</h2>
            <table border="1" class="tabel" cellpadding="10" cellspacing="0">
                <tr>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Sumber</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($pemasukanList as $pemasukan): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($pemasukan['date']); ?></td>
                        <td><?php echo htmlspecialchars($pemasukan['jumlah_pemasukan']); ?></td>
                        <td><?php echo htmlspecialchars($pemasukan['asal_dana']); ?></td>
                        <td >
               <a  href="editPemasukan.php?id=<?php echo $pemasukan['id_pemasukan']; ?>">      <button class="button-modif">Edit</button></a>
                    <a  href="jumlahPemasukan.php?delete_id=<?php echo $pemasukan['id_pemasukan']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"> <button class="button-modif delete-btn">Hapus</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function () {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else {
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        };
    </script>
</body>
</html>
