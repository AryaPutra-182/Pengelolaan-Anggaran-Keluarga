<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="assets/icon.png" />
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Family</title>
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
            <span class="links_name">Managemen</span>
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
        <a href="login.php">
          <button class="login-button">Login</button>
        </a>
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
        <h1>SMART <span>FAMILY</span></h1>
        <p>Atur anggaran keluarga anda</p>
        <div class="image-group">
          <img src="image/family1.jpg" alt="" />
          <img src="image/family2.jpg" alt="" />
          <img src="image/family3.jpg" alt="" />
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
      document.addEventListener("DOMContentLoaded", function () {
        const username = localStorage.getItem("username");
        if (username) {
          document.querySelector(".admin_name").textContent =
            "Welcome, " + username;
        }
      });
    </script>
  </body>
</html>