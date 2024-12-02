<?php
include('../db_connect.php');

if (isset($_POST['submit'])) {
    $a_Name = $_POST['author_name'];
    $a_Bio = $_POST['author_bio'];

    // Insert the data
    $insert = mysqli_query($conn, "INSERT INTO `author_master` (`a_name`, `a_bio`) VALUES ('$a_Name', '$a_Bio')");

    if ($insert) {
        echo "<script>alert('New author added successfully');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bokland - Add Author</title>
    <link href="https://fonts.googleapis.com/css2?family=Jacquard+24&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .header {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .form-container {
            margin: 20px auto;
            max-width: 400px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .form-label, .form-control {
            margin-bottom: 10px;
        }
        .btn-primary {
            padding: 10px 15px;
        }
    </style>
</head>

<body>
    <!-- Header and Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand jacquard" href="#">
                <h1 class="jacquard" style="font-size: 2rem;">bokland</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="admin.php">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addbook.php">Add Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="addAuthor.php">Add Author</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addCategory.php">Add Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="revenue.php">Revenue</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="header">
        <h1 class="jacquard">Add a New Author</h1>
    </header>

    <div class="form-container">
        <form method="post" action="addAuthor.php">
            <div class="mb-2">
                <label for="authorName" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="authorName" name="author_name" required>
            </div>
            <div class="mb-2">
                <label for="authorBio" class="form-label">Author Bio</label>
                <textarea class="form-control" id="authorBio" name="author_bio" rows="2" required></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Add Author</button>
        </form>
    </div>

    <!-- Footer Section -->
    <footer class="footer-section py-4 bg-dark text-white">
        <div class="container text-center">
            <p>&copy; 2024 Bokland. All Rights Reserved.</p>
            <div class="social-links">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin"></i></a>
            </div>
            <div class="mt-3">
                <a href="#" class="text-white me-3">Privacy Policy</a>
                <a href="#" class="text-white">Terms of Service</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
