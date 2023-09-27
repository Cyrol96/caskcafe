<?php
// Sanitize user input
$category = '';
if (isset($_GET['category'])) {
    $category = mysqli_real_escape_string($dbc, $_GET['category']);
    echo 'categories';
}

// Define the SQL query
$sql = "SELECT * FROM Pro_info ";

// Add filter for category if specified
if (!empty($category)) {
    $sql .= " WHERE category = '$category'";
}

// Execute the query and store the result set
$result = mysqli_query($dbc, $sql);

if (!$result) {
    die('Error fetching products: ' . mysqli_error($dbc));
}
?>


<!-- </article> -->
<div id="header">
    <h1>Cask Cafe</h1>
</div>
<h2 class="home-intro text-dark">Our Fruit Pairfait</h2>
<h5 class="text-black">We are open for today with a happy cup of parfait from Cask Cafe 🍧🥮 !
    We are open and ready to delight you with our fresh and yummy parfait!
    Please give us a try and you'll keep coming back for more ☺️</h5>

<!-- Add drop-down list for filtering by category -->
<form method="get ">
    <label for="category">Filter by category:</label>
    <select name="category" id="category">
        <option value="">All</option>
        <option value="fruits">Fruits Pairfait</option>
        <option value="Smoothie">Smoothie</option>
    </select>
    <button type="submit">Filter</button>
</form>

<!-- products gallary images section -->

<section class="products-gallary">
    <?php
    if (mysqli_num_rows($result) > 0):
        while ($row = mysqli_fetch_assoc($result)):
            ?>
            <div class="w3-cell gallery">
                <img src="<?php echo $row['prod_img']; ?>" alt="<?php echo $row['prod_name']; ?>" width="300" height="300">
                <div class="desc bg-secondary text-light">
                    <?php echo $row['prod_name']; ?> <br>$
                    <?php echo $row['Price']; ?>
                </div>
                <!-- Add to Cart Form -->
                <div class="w3-container w3-card-4 w3-light-grey w3-text-dark-grey w3-margin-top" style="max-width: 400px;">
        <!-- <h2 class="w3-center">Ad</h2> -->
        <form action="addcart.php" method="post" class="w3-container">
            <input type="hidden" name="product_id" value="1">
            <input type="hidden" name="product_name" value="Example Product">
            <input type="hidden" name="product_price" value="19.99">
            <label for="quantity" class="w3-text-dark-grey"><b>Quantity:</b></label>
            <input type="number" id="quantity" name="quantity" value="1" min="1" class="w3-input w3-border">
            <button type="submit" class="w3-button w3-block w3-blue w3-section w3-padding">Add to Cart</button>
        </form>
    </div>
            </div>
        <?php endwhile;
    else: ?>
        <center>
            <h1>No product Available</h1>
        </center>
    <?php endif; ?>
</section>