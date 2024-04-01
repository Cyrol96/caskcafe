<?php
// Sanitize user input
$category = '';
if (isset($_GET['category'])) {
    // Assuming $dbc is your database connection
    $category = mysqli_real_escape_string($dbc, $_GET['category']);
}

// Define the SQL query
$sql = "SELECT * FROM pro_info ";

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
<!-- The video -->
<video autoplay muted loop id="myVideo">
    <source src="video\parfait_video.mp4" type="video/mp4">
</video>

<!-- some overlay text to describe the video -->
<div class="content">
    <h2 class="home-intro text-dark">Our Fruit Pairfait</h2>
    <h5 class="text-black">We are open for today with a happy cup of parfait from Cask Cafe 🍧🥮 !
        We are open and ready to delight you with our fresh and yummy parfait!
        Please give us a try and you'll keep coming back for more ☺️</h5>
</div>

<!-- Add drop-down list for filtering by category -->
<form method="get">
    <label for="category">Filter by category:</label>
    <select name="category" id="category">
        <option value="">All</option>
        <option value="1">Fruits Pairfait</option>
        <option value="2">Smoothie</option>
    </select>
    <button type="submit">Filter</button>
</form>

<!-- products gallery images section -->
<section class="products-gallery">
    <div class="container">
        <div class="row">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card h-100">
                            <img src="<?php echo $row['prod_img']; ?>" class="card-img-top" alt="<?php echo $row['prod_name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['prod_name']; ?></h5>
                                <p class="card-text">$<?php echo $row['price']; ?></p>
                                <!-- Add to Cart Form -->
                                <form action="addcart.php" method="post">
                                    <input type="hidden" name="prod_id" value="<?php echo $row['prod_id']; ?>">
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-md-12 text-center">
                    <h1>No products available</h1>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
