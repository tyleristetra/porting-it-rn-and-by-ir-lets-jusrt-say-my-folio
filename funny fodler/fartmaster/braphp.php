<?php
$funnyname = [
    'p1' => 'Laptop',
    'p2' => 'Smartphone',
    'p3' => 'Tablet',
    'p4' => 'Monitor',
    'p5' => 'Headphones'
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $prods = $_POST['p'];
    $quantities = $_POST['quantity'];
    $dosh = 0;
    $items = [];

    foreach ($prods as $index => $prod) {
        list($prodKey, $price) = explode(':', $prod);
        $quantity = isset($quantities[$index]) ? (int)$quantities[$index] : 1; // Default to 1 if not set
        $items[] = $funnyname[$prodKey] . " - $$price each (Quantity: $quantity)";
        $dosh += $price * $quantity; // Calculate total price based on quantity
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <style>
        body {
            background-color: black;
            color: white;
            text-align: center;
        }
        .summary {
            margin: 100px;
            background-color: cadetblue;
            padding: 90px;
            border-radius: 30px;
        }
        .items {
            border-radius: 20px;
            background-color: rgb(77, 97, 141);
            padding: 20px;
        }
    </style>
</head>
<body>
<center>
    <h1>Order Summary</h1>
    <div class="summary">
        <p>CUSTOMER INFO</p>
        <p>Name: <?php echo isset($name) ? $name : ''; ?></p>
        <p>Email: <?php echo isset($email) ? $email : ''; ?></p>
        <div class="items">
            <p>Items:</p>
            <ul>
                <?php if (!empty($items)): ?>
                    <?php foreach ($items as $scammed): ?>
                        <li><?php echo $scammed; ?></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>No items selected.</li>
                <?php endif; ?>
            </ul>
        </div>
        <p>Total Price: $<?php echo number_format($dosh, 2); ?></p>
        <a href="brap.html" style="color: white;"><h3>Go Back</h3></a>
    </div>
</center>
</body>
</html>