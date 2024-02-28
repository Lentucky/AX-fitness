<?php include('partials-front/menu.php'); 

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

  switch ($customer_plan) {
    case "Monthly":
        $days_to_add = 30;
        break;
    case "Trimonthly":
        $days_to_add = 90;
        break;
    case "Yearly":
        $days_to_add = 365;
        break;
    default:
        // Handle unrecognized plan, or set a default value
        $days_to_add = 0;
  }
  
  $selectedGender = $_POST["gender"];

  $date_due = date("Y-m-d", strtotime($current_date . " +{$days_to_add} days"));

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
                    $id = $row['id'];
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

      <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
      <button type="submit" name="submit" id="submit_data" class="submit btn btn-primary" value="Submit">Submit</button>
  </fieldset>
  <!-- third page -->
  <!-- <fieldset>
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="customFile">
      <label class="custom-file-label" for="customFile">Choose file</label>
    </div>

    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <button type="submit" name="submit" id="submit_data" class="submit btn btn-primary" value="Submit">Submit</button>
  </fieldset> -->

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