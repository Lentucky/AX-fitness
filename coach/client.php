<?php 
include('partials/menu.php'); 
 ?>
<div class="container">
    <h1 class="white-text">Clients</h1>
    <form action="" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    <br>

    <table class="table table-striped table-dark">
    <thead>
        <tr>
        <th scope="col">Name</th>
        <th scope="col">E-mail</th>
        <th scope="col">Phone No.</th>
        <th scope="col">Branch</th>
        <th scope="col">Gender</th>
        <th scope="col">Membership</th>
        <th scope="col">Date Due</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(isset($_GET['search']))
        {
            $filtervalues = $_GET['search'];
            $query = "SELECT * 
                    FROM customer 
                    JOIN branch ON customer.Branch_ID = branch.Branch_ID;
                    WHERE Customer_name LIKE '%$filtervalues%'";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $items)
                {
                    ?>
                    <tr>
                        <td><?= $items['Customer_name']; ?></td>
                        <td><?= $items['Customer_email']; ?></td>
                        <td><?= $items['Customer_no']; ?></td>
                        <td><?= $items['Branch_ID']; ?></td>
                        <td><?= $items['Customer_gender']; ?></td>
                        <td><?= $items['Customer_plan']?></td>
                        <td><?= $items['Date_due']; ?></td>
                    </tr>
                    <?php
                }
            }
            else
            {
                ?>
                <tr>
                    <td colspan="4">No Record Found</td>
                </tr>
                <?php
            }
            }
            else
            {
                //Query to Get all Admin
                $sql = "SELECT * 
                        FROM customer 
                        JOIN branch ON customer.Branch_ID = branch.Branch_ID 
                        WHERE NOT customer.Branch_ID = '" . $_SESSION["coach_loc"] . "'";
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
                            $branch=$rows['Branch_location'];
                            $email=$rows['Customer_email'];
                            $number=$rows['Customer_no'];
                            $gender=$rows['Customer_gender'];
                            $plan=$rows['Customer_plan'];
                            $due=$rows['Date_due'];

                            //Display the Values in our Table
                            ?>
                            
                            <tr>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $number; ?></td>
                                <td><?php echo $branch; ?></td>
                                <td><?php echo $gender; ?></td>
                                <td><?php echo $plan; ?></td>
                                <td><?php echo $due; ?></td>
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
            }
        ?>
    </tbody>
    </table>
</div>
<?php 
include('partials/footer.php'); 

 ?>