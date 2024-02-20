<?php include('partials-front/menu.php'); 
session_start();
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
  $customerplan = $_POST["Customer_plan"];
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
              Customer_no='$phone',
              branch_ID='$branch',
              Customer_gender='$selectedGender',
              Customer_plan = '$customerplan',
              Date_due = '$date_due',
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
<form id="regiration_form" action="" method="POST" class="white-text login col-2">

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
        <input type="tel" id="phone" name="phone" placeholder="0900 000 0000" pattern="^09[0-9]{9}$" required>
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

      <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
      <button type="submit" name="submit" id="submit_data" class="submit btn btn-primary" value="Submit">Submit</button>
  </fieldset>

</form>

<?php include('partials-front/footer.php'); ?>

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