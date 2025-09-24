<?php
$color = $_COOKIE['color'] ?? null; //doesnt save when $_COOKIES is used
$options = ['light', 'dark'];

if (isset($_POST['submit'])) {
    $color = $_POST['color']; // underscore missing from $_POST
    setcookie('color', $color, time() + 3600, "/"); //changed to be one full number instead of two numbers added together
    header("Refresh:0"); 
}

$theme = (in_array($color, $options)) ? $color : 'light'; // changed this so it wont be perma dark
?>

<!DOCTYPE html>
<html>
<head>
    <title>Theme Selector</title>
    <style>
        body {
            background-color: <?php echo ($theme == 'dark') ? '#333' : '#fff'; ?>;
            color: <?php echo ($theme == 'dark') ? '#fff' : '#000'; ?>;
            text-align: center;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        select, input {
            padding: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form method="POST"> <!--method was missing-->
        <p>Select Theme:</p>
        <select name="color">
            <option value="dark" <?php echo ($theme == 'dark') ? 'selected' : ''; ?>>Dark</option>
            <option value="light" <?php echo ($theme == 'light') ? 'selected' : ''; ?>>Light</option>
        </select>
        <br>
        <input type="submit" name="submit" value="Save">
    </form>
</body>
</html>