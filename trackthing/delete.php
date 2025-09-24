<?php 
require 'db.php';  // This should create $connection as a PDO instance

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // sanitize input

    // Prepare the DELETE statement to prevent SQL injection
    $stmt = $connection->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();
}

// Redirect back to index.php
header("Location: index.php");
exit();
?>
