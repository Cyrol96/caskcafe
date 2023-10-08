<?php
session_start();

// Include required functions
require('inc/loginfunctions.php');

// Redirect if no session variables exist
if (!isset($_SESSION['userid'])) {
    redirect_user();
} elseif (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    redirect_user('viewcart.php');
} else {
    // All good, continue processing

    // Change title and include header
    $self = basename($_SERVER['PHP_SELF']);
    $page_title = 'Checkout | By Caskcafe';
    include('inc/header.php');

    echo "<div class='w3-container w3-teal'><h1>" . $page_title . "</h1></div>";

    // Connect to the database
    require('./dbconnect/dbconnect.php');

    // Set user ID and total into variables
    $userid = $_SESSION['userid'];
    // $total = $_SESSION['total'];

    // Turn off autocommit
    mysqli_autocommit($dbc, FALSE);

    // Insert the order header into the orders table
    // Check if 'total' is set and not empty
if (isset($_SESSION['total']) && $_SESSION['total'] !== '') {
    $total = $_SESSION['total'];
} else {
    // Handle the case where 'total' is not set or empty
    // You can display an error message or redirect the user
    echo "Total is not set or empty. Please go back and add items to your cart.";
    exit; // Exit the script to prevent further execution
}

// Now you can proceed with the insertion
$sql = "INSERT INTO order_info (customer_id, total) VALUES (?, ?)";
$stmt = mysqli_prepare($dbc, $sql);
mysqli_stmt_bind_param($stmt, 'id', $userid, $total);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);


    // Check if the insertion was successful
    if (mysqli_affected_rows($dbc) == 1) {
        // Retrieve the newly created order ID
        $orderid = mysqli_insert_id($dbc);

        // Prepared statement for inserting order items
        $insert = "INSERT INTO order_info (order_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($dbc, $insert);
        mysqli_stmt_bind_param($stmt, 'iid', $orderid, $prod_id, $qty);

        // Run the query loop to insert order items
        $affected = 0;
        foreach ($_SESSION['cart'] as $prod_id => $item) {
            $qty = $item['quantity'];
            $prod_id = $item['prod_id']; // Assuming you have the product ID in the cart
            mysqli_stmt_execute($stmt);
            $affected += mysqli_stmt_affected_rows($stmt);
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);

        // Check if all items were inserted successfully
        if ($affected == count($_SESSION['cart'])) {
            // Commit the transaction
            mysqli_commit($dbc);

            // Unset the cart and total
            unset($_SESSION['cart']);
            unset($_SESSION['total']);

            // Get the order timestamp from the orders table (replace with the correct table name)
            $q = "SELECT order_date FROM order_info WHERE order_id = $orderid LIMIT 1";
            $r = mysqli_query($dbc, $q);

            if ($r) {
                $row = mysqli_fetch_assoc($r);

                // Format the date and time
                $order_date = date("l, F d, Y", strtotime($row['order_date']));
                $order_time = date("g:i:s A", strtotime($row['order_date']));

                // Display a success message
                echo "<div class='w3-container w3-camo-sandstone'><h2>Your order has been placed!</h2>";
                echo "<p class='indent'>Your order number is <span class='w3-camo-red'><i>" . date("Y") . "-$orderid</i></span> placed at $order_time on $order_date. The total of your order was <span class='w3-camo-red'><i>$" . number_format($total, 2) . "</i></span>. Thank you for your purchase!</p><div class='logout'><p class='indent'><a href='logout.php'><button>Logout</button></a></p></div></div><img src='./img/site/success.jpg' id='successimg'>";
            } else {
                // Error handling for timestamp retrieval
                echo "<div class='w3-container w3-red'><p class='indent'>Error retrieving order timestamp.</p></div>";
            }
        } else {
            // Rollback the transaction if order items were not inserted successfully
            mysqli_rollback($dbc);

            // Error message
            echo "<div class='w3-container w3-red'><p class='indent'>There was a problem completing your order. Please contact customer support for assistance. No payment has been charged at this point.</p></div>";
        }
    } else {
        // Rollback the transaction if the order header was not inserted successfully
        mysqli_rollback($dbc);

        // Error message
        echo "<div class='w3-container w3-red'><p class='indent'>There was a problem completing your order. Please contact customer support for assistance. No payment has been charged at this point.</p></div>";
    }

    // Close the database connection
    mysqli_close($dbc);

    // Include footer
    include('inc/footer.php');
}
?>
