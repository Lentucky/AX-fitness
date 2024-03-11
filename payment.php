<?php include('partials-front/menu.php'); ?>

<?php 
if (!isset($_SESSION['customer'])) {
  header("Location: login.php");
}

if(isset($_POST["submit"])){
  $current = date("Y-m-d");
    $referenceNo = $_POST["reference"];
    // $Payment= $_POST["Payment"];
    $Payment= 200;
    $Date= $current;
    $phone_no= $_POST["phone"];
    $Customer_ID= $_SESSION['customer'];
    //for payment
    if(isset($_FILES['payment_image']['name']))
    {
        //Get the details of the selected image
        $payment_image = $_FILES['payment_image']['name'];

        //Check Whether the Image is Selected or not and upload image only if selected
        if($payment_image!="")
        {
            // Image is SElected
            //A. REnamge the Image
            //Get the extension of selected image (jpg, png, gif, etc.) "vijay-thapa.jpg" vijay-thapa jpg
            $ext = end(explode('.', $payment_image));

            // Create New Name for Image
            $payment_image = "Payment-".$current."-".rand(00,99).".".$ext;

            //B. Upload the Image
            //Get the Src Path and DEstinaton path

            // Source path is the current location of the image
            $src = $_FILES['payment_image']['tmp_name'];

            //Destination Path for the image to be uploaded
            $dst = "img/payment/".$payment_image;

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
        $payment_image = "none"; //SEtting DEfault Value as blank
    }
    if ($_FILES['payment_image']['error'] != UPLOAD_ERR_OK) {
      echo "File upload failed with error code: " . $_FILES['payment_image']['error'];
      die();
    }
    //for identification
    if(isset($_FILES['discount']['name']))
    {
        //Get the details of the selected image
        $identification = $_FILES['discount']['name'];

        //Check Whether the Image is Selected or not and upload image only if selected
        if($identification!="")
        {
            // Image is SElected
            $ext2 = end(explode('.', $identification));

            // Create New Name for Image
            $identification = "ID-".$current."-".rand(000,999).".".$ext2;

            //B. Upload the Image
            //Get the Src Path and DEstinaton path
            // Source path is the current location of the image
            $src2 = $_FILES['discount']['tmp_name'];

            //Destination Path for the image to be uploaded
            $dst2 = "img/IDs/".$identification;

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
        $identification = "none"; //SEtting DEfault Value as blank
    }
    
    $query = "INSERT INTO transactions SET 
            referenceNo='$referenceNo',
            receipt='$payment_image',
            identification='$identification',
            Payment='$Payment',
            Date='$Date',
            phone_no='$phone_no',
            Customer_ID='$Customer_ID'
    ";

    mysqli_query($conn,$query);
    echo "<script> alert('Payment Successful'); </script>";
    header("location: index.php");
   
  if ($isPaid=="Pending") {
      header("Location: profile.php");
  }
}

?>
<h1>Payment</h1>
<div class="page-header" style="display: flex;">
    
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data" class="white-text login">
          <div class="form-group">
              <h5>Are you a student or a senior/PWD?</h5>

              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="hide" name="example" value="hide" checked>
                  <label class="form-check-label" for="hide">No</label>
              </div>

              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="show" name="example" value="show">
                  <label class="form-check-label" for="show">Yes</label>
              </div>
          </div>
          <div id="hiddenInput" class="custom-file" style="display:none;">
          <label class="custom-file-label" for="discount">Put your ID here to confirm your discount</label>
            <input type="file" class="custom-file-input" id="discount" name="discount">
            <br><br>
          </div>

          <div class="custom-file">
            <label class="custom-file-label" for="payment_image">Put your image receipt here</label>
            <input type="file" class="custom-file-input" id="payment_image" name="payment_image">
          </div>
          
          <div class="form-group">
            <label for="reference">Reference Number:</label>
            <input type="text" id="reference" name="reference" placeholder="Input the Reference Number here" required>
          </div>

          <div class="form-group">
            <label for="phone">Phone number used for payment:</label>
            <input type="tel" id="phone" name="phone" placeholder="0900 000 0000" pattern="^09[0-9]{9}$" required>
          </div>

            <br>
          <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
            <br>
        </form>
    </div>
    <div class="container">
      <div class="form-group">
          <img src="img/QR_Code.png" alt="" style="width: 60%;">
      </div>
      <h>Our online service only accepts Gcash and Paymaya payment currently</h4>
    </div>
</div>

<script type="text/javascript">
const box = document.getElementById('hiddenInput');

function handleRadioClick() {
  if (document.getElementById('show').checked) {
    box.style.display = 'block';
  } else {
    box.style.display = 'none';
  }
}

const radioButtons = document.querySelectorAll('input[name="example"]');
radioButtons.forEach(radio => {
  radio.addEventListener('click', handleRadioClick);
});
</script>
<?php include('partials-front/footer.php'); ?>