<?php
// Define the database connection constants
define('DB_HOST', 'localhost');
define('DB_USER', 'ccm_jamaldeen');
define('DB_PASSWORD', 'k7aq@WLnCLrG');
define('DB_NAME', 'ccm_jamaldeen');
// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'ccm_jamaldeen');

// Establish a connection to the database
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check if the connection was successful
if (!$dbc) {
  die('Error: Unable to connect to the database. ' . mysqli_connect_error());
}

// Set the character set to utf8
mysqli_set_charset($dbc, 'utf8');
?>