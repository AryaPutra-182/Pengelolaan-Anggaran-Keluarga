<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SmartFamily Dashboard</title>
    <link rel="icon" href="assets/icon.png" />
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bx-home-smile"></i>
        <span class="logo_name">SmartFamily</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php" class="active">
            <i class="bx bx-home-alt"></i>
            <span class="links_name">Home</span>
          </a>
        </li>
        <li>
          <a href="#">
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
        <h1>SMART FAMILY</h1>
        <div class="finance-buttons">
          <button
            class="btn"
            onclick="window.location.href='jumlahTabungan.php'"
          >
            Jumlah Tabungan
          </button>

          <button
            class="btn"
            onclick="window.location.href='jumlahPemasukan.php'"
          >
            Pemasukan Bulan Ini
          </button>

          <button
            class="btn"
            onclick="window.location.href='jumlahPengeluaran.php'"
          >
            Penegeluaran Bulan Ini
          </button>
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