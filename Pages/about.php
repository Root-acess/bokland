<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Request a Book - Bokland</title>
    <link href="https://fonts.googleapis.com/css2?family=Jacquard+24&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/contacts/contact-4/assets/css/contact-4.css">
    <link rel="stylesheet" href="../css/style.css">
 <style>
  

    .section-title {
        font-weight: 700;
        text-transform: capitalize;
        letter-spacing: 1px;
    }

    .section-subtitle {
        letter-spacing: 0.4px;
        line-height: 28px;
        max-width: 550px;
    }

    .section-title-border {
        background-color: #000;
        height: 1 3px;
        width: 44px;
    }

    .section-title-border-white {
        background-color: #fff;
        height: 2px;
        width: 100px;
    }

    .text_custom {
        color: #00bd2a;
    }

    .about_icon i {
        font-size: 22px;
        height: 65px;
        width: 65px;
        line-height: 65px;
        display: inline-block;
        background: #fff;
        border-radius: 35px;
        color: #00bd2a;
        box-shadow: 0 8px 20px -2px rgba(158, 152, 153, 0.5);
    }

    .about_header_main .about_heading {
        max-width: 450px;
        font-size: 24px;
    }

    .about_icon span {
        position: relative;
        top: -10px;
    }

    .about_content_box_all {
        padding: 28px;
    }

    .equal-height-card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .equal-height-card img {
        height: 200px;
        object-fit: cover;
    }

    .equal-height-card .card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    .equal-height-card .card-title {
        margin-bottom: 15px;
        font-size: 1.25rem;
    }

    .equal-height-card .btn {
        margin-top: auto;
    }

    .home-newsletter {
        padding: 80px 0;
    }

    .home-newsletter .single {
        max-width: 650px;
        margin: 0 auto;
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .home-newsletter .single h2 {
        font-size: 22px;
        color: white;
        text-transform: uppercase;
        margin-bottom: 40px;
    }

    .home-newsletter .single .form-control {
        height: 50px;
        background: rgba(255, 255, 255, 0.6);
        border-color: transparent;
        border-radius: 20px 0 0 20px;
    }

    .home-newsletter .single .form-control:focus {
        box-shadow: none;
        border-color: #243c4f;
    }

    .home-newsletter .single .btn {
        min-height: 50px;
        border-radius: 0 20px 20px 0;
        background: #243c4f;
        color: #fff;
    }

    .card:hover {
        transform: scale(1.05);
        transition: transform 0.3s;
    }

   
    .footer-section {
        background: #343a40;
        color: #fff;
    }

    .footer-section a {
        color: #fff;
    }

    .footer-section a:hover {
        color: #007bff;
    }

    .list-group-item a {
        color: #343a40;
        text-decoration: none;
    }

    .list-group-item a:hover {
        color: #007bff;
    }
    </style>
</head>

<body>

    <!-- Header and Navigation -->
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

    <section class="section_all bg-light" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title_all text-center">
                        <h3 class="font-weight-bold">Welcome To <span class="text-custom">Lorem Ipsum</span></h3>
                        <p class="section_subtitle mx-auto text-muted">Lorem Ipsum is simply dummy text of the printing
                            and typesetting industry. <br />Lorem Ipsum has been the industry's standard dummy text.</p>
                        <div class="">
                            <i class=""></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row vertical_content_manage mt-5">
                <div class="col-lg-6">
                    <div class="about_header_main mt-3">
                        <div class="about_icon_box">
                            <p class="text_custom font-weight-bold">Lorem Ipsum is simply dummy text</p>
                        </div>
                        <h4 class="about_heading text-capitalize font-weight-bold mt-4">Lorem Ipsum is simply dummy text
                            of the printing industry.</h4>
                        <p class="text-muted mt-3">Contrary to popular belief, Lorem Ipsum is not simply random text. It
                            has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years
                            old.</p>

                        <p class="text-muted mt-3"> Richard McClintock, a Latin professor at Hampden-Sydney College in
                            Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum
                            passage.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img_about mt-3">
                        <img src="https://i.ibb.co/qpz1hvM/About-us.jpg" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-4">
                    <div class="about_content_box_all mt-3">
                        <div class="about_detail text-center">
                            <div class="about_icon">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                            <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Creative Design</h5>
                            <p class="edu_desc mt-3 mb-0 text-muted">Lorem Ipsum is simply dummy text of the printing
                                and typesetting industry. </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="about_content_box_all mt-3">
                        <div class="about_detail text-center">
                            <div class="about_icon">
                                <i class="fab fa-angellist"></i>
                            </div>
                            <h5 class="text-dark text-capitalize mt-3 font-weight-bold">We make Best Result</h5>
                            <p class="edu_desc mb-0 mt-3 text-muted">Lorem Ipsum is simply dummy text of the printing
                                and typesetting industry. </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="about_content_box_all mt-3">
                        <div class="about_detail text-center">
                            <div class="about_icon">
                                <i class="fas fa-paper-plane"></i>
                            </div>
                            <h5 class="text-dark text-capitalize mt-3 font-weight-bold">best platform </h5>
                            <p class="edu_desc mb-0 mt-3 text-muted">Lorem Ipsum is simply dummy text of the printing
                                and typesetting industry. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="home-newsletter" style="background: linear-gradient(90deg, #003366, #008080);">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="single">
                        <h2>Subscribe to our Newsletter</h2>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your email">
                            <span class="input-group-btn">
                                <button class="btn btn-theme" type="submit">Subscribe</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
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

    <!-- Scripts at the end of body for faster loading -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/script.js" defer></script>
</body>

</html>