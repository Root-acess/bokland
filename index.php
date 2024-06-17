<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bokland - Download Your Favorite Books</title>
    <link href="https://fonts.googleapis.com/css2?family=Jacquard+24&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Header and Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand jacquard" href="#">
                <h1 class="jacquard" style="font-size: 2.5rem;">bokland</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blogs.php">blogs</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section text-center py-5">
        <div class="container">
            <h1 class="display-2 jacquard">welcome to bokland</h1>
            <p class="lead">Download your favorite books easily.</p>
            <form class="d-flex justify-content-center mt-4">
                <input class="form-control me-2 w-50" type="search" placeholder="Search for books" aria-label="Search">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </header>

    <!-- Categories Section -->
    <section class="categories-section py-5 bg-light">
        <div class="container">
            <h2 class="mb-4">Categories</h2>
            <div class="row">
                <!-- Example Category -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img src="path/to/category-image.jpg" class="card-img-top" alt="Category Name">
                        <div class="card-body">
                            <h5 class="card-title">Category Name</h5>
                            <a href="#" class="btn btn-primary">View Books</a>
                        </div>
                    </div>
                </div>
                <!-- Repeat for other categories -->
            </div>
        </div>
    </section>

    <!-- Featured Books Section -->
    <section class="featured-books-section py-5">
        <div class="container">
            <h2 class="mb-4">Featured Books</h2>
            <div class="row">
                <!-- Example Book -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card card-custom">
                        <img src="path/to/book-cover.jpg" class="card-img-top" alt="Book Title">
                        <div class="card-body">
                            <h5 class="card-title">Book Title</h5>
                            <p class="card-text">Author Name</p>
                            <a href="#" class="btn btn-custom">Download</a>
                        </div>
                    </div>
                </div>
                <!-- Repeat for other books -->
            </div>
        </div>
    </section>

    <!-- Latest Releases Section -->
    <section class="latest-releases-section py-5 bg-light">
        <div class="container">
            <h2 class="mb-4">Latest Releases</h2>
            <div class="row">
                <!-- Example Book -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card card-custom">
                        <img src="path/to/book-cover.jpg" class="card-img-top" alt="Book Title">
                        <div class="card-body">
                            <h5 class="card-title">Book Title</h5>
                            <p class="card-text">Author Name</p>
                            <a href="#" class="btn btn-custom">Download</a>
                        </div>
                    </div>
                </div>
                <!-- Repeat for other books -->
            </div>
        </div>
    </section>

    <!-- Top Downloads Section -->
    <section class="top-downloads-section py-5">
        <div class="container">
            <h2 class="mb-4">Top Downloads</h2>
            <div class="row">
                <!-- Example Book -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card card-custom">
                        <img src="path/to/book-cover.jpg" class="card-img-top" alt="Book Title">
                        <div class="card-body">
                            <h5 class="card-title">Book Title</h5>
                            <p class="card-text">Author Name</p>
                            <a href="#" class="btn btn-custom">Download</a>
                        </div>
                    </div>
                </div>
                <!-- Repeat for other books -->
            </div>
        </div>
    </section>

    <!-- Newsletter Signup Section -->
    <section class="newsletter-section py-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-4">Stay Updated</h2>
            <p class="lead">Subscribe to our newsletter to receive the latest updates and offers.</p>
            <form class="d-flex justify-content-center mt-4">
                <input class="form-control me-2 w-50" type="email" placeholder="Enter your email" aria-label="Email">
                <button class="btn btn-primary" type="submit">Subscribe</button>
            </form>
        </div>
    </section>

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
