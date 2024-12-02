<?php
if (isset($_POST['email']) && isset($_POST['password'])) {
    include "validation.php";
    include "db_connect.php";

    $email = $_POST['email'];
    $password = $_POST['password'];
    $location = "../login.php";
    $ms = "error";

    // Check if email is empty
    if (is_empty($email, "email", $location, $ms, "")) {
        exit;
    }

    // Check if password is empty
    if (is_empty($password, "password", $location, $ms, "")) {
        exit;
    }

    $sql = "SELECT * FROM Admin WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email); // Bind the email parameter as a string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            echo "Login successful!";
            // You can set session variables here
            // session_start();
            // $_SESSION['email'] = $email;
            // Redirect to a protected page
            // header("Location: protected_page.php");
        } else {
            echo "Invalid password!";
            // Redirect to login page with error
            header("Location: ../login.php?error=Invalid password");
            exit;
        }
    } else {
        echo "Email not found!";
        // Redirect to login page with error
        header("Location: ../login.php?error=Email not found");
        exit;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
