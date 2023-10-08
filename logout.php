<?php
  session_start();
  if (isset($_SESSION['userid'])) {
  // cancel the session
    unset($_SESSION['userid']);
    unset($_SESSION['agent']);
    unset($_SESSION['cart']);
    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);
    session_destroy();
    //echo "Session has been destroyed";
  }
  // change title and include header
  $self = basename($_SERVER['PHP_SELF']);
  $page_title = 'Logged Out | By CaskCafe';
  include ('inc/header.php');

  // display page
  echo "<div class='w3-container w3-teal'><h1>" . $page_title. "<a href='viewcart.php'><i class='fas fa-shopping-cart' id='carticon' title='View Cart'></i></a></h1></div><div class='container'><p>You are now logged out. Have a great day!</p></div>";

  // include footer
  include('inc/footer.php');