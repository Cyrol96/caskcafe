<?php

  // check if form was submitted with post
  if($_SERVER['REQUEST_METHOD'] == 'POST') {

     // page tittle
 $page_title = "Cask Cafe | Login";  

    // require 2 helper files for login and connection to DB
    require ('./inc/loginfunctions.php');
    include './dbconnect/dbconnect.php';

    // check the login info
    list($check, $data) = check_login($dbc, $_POST['email'], $_POST['password']);

    // check if returned value was TRUE
    if ($check) {
      // session_start();
      $_SESSION['userid'] = $data['userid'];
      $_SESSION['firstname'] = $data['firstname'];
      $_SESSION['lastname'] = $data['lastname'];
      $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);

      // set firstname cookie
      setcookie('firstname', $_SESSION['firstname']);

      // redirect user to loggedin page
      redirect_user('loggedin.php');
    } else {
      // FALSE was returned
      // assign data to errors
      $errors = $data;
    }

    mysqli_close($dbc);

  }


include('inc/loginpage.php');
?>
