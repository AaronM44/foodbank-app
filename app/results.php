<?php

session_start();

error_reporting(E_ERROR | E_PARSE);
echo print_r($_POST) . '</br >';
echo print_r($_SESSION) . '</br >';

// database connection
include('scripts/connect.php');

// variables for person searched
$fullname = $_POST['fullname'];

$names = explode(" ", $fullname);
$first = $names[0];
$second = $names[1];

// query to return searched volunteer
$q1 = "select * from volunteer_details where forename = '$first' or forename = '$second' or surname = '$first' or surname = '$second'";
$r1 = mysqli_query($link, $q1);

/*
$row7=mysqli_fetch_array($result7);
extract($row7);
$cruiseName=$row7['cruiseName'];
*/
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Volunteer Records</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <!-- Custom Styles -->
        <link rel="stylesheet" type="text/css" href="style/style.css"> 
        <!-- JavaScript -->
        <script type="text/javascript" src="js/javascript.js"></script>   
    </head>
    <body class="fixed-nav sticky-footer">

            <div class="row py-3 page-wrapper">
                <div class="col-3 order-2 bg-light sidebar">
                    <div class="sticky-top">
                        <!-- Logo -->
                        <a href="#"><img class="mx-auto d-block" src="img/logo.png" width="200" title="Moray Foodbank" alt="Logo"></a>
                        <br><br>
                        <!-- Currently selected volunteer -->
                        <h5 class="text-center">No Volunteer Selected</h5>
                        <br>
                        <!-- Vertical Nav Bar -->
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Volunteer Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Starting Checklist</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Timesheets</a>
                            </li>        
                        </ul>
                    </div>
                </div>
                <div class="col-9 order-2 flush-column">
                    <!-- Horizontal Nav Bar -->
                    <nav class="navbar navbar-expand-sm bg-light navbar-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="application.php">New Volunteer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">New Timesheet</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="reports.php">Reports</a>
                            </li>
                        </ul>
                        <!-- Search Bar -->
                        <form class="form-inline ml-auto" id="search" name="search" method='POST' action="results.php">
                            <input class="form-control mr-sm-2" name='fullname' placeholder="First Name / Last Name" type="text">
                            <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</submit>
                        </form>
                    </nav>
                    <!-- Search Results -->
                    <div class="container">
                        <br>
                        <h2>X Results Found</h2>
                        <p>Please select a volunteer to view.</p>
                        <table class="table table-striped">
                            <thread>
                                <thead>
                                    <tr>
                                        <th>Volunteer Number</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Join Date</th>
                                        <th>View/Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php  
									while($row=mysqli_fetch_array($r1))
									{
									// query to get join date from application_details table
									extract($row);
									$q2 = "select * from application_details where vol_no = $vol_no";
									$r2=mysqli_query($link, $q2);
									$row2=mysqli_fetch_array($r2);
									$date_applied=$row2['date_applied'];
                                    echo "<tr>";
										echo "<td>$vol_no</td>";  // volunteer number
                                        echo "<td>$forename</td>";  // volunteer forename
                                        echo "<td>$surname</td>";  // volunteer surname
                                        echo "<td>$date_applied</td>";  // volunteer join date
                                        echo '<td><form action="scripts/select_volunteer.php" method="post"><input type="hidden" name="vol_no" id="vol_no" value=' .$vol_no. '><input type="hidden" name="first_name" id="first_name" value=' .$forename. '><input type="hidden" name="last_name" id="last_name" value=' .$surname. '><input type="submit" value="Select" class="btn btn-link"></form></td>';
                                    echo "</tr>";
									}
									?>
                                </tbody>
                            </thread>
                        </table>
                    </div>
                </div>
            </div>

    </body>
</html>