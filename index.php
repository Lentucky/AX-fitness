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
            <a class="nav-link " aria-current="page" href="#why-join"id="login-link">Why Join</a>
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


    <!-- Banner section -->
    <section class="banner">
        <div class="orig">
            <h1>WORKOUT WITH US</h1>
            <p>Weight Loss Management | 
                Strength & Conditioning</p>
            <a href="#" class="btn btn-primary">Join Now</a>
        </div>
    </section>

    <?php
                
                if (!isset($_SESSION['customer'])) {
                    echo "
                    <div class='wrapper'>
                    <h2 class='training-plans'>OUR MEMBERSHIPS</h2>
                </div>
            
                    <div class='train-container white-text'>
                      <div class='training'>
                      <div class='training-container'>
                                <h4><b>Monthly</b></h4>
                                <p>Membership fee is 900</p>
                                <p>With discount is 800</p>
                        </div>
                    </div>
            
                    <div class='training'>
                        <div class='training-container'>
                                <h4><b>Tri-Monthly</b></h4>
                                <p>Membership fee is 2700</p>
                                <p>With discount is 2300</p>
                        </div>
                    </div>
            
                    <div class='training'>
                        <div class='training-container'>
                            <h4><b>Yearly</b></h4>
                            <p>Membership fee is 8600</p>
                            <p>With discount is 8000</p>
                        </div>
                        </div>
                    </div>
            
                     <div class='text-center pt-5'>
                     <button id='unique-button' class='btn btn-custom'><a href='member.php' style='text-decoration: none;'>Try it out</a></button>
                     </div>
                    ";
                }

                else {
                    echo "";
                }
            ?>

         <section id="reviews" class="review">
            <div class="container2">
              <h2 class="text-center mb-4">Customer Reviews</h2>
              <div class="row">
                <!-- Customer reviews go here -->
                <div class="col-md-4 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut tellus nec velit sodales dapibus."</p>
                      <p class="text-right font-weight-bold">- John Doe</p>
                    </div>
                  </div>
                </div>
            
                <div class="col-md-4 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut tellus nec velit sodales dapibus."</p>
                      <p class="text-right font-weight-bold">- John Doe</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut tellus nec velit sodales dapibus."</p>
                      <p class="text-right font-weight-bold">- John Doe</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </section>

            <div id="why-join">
              <h2>Why Join?</h2>
              <div class="card-container1">
                  <div class="card1">
                      <h3>Expert Coaching</h3>
                      <p>Customized plans by experienced coaches.</p>
                  </div>
                  <div class="card1">
                      <h3>Unlimited Workouts</h3>
                      <p>Daily guided workouts for all levels.</p>
                  </div>
                  <div class="card1">
                      <h3>Community Support</h3>
                      <p>Join our vibrant fitness community.</p>
                  </div>
                  <div class="card1">
                      <h3>State-of-the-Art Facilities</h3>
                      <p>Modern equipment and motivating atmosphere.</p>
                  </div>
              </div>
              <div class="buttons1">
                <button class="custom-button" id="prev-button"><i class="fas fa-chevron-left"></i></button>
                <button class="custom-button" id="next-button"><i class="fas fa-chevron-right"></i></button>
              </div>
            </div>
          </div>
          <script src="js/cardsminpage.js"></script>

          </body>
</html>