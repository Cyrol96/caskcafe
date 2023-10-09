<?php
$page_title = "Checkout";
$self = basename($_SERVER['PHP_SELF']);
include 'inc/header.php';

// Check if the user is logged in; if not, redirect to the login page
if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

// Fetch user information
$user_id = $_SESSION['userid'];
require('./dbconnect/dbconnect.php');
$sql = "SELECT f_name, l_name, cust_email FROM customers WHERE id = ?";
$stmt = mysqli_prepare($dbc, $sql);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $first_name, $last_name, $email);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// Check if 'cart' is set in the session before using it
if (!isset($_SESSION['cart'])) {
    // Handle the case where the cart is not set (e.g., redirect to the cart page or display an error message).
    echo '<div class="alert alert-warning"><strong>Warning:</strong> Your shopping cart is empty.</div>';
} else {
    // 'cart' is set in the session, proceed with the rest of your code

    // Fetch cart items and product information
    $cart_items = $_SESSION['cart'];
    $productData = array();

    // Initialize $total to 0
    $total = 0;

    if ($cart_items) {
        $sql = "SELECT prod_id, prod_name, price, prod_img FROM pro_info WHERE prod_id IN (";

        foreach ($cart_items as $prod_id => $value) {
            $sql .= $prod_id . ',';
        }

        $sql = substr($sql, 0, -1) . ') ORDER BY prod_name ASC';
        $result = mysqli_query($dbc, $sql);

        // Store product information in the $productData array
        while ($row = mysqli_fetch_assoc($result)) {
            $productData[$row['prod_id']] = $row;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    // Perform checkout and insert order information into the database
    $order_date = date('Y-m-d H:i:s');

    // Start a database transaction
    mysqli_autocommit($dbc, FALSE);
    $transaction_error = false;

    // Insert order header
    $insert_order_sql = "INSERT INTO order_info (prod_id, order_date) VALUES (?, ?)";
    $insert_order_stmt = mysqli_prepare($dbc, $insert_order_sql);
    mysqli_stmt_bind_param($insert_order_stmt, 'is', $user_id, $order_date);

    if (!mysqli_stmt_execute($insert_order_stmt)) {
        $transaction_error = true;
    } else {
        $order_id = mysqli_insert_id($dbc);

        // Insert order items
        $insert_item_sql = "INSERT INTO order_info (prod_id, order_date, quantity, total) VALUES (?, ?, ?, ?)";
        $insert_item_stmt = mysqli_prepare($dbc, $insert_item_sql);

        foreach ($cart_items as $prod_id => $item) {
            $quantity = $item['quantity'];
            $price = $productData[$prod_id]['price'];
            $subtotal = $quantity * $price;
            $total += $subtotal; 

            mysqli_stmt_bind_param($insert_item_stmt, 'iiid', $order_id, $prod_id, $quantity, $subtotal);

            if (!mysqli_stmt_execute($insert_item_stmt)) {
                $transaction_error = true;
                break;
            }
        }
    }

    // Commit or rollback the transaction based on success
    if ($transaction_error) {
        mysqli_rollback($dbc);
        echo '<div class="alert alert-danger"><strong>Error:</strong> There was a problem completing your order. Please try again later.</div>';
    } else {
        mysqli_commit($dbc);
        unset($_SESSION['cart']);
        echo '<div class="alert alert-success"><strong>Success:</strong> Your order has been placed successfully. Thank you for your purchase!</div>';
    }

    // Close prepared statements
    mysqli_stmt_close($insert_order_stmt);
    mysqli_stmt_close($insert_item_stmt);
}

// Display checkout form and cart items
echo '<div class="container mt-5">';
if (empty($_SESSION['cart'])) {
    // Display a message if the cart is empty
    echo '<div class="alert alert-info"><h2>Your Cart is Empty</h2></div>';
} else {
    echo '<h2>Checkout</h2>';
    echo '<p>Review your order details and complete the checkout process:</p>';

    echo '<table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>';

    foreach ($cart_items as $prod_id => $item) {
        $quantity = $item['quantity'];
        $price = $productData[$prod_id]['price'];
        $product_name = $productData[$prod_id]['prod_name'];
        $subtotal = 0;
        $subtotal = $quantity * $price;
        $total += $subtotal;
        $product_img = $productData[$prod_id]['prod_img'];

        echo '<tr>
                <td>' . $product_name . '</td>
                <td>$' . number_format($price, 2) . '</td>
                <td>' . $quantity . '</td>
                <td>$' . number_format($subtotal, 2) . '</td>
                <td><img src="' . $product_img . '" alt="' . $product_name . '" width="100"></td>
            </tr>';
    }
    
    echo '<tr>
            <td colspan="3"></td>
            <td><strong>Total:</strong> $' . number_format($total, 2) . '</td>
            <td></td>
        </tr>';
    echo '</tbody></table>';

    // Checkout form
    echo '<form method="post" action="">
            <button type="submit" class="btn btn-primary" name="checkout">Complete Checkout</button>
          </form>';
}

// Add a button to continue shopping
echo '<p class="indent mt-3">
        <a href="index.php" onClick="history.back();return false;">
            <button id="contbutton" class="btn btn-secondary">Continue Shopping</button>
        </a>
      </p>
    </div>
</div>';

#footer
include("./inc/footer.php");
?>
