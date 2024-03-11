<?php 

    //Include constants.php file here
    include('../config/constants.php');
    include('partials/login-check.php'); 
    // Assuming you have a database connection established ($conn)
    // and $_GET['id'] is defined
    
    // Get the ID of the customer to be updated
    $customer_id = $_GET['id'];
    
    // Update isPaid and Date_due based on the current values
    $sqlUpdate = "UPDATE customer SET isPaid = CASE WHEN isPaid = 'Paid' THEN 'Unpaid' ELSE 'Paid' END, Date_due = CASE 
                        WHEN isPaid = 'Unpaid' AND Customer_plan = 'Monthly' THEN DATE_ADD(CURDATE(), INTERVAL 30 DAY)
                        WHEN isPaid = 'Unpaid' AND Customer_plan = 'Trimonthly' THEN DATE_ADD(CURDATE(), INTERVAL 90 DAY)
                        WHEN isPaid = 'Unpaid' AND Customer_plan = 'Yearly' THEN DATE_ADD(CURDATE(), INTERVAL 365 DAY)
                        ELSE Date_due END 
                  WHERE Customer_ID = $customer_id";
    
    // Execute the Query
    $resUpdate = mysqli_query($conn, $sqlUpdate);
    
    // Check whether the query executed successfully or not
    if ($resUpdate) {
        // Query Executed Successfully
        $_SESSION['update-status'] = "<div class='success'>Status and Date_due updated successfully.</div>";
    } else {
        // Failed to update status and/or Date_due
        $_SESSION['update-status'] = "<div class='error'>Failed to update status and/or Date_due.</div>";
    }
    
    // Redirect to the Manage Admin Page
    header('location: index.php');

    
?>