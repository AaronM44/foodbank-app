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
                            <a class="nav-link active" href="application.html">New Volunteer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="timesheet.html">New Timesheet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Reports</a>
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
                    <form id="frm_application" action="scripts/application.php" method="post">
                        <h2>New Volunteer Application</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        <br>
                        <div class="form-inline">
                            <div class="form-inline">
                                <label for="exampleFormControlInput1">Title &nbsp;</label>
                                <select class="form-control" id="app_title">
                                    <option>Mr</option>
                                    <option>Mrs</option>
                                    <option>Miss</option>
                                    <option>Ms</option>
                                </select>
                            </div>
                            <div class="form-inline">
                                <label for="exampleFormControlInput1">&nbsp; First Name &nbsp;</label>
                                <input type="text" class="form-control" id="app_first_name" placeholder="">
                            </div>
                            <div class="form-inline">
                                <label for="exampleFormControlInput1">&nbsp; Last Name &nbsp;</label>
                                <input type="text" class="form-control" id="app_last_name" placeholder="">
                            </div>
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Address Line 1 &nbsp;</label>
                            <input type="text" class="form-control" id="app_address1" placeholder="">
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Address Line 2 &nbsp;</label>
                            <input type="text" class="form-control" id="app_address2" placeholder="">
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Town/City &nbsp;</label>
                            <input type="text" class="form-control" id="app_town" placeholder="">
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Postcode &nbsp;</label>
                            <input type="text" class="form-control" id="app_postcode" placeholder="">
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Phone Number &nbsp;</label>
                            <input type="text" class="form-control" id="app_phone" placeholder="">
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Email Address &nbsp;</label>
                            <input type="text" class="form-control" id="app_email" placeholder="">
                        </div>
                        <br>
                        <label for="exampleFormControlInput1">Date of Birth &nbsp;</label>
                        <div class="form-inline">
                            <div class="form-inline">
                                <input type="text" class="form-control col-sm-2" id="app_day" placeholder="DD">
                                <p>&nbsp; / &nbsp;</p>
                                <input type="text" class="form-control col-sm-2" id="app_month" placeholder="MM">
                                <p>&nbsp; / &nbsp;</p>
                                <input type="text" class="form-control col-sm-2" id="app_year" placeholder="YYYY">
                            </div>
                        </div>
                        <br>
                        <h4>Emergency Contact</h4>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Name &nbsp;</label>
                            <input type="text" class="form-control" id="app_contact_name" placeholder="">
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Tel No &nbsp;</label>
                            <input type="text" class="form-control" id="app_contact_phone" placeholder="">
                        </div>
                        <br>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Relationship &nbsp;</label>
                            <input type="text" class="form-control" id="app_contact_relationship" placeholder="">
                        </div>
                        <br>
                        <h4>Volunteering Areas</h4>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="app_area_centre" value="">Foodbank Centre
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="app_area_fundraising" value="">Fundraising
                                </label>
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="app_area_events" value="">Promotional Events
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="app_area_buddy" value="">Buddy Scheme
                                </label>
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="app_area_supermarket" value="">Supermarket Collections
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="app_area_deliveries" value="">Delivery or Collections
                                </label>
                            </div>
                        </div>
                        <br>
                        <h4>Availability</h4>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="app_availability_one_off" value="">One off events
                            </label>
                        </div>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="app_availability_1-4" value="">1-4 hours a week
                                </label>
                            </div>
                        </div>
                        <div class="form-inline">
                            <label for="exampleFormControlInput1">Other &nbsp;</label>
                            <input type="text" class="form-control" id="app_availability_other" placeholder="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="comment">Interest in volunteering</label>
                            <textarea class="form-control" rows="5" cols="50" id="app_interest"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="comment">Previous work, volunteering experience or relevant qualifications</label>
                            <textarea class="form-control" rows="5" cols="50" id="app_experience"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="comment">Health issues to be aware of</label>
                            <textarea class="form-control" rows="5" cols="50" id="app_health_issues"></textarea>
                        </div>
                        <br>
                        <h4>Criminal Convictions</h4>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">Willing to submit to a PVG check? &nbsp
                                    <input type="checkbox" class="form-check-input" id="app_pvg_yes" value="">Yes
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="app_pvg_no" value="">No
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="form-inline">
                            <div class="form-check-inline">
                                <label class="form-check-label">Any criminal convictions &nbsp
                                    <input type="checkbox" class="form-check-input" id="app_convictions_yes" value="">Yes
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="app_convictions_no" value="">No
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="comment">If yes, give details</label>
                            <textarea class="form-control" rows="5" cols="50" id="app_convictions_details"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="comment">Any further information</label>
                            <textarea class="form-control" rows="5" cols="50" id="app_further_info"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-primary">Cancel</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>