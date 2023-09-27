<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve product information from the form
    $prod_id = $_POST["product_id"];
    $prod_name = $_POST["product_name"];
    $price = $_POST["product_price"];
    $Quantity = $_POST["quantity"];

    // Create an array to store the cart item
    $cart_item = array(
        "product_id" => $pro_id,
        "product_name" => $prod_name,
        "product_price" => $price,
        "quantity" => $Quantity
    );

    // Check if the cart session variable exists; if not, initialize it
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    // Check if the product is already in the cart; if so, update the quantity
    $cart_index = array_search($prod_id, array_column($_SESSION["cart"], 'product_id'));

    if ($cart_index !== false) {
        $_SESSION["cart"][$cart_index]["quantity"] += $Quantity;
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
