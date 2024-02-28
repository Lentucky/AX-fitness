<?php include('partials/menu.php'); 

    $customer_id = $_GET['id'];

    $sql="SELECT * FROM customer where Customer_ID=$customer_id";

    if($row['Branch_ID']!= '" . $_SESSION["coach_loc"] . "'){

    }else{
    $res=mysqli_query($conn, $sql);

    if($res==true)
    {
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $row=mysqli_fetch_assoc($res);

            $id = $row['Customer_ID'];
            $name = $row['Customer_name'];

            // Separate first name and last name
            $name_parts = explode(' ', $name);
            $first_name = $name_parts[0]; // First name
            $last_name = isset($name_parts[1]) ? $name_parts[1] : '';

            $email = $row['Customer_email'];
            $phone = $row['Customer_no'];
            $gender = $row['Customer_gender'];
            $plan = $row['Customer_plan'];
            $password = $row['password'];
        }
        else
        {
            header('profile.php');
        }
    }
    }
    ob_start();

?>
<form id="regiration_form" action="" method="POST" class="white-text login col-2">
  <fieldset>
    <div class="form-group">
        <label for="Customerplan">Customer Plan</label>
        <select class="form-control" id="Customer_plan" name="Customer_plan" value="<?php $customer_plan?>">
          <option value="Monthly">Monthly</option>
          <option value="Trimonthly">Tri-Monthly</option>
          <option value="Yearly">Yearly</option>
        </select>
    </div>

      <div class="form-group">
        <label for="first">First name</label>
        <input type="text" class="form-control" name="first" aria-describedby="emailHelp" value="<?php echo $first_name;?>">
      </div>

      <div class="form-group">
        <label for="last">Last name</label>
        <input type="text" class="form-control" name="last" aria-describedby="emailHelp" value="<?php echo $last_name;?>">
      </div>

      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" value="<?php echo $email?>">
      </div>

      <div class="form-group">
        <label for="phone">Enter a phone number:</label>
        <input type="tel" id="phone" name="phone" value="<?php echo $phone?>" pattern="^09[0-9]{9}$" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" value="<?php echo $password?>">
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Select Branch</label>
        <select class="form-control" id="exampleFormControlSelect1" name="selected-branch" value="<?php echo $branch?>">
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

      <button type="submit" name="submit" id="submit_data" class="submit btn btn-primary" value="Submit">Submit</button>
  </fieldset>
</form>


<script type="text/javascript">
      // Get the selectedValue from the URL parameters
      const urlParams = new URLSearchParams(window.location.search);
    const selectedValue = urlParams.get('selectedValue');

    // Set the selected value in the <select> element
    if (selectedValue) {
      document.getElementById('Customer_plan').value = selectedValue;
    }
</script>

<?php 

if(isset($_POST["submitmember"])){
    $customerplan = $_POST["choice"];
  }
  
  if(isset($_POST["submit"])){
  
    $name = $_POST["first"] . " " . $_POST["last"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
  
    $password = $_POST["password"];
  
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
  
    $query = "UPDATE Customer SET
            Customer_name='$name',
            Customer_email='$email',
            Customer_no='$phone',
            branch_ID='$branch',
            Customer_gender='$selectedGender',
            Customer_plan = '$customer_plan',
            Date_due = '$date_due',
            password='$password'
            WHERE Customer_ID=$customer_id;
        ";

    $res2 = mysqli_query($conn,$query);
    
    if($res2==true)
    {
        header("Location: index.php"); 
        echo "<script> alert('Update Successful'); </script>";
    }
    else
    {
        header("Location: profile.php"); 
        echo "<script> alert('Wasn't able to complete Update.'); </script>";
    }
  
}
include('partials/footer.php'); ?>
