<?php 

    //Include constants.php file here
    include('../config/constants.php');
    include('partials/login-check.php'); 
    // Assuming you have a database connection established ($conn)
    // and $_GET['id'] is defined
    
    // Get the ID of the customer to be updated
    $customer_id = $_GET['id'];
    
    // Update isPaid and Date_due based on the current values
    $sqlUpdate = "UPDATE coach SET present = CASE WHEN present = 'present' THEN 'absent' ELSE 'present' END 
                  WHERE Coach_ID = '" . $_SESSION["coach"] . "' ";
    
    // Execute the Query
    $resUpdate = mysqli_query($conn, $sqlUpdate);
    
    // Check whether the query executed successfully or not
    if ($resUpdate) {
        // Query Executed Successfully
        $_SESSION['update-present'] = "<div class='success'>Updated successfully.</div>";
    } else {
        // Failed to update status and/or Date_due
        $_SESSION['update-present'] = "<div class='error'>Failed to update.</div>";
    }
    
    // Redirect to the Manage Admin Page
    header('location: index.php');

    
?>