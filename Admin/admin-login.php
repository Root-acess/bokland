<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_id = 'admin'; // Change to a secure value
    $admin_password = 'password123';

    if ($_POST['email'] === $admin_id && $_POST['password'] === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: ./");
        exit();
    } else {
        $error_message = "Invalid Email or Password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/style3.css">
</head>
<body>
    <div class="container">
        <div class="top"></div>
        <div class="bottom"></div>
        <div class="center">
            <h2>Welcome back! Admin</h2>
            <?php if (isset($error_message)): ?>
                <div class="error"><?= htmlspecialchars($error_message) ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <input type="text" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <div class="container-button">
                    <button type="submit">Sign In</button>
                </div>
            </form>
            <h2>&nbsp;</h2>
        </div>
    </div>
</body>
</html>
