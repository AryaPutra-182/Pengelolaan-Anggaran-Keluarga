<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Family Registration</title>
    <link rel="stylesheet" href="css/register.css" />
  </head>
  <body>
    <div class="background-image">
      <div class="login-container">
        <h1>SMART FAMILY</h1>
        <h3>ATUR BUDGET KELUARGA ANDA</h3>
        <div class="login-box">
          <h2>Register</h2>
<<<<<<< HEAD
          <form>
            <input type="text" placeholder="USERNAME" required />
            <input type="email" placeholder="Email" required />
            <div class="password-container">
              <input type="password" placeholder="PASSWORD" required />
=======
          <form id="registerForm">
            <input type="text" id="username" placeholder="USERNAME" required />
            <input type="email" id="email" placeholder="Email" required />
            <div class="password-container">
              <input
                type="password"
                id="password"
                placeholder="PASSWORD"
                required
              />
>>>>>>> 11cfe0e (update terbaru)
              <span class="toggle-password"><i class="fas fa-eye"></i></span>
            </div>
            <button type="submit" class="create-account-btn">
              CREATE ACCOUNT
            </button>
          </form>
        </div>
      </div>
    </div>
<<<<<<< HEAD
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
=======

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
      // Fungsi untuk toggle visibility password
      document
        .querySelector(".toggle-password")
        .addEventListener("click", function () {
          const passwordInput = document.getElementById("password");
          const icon = this.querySelector("i");
          if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
          } else {
            passwordInput.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
          }
        });

      // Fungsi untuk handle form submission
      document
        .getElementById("registerForm")
        .addEventListener("submit", function (event) {
          event.preventDefault(); // Mencegah reload halaman

          // Ambil nilai input
          const username = document.getElementById("username").value;
          const email = document.getElementById("email").value;
          const password = document.getElementById("password").value;

          if (username && email && password) {
            // Simpan data pengguna di localStorage
            localStorage.setItem("username", username);
            localStorage.setItem("email", email);
            localStorage.setItem("password", password);

            alert("Account created successfully! Please login.");

            // Arahkan ke halaman login atau dashboard
            window.location.href = "login.html";
          } else {
            alert("Please fill in all fields.");
          }
        });
    </script>
>>>>>>> 11cfe0e (update terbaru)
  </body>
</html>
