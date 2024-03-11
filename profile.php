<?php 
include('config/constants.php'); 

session_start();
if(isset($_SESSION['upload']))
{
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}

if (!isset($_SESSION['customer'])) {
    header("Location: login.php");
}

//Create SQL query to get all the fucking users
// $sql = "SELECT * FROM customer where Customer_ID='" . $_SESSION['customer'] . "'";
$sql = "SELECT *
        FROM customer 
        JOIN branch ON customer.branch_id = branch.branch_ID
        WHERE customer.Customer_ID = '" . $_SESSION['customer'] . "'";
//execute the query
$res = mysqli_query($conn, $sql);

//Count rows to check whether we have food or not
$count = mysqli_num_rows($res);

if($count>0)
{
        //We have food in database
        //Get the food from database and display
        while($rows=mysqli_fetch_assoc($res))
        {
                //get the value from the individual columns
                $id=$rows['Customer_ID'];
                $name=$rows['Customer_name'];
                $branch=$rows['Branch_location'];
                $email=$rows['Customer_email'];
                $number=$rows['Customer_no'];
                $gender=$rows['Customer_gender'];
                $plan=$rows['Customer_plan'];
                $due=$rows['Date_due'];
                $isPaid=$rows['isPaid'];
        }

}
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
<div class="container pt-5 white-text">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card-profile">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="mt-3 white-text">
                                <h4><?php echo $name; ?></h4>
                                <p class="mb-1"><span style="font-weight: bold;">Email  :  </span> <?php echo $email; ?></p>
                                <p class="mb-1"><span style="font-weight: bold;">Phone Number  :  </span><?php echo $number; ?></p>
                                <p class="mb-1"><span style="font-weight: bold;">Gender  :  </span><?php echo $gender; ?></p>
                                <p class="mb-1"><span style="font-weight: bold;">Branch  :  </span><?php echo $branch; ?></p>
                                <p class="mb-1"><span style="font-weight: bold;">Current Plan  :  </span><?php echo $plan; ?></p>
                                <p class="mb-1"><span style="font-weight: bold;">Date Due  :  </span><?php echo $due; ?></p>

                                <button value="Yearly" id="unique-button" class="btn btn-custom text-center"><a href='edit-profile.php'>Edit</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card-profile">
                    <div class="card-body">
                    <h5 class="d-flex align-items-center mb-3">Payment Status for this month:</h5>
                    <ul class="list-unstyled work-activity mb-0">
                        <?php
                        if($isPaid=="Paid"){
                        echo 
                            "<h3 class='lh-base mb-0'>Paid!</h3>
                            <h4 class='1h-base mb-0'>You have paid for your membership for your current term!</h4>
                        </li>";
                        }else if($isPaid=="Rejected"){
                            echo
                            "   <h3 class='lh-base mb-0'>Your payment was rejected.</h3>
                                <h4 class='1h-base mb-0 pb-5'>Due to incomplete information, or lack of evidence of the payment, your payment was rejected.
                                If you believe this was wrong, you may contact us at our facebook page or at our branches personally.</h4>
                                <a class='btn btn-success' href='payment.php' role='button'>Try again</a>
                            </li>";
                        }else if($isPaid=="Pending"){
                            echo
                            "   <h3 class='lh-base mb-0'>Your payment is Pending</h3>
                                <h4 class='1h-base mb-0'>Please wait for a response from our coaches.</h4>
                            </li>";
                        }else{
                        echo
                            "<h3 class='lh-base mb-0'>Payment is due for this term.</h3>
                            <h4 class='1h-base mb-0'>You will not be able to enter the gym, if you have yet to pay your membership fees. Payment can be made at our branches or online</h4>
                            <a class='btn btn-success' href='payment.php' role='button'>Pay Now</a>
                        </li>";
                        }
                        ?>
                    </ul><!-- end ul -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>