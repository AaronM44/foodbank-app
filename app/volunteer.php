<?php
    # Sessions
    if (!isset($_SESSION))
    {
        session_start();
    }

    # Includes
    require_once("scripts/connect.php");

    # Error reporting
    error_reporting(E_ERROR | E_PARSE);

    $query1 = "select * from volunteer_details where vol_no = '" .$_SESSION['vol_no']. "'";
    $result1 = $link->query($query1);

    # Save query results
    if ($result1->num_rows > 0) {

        while($row1 = $result1->fetch_assoc()) {
            
            $title = $row1['title'];
            $first_name = $row1['forename'];
            $last_name = $row1['surname'];
            $address1 = $row1['address1'];
            $address2 = $row['address2'];
            $town = $row1['town'];
            $postcode = $row1['postcode'];
            $tel_no = $row1['tel_no'];
            $email = $row1['email'];
            $dob = explode("-", $row1['DOB']);
            $em_name = $row1['EM_name'];
            $em_tel = $row1['EM_tel'];
            $em_rel = $row1['EM_rel'];
            $r1_name = $row1['R1_name'];
            $r1_tel = $row1['R1_tel'];
            $r1_email = $row1['R1_email'];
            $r1_rel = $row1['R1_rel'];
            $r2_name = $row1['R2_name'];
            $r2_tel = $row1['R2_tel'];
            $r2_email = $row1['R2_email'];
            $r2_rel = $row1['R2_rel'];
            $awards = $row1['awards'];
        }
    } 

    $query2 = "select * from application_details where vol_no = '" .$_SESSION['vol_no']. "'";
    $result2 = $link->query($query2);

    # Save query results
    if ($result2->num_rows > 0) {

        while($row2 = $result2->fetch_assoc()) {
            
            $health = $row2['health_problems'];
            $why_interested = $row2['why_interested'];
            $prev_experience = $row2['previous_work'];
            $further_info = $row2['further_info'];
        }
    }

    $link->close();
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
                            <a class="nav-link active" href="volunteer.php">Volunteer Info</a>
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
                    <form class="form-inline ml-auto" id="search" method="POST" action="results.php">
                        <input class="form-control mr-sm-2" type="text" name="fullname" placeholder="First Name / Last Name">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
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
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home">Personal Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">Additional Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2">Medical</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu3">Development</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu4">References</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home" class="container tab-pane active"><br>
                            <h2>Personal Details</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <form action="scripts/vol_personal_details.php" method="post" name="vol_personal_details">
                                <div class="form-inline">
                                    <div class="form-inline">
                                            <label for="exampleFormControlInput1">Title &nbsp;</label>
                                            <select class="form-control" id="sel1" name="title">
                                            <option value="<?php echo $title; ?>" selected="selected"><?php echo $title; ?></option>
                                                <option>Mr</option>
                                                <option>Mrs</option>
                                                <option>Miss</option>
                                                <option>Ms</option>
                                            </select>
                                        </div>
                                    <div class="form-inline">
                                        <label for="exampleFormControlInput1">&nbsp; First Name &nbsp;</label>
                                        <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $first_name; ?>">
                                    </div>
                                    <div class="form-inline">
                                        <label for="exampleFormControlInput1">&nbsp; Last Name &nbsp;</label>
                                        <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $last_name; ?>">
                                    </div>
                                </div>
                                <br>
                                <div class="form-inline">
                                    <label for="exampleFormControlInput1">Address Line 1 &nbsp;</label>
                                    <input type="text" name="address1" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $address1; ?>">
                                </div>
                                <br>
                                <div class="form-inline">
                                    <label for="exampleFormControlInput1">Address Line 2 &nbsp;</label>
                                    <input type="text" name="address2" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $address2; ?>">
                                </div>
                                <br>
                                <div class="form-inline">
                                    <label for="exampleFormControlInput1">Town/City &nbsp;</label>
                                    <input type="text" name="town" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $town; ?>">
                                </div>
                                <br>
                                <div class="form-inline">
                                    <label for="exampleFormControlInput1">Postcode &nbsp;</label>
                                    <input type="text" name="postcode" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $postcode; ?>">
                                </div>
                                <br>
                                <div class="form-inline">
                                    <label for="exampleFormControlInput1">Phone Number &nbsp;</label>
                                    <input type="text" name="tel_no" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $tel_no; ?>">
                                </div>
                                <br>
                                <div class="form-inline">
                                    <label for="exampleFormControlInput1">Email Address &nbsp;</label>
                                    <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $email; ?>">
                                </div>
                                <br>
                                <label for="exampleFormControlInput1">Date of Birth &nbsp;</label>
                                <div class="form-inline">
                                    <div class="form-inline">
                                        <input type="text" name="day" class="form-control col-sm-2" id="exampleFormControlInput1" placeholder="DD" value="<?php echo $dob[2]; ?>">
                                        <p>&nbsp; / &nbsp;</p>
                                        <input type="text" name="month" class="form-control col-sm-2" id="exampleFormControlInput1" placeholder="MM" value="<?php echo $dob[1]; ?>">
                                        <p>&nbsp; / &nbsp;</p>
                                        <input type="text" name="year" class="form-control col-sm-2" id="exampleFormControlInput1" placeholder="YYYY" value="<?php echo $dob[0]; ?>">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                </div>
                                <br><br>
                            </form>
                        </div>
                        <div id="menu1" class="container tab-pane fade"><br>
                            <h2>Additional Information</h2>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            
                        </div>
                        <div id="menu2" class="container tab-pane fade"><br>
                            <h2>Medical</h2>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <form action="scripts/vol_medical.php" method="post" name="vol_medical">
                                <h4>Emergency Contact</h4>
                                <div class="form-inline">
                                    <label for="exampleFormControlInput1">Name &nbsp;</label>
                                    <input type="text" name="em_name" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $em_name; ?>">
                                </div>
                                <br>
                                <div class="form-inline">
                                    <label for="exampleFormControlInput1">Tel No &nbsp;</label>
                                    <input type="text" name="em_tel" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $em_tel; ?>">
                                </div>
                                <br>
                                <div class="form-inline">
                                    <label for="exampleFormControlInput1">Relationship &nbsp;</label>
                                    <input type="text" name="em_rel" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $em_rel; ?>">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="comment">Health issues or special needs including medication</label>
                                    <textarea name="health" class="form-control" rows="5" cols="50" id="comment"><?php echo $health; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                </div>
                                <br><br>
                            </form>
                        </div>
                        <div id="menu3" class="container tab-pane fade"><br>
                            <h2>Development</h2>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                            <form action="scripts/vol_development" method="post" name="vol_development">
                                <div class="form-group">
                                    <label for="comment">Awards working towards</label>
                                    <textarea name="awards" class="form-control" rows="5" cols="50" id="comment"><?php echo $awards; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Previous experience</label>
                                    <textarea name="prev_experience" class="form-control" rows="5" cols="50" id="comment"><?php echo $prev_experience; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Why is/was the volunteer interested in this type of work</label>
                                    <textarea name="reasons" class="form-control" rows="5" cols="50" id="comment"><?php echo $why_interested; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Additional information</label>
                                    <textarea name="further_info" class="form-control" rows="5" cols="50" id="comment"><?php echo $further_info; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                </div>
                                <br><br>
                            </form>
                        </div>
                        <div id="menu4" class="container tab-pane fade"><br>
                            <h2>References</h2>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <h4>References</h4>
                            <h6>1.</h6>
                            <div class="form-inline">
                                <label for="exampleFormControlInput1">Name &nbsp;</label>
                                <input type="text" class="form-control" name='R1_name' id="exampleFormControlInput1" placeholder="" maxlength="20" value="<?php echo $r1_name; ?>"> 
                            </div>
                            <br>
                            <div class="form-inline">
                                <label for="exampleFormControlInput1">Email Address &nbsp;</label>
                                <input type="text" class="form-control" name='R1_email' id="exampleFormControlInput1" placeholder="" maxlength="40" value="<?php echo $r1_email; ?>">  
                            </div>
                            <br>
                            <div class="form-inline">
                                <label for="exampleFormControlInput1">Tel No &nbsp;</label>
                                <input type="text" class="form-control" name='R1_tel' id="exampleFormControlInput1" placeholder="" maxlength="12" value="<?php echo $r1_tel; ?>">
                            </div>
                            <br>
                                <div class="form-inline">
                                <label for="exampleFormControlInput1">Relationship &nbsp;</label>
                                <input type="text" class="form-control" name='R1_rel' id="exampleFormControlInput1" placeholder="" maxlength="20" value="<?php echo $r1_rel; ?>"> 
                            </div>
                            <br>
                            <h6>2.</h6>
                            <div class="form-inline">
                                <label for="exampleFormControlInput1">Name &nbsp;</label>
                                <input type="text" class="form-control" name='R2_name' id="exampleFormControlInput1" placeholder="" maxlength="20" value="<?php echo $r2_name; ?>">
                            </div>
                            <br>
                            <div class="form-inline">
                                <label for="exampleFormControlInput1">Email Address &nbsp;</label>
                                <input type="text" class="form-control" name='R2_email' id="exampleFormControlInput1" placeholder="" maxlength="30" value="<?php echo $r2_email; ?>">
                            </div>
                            <br>
                            <div class="form-inline">
                                <label for="exampleFormControlInput1">Tel No &nbsp;</label>
                                <input type="text" class="form-control" name='R2_tel' id="exampleFormControlInput1" placeholder="" maxlength="12" value="<?php echo $r2_tel; ?>">
                            </div>
                            <br>
                            <div class="form-inline">
                                <label for="exampleFormControlInput1">Relationship &nbsp;</label>
                                <input type="text" class="form-control" name='R2_rel' id="exampleFormControlInput1" placeholder="" maxlength="20" value="<?php echo $r2_rel; ?>">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php 
        unset($_SESSION['error']);
        unset($_SESSION['warning']);
        unset($_SESSION['info']);
        unset($_SESSION['success']);
    ?>
</html>