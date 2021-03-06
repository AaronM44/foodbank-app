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

// variables
$week = $_POST['week'];
$area = $_POST['area'];
$monHours = $_POST['monHours'];
$tueHours = $_POST['tueHours'];
$wedHours = $_POST['wedHours'];
$thuHours = $_POST['thuHours'];
$friHours = $_POST['friHours'];

// queries
if($monHours)
{
	$q1 = "INSERT INTO vol_weekly_hours (vol_no, date_, day_, hours, area) VALUES ('" . $_SESSION['vol_no'] . "', '$week', 'Monday', $monHours, '$area')";
    
    $success = $link->query($q1);;

    if(!$success) {
        die ("Error updating details: " . $link->error);
    }
}

if($tueHours)
{
	$q2 = "INSERT INTO vol_weekly_hours (vol_no, date_, day_, hours, area) VALUES ('" . $_SESSION['vol_no'] . "' '$week', 'Tuesday', $teuHours, '$area')";
	$r2 = mysqli_query($link, $q2);
}

if($wedHours)
{
	$q3 = "INSERT INTO vol_weekly_hours (vol_no, date_, day_, hours, area) VALUES ('" . $_SESSION['vol_no'] . "', '$week', 'Wednesday', $wedHours, '$area')";
	$r3 = mysqli_query($link, $q3);
}

if($thuHours)
{
	$q4 = "INSERT INTO vol_weekly_hours (vol_no, date_, day_, hours, area) VALUES ('" . $_SESSION['vol_no'] . "', '$week', 'Thursday', $thuHours, '$area')";
	$r4 = mysqli_query($link, $q4);
}

if($friHours)
{
	$q5 = "INSERT INTO vol_weekly_hours (vol_no, date_, day_, hours, area) VALUES ('" . $_SESSION['vol_no'] . "', '$week', 'Friday', $friHours, '$area')";
	$r5 = mysqli_query($link, $q5);
}
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
        <!-- For Date Picker -->
        <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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
                            <a class="nav-link" href="calendar.php">Timesheets</a>
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
                    <!-- ********** ALERT MESSAGES ********** -->
                    <?php if (isset($_SESSION['error'])): ?>
                        <?php echo "<div class=\"alert alert-danger\" role=\"alert\">" ?>
                        <?php echo $_SESSION['error'] ?>
                        <?php echo "</div>" ?>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['warning'])): ?>
                        <?php echo "<div class=\"alert alert-warning\" role=\"alert\">" ?>
                        <?php echo $_SESSION['warning'] ?>
                        <?php echo "</div>" ?>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['info'])): ?>
                        <?php echo "<div class=\"alert alert-info\" role=\"alert\">" ?>
                        <?php echo $_SESSION['info'] ?>
                        <?php echo "</div>" ?>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['success'])): ?>
                        <?php echo "<div class=\"alert alert-success\" role=\"alert\">" ?>
                        <?php echo $_SESSION['success'] ?>
                        <?php echo "</div>" ?>
                    <?php endif; ?>
                    
                    <br>
                    <h2>New Timesheet</h2>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    <form name="form1" method="POST" action="timesheet.php">
                        <div class="row form">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Week Commencing</label>
                                    <input type="date" id="datepicker" name="week" width="270" required />
                                   <!-- <script>
                                        $('#datepicker').datepicker({
                                            uiLibrary: 'bootstrap4'
                                        }); 
                                    </script> -->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Volunteering Area</label>
                                    <select class="form-control" name="area" id="sel1" width="500">
                                        <option>Foodbank Centre</option>
                                        <option>Fundraising</option>
                                        <option>Promotional Events</option>
                                        <option>Buddy Scheme</option>
                                        <option>Supermarket Collections</option>
                                        <option>Delivery or Collections</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="monday">Monday</label>
                                    <input type="number" name="monHours" class="form-control" id="exampleFormControlInput1" placeholder="" min=0>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="monday">Tuesday</label>
                                    <input type="number" name="teuHours" class="form-control" id="exampleFormControlInput1" placeholder="" min=0>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="monday">Wednesday</label>
                                    <input type="number" name="wedHours" class="form-control" id="exampleFormControlInput1" placeholder="" min=0>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="monday">Thursday</label>
                                    <input type="number" name="thuHours" class="form-control" id="exampleFormControlInput1" placeholder="" min=0>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="monday">Friday</label>
                                    <input type="number" name="friHours" class="form-control" id="exampleFormControlInput1" placeholder="" min=0>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary col-md-2">Submit</button>
                            <button type="submit" class="btn btn-primary col-md-2">Cancel</button>
                        </div>
                        <br><br>
                    </form>
					<?php
					if($r1 || $r2 || $r3 || $r4 || $r5)
					{
						echo "New timesheet successfully entered.";
					}
					?>
                </div>
            </div>
        </div>
    </body>
    <!-- Unset the error message variables -->
    <?php 
        unset($_SESSION['error']);
        unset($_SESSION['warning']);
        unset($_SESSION['info']);
        unset($_SESSION['success']);
    ?>
</html>