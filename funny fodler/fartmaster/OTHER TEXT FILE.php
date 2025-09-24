<!-- input page (order_form.html) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
</head>
<body>
    <h1>Order Form</h1>
    <form action="order_summary.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label>Products:</label><br>
        <input type="checkbox" name="products[Product 1]" value="20"> Product 1 - $20
        <input type="number" name="quantity[Product 1]" min="0" value="0" required><br>
        
        <input type="checkbox" name="products[Product 2]" value="30"> Product 2 - $30
        <input type="number" name="quantity[Product 2]" min="0" value="0" required><br>
        
        <input type="checkbox" name="products[Product 3]" value="40"> Product 3 - $40
        <input type="number" name="quantity[Product 3]" min="0" value="0" required><br><br>

        <input type="submit" value="Submit Order">
    </form>
</body>
</html>


<!-- php (order_summary.php) -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecting form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $products = $_POST['products']; // This will be an associative array
    $quantities = $_POST['quantity']; // This will also be an associative array

    // Calculate total price
    $total_price = 0;
    $product_details = [];

    foreach ($products as $product => $price) {
        // Get the quantity for the selected product
        $quantity = intval($quantities[$product]);
        if ($quantity > 0) {
            $total_price += $price * $quantity; // Calculate total for each product
            $product_details[] = "$product (x$quantity) - $$price each";
        }
    }
}
?>

<!-- summary page (order_summary.php) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
</head>
<body>
    <h1>Order Summary</h1>
    <p><strong>Name:</strong> <?php echo $name; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Products:</strong></p>
    <ul>
        <?php foreach ($product_details as $detail): ?>
            <li><?php echo $detail; ?></li>
        <?php endforeach; ?>
    </ul>
    <p><strong>Total Price:</strong> $<?php echo $total_price; ?></p>

    <a href="order_form.html">Go Back</a>
</body>
</html>