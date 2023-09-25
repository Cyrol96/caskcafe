<?php

// set page reference:
$self = basename($_SERVER['PHP_SELF']);

// check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// connect to the db server
	require('dbconnect.php');

	// initialize an error array
	$errors = [];

	// sanitize the data for DB entry
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// check for a first name:
	if (empty($_POST['f_name'])) {
		$errors['f_name'] = 'First Name';
	} else {
		$fn = mysqli_real_escape_string($dbc, test_input($_POST['f_name']));
	}

	// check for a last name:
	if (empty($_POST['l_name'])) {
		$errors['l_name'] = 'Last Name';
	} else {
		$ln = mysqli_real_escape_string($dbc, test_input($_POST['l_name']));
	}

	// check for an email address:
	if (empty($_POST['cust_email'])) {
		$errors['cust_email'] = 'Email Address';
	} else {
		$e = mysqli_real_escape_string($dbc, test_input($_POST['cust_email']));

		// check if email is already registered in db
		$sql = "SELECT cust_email FROM user WHERE cust_email = '$e'";
		$result = mysqli_query($dbc, $sql);

		$emailreg = mysqli_num_rows($result);
		mysqli_free_result($result);

		// display error message that email is already registered
		if ($emailreg > 0) {
			$errors['cust_email'] = 'Email address is already registered.';
		}
	}

	// check for a password and match against the confirmed password:
	if (!empty($_POST['pass1'])) {
		// check if password matches re-type password
		if ($_POST['pass1'] != $_POST['pass2']) {
			$errors['passworderror2'] = 'Your password does not match your confirmed password.';
		} else {
			// passwords match so sanitize and escape data
			$p = mysqli_real_escape_string($dbc, test_input($_POST['pass1']));
		}
	} else {
		$errors['passworderror1'] = 'You may have forgotten to enter a password.';
	}

	// check for a phone number:
	if (empty($_POST['cust_phone'])) {
		$ph = mysqli_real_escape_string($dbc, test_input('0'));
	} else {
		$ph = mysqli_real_escape_string($dbc, test_input($_POST['cust_phone']));
	}

	// check for an address:
	if (empty($_POST['cust_address'])) {
		$ad = mysqli_real_escape_string($dbc, test_input('n/a'));
	} else {
		$ad = mysqli_real_escape_string($dbc, test_input($_POST['cust_address']));
	}


	// check for a country:
	if (empty($_POST['cust_country'])) {
		$co = mysqli_real_escape_string($dbc, test_input('Canada'));
	} else {
		$co = mysqli_real_escape_string($dbc, test_input($_POST['cust_country']));
	}

	// if no errors, which required for esstential input, then insert data into db table
	if (empty($errors)) {

		// setup the query to register user in the db:
		$sql = "INSERT INTO user (f_name, l_name, cust_email, cust_phone, cust_address, cust_country, pass) VALUES ('$fn', '$ln', '$e', '$ph', '$ad', '$co', SHA1('$p'))";

		// run the query
		$result = mysqli_query($dbc, $sql);

		// if query ran ok
		if ($result) {

			// print a success message:
			echo '<h1>Thank you!</h1>
				<p>You are sucessfully registered. Please <a href="login.php">login</a> and shop with preferential offer.</p>';

		} else {

			// print a failure message:
			echo '<h1>Oops!</h1>
				<p class="error">There may be a system error. Please try to register later. We apologize for any inconvenience.</p>';

		} // end of if ($result)

		mysqli_close($dbc); // close db connection

		exit();

	} else { // report any errors:

		echo '<h1 class="error">Ooops!<i class="fa-solid fa-person-circle-exclamation"></i></h1>';
		echo '<p>Some information is missing. Please fill in all the fields with "*".</p>';

	} // end of if ($errors)

	mysqli_close($dbc); // close the db connection

} // end of the main submit if

// include the registration form when page is initially loaded in a browser or displaying errors
include('regform.php');

?>