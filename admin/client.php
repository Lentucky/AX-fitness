<?php 
include('partials/menu.php'); 
 ?>
<div class="container">
    <h1 class="white-text">Clients</h1>

    <br>

    <table class="table table-striped table-dark">
    <thead>
        <tr>
        <th scope="col">Name</th>
        <th scope="col">Coach</th>
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
            //Query to Get all Admin
            $sql = "SELECT * FROM customer";
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
                        $id=$rows['Customer_ID'];
                        $coach=$rows['Coach_ID'];
                        $name=$rows['Customer_name'];
                        $branch=$rows['Branch_ID'];
                        $email=$rows['Customer_email'];
                        $number=$rows['Customer_no'];
                        $gender=$rows['Customer_gender'];
                        $plan=$rows['Customer_plan'];
                        $due=$rows['Date_due'];

                        //Display the Values in our Table
                        ?>
                        
                        <tr>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $coach?></td>
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