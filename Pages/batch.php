<?php
// Update the path to your db.php connection
include 'db.php';

// Fetch books from the database
$query = "SELECT title, description, photo, download_link FROM books";
$result = mysqli_query($conn, $query);
?>
<section class="batch-section py-5">
    <div class="container">
        <h2 class="text-center mb-4">Fast and Easy</h2>
        <div class="row">
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $title = htmlspecialchars($row['title']);
                    $description = htmlspecialchars($row['description']);
                    $photo = htmlspecialchars($row['photo']);
                    $link = htmlspecialchars($row['download_link']); // Use download_link instead of link

                    // Ensure the image path is correct
                    if (!filter_var($photo, FILTER_VALIDATE_URL)) {
                        $photo = "./Admin/" . $photo;
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
                echo "<p>No books available.</p>";
            }
            ?>
        </div>
    </div>
</section>
