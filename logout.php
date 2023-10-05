<?php

// user is redirected here from login.php
session_start();

// if no session variables exist, redirect user
if (!isset($_SESSION['userid'])) {
    // need functions file
    include('inc/loginfunctions.php');
    redirect_user();
}

// cancel the session
unset($_SESSION['userid']);
unset($_SESSION['agent']);
session_destroy();
setcookie("PHPSESSID", "", time() - 3600);
setcookie("firstname", "", time() - 3600);

// change title and include header
$self = basename($_SERVER['PHP_SELF']);
$page_title = 'Logged Out | By Cask Cafe';
include('inc/header.php');

// display page
echo "<div class='w3-container w3-teal'><h1>" . $page_title . "<a href='viewcart.php'><i class='fas fa-shopping-cart' id='carticon' title='View Cart'></i></a></h1></div><div class='container'><p>You are now logged out. Have a great day!</p></div>";

// include footer
include('inc/footer.php');