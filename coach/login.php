

<?php 
include('../config/constants.php'); 
session_start();

if(isset($_POST["submit"])){
  $email = $_POST["email"];
  $password = $_POST["password"];
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
    <title>AX Fitness Admin</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Font-awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/admin.css" />
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body>

<div class="page-header">
    <div class="container">
        <form action="login.php" method="POST" class="white-text login col-2">
          <h2>LOGIN</h2>
          <?php if(isset($_GET['error'])) {?>
            <p class="error"> <?php echo $_GET['error']; ?></p>
          <?php } ?>

          <div class="form-group">
            <label for="exampleInputEmail1">E-mail</label>
            <input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          </div>

          <button type="submit" name="submit" class="btn btn-primary">Login</button>
            <br>
        </form>
    </div>
</div>

<script src="../js/bootstrap.min.js"></script>

</body>
</html>