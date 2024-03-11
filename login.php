<?php 
include('partials-front/menu.php');
if(isset($_SESSION['customer'])){
    header('location: index.php');
}

if(isset($_POST["submit"])){
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  $raw_password = md5($_POST['password']);
  $password = mysqli_real_escape_string($conn, $raw_password);

  $result = mysqli_query($conn, "SELECT * FROM customer WHERE Customer_email = '$email' ");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row["password"]){
      $_SESSION['customer'] = $row["Customer_ID"];
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


<div class="login-container px-4 py-5 mx-auto">
    <div class="card card0 slide-bck-cnter">
        <div class="d-flex flex-lg-row flex-column-reverse">
            <div class="card card1 ">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-10 my-5">
                        <div class="row justify-content-center px-3 mb-3">
                            <img id="logo" src="img/AX_yellow.png">
                        </div>
                        <h3 class="mb-5 text-center heading">AX Fitness</h3>

                        <h6 class="msg-info">Please login to your account</h6>
                        <div class="form-group mb-3">
                            <label for="loginAs" class="form-control-label text-muted">Login As</label>
                            <select class="form-control" id="redirectSelect" name="loginAs">
                              
                                <option  value ="login.php">Customer</option> 
                                <option value="coach/login.php">Coach</option>

                            </select>
                        </div>
                        <form action="" method="POST">
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
                                <button type="submit" name="submit" class="btn-block btn-color">Login to AX Fitness</button>
                            </div>
                            <div class="row justify-content-center my-2">
                                <a href="#"><small class="text-muted">Forgot Password?</small></a>
                            </div>
                            </div>
                        </div>
                        <div class="bottom text-center mb-5">
                            <p class="sm-text mx-auto mb-3">Don't have an account? <a href="member.php" class="btn btn-white ml-2">Create new</a></p>
                        </div>
                        </form>
                
            </div>
            <div class="card card2">
                <div class="my-auto mx-md-5 px-md-5 right">
                    <h3 class="text-white">JOIN AX FITNESS</h3>
                    <small class="text-white">TEXT HERE TEXT HERE TEXT HERE TEXT HERE TEXT HERE TEXT HERE TEXT HERE</small> <!--mas maganda meron dito (short but concise and engaging sa user)-->
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

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
//paayos nito kasi di nagrereveal yung password (dot dot) tapos ayaw din maadjust nung button dun, gusto ko paliitin pero 
//ayaw hay ->>>> note (nakacall naman to sa login1 html ayaw parin amp)

//tangina mo brian

document.getElementById('redirectSelect').addEventListener('change', function() {
    // Get the selected option value
    var selectedValue = this.value;

    // Redirect the user to the selected URL
    if (selectedValue) {
        window.location.href = selectedValue;
    }
});
</script>

<script src="js/bootstrap.min.js"></script>

