<?php
// Include the database connection file
include '../db.php';

// Fetch books from the "Research Paper" category
$query = "SELECT title, description, photo, download_link FROM books WHERE category = 'Research Paper'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bokland - Download Your Favorite Books</title>
    <link href="https://fonts.googleapis.com/css2?family=Jacquard+24&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
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
                    <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./books.php">Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="./requestbook.php">Request For Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="./about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="./researchPaper.php">Research Papers</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <header class="text-center py-5 bg-dark text-white">
        <div class="container">
            <h1 class="display-4 jacquard">Research Papers</h1>
            <p class="lead">Explore research papers curated just for you.</p>
        </div>
    </header>

    <!-- Research Paper Section -->
    <section class="batch-section py-5">
        <div class="container">
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
                            $photo = "./Admin/" . $photo;
                        }

                        echo "<div class='col-md-6 col-lg-4 mb-4'>
                                <div class='card shadow-sm border-0'>
                                    <img src='$photo' class='card-img-top rounded-top' alt='$title' style='height: 200px; object-fit: cover;'>
                                    <div class='card-body'>
                                        <h5 class='card-title text-primary fw-bold'>$title</h5>
                                        <p class='card-text text-muted small'>$description</p>
                                        <div class='d-flex justify-content-between align-items-center'>
                                            <a href='$link' class='btn btn-primary btn-sm'>Download</a>
                                            <span class='badge bg-secondary text-light'>Research Paper</span>
                                        </div>
                                    </div>
                                </div>
                              </div>";
                    }
                } else {
                    echo "<p class='text-center'>No research papers available at the moment.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-light text-center">
        <div class="container">
            <p>&copy; 2024 Bokland. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
