<?php
error_reporting(E_ERROR | E_PARSE);

// database connection
include('scripts/connect.php');

//$volunteer = $_POST['volunteer'];
//echo "volunteer: $volunteer";

// variables - volunteer_details
$title = $_POST['title'];
$forename = $_POST['forename'];
$surname = $_POST['surname'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$town = $_POST['town'];
$postcode = $_POST['postcode'];
$tel_no = $_POST['tel_no'];
$email = $_POST['email'];
$dobD = $_POST['dobD'];
$dobM = $_POST['dobM'];
$dobY = $_POST['dobY'];
$DOB = $dobY .  "-" . $dobM . "-" . $dobD;
$EM_name = $_POST['EM_name'];
$EM_tel = $_POST['EM_tel'];
$EM_rel = $_POST['EM_rel'];
$R1_name = $_POST['R1_name'];
$R1_email = $_POST['R1_email'];
$R1_tel = $_POST['R1_tel'];
$R1_rel = $_POST['R1_rel'];
$R2_name = $_POST['R2_name'];
$R2_email = $_POST['R2_email'];
$R2_tel = $_POST['R2_tel'];
$R2_rel = $_POST['R2_rel'];

// variables vol_interests
$FoodBankCentre = $_POST['FoodBankCentre'];
$Fundraising = $_POST['Fundraising'];
$PromoEvent = $_POST['PromoEvent'];
$BuddySch = $_POST['BuddySch'];
$SuperColl = $_POST['SuperColl'];
$DeliveryColl = $_POST['DeliveryColl'];

// if convictions = yes variable = their details else if convictions = no variable = none

// Query - vol details
if($FoodBankCentre || $Fundraising || $PromoEvent || $BuddySch || $SuperColl || $DeliveryColl)
{
	$q1 = "INSERT INTO volunteer_details(title, forename, surname, address1, address2, town,  postcode, tel_no, email, DOB, EM_name, EM_tel, EM_rel, R1_name, R1_email, R1_tel, R1_rel, R2_name, R2_email, R2_tel, R2_rel, 
	vol_status) VALUES ('$title','$forename','$surname','$address1','$address2','$town','$postcode','$tel_no','$email','$DOB','$EM_name','$EM_tel','$EM_rel','$R1_name','$R1_email','$R1_tel','$R1_rel','$R2_name','$R2_email',
	'$R2_tel','$R2_rel','active')";
	$r1 = mysqli_query($link, $q1);
	//$r1_num_results = mysqli_num_rows($r1);
}

/*if($r1)
{ echo " Success: volunteer_details."; }
else
{ echo " Fail: volunteer_details."; }*/

// Query to get last volunteer number
$q32 = "SELECT * FROM volunteer_details ORDER BY vol_no DESC";
$r32 = mysqli_query($link, $q32);
$row=mysqli_fetch_array($r32);
extract($row);
$vol_no=$row['vol_no'];
//echo "VolNo: $vol_no";

// variables - application_details
$OneEvent = $_POST['OneEvent'];  // One off events
$TmeAvail = $_POST['TmeAvail'];  // 1 - 4 hours a week checkbox
$WeekAvail = $_POST['WeekAvail'];  // days of week available
$OtherAvail = $_POST['OtherAvail'];  // Other availability
$ReasonInterest = $_POST['ReasonInterest'];  // Reason why client interested in volunteering
$WorkExp = $_POST['WorkExp'];  // volunteer's previous places of work
$HealthIssueDetail = $_POST['HealthIssueDetail']; // details of any health problems of volunteer
$PVG = $_POST['PVG'];  // variable to store if checkbox was yes or no
$Crim = $_POST['Crim'];  // Any criminal convictions checkbox
$MiscInfo = $_POST['MiscInfo'];  // any further details from volunteer
$MiscInfoHow =$_POST['MiscInfoHow'];  // how did volunteer hear about MFB
$date = date('Y-m-d');  // Date of newly added volunteer

// availability
if($OneEvent)
{ $OneOff = 1; }
else
{ $OneOff = 0; }

if($TmeAvail)
{ $OnetoFour = 1; }
else
{ $OnetoFour = 0; }

if(!empty($_POST['WeekAvail'])){
    $days = '';
    foreach($_POST['WeekAvail'] as &$value) {
        $days .= "$value, \n";
    } 
	//echo $days;
}

// criminal convictions

if($Crim == 1)
{
	$CrimYesDetail = $_POST['CrimYesDetail'];  // conviction details if radio option yes
}
else
{
	$CrimYesDetail = "None";  // conviction details if radio option no
}


if($vol_no)  // If the volunteer details were entered successfully to generate a new volunteer number
{
	// Query to insert posted data into 'application_details' table
	$q2 = "INSERT INTO application_details (vol_no, OneOff, OnetoFour, Days, otherAvailability, why_interested, previous_work, health_problems, PVG, convictions, further_info, hear_about_FB, date_applied)
	VALUES ($vol_no, $OneEvent, $TmeAvail, '$days', '$OtherAvail', '$ReasonInterest', '$WorkExp', '$HealthIssueDetail', $PVG, '$CrimYesDetail','$MiscInfo','$MiscInfoHow','$date')";
	$r2 = mysqli_query($link, $q2);
}

/*
$temp = 1;
$i = 0;
echo "i: $i";
for($i < $temp; $i++;)
{
	while($_POST[$i] !=null)
	{
		$temp = $temp + 1;
		$temp2 = $_POST['$i'];
		echo "i: $i";
		echo "temp2: $temp2";
		$q3 = "INSERT INTO vol_interests (vol_no, interest_no) VALUES (1, $temp2)";
		$r3 = mysqli_query($link, $r3);
	}
} */

/* Probably a better way using a loop (Attempted this above) */
if($FoodBankCentre !=null)
{
	$q5 = "INSERT INTO `vol_interests`(`vol_no`, `interest_no`) VALUES ($vol_no, $FoodBankCentre)";
	$r5 = mysqli_query($link, $q5);
}

if($Fundraising !=null)
{
	$q6 = "INSERT INTO vol_interests (vol_no, interest_no) VALUES ($vol_no, $Fundraising)";
	$r6 = mysqli_query($link, $q6);
}

if($PromoEvent !=null)
{
	$q7 = "INSERT INTO vol_interests (vol_no, interest_no) VALUES ($vol_no, $PromoEvent)";
	$r7 = mysqli_query($link, $q7);
}

if($BuddySch !=null)
{
	$q8 = "INSERT INTO vol_interests (vol_no, interest_no) VALUES ($vol_no, $BuddySch)";
	$r8 = mysqli_query($link, $q8);
}

if($SuperColl !=null)
{
	$q9 = "INSERT INTO vol_interests (vol_no, interest_no) VALUES ($vol_no, $SuperColl)";
	$r9 = mysqli_query($link, $q9);
}

if($DeliveryColl !=null)
{
	$q10 = "INSERT INTO vol_interests (vol_no, interest_no) VALUES ($vol_no, $DeliveryColl)";
	$r10 = mysqli_query($link, $q10);
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
                    <a href="index.php"><img class="mx-auto d-block" src="img/logo.png" width="200" title="Moray Foodbank" alt="Logo"></a>
                    <br><br>
                    <!-- Currently selected volunteer -->
                    <h5 class="text-center">No Volunteer Selected</h5>
                    <br>
                    <!-- Vertical Nav Bar -->
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Volunteer Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Starting Checklist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Timesheets</a>
                        </li>        
                    </ul>
                </div>
            </div>
            <div class="col-9 order-2 flush-column">
                <!-- Horizontal Nav Bar -->
                <nav class="navbar navbar-expand-sm bg-light navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="application.php">New Volunteer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">New Timesheet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Reports</a>
                        </li>
                    </ul>
                    <!-- Search Bar -->
                    <form class="form-inline ml-auto" id="search" method='POST' action='results.php'>
                        <input class="form-control mr-sm-2" type="text" name="fullname" placeholder="First Name / Last Name">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </nav>
                <!-- Content -->
                <div class="container">
                    <br>
                    <form name='form1' method='POST' action='application.php'>
                        <h2>New Volunteer Application</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        <br>
                        <div class="form-inline">
                            <div class="form-inline">
                                <label for="exampleFormControlInput1">Title &nbsp;</label>
                                <select class="form-control" id="sel1" name='title'>
                                    <option>Mr</option>
                                    <option>Mrs</option>
                                    <option>Miss</option>
                                    <option>Ms</option>
                                    <option>Dr</option>
                                </select>
                            </div>
                            <div class="form-inline">
                                <label for="exampleFormControlInput1">&nbsp; First Name &nbsp;</label>
                                <input type="text" class="form-control" name='forename' id="exampleFormControlInput1" placeholder="" maxlength="20" required>
                            </div>
                            <div class="form-inline">
                                <label for="exampleFormControlInput1">&nbsp; Last Name &nbsp;</label>
                                <input type="text" class="form-control" name='surname' id="exampleFormControlInput1" placeholder="" maxlength="25" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Address Line 1 &nbsp;</label>
                            <input type="text" class="form-control" name='address1' id="exampleFormControlInput1" placeholder="" maxlength="40" required>
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Address Line 2 &nbsp;</label>
                            <input type="text" class="form-control" name='address2' id="exampleFormControlInput1" placeholder="" maxlength="75">
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Town/City &nbsp;</label>
                            <input type="text" class="form-control" name='town' id="exampleFormControlInput1" placeholder="" maxlength="35">
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Postcode &nbsp;</label>
                            <input type="text" class="form-control" name='postcode' id="exampleFormControlInput1" placeholder="" maxlength="8">
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Phone Number &nbsp;</label>
                            <input type="text" class="form-control" name='tel_no' id="exampleFormControlInput1" placeholder="" maxlength="12">
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Email Address &nbsp;</label>
                            <input type="text" class="form-control" name='email' id="exampleFormControlInput1" placeholder="" maxlength="30">
                        </div>
                        <br>
                        <label for="exampleFormControlInput1">Date of Birth &nbsp;</label>
                        <div class="form-inline">
                            <div class="form-inline">
                                <input type="text" class="form-control col-sm-2" id="exampleFormControlInput1" name='dobD' placeholder="DD" maxlength="2">
                                <p>&nbsp; / &nbsp;</p>
                                <input type="text" class="form-control col-sm-2" id="exampleFormControlInput1" name='dobM' placeholder="MM" maxlength="2">
                                <p>&nbsp; / &nbsp;</p>
                                <input type="text" class="form-control col-sm-2" id="exampleFormControlInput1" name='dobY' placeholder="YYYY" maxlength="4">
                            </div>
                        </div>
                        <br>
                        <h4>Emergency Contact</h4>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Name &nbsp;</label>
                            <input type="text" class="form-control" name='EM_name' id="exampleFormControlInput1" placeholder="" maxlength="20" required>
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Tel No &nbsp;</label>
                            <input type="text" class="form-control" name='EM_tel' id="exampleFormControlInput1" placeholder="" maxlength="12" required>
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Relationship &nbsp;</label>
                            <input type="text" class="form-control" name='EM_rel' id="exampleFormControlInput1" placeholder="" maxlength="30" required>
                        </div>
						<br>						
						<h4>References</h4>
						<h6>1.</h6>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Name &nbsp;</label>
                            <input type="text" class="form-control" name='R1_name' id="exampleFormControlInput1" placeholder="" maxlength="20" required> 
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Email Address &nbsp;</label>
                            <input type="text" class="form-control" name='R1_email' id="exampleFormControlInput1" placeholder="" maxlength="40" required>  
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Tel No &nbsp;</label>
                            <input type="text" class="form-control" name='R1_tel' id="exampleFormControlInput1" placeholder="" maxlength="12" required>
                        </div>
                        <br>
							<div class="form-inline">
                            <label for="exampleFormControlInput1">Relationship &nbsp;</label>
                            <input type="text" class="form-control" name='R1_rel' id="exampleFormControlInput1" placeholder="" maxlength="20" required> 
                        </div>
                        <br>
						<h6>2.</h6>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Name &nbsp;</label>
                            <input type="text" class="form-control" name='R2_name' id="exampleFormControlInput1" placeholder="" maxlength="20">
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Email Address &nbsp;</label>
                            <input type="text" class="form-control" name='R2_email' id="exampleFormControlInput1" placeholder="" maxlength="30">
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Tel No &nbsp;</label>
                            <input type="text" class="form-control" name='R2_tel' id="exampleFormControlInput1" placeholder="" maxlength="12">
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Relationship &nbsp;</label>
                            <input type="text" class="form-control" name='R2_rel' id="exampleFormControlInput1" placeholder="" maxlength="20">
                        </div>
                        <br>
                        <h4>Volunteering Areas</h4>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="FoodBankCentre" class="form-check-input" value="1">Foodbank Centre
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="Fundraising" class="form-check-input" value="2">Fundraising
                                </label>
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="PromoEvent" class="form-check-input" value="3">Promotional Events
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="BuddySch" class="form-check-input" value="4">Buddy Scheme
                                </label>
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="SuperColl" class="form-check-input" value="5">Supermarket Collections
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="DeliveryColl" class="form-check-input" value="6">Delivery or Collections
                                </label>
                            </div>
                        </div>
                        <br>
                        <h4>Availability</h4>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="OneEvent" class="form-check-input" value="1">One off events
                            </label>
                        </div>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="TmeAvail" class="form-check-input" value="1">1-4 hours a week (select day availability)
                                </label>
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">
									<label>Choose</label>&nbsp
									<input name="WeekAvail[]" type="checkbox" value="Mon" id="check_id1"><label for="check_id1">Mon</label>&nbsp &nbsp
									<input name="WeekAvail[]" type="checkbox" value="Tue" id="check_id1"><label for="check_id1">Teu</label>&nbsp &nbsp
									<input name="WeekAvail[]" type="checkbox" value="Wed" id="check_id1"><label for="check_id1">Wed</label>&nbsp &nbsp
									<input name="WeekAvail[]" type="checkbox" value="Thu" id="check_id1"><label for="check_id1">Thu</label>&nbsp &nbsp
									<input name="WeekAvail[]" type="checkbox" value="Fri" id="check_id1"><label for="check_id1">Fri</label>&nbsp &nbsp
                                </label>
                            </div>
						</div>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Other &nbsp;</label>
                            <input type="text" name="OtherAvail" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="comment">Interest in volunteering</label>
                            <textarea class="form-control" name="ReasonInterest" rows="5" cols="50" id="comment"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="comment">Previous work, volunteering experience or relevant qualifications</label>
                            <textarea class="form-control" name="WorkExp" rows="5" cols="50" id="comment"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="comment">Health issues to be aware of</label>
                            <textarea class="form-control" name="HealthIssueDetail" rows="5" cols="50" id="comment"></textarea>
                        </div>
                        <br>
                        <h4>Criminal Convictions</h4>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">Willing to submit to a PVG check? &nbsp
                                    <input type="radio" name="PVG" class="form-check-input" value="1">Yes
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="PVG" class="form-check-input" value="0">No
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">Any criminal convictions &nbsp
                                    <input type="radio" name="Crim" class="form-check-input" value="1">Yes
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="Crim" class="form-check-input" value="0">No
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="comment">If yes, give details</label>
                            <textarea class="form-control" name="CrimYesDetail" rows="5" cols="50" id="comment"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="comment">Any further information</label>
                            <textarea class="form-control" name="MiscInfo" rows="5" cols="50" id="comment"></textarea>
                        </div>
                        <br>
						<div class="form-group">
                            <label for="comment">How did you hear about volunteering at Moray foodbank?</label>
                            <textarea class="form-control" name="MiscInfoHow" rows="1" cols="50" id="comment" required></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-primary">Cancel</button>
                        </div>
                    </form>
					<?php
						if($r2 && ($r5 || $r6 || $r7 || $r8 || $r9 || $r10)) // dont think work's properly - supposed to display if new vol entered and at least one volunteer area picked
						{
							echo "Volunteer Successfully Created! <br>";
							echo "<br>";
						}
						
						/*if(!$r1_num_results >= 0)
						{
							echo "There was a problem creating this volunteer! <br>";
							echo "<br>";
						}*/
					?>
                </div>
            </div>
        </div>
    </body>
</html>