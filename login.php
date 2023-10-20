<?php
// Start the session at the beginning of your script
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the form was submitted with POST

    // Set the page title
    $page_title = "CaskCafe | Login";

    // Require the helper file for login and the database connection
    require('./inc/loginfunctions.php');
    include './dbconnect/dbconnect.php';

    // Check the login info
    list($check, $data) = check_login($dbc, $_POST['email'], $_POST['password']);

    // Check if the returned value was TRUE
    if ($check) {
        // Set session variables
        $_SESSION['userid'] = $data['id'];
        $_SESSION['firstname'] = $data['f_name'];
        $_SESSION['lastname'] = $data['l_name'];
        $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);

        // Redirect to loggedin.php
        redirect_user('loggedin.php');
    } else {
        $errors = $data;
        print_r($errors);
    }

    mysqli_close($dbc);
}

include('inc/loginpage.php');
?>
