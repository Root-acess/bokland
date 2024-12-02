<section class="py-5">
        <div class="container">
            <div class="row">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "bokland";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: {$conn->connect_error}");
                }

                $sql = "SELECT title, description, photo, download_link FROM books ORDER BY RAND() LIMIT 4";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
                        $description = htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8');
                        $photoPath = "./Admin/" . htmlspecialchars($row['photo'], ENT_QUOTES, 'UTF-8');
                        $link = htmlspecialchars($row['download_link'], ENT_QUOTES, 'UTF-8');

                        echo "<div class='col-md-6 col-lg-3 mb-4'>
                                <div class='card shadow-sm border-0'>
                                    <img src='$photoPath' class='card-img-top rounded-top' alt='$title' style='height: 200px; object-fit: cover;'>
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
                    echo '<p class="text-center">No books available at the moment.</p>';
                }

                $conn->close();
                ?>
            </div>
        </div>
    </section>