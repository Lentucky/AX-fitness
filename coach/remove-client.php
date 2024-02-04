<?php 

    //Include constants.php file here
    include('../config/constants.php');
    include('partials/login-check.php'); 

    // 1. get the ID of Admin to be deleted
    $customer_id = $_GET['id'];

    //2. Create SQL Query to Delete Admin
    $sql = "UPDATE customer SET Coach_ID=0 WHERE Customer_ID=$customer_id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
        //Query Executed Successully and Admin Deleted
        //Create SEssion Variable to Display Message
        $_SESSION['update-remove'] = "<div class='success'>Removed Successfully.</div>";
        //Redirect to Manage Admin Page
        header('location: index.php');
    }
    else
    {
        //Failed to Delete Admin
        $_SESSION['update-remove'] = "<div class='error'>Failed. Try Again Later.</div>";
        header('location: index.php');
    }

    //3. Redirect to Manage Admin page with message (success/error)

?>