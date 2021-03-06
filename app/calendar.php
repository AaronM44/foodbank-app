<?php
error_reporting(E_ERROR | E_PARSE);

// session
if (!isset($_SESSION)) 
{
	session_start();
}

$vol_no = $_SESSION['vol_no'];

// database connection
include('scripts/connect.php');

// query to select timesheet information
$q1 = "SELECT * FROM vol_weekly_hours WHERE vol_no = '" . $_SESSION['vol_no'] . "' ORDER BY date_ DESC";
$r1 = mysqli_query($link, $q1);
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
                    <a href="index.php"><img class="mx-auto d-block" src="img/logo.png" width="200" title="Moray Foodbank" alt="Logo"></a>
                    <br><br>
                    <!-- Currently selected volunteer -->
                    <h5 class="text-center"><?php echo $_SESSION['full_name'] ?></h5>
                    <br>
                    <!-- Vertical Nav Bar -->
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="volunteer.php">Volunteer Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="checklist.php">Starting Checklist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="calendar.php">Timesheets</a>
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
                            <a class="nav-link" href="timesheet.php">New Timesheet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reports.php">Reports</a>
                        </li>
                    </ul>
                    <!-- Search Bar -->
                    <form class="form-inline ml-auto" id="search">
                        <input class="form-control mr-sm-2" placeholder="First Name / Last Name" type="text">
                        <button class="btn btn-primary my-2 my-sm-0" type="button">Search</button>
                    </form>
                </nav>
                <!-- Content -->
                <div class="container">
                    <br>
                    <h2>Timesheets</h2>
                    <p>Please select a timesheet to view.</p>
                    <table class="table table-striped">
                        <thread>
                            <thead>
                                <tr>
                                    <th>Week</th>
                                    <th>Day</th>
                                    <th>Hours</th>
                                    <th>Area</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
							while($row=mysqli_fetch_array($r1))
							{
								extract($row);
                                echo "<tr>";
                                echo     "<td>W/C $date_</td>";
								echo     "<td>$day_</td>";
                                echo     "<td>$hours</td>";
                                echo     "<td>$area</td>";
                                echo '<td><form action="scripts/del_timesheet.php" method="post"><div class="form-inline"><input class="form-control" type="hidden" name="vol_no" id="vol_no" value=' .$vol_no. '><input class="form-control" type="hidden" name="date" id="date" value=' .$date_. '><input class="form-control" type="hidden" name="day" id="day" value=' .$day_. '><input type="submit" value="Delete" class="btn btn-link"></div></form></td>';
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