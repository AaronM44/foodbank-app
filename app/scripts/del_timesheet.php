<?php
    
    require_once("connect.php");

    if (!isset($_SESSION))
    {
        
        session_start();
    }
    
    // grab form data
    $vol_no = $_POST['vol_no'];
    $date = $_POST['date'];
    $day = $_POST['day'];

        
    // query details
    $query = "delete from vol_weekly_hours where vol_no = '" . $vol_no . "' and date_ = 
        '" . $date . "' and day_ = '" . $day . "'";

    
    echo $query;
    
    $success = $link->query($query);

    if(!$success) {
        die ("Error updating details: " . $link->error);
    }

    $link->close();
    
    # redirect
    header("location: ../calendar.php");
   
?>