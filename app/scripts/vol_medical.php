<?php
    
    require_once("connect.php");

    if (!isset($_SESSION))
    {
        
        session_start();
    }
    
    // grab form data
    $em_name = $_POST['em_name'];
    $em_tel = $_POST['em_tel'];
    $em_rel = $_POST['em_rel'];
    $health = $_POST['health']; 

        
    // query details
    $query1 = "update volunteer_details set em_name = '" . $em_name . "', em_tel = '" . $em_tel . "', em_rel = '" . $em_rel . "'
        where vol_no = '" $_SESSON['vol_no'] . "'";

    $query2 = "update application_details set health_problems = '" . $health . "' where vol_no = '" . $_SESSION['vol_no'] . "'";
    
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