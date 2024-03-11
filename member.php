<?php include('partials-front/menu.php'); 

if (isset($_SESSION['customer'])) {
    header("Location: login.php");
  }
?>

<div class="training-plans">MEMBERSHIP PLANS</div>

<div class="train-container white-text">
    <div class="training">
    <img src="img/card_img1.png" alt="Avatar">
    <div class="training-container">
        <h4><b>Monthly</b></h4>
        <p>Membership fee is 900</p>
        <p>With discount is 800</p>
        <div class="button-container">
        <button type="submit" name="choice" value="Monthly" id="unique-button" class="btn btn-custom"><a href="register.php?selectedValue=Monthly" style="text-decoration: none;">Try it out</a></button>
        </div>
    </div>
    </div>

    <div class="training">
    <img src="img/card_img2.jpg" alt="Avatar">
    <div class="training-container">
        <h4><b>Tri-Monthly</b></h4>
        <p>Membership fee is 2700</p>
        <p>With discount is 2300</p>
        <div class="button-container">
        <button type="submit" name="choice" value="Trimonthly" id="unique-button" class="btn btn-custom"><a href="register.php?selectedValue=Trimonthly" style="text-decoration: none;">Try it out</a></button>
        </div>
    </div>
    </div>

    <div class="training">
    <img src="img/card_img3.jpg" alt="Avatar">
    <div class="training-container">
        <h4><b>Yearly</b></h4>
        <p>Membership fee is 8600</p>
        <p>With discount is 8000</p>
        <div class="button-container">
        <button type="submit" name="choice" value="Yearly" id="unique-button" class="btn btn-custom"><a href="register.php?selectedValue=Yearly" style="text-decoration: none;">Try it out</a></button>
        </div>
    </div>
    </div>
</div>

<script src="js/bootstrap.min.js"></script>



<?php include('partials-front/footer.php'); ?>