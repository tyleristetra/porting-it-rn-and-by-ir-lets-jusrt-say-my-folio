<?php
$color = $_COOKIES['color'] ?? null; //does not save the theme when COOKIES is uesd
$options = ['light', 'dark'];

if (isset($_POST['submit'])) {
    $color = $POST['color']; //wrong syntax for the POST method
    setcookie('color', $color, time() + 60 + 60, "/"); //inefficient way of typing time
    header("Refresh:0"); 
}

$theme = (in_array($color, $options)) ? $color = 'dark' : $color; // using this would only make the website stay in darkmode
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
    <form> <!--method us missing ergo there is no way to change the theme-->
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