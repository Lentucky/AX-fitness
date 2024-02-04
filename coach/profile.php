<?php 
include('partials/menu.php'); 

//Create SQL query to get all the fucking users
$sql = "SELECT * FROM coach where Coach_ID='" . $_SESSION['coach'] . "'";

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
                $id = $row['Coach_ID'];
                $name = $row['Coach_name'];
                $branch = $row['Branch_ID'];
                $email = $row['Coach_email'];
                $number = $row['Coach_no'];
                $gender = $row['Coach_gender'];
        }

}
 ?>
 <div class="container">
    <h1 class="white-text">Clients</h1>

    <br>

    <table class="table table-striped table-dark">
    <thead>
        <tr>
        <th scope="col">Name</th>
        <th scope="col">Branch</th>
        <th scope="col">E-mail</th>
        <th scope="col">Phone No.</th>
        <th scope="col">Gender</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $name; ?></td>
            <td><?php echo $branch; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $number; ?></td>
            <td><?php echo $gender; ?></td>
        </tr>
    </tbody>
    </table>

    <a class="btn btn-primary" href="update-profile.php" role="button">Edit information</a>
</div>
<?php 
include('partials/footer.php'); 

 ?>