<?php include('partials/menu.php'); ?>

<?php 

require '../config/constants.php';
if(isset($_POST["submit"])){
    $name = $_POST["first"] . " " . $_POST["last"];
    $branch = $_POST["selected-branch"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = md5($_POST['password']);
    $selectedGender = $_POST["gender"];
    $present = "Checked_out";
    $query = "INSERT INTO coach SET 
            Coach_name='$name',
            branch_ID='$branch',
            Coach_email='$email',
            Coach_no='$phone',
            Coach_gender='$selectedGender',
            password='$password',
            present = '$present'
    ";

    mysqli_query($conn,$query);
    echo "<script> alert('Registration Successful'); </script>";
    header("location: coach.php");

}

?>

<div class="page-header">
    <div class="container">
        <form action="" method="POST" class="white-text login col-2">
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
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>

          <div class="form-group">
            <label for="phone">Enter a phone number:</label>
            <input type="tel" id="phone" name="phone" placeholder="63 000 000 0000" pattern="[0-9]{2} [0-9]{3} [0-9]{3} [0-9]{4}$" required>
          </div>

          <div class="form-group">
            <label for="branch">Select Branch</label>
            <select class="form-control" id="branch" name="selected-branch">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>

          <label>Gender:</label>
            <input class="form-check-input" type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>

            <input class="form-check-input" type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>

            <input class="form-check-input" type="radio" id="other" name="gender" value="other">
            <label for="other">Other</label>
            
            <br>
          <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
            <br>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>