<?php
// Define two functions used by the login/logout script

// Redirect user function
function redirect_user($page = 'login.php') {
    header("Location: $page");
    exit();
}

// Check login info which is email and password
function check_login($dbc, $email = '', $pass = '') {
    $errors = array();

    // Validate the email address
    if (empty($email)) {
        $errors[] = 'email';
    } else {
        $email = mysqli_real_escape_string($dbc, trim($email));
    }

    // Validate the password
    if (empty($pass)) {
        $errors[] = 'password';
    } else {
        $pass = mysqli_real_escape_string($dbc, trim($pass));
    }

    // If no errors
    if (empty($errors)) {
        // Retrieve the user's information based on the provided email address and hashed password
        $sql = "SELECT id, f_name, l_name, hashed_pass FROM customers WHERE cust_email='$email'";
        $result = mysqli_query($dbc, $sql);

        // Check the return
        if ($result) {
            // Fetch the record
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            // Verify the password
            if (password_verify($pass, $row['hashed_pass'])) {
                // Password is correct, so return true and the record
                return array(TRUE, $row);
            } else {
                // Password is incorrect
                $errors[] = 'The information you provided does not match what we have on file';
            }
        } else {
            // Query execution failed
            $errors[] = 'Database error: ' . mysqli_error($dbc);
        }
    }

    // Return FALSE and the errors
    return array(FALSE, $errors);
}
?>
