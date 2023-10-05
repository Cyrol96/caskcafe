<?php
// Start the session
session_start();

// Include the database connection
require('./dbconnect/dbconnect.php');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Set up an error array
    $errors = array();

    // Check for a valid email address
    if (!empty($_POST['email'])) {
        $cust_email = trim($_POST['email']);
    } else {
        $errors['email'] = 'Please enter your email address.';
    }

    // Check for a password
    if (!empty($_POST['password'])) {
        $password = trim($_POST['password']);
    } else {
        $errors['password'] = 'Please enter your password.';
    }

    // If no errors, attempt to log in the user
    if (empty($errors)) {
        // Retrieve user data from the database based on the provided email address
        $query = "SELECT cust_id, cust_email, hashed_pass FROM customers WHERE cust_email = '$cust_email'";
        $result = mysqli_query($dbc, $query);

        if ($result) {
            // Check if a user with the provided email address exists
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $hashed_pass = $row['hashed_pass'];

                // Verify the password
                if (password_verify($password, $hashed_pass)) {
                    // Password is correct, so log in the user
                    $_SESSION['cust_id'] = $row['cust_id'];
                    $_SESSION['cust_email'] = $row['cust_email'];

                    // Redirect the user to a dashboard or another page
                    header('Location: dashboard.php');
                    exit();
                } else {
                    // Password is incorrect
                    $errors['login_error'] = 'Incorrect email or password.';
                }
            } else {
                // User does not exist
                $errors['login_error'] = 'Incorrect email or password.';
            }
        } else {
            // Database error
            echo '<h1>System Error</h1><p class="error">Unable to process your request at this time. Please try again later.</p>';
            echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $query . '</p>';
        }

        mysqli_close($dbc);
    }
}

// Include the login form
include('./inc/loginpage.php');
?>
