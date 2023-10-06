<?php

  // defines 2 functions used by the login/logout script

  // redirect user function 
  function redirect_user($page='login.php') {
    header("Location: $page");
    exit();
  }

  // check login info which is email and password
  function check_login($dbc, $email='', $pass='') {

    $errors = array();

    // validate the email address
    if (empty($email)) {
      $errors[] = 'email';
    } else {
      $email = mysqli_real_escape_string($dbc, trim($email));
    }

    // validate the password
    if (empty($pass)) {
      $errors[] = 'password';
    } else {
      $pass = mysqli_real_escape_string($dbc, trim($pass));
    }

    // if no errors
    if (empty($errors)) {
      // retrieve the userid, firstname and lastname for the given login info
      $sql = "SELECT id, f_name, l_name FROM customer WHERE cust_email='$email' AND password=SHA1('$pass')";
      $result = mysqli_query($dbc, $sql);

      // check the return
      if (mysqli_num_rows($result) == 1) {

        // fetch the record
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        // return true and the record
        return array(TRUE, $row);
      } else {
        // no match in DB
        $errors[] = 'The information you provided does not match what we have on file';
      }
    }

    // return FALSE and the errors
    return array(FALSE, $errors);
  }