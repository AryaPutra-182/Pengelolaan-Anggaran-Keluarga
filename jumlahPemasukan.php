<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemasukan Bulan Ini</title>
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
          <a href="pemasukan.php" class="active">
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
        <h1>Pemasukan Bulan Ini</h1>
        <form id="income-form">
          <div class="form-group">
            <label for="tanggal">Tanggal Pemasukan:</label>
            <input type="date" id="tanggal" required />
          </div>

          <div class="form-group">
            <label for="jumlah">Jumlah Pemasukan (Rp):</label>
            <input type="number" id="jumlah" required />
          </div>

          <div class="form-group">
            <label for="sumber">Sumber Pemasukan:</label>
            <input
              type="text"
              id="sumber"
              placeholder="Contoh: Gaji, bisnis, dll."
              required
            />
          </div>

          <button type="submit" class="btn">Simpan Pemasukan</button>
        </form>

        <h2>Daftar Pemasukan:</h2>
        <ul id="income-list"></ul>
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

      function getIncomes() {
        const incomes = localStorage.getItem("incomes");
        return incomes ? JSON.parse(incomes) : [];
      }

      function saveIncomes(incomes) {
        localStorage.setItem("incomes", JSON.stringify(incomes));
      }

      function renderIncomes() {
        const incomeList = document.getElementById("income-list");
        const incomes = getIncomes();

        incomeList.innerHTML = ""; // Clear the list
        incomes.forEach((income, index) => {
          const listItem = document.createElement("li");
          listItem.textContent = `${income.tanggal}: Rp${income.jumlah} - ${income.sumber}`;
          incomeList.appendChild(listItem);
        });
      }

      document
        .getElementById("income-form")
        .addEventListener("submit", function (event) {
          event.preventDefault(); // Prevent form from refreshing the page

          const tanggal = document.getElementById("tanggal").value;
          const jumlah = document.getElementById("jumlah").value;
          const sumber = document.getElementById("sumber").value;

          const incomes = getIncomes();

          // Add new income
          incomes.push({ tanggal, jumlah, sumber });

          saveIncomes(incomes);

          renderIncomes();

          document.getElementById("income-form").reset();

          alert("Pemasukan berhasil disimpan!");
        });

      document.addEventListener("DOMContentLoaded", function () {
        renderIncomes();
      });
    </script>
  </body>
</html>