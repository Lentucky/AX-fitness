<?php include('partials-front/menu.php'); 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['Customer_plan'])) {
    $_SESSION['step1'] = $_POST['Customer_plan'];
    header("Location: register.php#step2");
    exit();
  }

  if (isset($_POST['email'])) {
    $customerplan = $_SESSION['step1'];

    $name = $_POST["first"] . " " . $_POST["last"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $coach = 0;
  
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    $branch = $_POST["selected-branch"];
    $selectedGender = $_POST["gender"];
    $date_due = date('Y-m-d', strtotime('+30 days'));
    $duplicate = mysqli_query($conn, "SELECT * FROM customer WHERE Customer_name = '$name' OR Customer_email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
      echo "<script> alert('Name or E-mail is already taken'); </script>";
    }
    else{
      if($_POST["password"] == $_POST["confirmpassword"]){
        $query = "INSERT INTO customer SET 
                Customer_name='$name',
                Customer_email='$email',
                Coach_ID = '$coach',
                Customer_no='$phone',
                branch_ID='$branch',
                Customer_gender='$selectedGender',
                Customer_plan = '$customerplan',
                Date_due = '$date_due',
                password='$password'
          ";

          mysqli_query($conn,$query);
          echo "<script> alert('Registration Successful'); </script>";
      }
      else{
        echo "<script> alert('Password doesn't match'); </script>";
      }
    }
  }
}

?>
<form action="" method="POST" class="white-text login col-2">

<!-- first page -->
<fieldset>
  <div class="page-header">
    <div class="container">
      <div class="form-group">
          <label for="Customerplan">Customer Plan</label>
          <select class="form-control" id="Customerplan" name="Customer_plan">
            <option value="Simple">Simple</option>
            <option value="Assisted">Assisted</option>
          </select>
      </div>
    </div>
  </div>

  <button type="submit" name="next" id="Next" class="btn btn-primary">Next</button>
</fieldset>

<br><br><br>

<!-- second page -->
<fieldset>
  <div class="page-header">
      <div class="container">

            <div class="form-group">
              <label for="first">First name</label>
              <input type="text" class="form-control" name="first" aria-describedby="emailHelp" placeholder="Enter first name">
            </div>

            <div class="form-group">
              <label for="last">Last name</label>
              <input type="text" class="form-control" name="last" aria-describedby="emailHelp" placeholder="Enter last name">
            </div>

            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" name="email" placeholder="name@example.com">
            </div>

            <div class="form-group">
              <label for="phone">Enter a phone number:</label>
              <input type="tel" id="phone" name="phone" placeholder="63 000 000 0000" pattern="[0-9]{2} [0-9]{3} [0-9]{3} [0-9]{4}$" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            
            <div class="form-group">
              <label for="confirmpassword">Confirm Password</label>
              <input type="password" class="form-control" name="confirmpassword" placeholder="Password">
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect1">Select Branch</label>
              <select class="form-control" id="exampleFormControlSelect1" name="selected-branch">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>

            <!-- <div class="form-check">
              <label for="">Discount Eligibility</label><br>
              <input class="form-check-input" type="checkbox" id="discounted" name="discounted">
              <label class="form-check-label" for="discounted">(Only for Person with Disability (PWD), Student, Senior Citizen)</label>
            </div> -->

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

            <button type="submit" name="previous" id="previous" class="btn btn-primary">Previous</button>
            <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
          
      </div>
  </div>
</fieldset>

</form>

<?php include('partials-front/footer.php'); ?>