<?php
include '../db.php'; // Include the database connection

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['submit'])) {
    $title       = $_POST['book_title'];
    $author      = $_POST['book_author'];
    $category    = $_POST['book_category'];
    $description = $_POST['book_description'];

    // Handle image upload
    $image = $_FILES['book_image'];
    $imagePath = 'uploads/images/' . basename($image['name']);
    move_uploaded_file($image['tmp_name'], $imagePath);

    // Handle PDF upload
    $pdf = $_FILES['book_pdf'];
    $pdfPath = 'uploads/Links/' . basename($pdf['name']);
    move_uploaded_file($pdf['tmp_name'], $pdfPath);

    // Insert book details into database
    $stmt = $conn->prepare('INSERT INTO books (title, author, category, description, image_path, pdf_path) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('ssssss', $title, $author, $category, $description, $imagePath, $pdfPath);

    if ($stmt->execute()) {
        echo "Book added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch categories
$categories = [];
$categoryStmt = $conn->query('SELECT c_id, c_name FROM categories_master');
if ($categoryStmt->num_rows > 0) {
    while ($row = $categoryStmt->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Fetch authors
$authors = [];
$authorStmt = $conn->query('SELECT a_id, a_name FROM author_master');
if ($authorStmt->num_rows > 0) {
    while ($row = $authorStmt->fetch_assoc()) {
        $authors[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bokland - Add Book</title>
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

        .form-label,
        .form-control {
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
                        <a class="nav-link active" href="addbook.php">Add Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addAuthor.php">Add Author</a>
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
        <h1 class="jacquard">Add a New Book</h1>
    </header>

    <div class="form-container">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-2">
                <label for="bookTitle" class="form-label">Book Title</label>
                <input type="text" class="form-control" id="bookTitle" name="book_title" required>
            </div>
            <div class="mb-2">
                <label for="bookAuthor" class="form-label">Author</label>
                <select class="form-control" id="bookAuthor" name="book_author" required>
                    <option value="">Select Author</option>
                    <?php foreach ($authors as $author): ?>
                        <option value="<?= $author['a_id'] ?>"><?= $author['a_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-2">
                <label for="bookCategory" class="form-label">Category</label>
                <select class="form-control" id="bookCategory" name="book_category" required>
                    <option value="">Select Category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['c_id'] ?>"><?= $category['c_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-2">
                <label for="bookDescription" class="form-label">Description</label>
                <textarea class="form-control" id="bookDescription" name="book_description" rows="2" required></textarea>
            </div>
            <div class="mb-2">
                <label for="bookImage" class="form-label">Book Cover Image</label>
                <input type="file" class="form-control" id="bookImage" name="book_image" accept="image/*" required>
            </div>
            <div class="mb-2">
                <label for="bookLink" class="form-label">Book Link</label>
                <input type="text" class="form-control" id="bookLink" name="book_link" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Add Book</button>
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