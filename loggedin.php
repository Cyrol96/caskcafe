<?php

session_start();
// if(!isset($_SESSION['userid']) && !isset($_SESSION['agent'])){
    // ================fixed==================
    //require('inc/loginfuncitons.php');
    // require('./inc/loginfunctions.php');
    // ================end section ==================
    // redirect_user();//by default, go to login.php
// }

$cookie_name="firstname";
//if(isset($_COOKIE[$cookie_name])){
    //echo "cookie $cookie_name is set";
    // echo "value is $_COOKIE[$cookie_name]";
    // echo "Welcome! You've successfully logged in $_COOKIE[$cookie_name]";
//}
//else{
    //echo "cookie $cookie_name hasn't been set";
//}

//change title and include header

$self=basename($_SERVER['PHP_SELF']);
$page_title="Logged in | by Caskcafe";
require('inc/header.php');
// display a customized successful login message 
echo "<div class='w3-container w3-teal'><h1>".$page_title."
<a href='viewcart.php'><i class='fas fa-shopping-cart' id='caticon' 
title='View Cart'></i></a></h1></div> 
<div= 'container'><p class='indent'>You are now logged in, 
</p>
<div class='logout'><p><a href='products.php'><button id='updateuser'>
Let's go shopping</button></a><a href='logout.php' ><button>LOGOUT</button></a></p></div></div>";

// footer
require('inc/footer.php');  
?>