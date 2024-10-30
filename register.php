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
          <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="USERNAME" required />
            <input type="email" name="email" placeholder="Email" required />
            <div class="password-container">
              <input type="password" name="password" placeholder="PASSWORD" required />
              <span class="toggle-password"><i class="fas fa-eye"></i></span>
            </div>
            <button type="submit" class="create-account-btn">
              CREATE ACCOUNT
            </button>
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
      document.querySelector('.toggle-password').addEventListener('click', function () {
        const passwordInput = document.querySelector('input[name="password"]');
        const passwordType = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', passwordType);
        this.querySelector('i').classList.toggle('fa-eye-slash');
      });
    </script>
  </body>
</html>
