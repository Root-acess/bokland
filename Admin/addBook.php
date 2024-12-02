<?php
// Include DB connection
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the photo is uploaded
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        // Get form data
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $download_link = mysqli_real_escape_string($conn, $_POST['download_link']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);

        // Handle the file upload for photo
        $photo = $_FILES['photo']['name'];
        $photoTmpName = $_FILES['photo']['tmp_name'];
        $photoFolder = "uploads/" . time() . "_" . basename($photo);

        // Check if the photo directory exists, if not, create it
        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true); // Creates the directory if it doesn't exist
        }

        // Move the uploaded photo to the uploads folder
        if (move_uploaded_file($photoTmpName, $photoFolder)) {
            // Insert data into the database
            $query = "INSERT INTO books (title, photo, description, download_link, category) 
                      VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssss", $title, $photoFolder, $description, $download_link, $category);

            if ($stmt->execute()) {
                // Redirect after successful insertion
                header('Location: addBook.php');
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Failed to upload photo. Please check the file and try again.";
        }
    } else {
        echo "Photo is required!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book - Bokland</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add your styles here */
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php">Bokland</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./addBook.php">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Add Book Form -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Add a New Book</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Book Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <input type="text" name="description" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="download_link" class="form-label">Download Link:</label>
                <input type="text" name="download_link" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <select name="category" class="form-control" required>
                    <option value="">Select Category</option>
                    <option value="Science">Science</option>
                    <option value="Fiction">Fiction</option>
                    <option value="History">History</option>
                    <option value="Technology">Technology</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo (required):</label>
                <input type="file" name="photo" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-custom">Save Book</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
