<?php

	$link = mysqli_connect('localhost', 'root', '', '');

	if (!$link) {
		die('Connect Error: ' . mysqli_connect_error());
		exit;
	} else {
		mysqli_select_db($link, 'foodbank');
		echo "connection successful";
	}


?>