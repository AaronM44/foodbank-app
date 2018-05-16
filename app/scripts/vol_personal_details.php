<?php
    
    require_once("connect.php");

    if (!isset($_SESSION))
    {
        
        session_start();
    }
    
    // grab form data
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $town = $_POST['town'];
    $postcode = $_POST['postcode'];
    $tel_no = $_POST['tel_no'];
    $email = $_POST['email'];
    $dob = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['day'];
 

    // query details
    $query = "update volunteer_details set title = '" . $title . "', forename = '" . $first_name . "', surname = '" . $last_name . "', 
        address1 = '" . $address1 . "', address2 = '" . $address2 . "', town = '" . $town . "', postcode = '" . $postcode . "', tel_no = '" . $tel_no . "', DOB = '" . $dob . "'
        where vol_no = '" . $_SESSION['vol_no'] . "'";
    
    $success = $link->query($query);

    if(!$success) {
        
        $_SESSION['error'] = "<strong>Error!</strong> Something went wrong.";
        #die ("Error updating details: " . $link->error);
    }
    else {

        $_SESSION['success'] = "<strong>Success!</strong> Volunteer updated.";
    }

    # Update session variables in case name changed
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['full_name'] = $first_name . " " . $last_name;

    $link->close();
    
    # redirect
    header("location: ../volunteer.php");
   
?>