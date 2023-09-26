<?php
// defines 2 functions used by the login/logout script

// redirect user function
function redirect_user($page = "login.php") {
    // Use this function to redirect the user to the specified page
    header("Location: $page");
    exit(); // Make sure to exit the script after the redirect
}

// check login
function check_login($dbc, $email = "", $pass = '')
{
    $errors = array();

    // validate email
    if (empty($email)) {
        $errors[] = 'email'; // The error is added to the array
    } else {
        $email = mysqli_real_escape_string($dbc, trim($email));
    }

    // validate password
    if (empty($pass)) {
        $errors[] = 'password';
    } else {
        $pass = mysqli_real_escape_string($dbc, trim($pass));
    }

    if (empty($errors)) {
        // retrieve the user id
        $q = "SELECT customers, f_name, l_name FROM customers
              WHERE email='$email' AND password='" . sha1($pass) . "'";
        $result = mysqli_query($dbc, $q);

        if ($result) {
            // check the return
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // return true and the record
                return array(TRUE, $row); // return multiple results in an array form, success
            } else if (mysqli_num_rows($result) >= 1) {
                $errors[] = "database error: multiple results for the same email, password pair";
            } else {
                $errors[] = "the information you provided does not match what we have on file";
            }
        } else {
            // Handle database query error here
            $errors[] = "Database query error: " . mysqli_error($dbc);
        }
    }

    // return false and the errors
    return array(FALSE, $errors);
}
?>