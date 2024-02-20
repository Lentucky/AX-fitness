<?php 
include('partials/menu.php');

// $id = $_GET['id'];
// $sql="SELECT * FROM customer 
// JOIN transaction ON customer.Customer_ID = transaction.Customer_ID 
// WHERE customer.Customer_ID = $id";

// $res=mysqli_query($conn, $sql);

// if($res==true)
// {
//     $count = mysqli_num_rows($res);

//     if($count==1)
//     {
//         $row=mysqli_fetch_assoc($res);

//         $id = $row['Coach_ID'];
//         $email = $row['Coach_email'];
//         $phone = $row['Coach_no'];

//     }
//     else
//     {
//         echo "<script> alert('No Tansaction history'); </script>";
//         header('profile.php');
//     }
// }
 ?>


<!-- display the clients scheduled with the coach logged in -->
<div class="container">
    <br>

    <table class="table table-striped table-dark">
    <thead>
        <tr>
        <th scope="col">transaction_ID</th>
        <th scope="col">Invoice</th>
        <th scope="col">Source</th>
        <th scope="col">Payment</th>
        <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody>
    <?php 
            //Query to Get all Admin
            $id = $_GET['id'];
            $sql="SELECT * FROM transactions WHERE Customer_ID = $id";

            $res=mysqli_query($conn, $sql);

            if($res==true)
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
                        $transaction_id=$rows['transaction_ID'];
                        $invoice=$rows['Invoice'];
                        $source=$rows['Source'];
                        $payment=$rows['Payment'];
                        $date=$rows['Date'];
                        $customer_id=$rows['Customer_ID'];
                        ?>     

                        <tr>
                            <td><?php echo $transaction_id; ?></td>
                            <td><?php echo $invoice; ?></td>
                            <td><?php echo $source; ?></td>
                            <td><?php echo $payment; ?></td>
                            <td><?php echo $date; ?></td>
                       </tr>

                        <?php

                    }
                }
                else
                {
                    echo "<script> alert('No Tansaction history'); </script>";
                    // header('location: index.php');
                }
            }

        ?>
    </tbody>
    </table>
</div>
<?php 
include('partials/footer.php'); 
 ?>