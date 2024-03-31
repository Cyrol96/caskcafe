<?php
session_start();

// Set page title
$page_title = "Added to Cart";

// Include the header file
include 'inc/header.php';

// Check if a valid product ID is provided
if(isset($_POST['prod_id']) && filter_var($_POST['prod_id'], FILTER_VALIDATE_INT, array("options"=>array('min_range'=>1)))) {
    // Get the product ID
    $prod_id = $_POST['prod_id'];

    echo '<div class="addcart">';
    
    // Initialize the cart if it's not already set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    // Add the product to the cart
    if(isset($_SESSION['cart'][$prod_id])) {
        $_SESSION['cart'][$prod_id]['quantity']++;
    } else {
        $_SESSION['cart'][$prod_id]['quantity'] = 1;
    }
    
    echo '<div class="w3-container w3-teal"><h2>Added to Cart <a href="viewcart.php"><i class="fas fa-shopping-cart" id="carticon" title="View Cart"></i></a></h2><p class="indent">The product has been added to your shopping cart</p>';
    
    echo '</div></div>';

    // Include the footer file
    include("./inc/footer.php");
    
    exit(); // Stop further execution
} else {
    // If the product ID is not valid, redirect or show an error message
    echo '<div class="w3-container w3-red"><h1>Oh No!</h1><p class="indent"> This page has been accessed in error.</p></div>';
}

// Include the footer file
include("./inc/footer.php");
?>
