<?php include('partials/menu.php'); 

    $sql="SELECT * FROM coach where Coach_ID=" . $_SESSION['coach'] . "";

    $res=mysqli_query($conn, $sql);

    if($res==true)
    {
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $row=mysqli_fetch_assoc($res);

            $id = $row['Coach_ID'];
            $email = $row['Coach_email'];
            $phone = $row['Coach_no'];

        }
        else
        {
            header('profile.php');
        }
    }
?>


<div class="page-header">
    <div class="container">
        <form action="" method="POST" class="white-text login col-2">

          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
          </div>

          <div class="form-group">
            <label for="phone">Enter a phone number:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>" pattern="[0-9]{2} [0-9]{3} [0-9]{3} [0-9]{4}$" required>
          </div>
<!-- 
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div> -->

            <br>
          <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
            <br>
        </form>
    </div>
</div>

<?php 
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE coach SET
    Coach_email = '$email',
    Coach_no = '$phone'
    WHERE Coach_ID='$id'
    ";

    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
        $_SESSION['update'] = "<div class='success'>Details Updated Successfully.</div>";

        header('location: profile.php');
    }
    else
    {
        $_SESSION['update'] = "<div class='error'>Failed to Add Details</div>";

        header('location: profile.php');
    }
}

include('partials/footer.php'); ?>