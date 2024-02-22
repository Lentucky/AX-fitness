<?php include('partials-front/menu.php'); ?>

<?php 
if(isset($_POST["submit"])){
    $referenceNo = $_POST["referenceNo"];
    $Payment= $_POST["Payment"];
    $Date= $_POST["Date"];
    $phone_no= $_POST["phone_no"];
    $Customer_ID= $_POST["Customer_ID"];

    //for payment
    if(isset($_FILES['image']['payment_image']))
    {
        //Get the details of the selected image
        $payment_image = $_FILES['image']['payment_image'];
        $current = date("Y-m-d");

        //Check Whether the Image is Selected or not and upload image only if selected
        if($payment_image!="")
        {
            // Image is SElected
            //A. REnamge the Image
            //Get the extension of selected image (jpg, png, gif, etc.) "vijay-thapa.jpg" vijay-thapa jpg
            $ext = end(explode('.', $payment_image));

            // Create New Name for Image
            $payment_image = "Payment-".$current."-".rand(000,999).".".$ext;

            //B. Upload the Image
            //Get the Src Path and DEstinaton path

            // Source path is the current location of the image
            $src = $_FILES['image']['tmp_name'];

            //Destination Path for the image to be uploaded
            $dst = "../img/payment/".$payment_image;

            //Finally Uppload the food image
            $upload = move_uploaded_file($src, $dst);

            //check whether image uploaded of not
            if($upload==false)
            {
                //Failed to Upload the image
                //REdirect to Add Food Page with Error Message
                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                header('location: profile.php');
                //STop the process
                die();
            }

        }

    }
    else
    {
        $payment_image = ""; //SEtting DEfault Value as blank
    }

    //for identification
    if(isset($_FILES['image']['discount']))
    {
        //Get the details of the selected image
        $identification = $_FILES['image']['discount'];
        $current = date("Y-m-d");

        //Check Whether the Image is Selected or not and upload image only if selected
        if($identification!="")
        {
            // Image is SElected
            //A. REnamge the Image
            //Get the extension of selected image (jpg, png, gif, etc.) "vijay-thapa.jpg" vijay-thapa jpg
            $ext2 = end(explode('.', $identification));

            // Create New Name for Image
            $identification = "ID-".$current."-".rand(000,999).".".$ext2;

            //B. Upload the Image
            //Get the Src Path and DEstinaton path

            // Source path is the current location of the image
            $src2 = $_FILES['image']['tmp_name'];

            //Destination Path for the image to be uploaded
            $dst2 = "../img/IDs/".$identification;

            //Finally Uppload the food image
            $upload2 = move_uploaded_file($src2, $dst2);

            //check whether image uploaded of not
            if($upload2==false)
            {
                //Failed to Upload the image
                //REdirect to Add Food Page with Error Message
                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                header('location: profile.php');
                //STop the process
                die();
            }

        }

    }
    else
    {
        $payment_image = ""; //SEtting DEfault Value as blank
    }
    
    $query = "INSERT INTO coach SET 
            Coach_name='$name',
            branch_ID='$branch',
            Coach_email='$email',
            Coach_no='$phone',
            Coach_gender='$selectedGender',
            password='$password'
    ";

    mysqli_query($conn,$query);
    echo "<script> alert('Registration Successful'); </script>";
    header("location: coach.php");

}

?>

<div class="page-header">
    <div class="container">
        <h1>Payment</h1>
        <h3>Our online service only accepts Gcash and Paymaya payment currently</h3>
        <form action="" method="POST" class="white-text login col-2">
          <div class="form-group">
            <label for="first">Select QR Code</label>
            <select class="form-control">
                <option>Paymaya</option>
                <option>Gcash</option>
            </select>
          </div>

          <div class="form-group">
            <label for="last">Are you a student or a senior/PWD?</label>
            <input class="form-check-input" type="radio" id="yes" name="yes" value="male">
            <label for="male">Yes</label>
            <input class="form-check-input" type="radio" id="no" name="no" value="female" checked>
            <label for="female">No</label>
          </div>

          <div class="custom-file">
            <input type="file" class="custom-file-input" id="discount" name="discount">
            <label class="custom-file-label" for="customFile">Put your ID here to confirm your discount</label>
          </div>

          <div class="custom-file">
            <input type="file" class="custom-file-input" id="payment_image" name="payment_image">
            <label class="custom-file-label" for="customFile">Put your image receipt here</label>
          </div>
          
          <div class="form-group">
            <label for="phone">Reference Number:</label>
            <input type="tel" id="reference" name="reference" placeholder="Input the Reference Number here" required>
          </div>

          <div class="form-group">
            <label for="phone">Phone number used for payment:</label>
            <input type="tel" id="phone" name="phone" placeholder="0900 000 0000" pattern="[0-9]{2} [0-9]{3} [0-9]{3} [0-9]{4}$" required>
          </div>

            <br>
          <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
            <br>
        </form>
    </div>
</div>

<?php include('partials-front/footer.php'); ?>