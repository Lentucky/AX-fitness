<?php 
include('partials/menu.php');
 ?>
<div class="container">
    <h1 class="white-text">Coaches</h1>

    <table class="table table-striped table-dark">
    <thead>
        <tr>
        <th scope="col">Name</th>
        <th scope="col">E-mail</th>
        <th scope="col">Phone no.</th>
        <th scope="col">Branch</th>
        <th scope="col">Gender</th>
        <th scope="col">Present</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            //Query to Get all Admin
            $sql = "SELECT * FROM coach WHERE NOT Coach_ID = '" . $_SESSION["coach"] . "' ";
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
                        $id=$rows['Coach_ID'];
                        $coach_name=$rows['Coach_name'];
                        $branch_id=$rows['Branch_ID'];
                        $coach_email=$rows['Coach_email'];
                        $coach_no=$rows['Coach_no'];
                        $coach_gender=$rows['Coach_gender'];
                        $present=$rows['present'];
                        //Display the Values in our Table
                        ?>
                        <tr>
                            <td><?php echo $coach_name; ?></td>
                            <td><?php echo $coach_email; ?></td>
                            <td><?php echo $coach_no; ?></td>
                            <td><?php echo $branch_id; ?></td>
                            <td><?php echo $coach_gender; ?></td>
                            <td><?php echo $present; ?></td>
                            <td><a href="" class="btn btn-primary">Substitute?</a></td>
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