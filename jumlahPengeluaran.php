<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM tb_pengeluaran WHERE id_pengeluaran = ?";
    $stmt = mysqli_prepare($koneksi, $delete_sql);
    mysqli_stmt_bind_param($stmt, "i", $delete_id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: jumlahPengeluaran.php");
        exit();
    } else {
        echo "Error dalam penghapusan: " . mysqli_error($koneksi);
    }
}

$sql = "SELECT * FROM tb_pengeluaran";
$result = mysqli_query($koneksi, $sql);

if (!$result) {
    die("Error dalam query: " . mysqli_error($koneksi));
}

$pengeluaranList = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengeluaran Bulan Ini</title>
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
                <a href="jumlahPengeluaran.php" class="active">
                    <i class="bx bx-money"></i>
                    <span class="links_name">Pengeluaran Bulan Ini</span>
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
        <a href="pengeluaran-cetak.php" class="btn">Cetak Pengeluaran</a>
            <h1>Pengeluaran Bulan Ini</h1>
            <a href="tambahPengeluaran.php" class="btn">Tambah Pengeluaran</a>

            <h2>Daftar Pengeluaran:</h2>
            <table border="1" class="tabel" cellpadding="10" cellspacing="0">
                <tr>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Kegunaan</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($pengeluaranList as $pengeluaran): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($pengeluaran['tanggal']); ?></td>
                        <td><?php echo htmlspecialchars($pengeluaran['pengeluaran']); ?></td>
                        <td><?php echo htmlspecialchars($pengeluaran['kegunaan']); ?></td>
                        <td>
                           <a href="editPengeluaran.php?id=<?php echo $pengeluaran['id_pengeluaran']; ?>">      <button class="button-modif">Edit</button></a> 
                  <a href="jumlahPengeluaran.php?delete_id=<?php echo $pengeluaran['id_pengeluaran']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"> <button class="button-modif delete-btn">Hapus</button></a>
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
