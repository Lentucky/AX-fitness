<?php 
include('partials-front/menu.php'); 

if(isset($_SESSION['upload']))
{
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}

//Create SQL query to get all the fucking users
// $sql = "SELECT * FROM customer where Customer_ID='" . $_SESSION['customer'] . "'";
$sql = "SELECT *
        FROM customer 
        JOIN branch ON customer.branch_id = branch.branch_ID
        WHERE customer.Customer_ID = '" . $_SESSION['customer'] . "'";
//execute the query
$res = mysqli_query($conn, $sql);

//Count rows to check whether we have food or not
$count = mysqli_num_rows($res);

if($count>0)
{
        //We have food in database
        //Get the food from database and display
        while($rows=mysqli_fetch_assoc($res))
        {
                //get the value from the individual columns
                $id=$rows['Customer_ID'];
                $name=$rows['Customer_name'];
                $branch=$rows['Branch_location'];
                $email=$rows['Customer_email'];
                $number=$rows['Customer_no'];
                $gender=$rows['Customer_gender'];
                $plan=$rows['Customer_plan'];
                $due=$rows['Date_due'];
                $isPaid=$rows['isPaid'];
        }

}

 ?>
<div class="container">
<div class="row">
    <h4 class="card-title mb-4">Personal Details</h4>
    <div class="table-responsive">
        <table class="table table-bordered mb-0">
            <tbody>
                <tr>
                    <th scope="row">Name</th>
                    <td><?php echo $name; ?></td>
                </tr><!-- end tr -->
                <tr>
                    <th scope="row">Branch Enrolled</th>
                    <td><?php echo $branch; ?></td>
                </tr><!-- end tr -->
                <tr>
                    <th scope="row">E-mail</th>
                    <td><?php echo $email; ?></td>
                </tr><!-- end tr -->
                <tr>
                    <th scope="row">Number</th>
                    <td><?php echo $number; ?></td>
                </tr><!-- end tr -->
                <tr>
                    <th scope="row">Gender</th>
                    <td><?php echo $gender; ?></td>
                </tr><!-- end tr -->
            </tbody><!-- end tbody -->
        </table><!-- end table -->
    </div>

    <br>
    <a class='btn btn-primary' href='edit-profile.php' role='button'>Edit your Information</a>
</div>

    <div>
        <h2 class="card-title mb-4">Payment Status for this month:</h2>
        <ul class="list-unstyled work-activity mb-0">
            <?php
            if($isPaid=="Paid"){
            echo 
            "<li class='work-item' data-date='2020-21'>
                <h3 class='lh-base mb-0'>Paid!</h3>
                <h4 class='1h-base mb-0'>You have paid for your membership for your current term!</h4>
            </li>";
            }else{
            echo
            "<li class='work-item' data-date='2020-21'>
                <h3 class='lh-base mb-0'>Payment is due for this term.</h3>
                <h4 class='1h-base mb-0'>You will not be able to enter the gym, if you have yet to pay your membership fees.</h4>
                <a class='btn btn-success' href='payment.php' role='button'>Pay Now</a>
            </li>";
            }
            ?>
        </ul><!-- end ul -->
    </div>
</div>
</div>

<?php 
include('partials-front/footer.php'); 

 ?>