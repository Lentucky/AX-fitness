<?php 
include('partials-front/menu.php'); 

//Create SQL query to get all the fucking users
$sql = "SELECT * FROM customer where Customer_ID='" . $_SESSION['customer'] . "'";

//execute the query
$res = mysqli_query($conn, $sql);

//Count rows to check whether we have food or not
$count = mysqli_num_rows($res);

if($count>0)
{
        //We have food in database
        //Get the food from database and display
        while($row=mysqli_fetch_assoc($res))
        {
                //get the value from the individual columns
                $id=$rows['Customer_ID'];
                $name=$rows['Customer_name'];
                $branch=$rows['Branch_ID'];
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

<?php 
include('partials-front/footer.php'); 

 ?>