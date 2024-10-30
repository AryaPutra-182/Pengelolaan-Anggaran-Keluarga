<?php
session_start();

// Dummy login validation (replace with your actual login logic)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Replace this check with your actual login validation logic
    if ($username === 'validUser' && $password === 'validPassword') {
        // Store user data in session variables
        $_SESSION['user_id'] = 1;
        $_SESSION['username'] = $username;

        // Set a custom cookie to greet the user
        setcookie("username", $username, time() + 3600, "/"); // Expires in 1 hour

        // Redirect to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid login credentials!";
    }
}
?>


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
            <div class="login-box">
                <form action="login.php" method="POST">
                    <input type="text" name="username" placeholder="USERNAME" required>
                    <input type="password" name="password" placeholder="PASSWORD" required>
                    <button type="submit" class="login-btn">Login</button>
                </form>
                
                <!-- Display error message if credentials are incorrect -->
                <?php if (!empty($errorMessage)): ?>
                    <p style="color:red;"><?php echo $errorMessage; ?></p>
                <?php endif; ?>
                
                <a href="register.php" class="create-account">CREATE ACCOUNT</a>
            </div>
        </div>
    </div>
</body>
</html>
