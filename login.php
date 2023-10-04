<?php
 // page tittle
 $page_title = "Cask Cafe | Login";

  // check if form was submitted with post
  if($_SERVER['REQUEST_METHOD'] == 'POST') {

 // include the db connection
  include './dbconnect/dbconnect.php';
  include ('inc/loginfunctions.php');

  // check the login info
  list($check, $data) = check_login($dbc, $_POST['email'], $_POST['password']);
    
  // check if returned value was TRUE
     if ($check) {
      session_start();
      // $_SESSION['userid'] = $data['userid'];
      $_SESSION['f_name'] = $data['f_name'];
      $_SESSION['l_name'] = $data['l_name'];
      // $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);

      // set firstname cookie
      setcookie('f_name', $_SESSION['f_name']);

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
