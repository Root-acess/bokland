<?php
// Database connection
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "bokland";       

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: {$conn->connect_error}");
}

// Fetch unique categories for filters
$category_query = "SELECT DISTINCT category FROM books";
$category_result = mysqli_query($conn, $category_query);

// Fetch books based on category filter
$filter = isset($_GET['category']) ? $_GET['category'] : '';
$query = "SELECT title, description, photo, download_link FROM books";
if ($filter) {
    $query .= " WHERE category = '" . mysqli_real_escape_string($conn, $filter) . "'";
}
$result = mysqli_query($conn, $query);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Showcase - Bokland</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacquard+24&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    
</head>

<body>
    <!-- Header Section -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand jacquard" href="index.php">
                <h1 class="jacquard" style="font-size: 2.5rem;">bokland</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./books.php">Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="./requestbook.php">Request For Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="./about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="./researchPaper.php">Research Papers</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Filter Section -->
    <section class="filter-section py-4 bg-light">
        <div class="container">
            <h2 class="text-center mb-3">Filter Books by Category</h2>
            <form method="GET" class="d-flex justify-content-center">
                <select class="form-select w-50 me-2" name="category">
                    <option value="">All Categories</option>
                    <?php
                    if ($category_result && mysqli_num_rows($category_result) > 0) {
                        while ($row = mysqli_fetch_assoc($category_result)) {
                            $category = htmlspecialchars($row['category']);
                            $selected = ($filter == $category) ? 'selected' : '';
                            echo "<option value='{$category}' {$selected}>{$category}</option>";
                        }
                    }
                    ?>
                </select>
                <button class="btn btn-primary" type="submit">Apply Filter</button>
            </form>
        </div>
    </section>

    <!-- Books Showcase Section -->
    <section class="batch-section py-5">
        <div class="container">
            <h2 class="text-center mb-4">Choose Your Stream And Get Started!</h2>
            <div class="row">
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $title = htmlspecialchars($row['title']);
                        $description = htmlspecialchars($row['description']);
                        $photo = htmlspecialchars($row['photo']);
                        $link = htmlspecialchars($row['download_link']);

                        // Ensure the image path is correct
                        if (!filter_var($photo, FILTER_VALIDATE_URL)) {
                            $photo = "../Admin/" . $photo;
                        }

                        echo "<div class='col-md-4 mb-4'>
                        <div class='card shadow-sm border-0'>
                            <img src='$photo' class='card-img-top rounded-top' alt='$title' style='height: 200px; object-fit: cover;'>
                            <div class='card-body'>
                                <h5 class='card-title text-primary fw-bold'>$title</h5>
                                <p class='card-text text-muted small'>$description</p>
                                <div class='d-flex justify-content-between align-items-center'>
                                    <a href='$link' class='btn btn-primary btn-sm'>Download</a>
                                    <span class='badge bg-secondary text-light'>Free</span>
                                </div>
                            </div>
                        </div>
                      </div>";
                
                    }
                } else {
                    echo "<p class='text-center'>No books available for the selected category.</p>";
                }
                ?>
            </div>
        </div>
    </section>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
