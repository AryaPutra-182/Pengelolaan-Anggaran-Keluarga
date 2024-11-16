<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Family Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="background-image">
        <div class="login-container">
            <h1>SMART FAMILY</h1>
            <h3>ATUR BUDGET KELUARGA ANDA</h3>
            <main>
        <div class="center">
          <div class="login-box">
            <h3>Login</h3>
            <form action="login-proses.php" method="post">
              <input
                class="input"
                type="text"
                name="username"
                placeholder="Username"
              />
              <input
                class="input"
                type="password"
                name="password"
                placeholder="Password"
              />
              <button type="submit" class="btn_login" name="login" id="login">
                Login
              </button>
            </form>
            <a href="register.php" class="link-register"> Register Disini</a>
          </div>
        </div>
      </main>
        </div>
    </div>
</body>
</html>
