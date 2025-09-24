<?php
    include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>item</title>
</head>
<body>
    <form action="" method="POST">
        <h2>item</h2>
        item: <br>
        <input type="name" name="email" required><br>
        amount: <br>
        <input type="number" name="password" required><br>
        <button type="submit">add item</button>
    </form>
</body>

<h2>see item list</h2>
<a href="index.php">-----items-----</a><br>
</html>

<?php
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    //leftover stuff from the cannibalisation
    if (empty($email) || empty($password)) {
        echo "put something";
        exit;
    }
    try {
        // Prepare the INSERT statement with placeholders
        $stmt = $connection->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        //bind things
        //idk im just learning of this now cus im using blackbox to speed this up
        //(only using it to help convert an mysqli php to pdo)
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        if ($stmt->execute()) {
            echo " added";
        } else {
            echo " not added";
        }
    } catch (PDOException $e) {
        echo "Error: " . htmlspecialchars($e->getMessage());
    }
}
?>
