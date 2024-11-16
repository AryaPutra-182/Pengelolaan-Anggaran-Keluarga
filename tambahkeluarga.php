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
          <a href="dashboard.php" class="active">
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
          <a href="#">
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
        <div class="profile-details">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>S</div>
      </nav>

      <div class="home-content">
        <h1>Input Data Keluarga</h1>
        <form class="family-form">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input
              type="text"
              id="nama"
              name="nama"
              placeholder="Masukkan Nama"
              required
            />
          </div>

          <div class="form-group">
            <label for="tanggal-lahir">Tanggal Lahir</label>
            <input
              type="date"
              id="tanggal-lahir"
              name="tanggal-lahir"
              required
            />
          </div>

          <div class="form-group">
            <label for="hubungan">Hubungan Keluarga</label>
            <select id="hubungan" name="hubungan" required>
              <option value="" disabled selected>Pilih Hubungan</option>
              <option value="ayah">Ayah</option>
              <option value="ibu">Ibu</option>
              <option value="anak">Anak</option>
              <option value="kakak">Kakak</option>
              <option value="adik">Adik</option>
            </select>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea
              id="alamat"
              name="alamat"
              rows="3"
              placeholder="Masukkan Alamat"
              required
            ></textarea>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-simpan">Simpan Data</button>
          </div>
        </form>
        <div id="confirm-popup" class="popup-box" style="display: none;">
          <div class="popup-content">
            <p>Apakah Anda yakin ingin menyimpan data ini?</p>
            <button id="yes-button">Ya</button>
            <button id="no-button">Tidak</button>
          </div>
        </div>
        <h2>Data Keluarga</h2>
        <div id="family-data"></div>
      </div>

      <footer>Contact us +6241748178743</footer>
    </section>
    <div id="snackbar" style="visibility: hidden;">Data berhasil disimpan!</div>
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
    function showToast(message) {
      var x = document.getElementById("snackbar");
      x.textContent = message;
      x.style.visibility = "visible";
      setTimeout(function () {
        x.style.visibility = "hidden";
      }, 3000);
    }


    document.querySelector(".family-form").addEventListener("submit", function (event) {
      event.preventDefault();

   
      const confirmPopup = document.getElementById("confirm-popup");
      confirmPopup.style.display = "flex"; 

      document.getElementById("yes-button").onclick = function () {
        confirmPopup.style.display = "none"; 

        showToast("Data berhasil disimpan!");

        const nama = document.getElementById("nama").value;
        const tanggalLahir = document.getElementById("tanggal-lahir").value;
        const hubungan = document.getElementById("hubungan").value;
        const alamat = document.getElementById("alamat").value;

        const familyDataDiv = document.getElementById("family-data");
        const dataHTML = `
          <p><strong>Nama:</strong> ${nama}</p>
          <p><strong>Tanggal Lahir:</strong> ${tanggalLahir}</p>
          <p><strong>Hubungan:</strong> ${hubungan}</p>
          <p><strong>Alamat:</strong> ${alamat}</p>
          <hr>
        `;
        familyDataDiv.innerHTML += dataHTML;

        document.querySelector(".family-form").reset();
      };

      document.getElementById("no-button").onclick = function () {
        confirmPopup.style.display = "none"; 
      };
    });
  
   </script>
  </body>
</html>
