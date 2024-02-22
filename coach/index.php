<?php 
include('partials/menu.php');

if(isset($_SESSION['update']))
{
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}

if(isset($_SESSION['update-remove']))
{
    echo $_SESSION['update-remove'];
    unset($_SESSION['update-remove']);
}

if(isset($_SESSION['update-status']))
{
    echo $_SESSION['update-status'];
    unset($_SESSION['update-status']);
}

$sql2 = "SELECT Branch_location 
        FROM branch
        JOIN coach ON branch.Branch_ID = coach.Branch_ID 
        WHERE Coach_ID = '" . $_SESSION["coach"] . "' LIMIT 1";
$result2 = mysqli_query($conn, $sql2);

if ($result2 && mysqli_num_rows($result2) > 0) {
    $row2 = mysqli_fetch_assoc($result2);
    $branchName = $row2['Branch_location'];
}


 ?>


<!-- display the clients scheduled with the coach logged in -->
<div class="container">
<h1 class="white-text">Your clients from Branch: <?php echo $branchName?></h1>

    <br>
    <a class="btn btn-primary" href="add-customer.php" role="button">Add Client</a>
    <br><br>

    <table class="table table-striped table-dark">
    <thead>
        <tr>
        <th scope="col">Name</th>
        <th scope="col">E-mail</th>
        <th scope="col">Phone No.</th>
        <th scope="col">Gender</th>
        <th scope="col">Membership</th>
        <th scope="col">Date Due</th>
        <th class="col">Status</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
    <?php 
            //Query to Get all Admin
            $sql = "SELECT * 
                    FROM customer 
                    JOIN branch ON customer.Branch_ID = branch.Branch_ID 
                    WHERE customer.Branch_ID = '" . $_SESSION["coach_loc"] . "'";
                //Execute the Query
            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //CHeck whether the Query is Executed of Not
            if($res==TRUE)
            {
                // Count Rows to CHeck whether we have data in database or not
                $count = mysqli_num_rows($res); // Function to get all the rows in database

                //CHeck the num of rows
                if($count>0)
                {
                    //WE HAve data in database
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        //Using While loop to get all the data from database.
                        //And while loop will run as long as we have data in database

                        //Get individual DAta
                        $customer_id=$rows['Customer_ID'];
                        $name=$rows['Customer_name'];
                        $email=$rows['Customer_email'];
                        $number=$rows['Customer_no'];
                        $gender=$rows['Customer_gender'];
                        $plan=$rows['Customer_plan'];
                        $due=$rows['Date_due'];
                        $branch=$rows['Branch_location'];
                        $isPaid=$rows['isPaid']
                        //Display the Values in our Table
                        ?>     

                        <tr>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $number; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><?php echo $plan; ?></td>
                            <td><?php echo $due; ?></td>
                            <td><?php echo $isPaid; ?></td>
                            <td>
                                <a class="btn btn-primary" href="transaction.php?id=<?php echo $customer_id; ?>" role="button">Transaction History</a>
                                <a class="btn btn-success" href="update-status.php?id=<?php echo $customer_id; ?>" role="button">Update Status</a>
                            </td>
                        </tr>

                        <?php

                    }
                }
                else
                {
                    echo "<h2 class='white-text'> You have no current clients </h2>";
                    //We Do not Have Data in Database
                }
            }

        ?>
    </tbody>
    </table>
</div>
<?php 
include('partials/footer.php'); 
 ?>