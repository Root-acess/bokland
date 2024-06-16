<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>bokland</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jacquard+24&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .alert {
            margin-top: 20px;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    include ("db_connect.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $otp = $_POST['otp'];

        // Validate form data
        if (empty($fullname) || empty($email) || empty($password) || empty($confirm_password) || empty($otp)) {
            echo "<div class='alert alert-danger'>All fields are required.</div>";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<div class='alert alert-danger'>Invalid email format.</div>";
        } elseif ($password !== $confirm_password) {
            echo "<div class='alert alert-danger'>Passwords do not match.</div>";
        } elseif ($otp != $_SESSION['generated_otp']) {
            echo "<div class='alert alert-danger'>Invalid OTP.</div>";
        } else {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $conn->prepare("INSERT INTO `user` (`u_Name`, `u_Email`, `u_Pass`) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $fullname, $email, $hashed_password);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Registration successful!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }

            $stmt->close();
        }
    }

    $conn->close();
    ?>
    <div class="container">
        <h1 class="jacquard">Register</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Full Name" required>
            </div>
            <div class="mb-3">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <input type="password" id="confirm-password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
            </div>
            <div class="mb-3 hidden" id="otp-container">
                <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter OTP">
            </div>
            <button type="button" id="generate-otp" class="btn btn-secondary w-100 mb-2" disabled>Generate OTP</button>
            <button type="submit" class="btn btn-primary w-100">Sign up</button>
        </form>
        <div class="mt-3 text-center">
            <a href="login.php" class="d-block">Already have an account? Sign in!</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const emailField = document.getElementById('email');
            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('confirm-password');
            const otpContainer = document.getElementById('otp-container');
            const generateOtpButton = document.getElementById('generate-otp');

            emailField.addEventListener('input', function () {
                if (emailField.validity.valid) {
                    otpContainer.classList.remove('hidden');
                } else {
                    otpContainer.classList.add('hidden');
                }
            });

            function checkPasswordsMatch() {
                if (passwordField.value === confirmPasswordField.value && passwordField.value !== '') {
                    generateOtpButton.disabled = false;
                    generateOtpButton.classList.remove('btn-secondary');
                    generateOtpButton.classList.add('btn-success');
                } else {
                    generateOtpButton.disabled = true;
                    generateOtpButton.classList.remove('btn-success');
                    generateOtpButton.classList.add('btn-secondary');
                }
            }

            passwordField.addEventListener('input', checkPasswordsMatch);
            confirmPasswordField.addEventListener('input', checkPasswordsMatch);

            generateOtpButton.addEventListener('click', function () {
                const email = emailField.value;

                fetch('send_otp.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ email: email })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert(data.message);
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
