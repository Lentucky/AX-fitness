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

    <div class="gallery">
        <table class="table table-striped table-dark">
        <thead>
            <tr>
            <th scope="col">Reference No.</th>
            <th scope="col">Receipt</th>
            <th scope="col">Identification</th>
            <th scope="col">Payment</th>
            <th scope="col">Date</th>
            <th scope="col">Phone No. used</th>
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
                            $referenceNo = $rows["referenceNo"];
                            $receipt = $rows["receipt"];
                            $identification = $rows["identification"];
                            $payment= $rows["Payment"];
                            $date= $rows["Date"];
                            $phone_no= $rows["phone_no"];
                            $Customer_ID= $rows["Customer_ID"];
                            ?>     

                            <tr>
                                <td><?php echo $referenceNo; ?></td>
                                <td>
                                    <?php  
                                        //CHeck whether we have image or not
                                        if($receipt=="")
                                        {
                                            //WE do not have image, DIslpay Error Message
                                            echo "No image.";
                                        }
                                        else
                                        {
                                            $fileExtension = pathinfo($identification, PATHINFO_EXTENSION);
                                            if (strtolower($fileExtension) == 'sql') {
                                                echo "No image.";
                                            }
                                            else
                                            {
                                                ?>
                                                <img src="../img/payment/<?php echo $receipt; ?>" width="100px" alt="Image Unavailable">
                                                <?php
                                            }
                                            //WE Have Image, Display Image
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php  
                                        //CHeck whether we have image or not
                                        if($identification=="")
                                        {
                                            //WE do not have image, DIslpay Error Message
                                            echo "No image.";
                                        }
                                        else
                                        {
                                            $fileExtension = pathinfo($identification, PATHINFO_EXTENSION);
                                            if (strtolower($fileExtension) == 'sql') {
                                                echo "No image.";
                                            }
                                            else
                                            {
                                                ?>
                                                <img src="../img/IDs/<?php echo $identification; ?>" width="100px" alt="Image Unavailable">
                                                <?php
                                            }
                                            //WE Have Image, Display Image
                                        }
                                    ?>
                                </td>
                                <td><?php echo $payment; ?></td>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $phone_no?></td>
                        </tr>

                            <?php

                        }
                    }
                    else
                    {
                        header('location: index.php');
                        echo "<script> alert('No Tansaction history'); </script>";
                        
                    }
                }

            ?>
        </tbody>
        <div id="fullpage" onclick="this.style.display='none';"></div>
        </table>
    </div>
</div>
<script type="text/javascript">
function getPics() {} //just for this demo
const imgs = document.querySelectorAll('.gallery img');
const fullPage = document.querySelector('#fullpage');

imgs.forEach(img => {
  img.addEventListener('click', function() {
    fullPage.style.backgroundImage = 'url(' + img.src + ')';
    fullPage.style.display = 'block';
  });
});
</script>
<?php 
include('partials/footer.php'); 
 ?>