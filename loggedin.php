<?php
//session_start();

$cookie_name="firstname";

//change title and include header
$self=basename($_SERVER['PHP_SELF']);
$page_title="Logged in | by Caskcafe";
require('inc/header.php');
// display a customized successful login message 
var_dump($_SESSION) ;
echo "<div class='w3-container w3-teal'><h1>".$page_title."
<a href='viewcart.php'><i class='fas fa-shopping-cart' id='caticon' 
title='View Cart'></i></a></h1></div> 
<div= 'container'><p class='indent'>You are now logged in, 
</p>
<div class='logout'><p><a href='index.php'><button id='updateuser'>
Let's go shopping</button></a><a href='logout.php' ><button>LOGOUT</button></a></p></div></div>";

// footer
require('inc/footer.php');  
?>