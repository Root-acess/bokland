<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bokland - Revenue Report</title>
    <link href="https://fonts.googleapis.com/css2?family=Jacquard+24&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .header {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .report-container {
            margin: 20px auto;
            max-width: 800px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .chart-container {
            margin-top: 20px;
        }
        .report-summary {
            margin-top: 20px;
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
                        <a class="nav-link"  href="admin.php">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="addbook.php">Add Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addAuthor.php">Add Author</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addCategory.php" active>Add Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="revenue.php">Revenue</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="header">
        <h1 class="jacquard">Revenue Report</h1>
    </header>

    <div class="report-container">
        <h2>Daily Revenue</h2>
        <div class="chart-container">
            <canvas id="dailyRevenueChart"></canvas>
        </div>

        <h2>Monthly Revenue</h2>
        <div class="chart-container">
            <canvas id="monthlyRevenueChart"></canvas>
        </div>

        <div class="report-summary">
            <h3>Total Earnings: $13,400</h3>
        </div>
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
    <script>
        // Sample data, replace with actual data
        const dailyRevenueData = {
            labels: ['2024-06-19', '2024-06-20', '2024-06-21'],
            datasets: [{
                label: 'Daily Earnings',
                data: [180, 200, 150],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        const monthlyRevenueData = {
            labels: ['April 2024', 'May 2024', 'June 2024'],
            datasets: [{
                label: 'Monthly Earnings',
                data: [4700, 4200, 4500],
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        };

        const configDaily = {
            type: 'bar',
            data: dailyRevenueData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const configMonthly = {
            type: 'line',
            data: monthlyRevenueData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const dailyRevenueChart = new Chart(
            document.getElementById('dailyRevenueChart'),
            configDaily
        );

        const monthlyRevenueChart = new Chart(
            document.getElementById('monthlyRevenueChart'),
            configMonthly
        );
    </script>
</body>
</html>
