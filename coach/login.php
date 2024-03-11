

<?php 
include('../config/constants.php'); 
session_start();

if(isset($_POST["submit"])){
  $email = $_POST["email"];
  $raw_password = md5($_POST['password']);
  $password = mysqli_real_escape_string($conn, $raw_password);
  $result = mysqli_query($conn, "SELECT * FROM coach WHERE Coach_email = '$email' ");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row["password"]){
      $_SESSION["coach"] = $row["Coach_ID"];
      $_SESSION["coach_loc"] = $row["Branch_ID"];
      header("Location: index.php");  
    }
    else{
      echo "<script> alert('Wrong Password'); </script>";
    }
  }else{
    echo "<script> alert('User Not Registered'); </script>";
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
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/styles.css" />
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<div class="login-container px-4 py-5 mx-auto">
    <div class="card card0 slide-bck-cnter">
        <div class="d-flex flex-lg-row flex-column-reverse">
            <div class="card card1 ">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-10 my-5">
                        <div class="row justify-content-center px-3 mb-3">
                            <img id="logo" src="../img/AX_yellow.png">
                        </div>
                        <h3 class="mb-5 text-center heading">AX Coach</h3>
                        <?php if(isset($_GET['error'])) {?>
                            <p class="error"> <?php echo $_GET['error']; ?></p>
                        <?php } ?>

                        <h6 class="msg-info">Login to your account, Coach</h6>
                        <form action="login.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="loginAs" class="form-control-label text-muted">Login As</label>
                            <select class="form-control" id="redirectSelect" name="loginAs">
                              
                            <option value="coach/login.php">Coach</option>
                            <option  value ="../login.php">Customer</option> 
                                

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label text-muted"></label>
                            <input type="text" id="email" name="email" placeholder="Email Address" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label text-muted"></label>
                            <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                           
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox"  id="showPasswordCheckbox">
                            <label class="form-check-label" for="showPasswordCheckbox">Show Password</label>
                        </div>
                        
                        <div class="row justify-content-center my-3 px-3">
                            <button type="submit" name="submit" class="btn-block btn-color">Login as Coach</button>
                        </div>

                        <div class="row justify-content-center my-2">
                            <a href="#"><small class="text-muted">Forgot Password?</small></a>
                        </div>
                        </form>
                    </div>
                </div>
                
            </div>
            <div class="card card4">
                <div class="my-auto mx-md-5 px-md-5 right">
                    <h3 class="text-white">BECOME AN AX FITNESS COACH</h3>
                    <small class="text-white">If you wish to apply to become a coach, send us a message in our facebook page</small> <!--mas maganda meron dito (short but concise and engaging sa user)-->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../js/bootstrap.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
        var showPasswordCheckbox = document.getElementById('showPasswordCheckbox');
        var passwordField = document.getElementById('password');

        showPasswordCheckbox.addEventListener('change', function() {
            if (this.checked) {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    });

document.getElementById('redirectSelect').addEventListener('change', function() {
    // Get the selected option value
    var selectedValue = this.value;

    // Redirect the user to the selected URL
    if (selectedValue) {
        window.location.href = selectedValue;
    }
});
</script>


</body>
</html>