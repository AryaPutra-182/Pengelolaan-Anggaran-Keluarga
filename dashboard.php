<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php'; 

$user_id = $_SESSION['user_id'];

// Query Total Pemasukan
$query_pemasukan = "SELECT SUM(jumlah_pemasukan) AS total_pemasukan FROM tb_pemasukan WHERE user_id = ?";
$stmt_pemasukan = mysqli_prepare($koneksi, $query_pemasukan);
mysqli_stmt_bind_param($stmt_pemasukan, "i", $user_id);
mysqli_stmt_execute($stmt_pemasukan);
$result_pemasukan = mysqli_stmt_get_result($stmt_pemasukan);
$total_pemasukan = mysqli_fetch_assoc($result_pemasukan)['total_pemasukan'] ?? 0;

// Query Total Pengeluaran
$query_pengeluaran = "SELECT SUM(pengeluaran) AS total_pengeluaran FROM tb_pengeluaran WHERE user_id = ?";
$stmt_pengeluaran = mysqli_prepare($koneksi, $query_pengeluaran);
mysqli_stmt_bind_param($stmt_pengeluaran, "i", $user_id);
mysqli_stmt_execute($stmt_pengeluaran);
$result_pengeluaran = mysqli_stmt_get_result($stmt_pengeluaran);
$total_pengeluaran = mysqli_fetch_assoc($result_pengeluaran)['total_pengeluaran'] ?? 0;

// Hitung Saldo
$saldo = $total_pemasukan - $total_pengeluaran;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="assets/icon.png" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Family Dashboard</title>
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bx-home-smile"></i>
        <span class="logo_name">SmartFamily</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class="bx bx-home-alt"></i>
            <span class="links_name">Home</span>
          </a>
        </li>
        <li>
          <a href="content.php">
            <i class="bx bx-bar-chart-alt-2"></i>
            <span class="links_name">Management</span>
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
        <a href="logout.php">
          <button class="logout-button">Logout</button>
        </a>
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
        <h1>SMART <span>FAMILY</span></h1>
        <p>Manage your family's budget</p>

        <div class="widgets">
          <div class="widget pemasukan">
            <h3>Total Pemasukan</h3>
            <p>Rp <?php echo number_format($total_pemasukan, 0, ',', '.'); ?></p>
          </div>
          <div class="widget pengeluaran">
            <h3>Total Pengeluaran</h3>
            <p>Rp <?php echo number_format($total_pengeluaran, 0, ',', '.'); ?></p>
          </div>
          <div class="widget saldo">
            <h3>Saldo</h3>
            <p>Rp <?php echo number_format($saldo, 0, ',', '.'); ?></p>
          </div>
        </div>
      </div>
      <footer>Contact us +6241748178743</footer>
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
