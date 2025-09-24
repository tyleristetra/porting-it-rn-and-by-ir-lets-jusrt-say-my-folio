
<!-->summary page<!-->
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
    <p><strong>Product:</strong> <?php echo $product; ?></p>
    <p><strong>Quantity:</strong> <?php echo $quantity; ?></p>
    <p><strong>Price per item:</strong> $<?php echo $price_per_item; ?></p>
    <p><strong>Total Price:</strong> $<?php echo $total_price; ?></p>

    <a href="order_form.html">Go Back</a>
</body>
</html>


<!-->input page<!-->
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

        <label for="product">Product:</label>
        <select id="product" name="product" required>
            <option value="Product 1">Product 1</option>
            <option value="Product 2">Product 2</option>
            <option value="Product 3">Product 3</option>
        </select><br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required min="1"><br><br>

        <input type="submit" value="Submit Order">
    </form>
</body>
</html>


<!-->php<!-->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecting form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $product = htmlspecialchars($_POST['product']);
    $quantity = intval($_POST['quantity']);

    // Assuming a fixed price for simplicity
    $price_per_item = 20; // Example price
    $total_price = $price_per_item * $quantity;
}
?>