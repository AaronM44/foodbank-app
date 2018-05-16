<?php
    
    require_once("connect.php");

    if (!isset($_SESSION))
    {
        
        session_start();
    }
    
    // grab form data
    $awards = $_POST['awards'];
    $experience = $_POST['prev_experience'];
    $reasons = $_POST['reasons'];
    $further_info = $_POST['further_info'];

        
    // query details
    $query1 = "update application_details set why_interested = '" . $reasons . "', further_info = '" . $further_info . "', previous_work = '" . $experience . "'
        where vol_no = '" . $_SESSION['vol_no'] . "'";


    $query2 = "update volunteer_details set awards = '" . $awards . "' where vol_no = '" . $_SESSION['vol_no'] . "'";

    echo $query1;
    echo $query2;
    
    $success1 = $link->query($query1);
    $success2 = $link->query($query2);

    if(!$success1 || !$success2) {
        
        $_SESSION['error'] = "<strong>Error!</strong> Something went wrong.";
        #die ("Error updating details: " . $link->error);
    }
    else {

        $_SESSION['success'] = "<strong>Success!</strong> Volunteer updated.";
    }

    $link->close();
    
    # redirect
    header("location: ../volunteer.php");
   
?>