<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the photo is uploaded
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        // Get form data
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $link = mysqli_real_escape_string($conn, $_POST['link']);
        $download_link = mysqli_real_escape_string($conn, $_POST['download_link']);

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
            // Handle the file upload for image (optional)
            $image = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $image = $_FILES['image']['name'];
                $imageTmpName = $_FILES['image']['tmp_name'];
                $imageFolder = "uploads/" . time() . "_" . basename($image);
                move_uploaded_file($imageTmpName, $imageFolder);
            }

            // Insert data into the database
            $query = "INSERT INTO books (title, photo, description, image, link, download_link) 
                      VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssss", $title, $photoFolder, $description, $image ? $imageFolder : null, $link, $download_link);

            if ($stmt->execute()) {
                // Redirect after successful insertion
                header('Location: admin.php');
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
