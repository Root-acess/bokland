<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ./admin-login.php"); // Redirect to login page
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bokland - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .header {
            margin-top: 20px;
            text-align: center;
        }

        .header h1 {
            color: #343a40;
            font-family: 'Poppins', sans-serif;
        }

        .table-container {
            margin: 20px auto;
            max-width: 90%;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        .btn-add {
            margin-bottom: 15px;
            background-color: #007bff;
            color: #fff;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }

        .btn-add:hover {
            background-color: #0056b3;
        }

        table img {
            border-radius: 8px;
        }

        .table thead {
            background-color: #343a40;
            color: white;
        }

        .btn-sm {
            border-radius: 20px;
        }

        .navbar {
            background: linear-gradient(90deg, #003366, #008080);
            border-bottom: 2px solid #FFD700;
            padding: 0.7rem 1rem;
        }

        .navbar-brand {
            color: #FFD700;
            font-weight: bold;
        }

        .nav-link {
            margin-right: 5px;
            color: #FFFFFF;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #FFD700;
        }

        .nav-link.active {
            color: #ADD8E6;
        }

        .navbar-toggler {
            border: 1px solid #FFD700;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='%23FFD700' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
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
                        <a class="nav-link active" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./addBook.php">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="header">
        <h1>Welcome Admin</h1>
    </header>

    <!-- Table Container -->
    <div class="table-container">
        <a href="addBook.php" class="btn btn-primary btn-add">Add New Book</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>PDF</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../db.php';
                $query = "SELECT * FROM books";
                $result = mysqli_query($conn, $query);
                $slNo = 1;

                // Loop through the fetched records
                while ($row = mysqli_fetch_assoc($result)) {
                    // Use isset to check if the columns exist
                    $author = isset($row['author']) ? htmlspecialchars($row['author']) : 'N/A';
                    $category = isset($row['category']) ? htmlspecialchars($row['category']) : 'N/A';
                    $pdf = isset($row['pdf']) ? htmlspecialchars($row['pdf']) : '#'; // Use a fallback link if no PDF
                
                    echo "<tr>
            <td>{$slNo}</td>
            <td>" . htmlspecialchars($row['title']) . "</td>
            <td>{$author}</td>
            <td>{$category}</td>
            <td>" . htmlspecialchars($row['description']) . "</td>
            <td><img src='" . htmlspecialchars($row['photo']) . "' alt='Book Image' width='60'></td>
            <td><a href='{$pdf}' target='_blank'>View PDF</a></td>
            <td>
                <a href='editBook.php?id=" . urlencode($row['id']) . "' class='btn btn-warning btn-sm'>Edit</a>
                <a href='deleteBook.php?id=" . urlencode($row['id']) . "' class='btn btn-danger btn-sm'>Delete</a>
            </td>
        </tr>";
                    $slNo++;
                }
                ?>
            </tbody>

        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>