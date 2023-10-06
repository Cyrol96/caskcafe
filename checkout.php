<?php
// session_start();
$page_title = "Checkout";
$self = basename($_SERVER['PHP_SELF']);
include 'inc/header.php';

// Fetch all necessary product information from the database for the cart items
$productData = array(); // An array to store product information
if ($_SESSION['cart']) {
    require('./dbconnect/dbconnect.php');
    $sql = "SELECT prod_id, prod_name, price, prod_img FROM pro_info WHERE prod_id IN (";
    foreach ($_SESSION['cart'] as $prod_id => $item) {
        $sql .= $prod_id . ',';
    }
    $sql = substr($sql, 0, -1) . ') ORDER BY prod_name ASC';
    $result = mysqli_query($dbc, $sql);

    // Store product information in the $productData array
    while ($row = mysqli_fetch_assoc($result)) {
        $productData[$row['prod_id']] = array(
            'prod_name' => $row['prod_name'],
            'price' => $row['price']
        );
    }
}

echo '<div class="container mt-5">';
if (empty($_SESSION['cart'])) {
    // Display a message if the cart is empty
    echo '<div class="alert alert-info"><h2>Your Cart is Empty</h2></div>';
} else {
    echo '<table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>';

    $total = 0;

    foreach ($_SESSION['cart'] as $prod_id => $item) {
        $quantity = $item['quantity'];
        $price = $productData[$prod_id]['price'];
        $product_name = $productData[$prod_id]['prod_name'];
        $subtotal = $quantity * $price;
        $total += $subtotal;

        // Display cart items
        echo '<tr>
                <td>' . $product_name . '</td>
                <td>$' . number_format($price, 2) . '</td>
                <td>' . $quantity . '</td>
                <td>$' . number_format($subtotal, 2) . '</td>
              </tr>';
    }

    // Display the total
    echo '<tr>
            <td colspan="3"><strong>Total:</strong></td>
            <td>$' . number_format($total, 2) . '</td>
          </tr>';
    echo '</tbody></table>';

    // Add a "Place Order" button
    echo '<div class="text-center">
            <form method="post" action="place_order.php">
                <button type="submit" class="btn btn-primary">Place Order</button>
            </form>
          </div>';
}

// Add a button to continue shopping
echo '<p class="indent mt-3">
        <a href="index.php">
            <button class="btn btn-secondary">Continue Shopping</button>
        </a>
      </p>
    </div>
</div>';

// Include the footer
include("./inc/footer.php");
?>
