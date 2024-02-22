<?php include('partials-front/menu.php'); ?>

    <?php 
      if(isset($_SESSION['customer']))
      {
          echo $_SESSION['customer'];
          
      }
    ?>

<header class="trailer">
    <div class="container">
        
    </div>
</header>

<div class="container">
<div class="row">
        <h4 class="card-title mb-4">Personal Details</h4>
        <div class="table-responsive">
            <table class="table table-bordered mb-0">
                <tbody>
                    <tr>
                        <th scope="row">Name</th>
                        <td>Jansh Wells</td>
                    </tr><!-- end tr -->
                    <tr>
                        <th scope="row">Location</th>
                        <td>California, United States</td>
                    </tr><!-- end tr -->
                    <tr>
                        <th scope="row">Language</th>
                        <td>English</td>
                    </tr><!-- end tr -->
                    <tr>
                        <th scope="row">Website</th>
                        <td>abc12@probic.com</td>
                    </tr><!-- end tr -->
                </tbody><!-- end tbody -->
            </table><!-- end table -->
        </div>
    </div>

    <div>
        <h2 class="card-title mb-4">Payment Status for this month</h2>
        <ul class="list-unstyled work-activity mb-0">
            <li class="work-item" data-date="2020-21">
                <h3 class="lh-base mb-0">Paid! You have paid for your membership for your current term!</h3>
                <p class="font-size-13 mb-2">Web Designer</p>
                <p>To achieve this, it would be necessary to have uniform grammar, and more
                    common words.</p>
            </li>
            <li class="work-item" data-date="2020-21">
                <h3 class="lh-base mb-0">Payment is due for this term.</h3>
                <h4 class="1h-base mb-0">You will not be able to enter the gym, if you have yet to pay your membership fees.</h4>
                <a class="btn btn-success" href="add-customer.php" role="button">Pay Now</a>
            </li>
        </ul><!-- end ul -->
    </div>
</div>
</div>

<?php include('partials-front/footer.php'); ?>