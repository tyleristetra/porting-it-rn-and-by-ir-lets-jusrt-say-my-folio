<?php
require 'db.php';
$stmt = $connection->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>objects</h2>
<a href="signup.php" style="font-size: larger;">add item</a>

<table border="1">
    <tr>
        <th>ID</th><th>item</th><th>cost</th><th colspan="3">do something</th>
    </tr>
    <?php foreach ($users as $row){ ?>
    <tr>
        <td><?= htmlspecialchars ($row['id']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['password']) ?></td>
            
    <!-- the part of the code that kills ::3 -->
        <td>
            <a href="delete.php?id=<?= $row['id'] ?>"
               onclick="return confirm('?');">remove</a>
        </td>
    </tr>
    <?php } ?><!--idk why this is here but the thing wont work if i delete it-->
</table>
<!--hopefully shows the  total-->
    <h4><?php
    $stmt = $connection->query("SELECT sum(password) as total from users");
    $sum = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "total: ". htmlspecialchars($sum['total'])
    ?></h4>
