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
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");

    body,
    input,
    textarea {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
    }

    .container {
        position: relative;
        width: 100%;
        min-height: 100vh;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: #159b80;
    }

    .form {
        width: 100%;
        max-width: 820px;
        background-color: #f5f5f5;
        border-radius: 10px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        overflow: hidden;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }

    .contact-form {
        background-color: #003366;
        position: relative;
    }

    .circle {
        border-radius: 50%;
        background: linear-gradient(135deg, transparent 20%, #002244);
        position: absolute;
    }

    .circle.one {
        width: 130px;
        height: 130px;
        top: 130px;
        right: -40px;
    }

    .circle.two {
        width: 80px;
        height: 80px;
        top: 10px;
        right: 30px;
    }

    .contact-form:before {
        content: "";
        position: absolute;
        width: 26px;
        height: 26px;
        background-color: #003366;
        transform: rotate(45deg);
        top: 50px;
        left: -13px;
    }

    form {
        padding: 2.3rem 2.2rem;
        z-index: 10;
        overflow: hidden;
        position: relative;
    }

    .title {
        color: #fff;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
        margin-bottom: 0.7rem;
    }

    .input-container {
        position: relative;
        margin: 1rem 0;
    }

    .input {
        width: 100%;
        outline: none;
        border: 2px solid #fafafa;
        background: none;
        padding: 0.6rem 1.2rem;
        color: #fff;
        font-weight: 500;
        font-size: 0.95rem;
        letter-spacing: 0.5px;
        border-radius: 5px;
        transition: 0.3s;
    }

    textarea.input {
        padding: 0.8rem 1.2rem;
        min-height: 150px;
        border-radius: 5px;
        resize: none;
        overflow-y: auto;
    }

    .input-container label {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        padding: 0 0.4rem;
        color: #fafafa;
        font-size: 0.9rem;
        font-weight: 400;
        pointer-events: none;
        z-index: 1000;
        transition: 0.5s;
    }

    .input-container.textarea label {
        top: 1rem;
        transform: translateY(0);
    }

    .btn {
        padding: 0.6rem 1.3rem;
        background-color: #fff;
        border: 2px solid #fff;
        font-size: 0.95rem;
        color: #003366;
        line-height: 1;
        border-radius: 5px;
        outline: none;
        cursor: pointer;
        transition: 0.3s;
        margin: 0;
        width: 100%;
    }

    .btn:hover {
        background-color: transparent;
        color: #fff;
    }

    .input-container span {
        position: absolute;
        top: 0;
        left: 25px;
        transform: translateY(-50%);
        font-size: 0.8rem;
        padding: 0 0.4rem;
        color: transparent;
        pointer-events: none;
        z-index: 500;
    }

    .input-container span:before,
    .input-container span:after {
        content: "";
        position: absolute;
        width: 10%;
        opacity: 0;
        transition: 0.3s;
        height: 5px;
        background-color: #003366;
        top: 50%;
        transform: translateY(-50%);
    }

    .input-container span:before {
        left: 50%;
    }

    .input-container span:after {
        right: 50%;
    }

    .input-container.focus label {
        top: 0;
        transform: translateY(-50%);
        left: 25px;
        font-size: 0.8rem;
    }

    .input-container.focus span:before,
    .input-container.focus span:after {
        width: 50%;
        opacity: 1;
    }

    .contact-info {
        padding: 2.3rem 2.2rem;
        position: relative;
    }

    .contact-info .title {
        color: #003366;
    }

    .text {
        color: #333;
        margin: 1.5rem 0 2rem 0;
    }

    .information {
        display: flex;
        color: #555;
        margin: 0.7rem 0;
        align-items: center;
        font-size: 0.95rem;
    }

    .information i {
        color: #003366;
    }

    .icon {
        width: 28px;
        margin-right: 0.7rem;
    }

    .social-media {
        padding: 2rem 0 0 0;
    }

    .social-media p {
        color: #333;
    }

    .social-icons {
        display: flex;
        margin-top: 0.5rem;
    }

    .social-icons a {
        width: 35px;
        height: 35px;
        border-radius: 5px;
        background: linear-gradient(45deg, #003366, #002244);
        color: #fff;
        text-align: center;
        line-height: 35px;
        margin-right: 0.5rem;
        transition: 0.3s;
    }

    .social-icons a:hover {
        transform: scale(1.05);
    }

    .contact-info:before {
        content: "";
        position: absolute;
        width: 110px;
        height: 100px;
        border: 22px solid #003366;
        border-radius: 50%;
        bottom: -77px;
        right: 50px;
        opacity: 0.3;
    }

    .big-circle {
        position: absolute;
        width: 500px;
        height: 500px;
        border-radius: 50%;
        background: linear-gradient(to bottom, #003366, #002244);
        bottom: 50%;
        right: 50%;
        transform: translate(-40%, 38%);
    }

    .big-circle:after {
        content: "";
        position: absolute;
        width: 360px;
        height: 360px;
        background-color: #fafafa;
        border-radius: 50%;
        top: calc(50% - 180px);
        left: calc(50% - 180px);
    }

    .square {
        position: absolute;
        height: 400px;
        top: 50%;
        left: 50%;
        transform: translate(181%, 11%);
        opacity: 0.2;
    }

    @media (max-width: 850px) {
        .form {
            grid-template-columns: 1fr;
        }

        .contact-info:before {
            bottom: initial;
            top: -75px;
            right: 65px;
            transform: scale(0.95);
        }

        .contact-form:before {
            top: -13px;
            left: initial;
            right: 70px;
        }

        .big-circle {
            bottom: 75%;
            transform: scale(0.9) translate(-40%, 30%);
            right: 50%;
        }

        .text {
            margin: 1rem 0 1.5rem 0;
        }

        .social-media {
            padding: 1.5rem 0 0 0;
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 1.5rem;
        }

        .contact-info:before {
            display: none;
        }

        .square {
            display: none;
        }

        .big-circle {
            display: none;
        }

        form,
        .contact-info {
            padding: 1.7rem 1.6rem;
        }

        .text,
        .information,
        .social-media p {
            font-size: 0.8rem;
        }

        .title {
            font-size: 1.15rem;
        }

        .input {
            font-size: 0.85rem;
        }

        .btn {
            padding: 0.45rem 1.2rem;
            font-size: 0.85rem;
            border-color: #f5f5f5;
        }

        .social-icons a {
            width: 30px;
            height: 30px;
            line-height: 30px;
        }
    }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <h1 class="jacquard" style="font-size: 2.5rem;">bokland</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="index.php" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="books.php">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Requestbook.php">Request For Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="blogs.php">Blogs</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="form">
            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>

                <form action="https://formspree.io/f/your_form_id" method="POST">
                    <h3 class="title">Request a Book</h3>
                    <div class="input-container">
                        <input type="text" name="name" class="input" required>
                        <label for="name">Book Name</label>
                        <span>Book Name</span>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input" required>
                        <label for="email">Your Email</label>
                        <span>Email</span>
                    </div>
                    <div class="input-container">
                        <textarea name="message" class="input" required></textarea>
                        <label for="message">Book Details</label>
                        <span>Book Details</span>
                    </div>
                    <div class="input-container">
                        <input type="submit" value="Send" class="btn">
                    </div>
                </form>
            </div>

            <div class="contact-info">
                <h3 class="title">Contact Information</h3>
                <p class="text">
                    We are here to assist you with your book requests. Please fill out the form and we will get back to
                    you shortly.
                </p>
                <div class="information">
                    <img src="https://i.imgur.com/5Rbnw3K.png" class="icon" alt="icon">
                    <p>123 Bokland Street, Book City, BK 56789</p>
                </div>
                <div class="information">
                    <img src="https://i.imgur.com/6XzA4p3.png" class="icon" alt="icon">
                    <p>info@bokland.com</p>
                </div>
                <div class="information">
                    <img src="https://i.imgur.com/xk5gSt8.png" class="icon" alt="icon">
                    <p>+123 456 789</p>
                </div>
                <div class="social-media">
                    <p>Connect with us:</p>
                    <div class="social-icons">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    const inputs = document.querySelectorAll(".input");

    function addcl() {
        let parent = this.parentNode.parentNode;
        parent.classList.add("focus");
    }

    function remcl() {
        let parent = this.parentNode.parentNode;
        if (this.value === "") {
            parent.classList.remove("focus");
        }
    }

    inputs.forEach((input) => {
        input.addEventListener("focus", addcl);
        input.addEventListener("blur", remcl);
    });
    </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

</body>

</html>
