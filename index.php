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

// Handle search query
$searchTerm = '';
$query = "SELECT title, description, photo, download_link FROM books";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $conn->real_escape_string($_GET['search']);
    $query = "SELECT title, description, photo, download_link FROM books 
              WHERE title LIKE '%$searchTerm%' 
              OR description LIKE '%$searchTerm%'";
}

$result = mysqli_query($conn, $query);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bokland - Download Your Favorite Books</title>
    <link href="https://fonts.googleapis.com/css2?family=Jacquard+24&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/contacts/contact-4/assets/css/contact-4.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
 
<body>
    <!-- Navbar -->
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Pages/books.php">Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="Pages/requestbook.php">Request For Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="Pages/about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="Pages/researchPaper.php">Research Paper</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section text-center py-5">
        <div class="container">
            <h1 class="display-2 jacquard">Welcome to Bokland</h1>
            <p class="lead">Download your favorite books easily.</p>
            <form class="d-flex justify-content-center mt-4" method="GET" action="index.php">
                <input class="form-control me-2 w-50" type="search" name="search" placeholder="Search for books" value="<?php echo htmlspecialchars($searchTerm); ?>" aria-label="Search">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </header>

    <!-- Books Section -->
    <section class="batch-section py-5">
        <div class="container">
            <h2 class="text-center mb-4">Download Book Easily</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $title = htmlspecialchars($row['title']);
                        $description = htmlspecialchars($row['description']);
                        $photo = htmlspecialchars($row['photo']);
                        $link = htmlspecialchars($row['download_link']);

                        if (!filter_var($photo, FILTER_VALIDATE_URL)) {
                            $photo = "./Admin/" . $photo;
                        }

                        echo "<div class='col'>
                            <div class='card shadow-sm border-0'>
                                <img src='$photo' class='card-img-top rounded-top' alt='$title' style='height: 200px; object-fit: cover;'>
                                <div class='card-body'>
                                    <h5 class='card-title text-primary fw-bold'>$title</h5>
                                    <p class='card-text text-muted small'>$description</p>
                                    <a href='$link' class='btn btn-primary btn-sm'>Download</a>
                                </div>
                            </div>
                        </div>";
                    }
                } else {
                    echo "<p class='text-center'>No books found for your search.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Top Downloads Section -->
    <section class="top-downloads-section py-5">
        <div class="container">
            <h2 class="mb-4">Top Downloads</h2>
            <div class="row">
                <?php include('Pages/random_books.php'); ?>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <?php include('Pages/newsletter.php'); ?>

    <!-- Footer -->
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