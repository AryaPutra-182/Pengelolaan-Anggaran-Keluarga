<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jumlah Tabungan</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- Sidebar copied from your existing structure -->
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
          <a href="tabungan.php" class="active">
            <i class="bx bx-money"></i>
            <span class="links_name">Jumlah Tabungan</span>
          </a>
        </li>
        <li>
          <a href="tambahkeluarga.php">
            <i class="bx bx-laugh"></i>
            <span class="links_name">Keluarga</span>
          </a>
        </li>
      </ul>
      <div class="login-button-container">
        <a href="login.php"><button class="login-button">Login</button></a>
      </div>
    </div>

    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
        </div>
        <div class="profile-details">
          <span class="admin_name">Profile</span>
        </div>
      </nav>

      <div class="home-content">
        <h1>Jumlah Tabungan Keluarga</h1>
        <div id="tabungan-info">
          <p>Total Tabungan: <span id="total-tabungan">Loading...</span></p>
          <button id="add-tabungan-btn">Tambah Tabungan</button>
        </div>
      </div>
    </section>

    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };

      function getTabungan() {
        const tabungan = localStorage.getItem("totalTabungan");
        return tabungan ? parseFloat(tabungan) : 0;
      }

      function setTabungan(amount) {
        localStorage.setItem("totalTabungan", amount);
      }

      document.addEventListener("DOMContentLoaded", function () {
        const totalTabunganElement = document.getElementById("total-tabungan");
        const addTabunganBtn = document.getElementById("add-tabungan-btn");
        totalTabunganElement.textContent = getTabungan();

        addTabunganBtn.addEventListener("click", function () {
          const newTabungan = prompt(
            "Masukkan jumlah tabungan yang ingin ditambahkan:"
          );
          if (newTabungan) {
            const currentTabungan = getTabungan();
            const updatedTabungan = currentTabungan + parseFloat(newTabungan);
            setTabungan(updatedTabungan);
            totalTabunganElement.textContent = updatedTabungan;
            alert("Tabungan berhasil ditambahkan!");
          }
        });
      });
    </script>
  </body>
</html>
