<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Family Login</title>
    <link rel="stylesheet" href="css/login.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
  </head>
  <body>
    <div class="background-image">
      <div class="login-container">
        <h1>SMART FAMILY</h1>
        <h3>ATUR BUDGET KELUARGA ANDA</h3>
        <div class="login-box">
          <form id="loginForm">
            <input type="text" placeholder="USERNAME" required />
            <input type="password" placeholder="PASSWORD" required />
            <button type="submit" class="login-btn">Login</button>
          </form>

          <a href="register.php" class="create-account">CREATE ACCOUNT</a>
        </div>
      </div>
    </div>

    <script>
      document
        .querySelector(".login-btn")
        .addEventListener("click", function (event) {
          event.preventDefault();
          const username = document.querySelector('input[type="text"]').value;
          const password = document.querySelector(
            'input[type="password"]'
          ).value;

          // Simulasi login berhasil
          if (username && password) {
            localStorage.setItem("username", username);
            alert("Login successful! Welcome, " + username);

            // Arahkan ke halaman dashboard.html
            window.location.href = "dashboard.php";
          } else {
            alert("Please enter valid username and password.");
          }
        });
    </script>
  </body>
</html>
