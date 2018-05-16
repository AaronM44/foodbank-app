<?php

// session
if (!isset($_SESSION)) 
{
	session_start();
}

error_reporting(E_ERROR | E_PARSE);
echo print_r($_POST) . '</br >';

$vol_no = $_SESSION['vol_no'];

// database connection
include('connect.php');

// variables - actions
$interview = $_POST['interview'];
$tour = $_POST['tour'];
$introduced = $_POST['introduced'];
$buddyArranged = $_POST['buddyArranged'];
$buddyName = $_POST['buddyName'];
$refReq = $_POST['refReq'];
$numRefReq = $_POST['numRefReq'];
$refRec = $_POST['refRec'];
$numRefRec = $_POST['numRefRec'];
$agreedSDTL = $_POST['agreedSDTL'];
$SDTLhold = $_POST['SDTLhold'];
$SDTLother = $_POST['SDTLother'];
$confSigned = $_POST['confSigned'];
$indArranged = $_POST['indArranged'];
$carriedOutBy = $_POST['carriedOutBy'];
$addedDB = $_POST['addedDB'];
$PVGcheck = $_POST['PVGcheck'];
$PVGrecieved = $_POST['PVGrecieved'];

// variables - once_started
$indWelcome = $_POST['indWelcome'];
$HStour = $_POST['HStour'];
$HSform = $_POST['HSform'];
$roleSupplied = $_POST['roleSupplied'];
$handbookSupplied = $_POST['handbookSupplied'];
$addedEmail = $_POST['addedEmail'];
$updateRota = $_POST['updateRota'];
$FirstWcheck = $_POST['FirstWcheck'];
$FirstMreview = $_POST['FirstMreview'];


// queries - actions 
# interview 
if($interview)
{
	$q1 = "INSERT INTO checklist_actions (vol_no, actions) VALUES ($vol_no, '$interview')";
	$r1 = mysqli_query($link, $q1);
}

# tour 
if($tour)
{
	$q2 = "INSERT INTO checklist_actions (vol_no, actions) VALUES ($vol_no, '$tour')";
	$r2 = mysqli_query($link, $q2);
}

# introduced 
if($introduced)
{
	$q21 = "INSERT INTO checklist_actions (vol_no, actions) VALUES ($vol_no, '$introduced')";
	$r21 = mysqli_query($link, $q21);
}

# buddyArranged 
if($buddyArranged && $buddyName)
{
	$buddyDetails = $buddyArranged . " - " . $buddyName;
	$q3 = "INSERT INTO checklist_actions (vol_no, actions) VALUES ($vol_no, '$buddyDetails')";
	$r3 = mysqli_query($link, $q3);
}

# references requested 
if($refReq !=null && $numRefReq !=null)
{
	$reqDetails = $refReq . " - " . $numRefReq;
	$q4 = "INSERT INTO checklist_actions (vol_no, actions) VALUES ($vol_no, '$reqDetails')";
	$r4 = mysqli_query($link, $q4);
}

# references recieved 
if($refRec && $numRefRec)
{
	$recDetails = $refRec . " - " . $numRefRec;
	$q5 = "INSERT INTO checklist_actions (vol_no, actions) VALUES ($vol_no, '$recDetails')";
	$r5 = mysqli_query($link, $q5);
}

# agreed start day, time & location 
if($agreedSDTL && $SDTLhold || $agreedSDTL && $SDTLother)
{
	$temp;
	if($SDTLhold)
	{
		$temp = $SDTLhold;
	}
	else if($SDTLother)
	{
		$temp = $SDTLother;
	}
	else if($SDTLhold && $SDTLother)
	{
		$temp = $SDTLhold . ", " . $SDTLother;
	}
	$SDTLdetails = $agreedSDTL . " - " . $temp;
	$q6 = "INSERT INTO checklist_actions (vol_no, actions) VALUES ($vol_no, '$SDTLdetails')";
	$r6 = mysqli_query($link, $q6);
}

# confidentiality agreement 
if($confSigned)
{
	$q7 = "INSERT INTO checklist_actions (vol_no, actions) VALUES ($vol_no, '$confSigned')";
	$r7 = mysqli_query($link, $q7);
}

# induction arranged 
if($indArranged && $carriedOutBy)
{
	$indDetails = $indArranged . " - " . $carriedOutBy;
	$q8 = "INSERT INTO checklist_actions (vol_no, actions) VALUES ($vol_no, '$indDetails')";
	$r8 = mysqli_query($link, $q8);
}

# added to db 
if($addedDB)
{
	$q9 = "INSERT INTO checklist_actions (vol_no, actions) VALUES ($vol_no, '$addedDB')";
	$r9 = mysqli_query($link, $q9);
}

# PVG check 
if($PVGcheck)
{
	$q10 = "INSERT INTO checklist_actions (vol_no, actions) VALUES ($vol_no, '$PVGcheck')";
	$r10 = mysqli_query($link, $q10);
}

# PVG recieved
if($PVGrecieved)
{
	$q11 = "INSERT INTO checklist_actions (vol_no, actions) VALUES ($vol_no, '$PVGrecieved')";
	$r11 = mysqli_query($link, $q11);
}

// queries - once_started
# induction & welcome 
if($indWelcome)
{
	$q12 = "INSERT INTO checklist_once_started (vol_no, once_started) VALUES ($vol_no, '$indWelcome')";
	$r12 = mysqli_query($link, $q12);
}

# health & safety tour 
if($HStour)
{
	$q13 = "INSERT INTO checklist_once_started (vol_no, once_started) VALUES ($vol_no, '$HStour')";
	$r13 = mysqli_query($link, $q13);
}

# health & safety form 
if($HSform)
{
	$q14 = "INSERT INTO checklist_once_started (vol_no, once_started) VALUES ($vol_no, '$HSform')";
	$r14 = mysqli_query($link, $q14);
}

# role description/volunteer agreement 
if($roleSupplied)
{
	$q15 = "INSERT INTO checklist_once_started (vol_no, once_started) VALUES ($vol_no, '$roleSupplied')";
	$r15 = mysqli_query($link, $q15);
}

# handbook supplied 
if($handbookSupplied)
{
	$q16 = "INSERT INTO checklist_once_started (vol_no, once_started) VALUES ($vol_no, '$handbookSupplied')";
	$r16 = mysqli_query($link, $q16);
}

# added to email list 
if($addedEmail)
{
	$q17 = "INSERT INTO checklist_once_started (vol_no, once_started) VALUES ($vol_no, '$addedEmail')";
	$r17 = mysqli_query($link, $q17);
}

# update volunteer rota 
if($updateRota)
{
	$q18 = "INSERT INTO checklist_once_started (vol_no, once_started) VALUES ($vol_no, '$updateRota')";
	$r18 = mysqli_query($link, $q18);
}

# 1st week check
if($FirstWcheck)
{
	$q19 = "INSERT INTO checklist_once_started (vol_no, once_started) VALUES ($vol_no, '$FirstWcheck')";
	$r19 = mysqli_query($link, $q19);
}

# 1st month review 
if($FirstMreview)
{
	$q20 = "INSERT INTO checklist_once_started (vol_no, once_started) VALUES ($vol_no, '$FirstMreview')";
	$r20 = mysqli_query($link, $q20);
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
    </head>
    <body class="fixed-nav sticky-footer">
        <div class="row py-3 page-wrapper">
            <div class="col-3 order-2 bg-light sidebar">
                <div class="sticky-top">
                    <!-- Logo -->
                    <a href="#"><img class="mx-auto d-block" src="img/logo.png" width="200" title="Moray Foodbank" alt="Logo"></a>
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
                            <a class="nav-link active" href="checklist.php">Starting Checklist</a>
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
                            <a class="nav-link" href="volunteer.php">New Volunteer</a>
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
                    <h2>Actions</h2>
                    <p>Please tick the boxes to indicate when an action has been completed</p>
                    <form name="form1" method="POST" action="checklist.php">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="interview" class="form-check-input" value="Interview Completed">Interview completed
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="tour" class="form-check-input" value="Tour of workplace given">Tour of workplace given
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="introduced" class="form-check-input" value="Introduced to Project Manager/Supervisor">Introduced to Project Manager/Supervisor
                            </label>
                        </div>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="buddyArranged" class="form-check-input" value="Buddy arranged">Buddy arranged
                                </label>
                            </div>
                            <div class="form-inline">
                                <label>
                                    <input type="text" name="buddyName" class="form-control form-control-sm" placeholder="Name of buddy">
                                </label>
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="refReq" class="form-check-input" value="References requested">References requested (<sub>Select</sub>)
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="numRefReq" class="form-check-input" value="1">1
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="numRefReq" class="form-check-input" value="2">2
                                </label>
                            </div>   
                        </div>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="refRec" class="form-check-input" value="References received">References received (<sub>Select</sub>)
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="numRefRec" class="form-check-input" value="1">1
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="numRefRec" class="form-check-input" value="2">2
                                </label>
                            </div>   
                        </div>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="agreedSDTL" class="form-check-input" value="Agreed start date, time & location">Agreed start date, time & location
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="SDTLhold" class="form-check-input" value="On hold">On hold
                                </label>
                            </div>
                            <div class="form-inline">
                                <label>
                                    <input type="text" name="SDTLother" class="form-control form-control-sm" placeholder="Other">
                                </label>
                            </div>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="confSigned" class="form-check-input" value="Confidentiality agreement signed">Confidentiality agreement signed
                            </label>
                        </div>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="indArranged" class="form-check-input" value="Induction/Taster day arranged">Induction/Taster day arranged
                                </label>
                            </div>
                            <div class="form-inline">
                                <label>
                                    <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')"  name="carriedOutBy" class="form-control form-control-sm" placeholder="To be carried out by">
                                </label>
                            </div>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="addedDB" class="form-check-input" value="Added to database of volunteer contracts">Added to database of volunteer contracts
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="PVGcheck" class="form-check-input" value="PVG check">PVG check (<sub>if required</sub>)
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="PVGrecieved" class="form-check-input" value="PVG check received">PVG check received
                            </label>
                        </div>
                        <br>
                        <h2>Once Started</h2>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="indWelcome" class="form-check-input" value="Induction & welcome on first day">Induction & welcome on first day
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="HStour" class="form-check-input" value="Health & Safety tour given">Health & Safety tour given
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="HSform" class="form-check-input" value="Health & Safety form signed">Health & Safety form signed
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="roleSupplied" class="form-check-input" value="Role description/volunteer agreement supplied">Role description/volunteer agreement supplied
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="handbookSupplied" class="form-check-input" value="Volunteer handbook supplied">Volunteer handbook supplied
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="addedEmail" class="form-check-input" value="Added to email list for newsletters">Added to email list for newsletters
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="updateRota" class="form-check-input" value="Update volunteer rota">Update volunteer rota
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="FirstWcheck" class="form-check-input" value="1st week check OK">1<sup>st</sup> week check OK
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="FirstMreview" class="form-check-input" value="1st month review">1<sup>st</sup> month review
                            </label>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-primary">Cancel</button>
                        </div>
                        <br>
                    </form>
						<?php
							$q22 = "SELECT * FROM volunteer_details WHERE vol_no = $vol_no";
							$r22 = mysqli_query($link, $q22);
							$row = mysqli_fetch_array($r22);
							extract($row);
							$fullname = $forename . " " . $surname;
							if($r1 || $r2 || $r3 || $r4 || $r5 || $r6 || $r7 || $r8 || $r9 || $r10 || $r11)
							{
								echo "Checklist <b>Once Started</b> successfully updated for <b>$fullname</b>";
							}
							
							if($r12 || $r13 || $r14 || $r15 || $r16 || $r17 || $r18 || $r19 || $r20 || $r21)
							{
								echo "<br>";
								echo "Checklist <b>Actions</b> successfully updated for <b>$fullname</b>";
							}	
						?>
                </div>
            </div>
        </div>
    </body>
</html>