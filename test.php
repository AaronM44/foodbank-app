<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<table width="360" border="1">

<p><strong>Volunteer Details</strong></p>
<form name="form1" method="post" action="process.php">

  <label for="title">Title</label>
  <select name="title" id="title">
    <option>Mr</option>
    <option>Mrs</option>
    <option>Ms</option>
    <option>Miss</option>
    <option>Dr</option>
    <option>Other</option>
  </select><br>
  
  <label for="forename">First Name: </label>
  <input type="text" name="forename" id="forename" required><br>


  <label for="surname">Last Name: </label>
  <input type="text" name="surname" id="surname" required><br>

   <label for="address">Address: </label>
  <input type="text" name="address" id="address" required><br>
  
   <label for="postcode">Postcode: </label>
  <input type="text" name="postcode" id="postcode" required><br>

  <label for="tel_no">Telephone Number: </label>
  <input type="tel" name="tel_no" id="tel_no" required><br>

  <label for="email">Email: </label>
  <input type="email" name="email" id="email" required><br>
  <label>
	<input type="submit" name="BTNVolEmail" id="BTNVolEmail" value="Email contact">
  </label><br>

  <label for="DOB">Date Of Birth: </label>
  <input type="text" name="DOB" id="DOB" required>

<p><strong>In case of emergency</strong></p>

  <label for="EM_name">Name: </label>
  <input type="text" name="EM_name" id="EM_name" required><br>

  <label for="EM_tel">Telephone Number: </label>
  <input type="tel" name="EM_tel" id="EM_tel" required><br>

  <label for="EM_rel">Relationship: </label>
  <input type="text" name="EM_rel" id="EM_rel" required><br>

  <p><strong>References (Not family members)</strong></p>
  
  <p><strong>1:</strong></p>
  <label for="R1_name">Name</label>
  <input type="text" name="R1_name" id="R1_name" required><br>
	
	<label for="R1_email">Email:</label>
  <input type="email" name="R1_email" id="R1_email" required><br>
	
  <label for="R1_tel">Telephone Number:</label>
  <input type="tel" name="R1_tel" id="R1_tel" required><br>

  <label for="R1_rel">Relationship</label>
  <input type="text" name="R1_rel" id="R1_rel" required><br>
  
  <p><strong>2:</strong></p>
  <label for="R2_name">Name</label>
  <input type="text" name="R2_name" id="R2_name"><br>
	
	<label for="R2_email">Email:</label>
  <input type="email" name="R2_email" id="R2_email"><br>
	
  <label for="R2_tel">Telephone Number:</label>
  <input type="tel" name="R2_tel" id="R2_tel"><br>

  <label for="R2_rel">Relationship</label>
  <input type="text" name="R2_rel" id="R2_rel"><br>
	<br><br> 
	

	<div class="row">
        <div class="large-6 medium-6 columns">
            <label>Choose:</label><br>
            <input name="FoodBankCentre" type="checkbox" value="1"><label for="FoodBankCentre">Foodbank Centre</label><br>
            <input name="Fundraising" type="checkbox" value="2"><label for="Fundraising">Fundraising</label><br>
            <input name="PromoEvent" type="checkbox" value="3"><label for="PromoEvent">Promotional Events</label><br>
            <input name="BuddySch" type="checkbox" value="4"><label for="BuddySch">Buddy Scheme</label><br>
            <input name="SuperColl" type="checkbox" value="5"><label for="SuperColl">Supermarket Collections</label><br>
            <input name="DeliveryColl" type="checkbox" value="6"><label for="DeliveryColl">Delivery or Collections</label><br>
        </div>
    </div><br>
 
<p><strong>Available for:</strong></p>
  <input type="checkbox" name="OneEvent" id="OneEvent" />
  <label for="OneEvent">One off events i.e Supermarket collections, Harvests food sorting, annual stocktake.</label>

  <p>
    <input type="checkbox" name="TmeAvail" id="TmeAvail" />
    <label for="TmeAvail">1-4 hours a week (select day availability)</label>
  </p>


    <div class="row2">
        <div class="large-6 medium-6 columns">
            <label>Choose</label>
            <input name="WeekAvail[]" type="checkbox" value="Mon" id="check_id1"><label for="check_id1">Mon</label>
            <input name="WeekAvail[]" type="checkbox" value="Teu" id="check_id1"><label for="check_id1">Teu</label>
            <input name="WeekAvail[]" type="checkbox" value="Wed" id="check_id1"><label for="check_id1">Wed</label>
            <input name="WeekAvail[]" type="checkbox" value="Thu" id="check_id1"><label for="check_id1">Thu</label>
            <input name="WeekAvail[]" type="checkbox" value="Fri" id="check_id1"><label for="check_id1">Fri</label>
            <input name="WeekAvail[]" type="checkbox" value="Sat" id="check_id1"><label for="check_id1">Sat</label>
            <input name="WeekAvail[]" type="checkbox" value="Sun" id="check_id1"><label for="check_id1">Sun</label>
        </div>
    </div>
  
  <p>
    <label for="OtherAvail">Other Availability:</label>
    <input type="text" name="OtherAvail" id="OtherAvail" />
  </p>
	
  <label for="ReasonInterest">Interest in volunteering with the foodbank</label>
  <input type="text" name="ReasonInterest" id="ReasonInterest" /><br>


  <label for="WorkExp">Previous work/voluntary experiance</label>
  <input type="text" name="WorkExp" id="WorkExp" />

<p><strong>Any health problems?</strong></p>

  <input type="checkbox" name="HealthIssue" id="HealthIssue" />
  <label for="HealthIssue">Yes</label>


  <input type="checkbox" name="HealthIssueNo" id="HealthIssueNo" />
  <label for="HealthIssueNo">No</label><br>

  <label for="HealthIssueDetail">If yes specify:</label>
  <input type="text" name="HealthIssueDetail" id="HealthIssueDetail" />
<p><strong>PVG Check required?</strong></p>

  <input type="checkbox" name="PVGYes" id="PVGYes" />
  <label for="PVGYes">Yes</label>


  <input type="checkbox" name="PVGNo" id="PVGNo" />
  <label for="PVGNo">No </label><br>

  <label for="PVGYesDetail">If yes please enter details/upload copy:</label>
  <input type="text" name="PVGYesDetail" id="PVGYesDetail" /><br>
  <input type="file" name="PVGYesDetail" id="PVGYesDetail" />

  <br><br>
<p><strong>Criminal convictions:</strong></p>

  <input type="checkbox" name="CrimYes" id="CrimYes" />
  <label for="CrimYes">Yes</label>

  <input type="checkbox" name="CrimNo" id="CrimNo" />
  <label for="CrimNo">No</label>

  <p>
    <label for="CrimYesDetail">If Yes please give details:</label>
    <input type="text" name="CrimYesDetail" id="CrimYesDetail" />
  </p>

  <label for="MiscInfo">Further information that may be useful:</label>
  <input type="text" name="MiscInfo" id="MiscInfo" /><br>

  <label for="MiscInfoHow">How did you hear about volunteering at the foodbank?</label>
  		<input type="text" name="MiscInfoHow" id="MiscInfoHow" />

<p><strong>Working towards an award?</strong></p>

  <input type="checkbox" name="AwardYes" id="AwardYes" />
  <label for="AwardYes">Yes</label>

  <input type="checkbox" name="AwardNo" id="AwardNo" />
  <label for="AwardNo">No</label><br>

  <label for="AwardYesDetail">If yes which award/details:</label>
  <input type="text" name="AwardYesDetail" id="AwardYesDetail" />

<p><strong>Current Volunteering Area:</strong></p>

  <label for="VolLocat">Location</label>
  <input type="text" name="VolLocat" id="VolLocat" /><br>

  <label for="VolActivit">Activities</label>
  <input type="text" name="VolActivit" id="VolActivit" />

<p><strong>Volunteer Active?</strong></p>

  <input type="checkbox" name="VolActive" id="VolActive" />
  <label for="VolActive">Yes</label>

  <input type="checkbox" name="VolActiveNo" id="VolActiveNo" />
  <label for="VolActiveNo">No</label>

  <label for="VolActiveOneTime">Other/ One time event detail:</label>
  <input type="text" name="VolActiveOneTime" id="VolActiveOneTime" /><br><br>

 <!-- <p>Save and Exit
  <input type="submit" name="BTNSaveYes" id="BTNSaveYes" value="Save" />
  </p>
  <p>Do not save 
    <input type="submit" name="BTNCancel" id="BTNCancel" value="Exit" />
  </p> -->

  <input type="submit">
</form>

</body>
</html>