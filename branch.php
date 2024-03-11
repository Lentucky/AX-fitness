<?php 
    include('config/constants.php'); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AX Fitness</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Font-awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main-profile.css" />

    <style type="text/css">
	#regiration_form fieldset:not(:first-of-type) {
		display: none;
	}
  </style>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/jquery.seat-charts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body>

    <header>
    <nav class="navbar navbar-expand-lg p-3">
        <a class="navbar-brand navigating" href="index.php"><img src="img/AX_yellow.png" width="70px" height="auto"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav navigating mx-auto">
            <li class="nav-item ">
            <a class="nav-link" aria-current="page" href="join.php">Why Join</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link " aria-current="page" href="branch.php">Our Branches</a>
            </li>

            <?php
                session_start();
                
                if (!isset($_SESSION['customer'])) {
                    echo "
                    <li class='nav-item'>
                    <a class='nav-link' aria-current='page' href='member.php'>Become a Member</a>
                    </li>

                    <li class='nav-item me-5'><a class='nav-link' aria-current='page' href='login.php'>Login</a></li>";
                }

                else {
                    echo "
                    <li class='nav-item'>
                    <a class='nav-link' aria-current='page' href='exercises.php'>Exercises</a>
                    </li>

                    <li class='nav-item'>
                    <a class='nav-link' aria-current='page' href='profile.php'>Profile</a>
                    </li>

                    <li class='nav-item me-5'>
                    <a class='nav-link' aria-current='page' href='logout.php'>Logout</a>
                    </li>";
                }
            ?>
        </ul>
        </div>
    </nav>
    </header>
    <h1 class="text-center my-4">Our Gym Branches</h1>

    <div class="container">
        <div id="our-branches">
        <h2>Los Banos, UP</h2>
            <div class="branch-container">
                <div class="branch-card">
                    <img src="img/branch/UP/LB_UP_1.jpg" alt="">
                </div>
                <div class="branch-card">
                    <img src="img/branch/UP/LB_UP_2.jpg" alt="">
                </div>
                <div class="branch-card">
                    <img src="img/branch/UP/LB_UP_3.jpg" alt="">
                </div>
            </div>
        </div>

        <div id="our-branches">
            <h2>Los Banos, Maahas</h2>
            <div class="branch-container">
                <div class="branch-card">
                    <img src="img/branch/maahas/maahas_LB_1.jpg" alt="">
                </div>
                <div class="branch-card">
                    <img src="img/branch/maahas/maahas_LB_2.jpg" alt="">
                </div>
                <div class="branch-card">
                    <img src="img/branch/maahas/maahas_LB_3.jpg" alt="">
                </div>
                <div class="branch-card">
                    <img src="img/branch/maahas/maahas_LB_4.jpg" alt="">
                </div>
            </div>
        </div>

        <div id="our-branches">
            <h2>Sta. Cruz, Bayan</h2>
            <div class="branch-container">
                <div class="branch-card">
                    <img src="img/branch/sta_cruz_bayan/Sta_Cruz_1.jpg" alt="">
                </div>
                <div class="branch-card">
                    <img src="img/branch/sta_cruz_bayan/Sta_Cruz_2.jpg" alt="">
                </div>
                <div class="branch-card">
                    <img src="img/branch/sta_cruz_bayan/Sta_Cruz_Bayan.jpg" alt="">
                </div>
            </div>
        </div>

    <div id="our-branches">
        <h2>Sta. Cruz, Highway</h2>
        <div class="branch-container">
            <div class="branch-card">
                <img src="img/branch/sta_cruz_highway/Sta_Cruz_11.jpg" alt="">
            </div>
            <div class="branch-card">
                <img src="img/branch/sta_cruz_highway/Sta_Cruz_22.jpg" alt="">
            </div>
            <div class="branch-card">
                <img src="img/branch/sta_cruz_highway/SSta_Cruz_22.jpg" alt="">
            </div>
        </div>
    </div>

        <div id="our-branches">
            <h2>Siniloan, Famy</h2>
            <div class="branch-container">
                <div class="branch-card">
                    <img src="img/branch/famy/Famy_1.jpg" alt="">
                </div>
                <div class="branch-card">
                    <img src="img/branch/famy/Famy_2.jpg" alt="">
                </div>
                <div class="branch-card">
                    <img src="img/branch/famy/Famy_3.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>




<?php include('partials-front/footer.php'); ?>