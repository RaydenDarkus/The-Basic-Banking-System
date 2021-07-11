<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tristar Cooperative Bank</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar&footer.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        include 'navbar.php';
    ?>
    <div class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner ml-auto">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/pexels-photo-259209.jpeg" style="height: 880px;"alt="First slide">
                    <div class="carousel-caption">
                        <img src="images/bank.jpg" alt="img" class="caption-img">
                        <br><br><br>
                        <h2 class="header-text"><b>Tristar Cooperative Bank</b></h2>
                        <p class="carousel-text">We show the list of users who have availed our services and provide facilities to view balance and transfer money.</p>
                        <div class="row">
                            <div class="col-md col-sm-12">
                                <a href="customer.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Customers</a>
                            </div>
                            <div class="col-md col-sm-12">
                                <a href="history.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Transaction History</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/bank1.jpg" alt="Second slide">
                    <div class="carousel-caption">
                        <img src="images/Shreyas.jpeg" alt="img" class="caption-img">
                        <br><br><br>
                        <h2 class="header-text"><b>About</b></h2>
                        <p class="carousel-text">
                        Shreyas is the owner of <b>Tristar Cooperative Bank</b> with experience of 4 years in corporate finance, debt syndication and investment banking across the globe.
                        His entrepreneurship experience include forming a company in IT services & e-governance and forming a skill development company on the lines of finishing
                        school for college students.
                        </p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <?php 
        include 'footer.php';
    ?>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>