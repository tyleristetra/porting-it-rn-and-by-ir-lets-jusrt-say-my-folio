<?php
$servername = "localhost"; // localhost because i cannot be arsed to make another server name
$username = "crack"; // crack username
$passed = "crack shack"; // crack shack password
$database = "can i rember"; // database name

// Connecting to the database
$nect = new mysqli($servername, $username, $passed, $database);
if ($nect->connect_error) {
    die("Connection failed: " . $nect->connect_error);
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $Password = md5($_POST['password']); // Hash the password

    // Prepare the SQL statement
    $sql = $nect->prepare("SELECT * FROM `loggers` WHERE `u_email` = ?");
    
    // Check if prepare was successful
    if ($sql === false) {
        die("Prepare failed: " . $nect->error);
    }

    // Bind parameters
    $sql->bind_param("s", $email);

    // Execute the statement
    $sql->execute();
    $result = $sql->get_result();

    // Check if a user was found
    if ($result->num_rows > 0) {
        $user=$result->fetch_assoc();
        if($user['u_password']==$Password){
        // User found, redirect to index.php
        header("Location: index.php");
        exit();
    } else {
        echo "something isnt correct";
    }
}else{
    echo "email does not exist. you may make an account <a href='reg.php'> here</a>.";
}

    // Close the statement
    $sql->close();
}

// Close the database connection
$nect->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>  
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #0000FF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .submit-btn:hover {
            background-color: #ffffff;
            color: #0000FF;
            border: 2px solid #0000FF;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login to Your Account</h2>
        <form id="loginForm" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="submit" class="submit-btn">Login</button>
        </form>
    </div>
</body>
</html>