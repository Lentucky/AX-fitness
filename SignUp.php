<?php 
require 'config/constants.php';
if(isset($_POST["submitmember"])){
  $customerplan = $_POST["choice"];
}

if(isset($_POST["submit"])){

  $name = $_POST["first"] . " " . $_POST["last"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];

  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];

  $branch = $_POST["selected-branch"];

  $customer_plan = $_POST["Customer_plan"];
  $current_date = date("Y-m-d");

  // switch ($customer_plan) {
  //   case "Monthly":
  //       $days_to_add = 30;
  //       break;
  //   case "Trimonthly":
  //       $days_to_add = 90;
  //       break;
  //   case "Yearly":
  //       $days_to_add = 365;
  //       break;
  //   default:
  //       // Handle unrecognized plan, or set a default value
  //       $days_to_add = 0;
  // }
  
  $selectedGender = $_POST["gender"];
  $isPaid = "Unpaid";
  // $date_due = date("Y-m-d", strtotime($current_date . " +{$days_to_add} days"));
  $date_due = date("Y-m-d", strtotime($current_date));

  $duplicate = mysqli_query($conn, "SELECT * FROM customer WHERE Customer_name = '$name' OR Customer_email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo "<script> alert('Name or E-mail is already taken'); </script>";
  }
  else{
    if($_POST["password"] == $_POST["confirmpassword"]){
      $query = "INSERT INTO customer SET 
              Customer_name='$name',
              Customer_email='$email',
              Customer_no='$phone',
              branch_ID='$branch',
              Customer_gender='$selectedGender',
              Customer_plan = '$customer_plan',
              Date_due = '$date_due',
              isPaid = '$isPaid',
              password='$password'
        ";

        mysqli_query($conn,$query);
        header("Location: register.php"); 
        echo "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo "<script> alert('Password doesn't match'); </script>";
    }
  }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v1 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/SignUp.css">

</head>

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
    <link rel="stylesheet" href="css/SignUp.css" />

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

		<div class="wrapper" style="background-image: url('img/IN.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="img/EditFinal.png" alt="">
				</div>
	<form id="regiration_form" action="" method="POST" class="white-text">
					 <!-- first page -->
    <fieldset>
      <div class="form-group">
          <label for="Customerplan">Customer Plan</label>
          <select class="form-control" id="Customer_plan" name="Customer_plan">
            <option value="Monthly">Monthly</option>
            <option value="Trimonthly">Tri-Monthly</option>
            <option value="Yearly">Yearly</option>
          </select>
      </div>


      <input type="button" name="next" class="next btn btn-info" value="Next" />
    </fieldset>
    <!-- second page -->
    <fieldset>
        <div class="form-group">
          <input type="text" placeholder="First Name" name="first" class="form-control">
          <input type="text" placeholder="Last Name" name="last" class="form-control">        
        </div>

        <div class="form-wrapper">
          <label for="email">Email address</label>
          <input type="email" class="form-control" name="email" placeholder="name@example.com">
        </div>

        <div class="form-wrapper">
          <label for="phone">Enter a phone number:</label>
          <input type="tel" id="phone" name="phone" placeholder="0900 000 0000" pattern="^09[0-9]{9}$" required>
        </div>

        <div class="form-wrapper">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        
        <div class="form-wrapper">
          <label for="confirmpassword">Confirm Password</label>
          <input type="password" class="form-control" name="confirmpassword" placeholder="Password">
        </div>

        <div class="form-wrapper">
          <label for="exampleFormControlSelect1">Select Branch</label>
          <select class="form-control" id="exampleFormControlSelect1" name="selected-branch">
          <?php 
              //Create PHP Code to display categories from Database
              //1. CReate SQL to get all active categories from database
              $sql = "SELECT * FROM branch";
              
              //Executing qUery
              $res = mysqli_query($conn, $sql);

              //Count Rows to check whether we have categories or not
              $count = mysqli_num_rows($res);

              //IF count is greater than zero, we have categories else we donot have categories
              if($count>0)
              {
                  //WE have categories
                  while($row=mysqli_fetch_assoc($res))
                  {
                      //get the details of categories
                      $id = $row['Branch_ID'];
                      $title = $row['Branch_location'];
                      ?>
                      <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                      <?php
                  }
              }
              else
              {
                  //WE do not have category
                  ?>
                  <option value="0">No Category Found</option>
                  <?php
              }
              //2. Display on Drpopdown
          ?>
          </select>
        </div>

        <div class="form-check">
          <label>Gender:</label><br>
          <input class="form-check-input" type="radio" id="male" name="gender" value="male">
          <label for="male">Male</label>
          <br>
          <input class="form-check-input" type="radio" id="female" name="gender" value="female">
          <label for="female">Female</label>
          <br>
          <input class="form-check-input" type="radio" id="other" name="gender" value="other">
          <label for="other">Other</label>
        </div>

        <button type="submit" name="submit" id="submit_data" class="submit btn btn-primary" value="Submit">Register<i class="zmdi zmdi-arrow-right"></i></button>
    </fieldset>
				</form>
			</div>
		</div>
		
	</body>
</html>

<script type="text/javascript">
      // Get the selectedValue from the URL parameters
      const urlParams = new URLSearchParams(window.location.search);
    const selectedValue = urlParams.get('selectedValue');

    // Set the selected value in the <select> element
    if (selectedValue) {
      document.getElementById('Customer_plan').value = selectedValue;
    }

  $(document).ready(function(){
    var current = 1,current_step,next_step,steps,prev_step;
    steps = $("fieldset").length;
    $(".next").click(function(){
      current_step = $(this).parent();
      next_step = $(this).parent().next();
      next_step.show();
      current_step.hide();
    });
    $(".previous").click(function(){
      current_step = $(this).parent();
      prev_step = $(this).parent().prev();
      prev_step.show();
      current_step.hide();
    });
});
</script>