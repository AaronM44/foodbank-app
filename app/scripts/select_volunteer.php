<?php
    require_once("connect.php");

    #sessions
    if (!isset($_SESSION))
    {
        session_start();
    }
              
    $_SESSION['vol_no'] = $_POST['vol_no'];
    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['full_name'] = $_POST['first_name'] . " " . $_POST['last_name'];

    header("location: ../volunteer.php");

?>