<?php
$itemName = "Wireless Mouse";
$itemPrice = 500;
$quantity = 3;
$discountPercent = 10;
// Step 2: Calculations
$subtotal = $itemPrice * $quantity;
$discountAmount = $subtotal * ($discountPercent / 100);
$total = $subtotal - $discountAmount;
// Step 3: Output results
echo "<h2>Simple Online Store Calculator</h2>";
echo "Item: $itemName <br>";
echo "Price: $itemPrice PHP<br>";
echo "Quantity: $quantity <br>";
echo "Subtotal: $subtotal PHP<br>";
echo "Discount ($discountPercent%): $discountAmount PHP<br>";
echo "<b>Total Price: $total PHP</b>";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>