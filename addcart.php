<?php

$page_title="added to cart";
$self=basename($_SERVER['PHP_SELF']);
include 'inc/header.php';
include 'inc/footer.php';
include_once './dbconnect/dbconnect.php';

session_start(); // Start or resume the session

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the "Add to Cart" form was submitted

    // Retrieve product information from the form
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $quantity = $_POST["quantity"];

    // Create an array to store the cart item
    $cart_item = array(
        "product_id" => $Pro_info,
        "product_name" => $prod_name,
        "product_price" => $Price,
        "quantity" => $Quantity
    );

    // Check if the cart session variable exists; if not, initialize it
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    // Check if the product is already in the cart; if so, update the quantity
    $cart_index = array_search($Pro_info, array_column($_SESSION["cart"], 'product_id'));

    if ($cart_index !== false) {
        $_SESSION["cart"][$cart_index]["Quantity"] += $Quantity;
    } else {
        // Add the item to the cart
        $_SESSION["cart"][] = $cart_item;
    }

    // Redirect back to the product page or a shopping cart page
    header("Location: index.php"); // Change this to the appropriate page
    exit();
} else {
    // Redirect to an error page or the home page if accessed directly
    header("Location: index.php"); // Change this to the appropriate page
    exit();
}
?>
