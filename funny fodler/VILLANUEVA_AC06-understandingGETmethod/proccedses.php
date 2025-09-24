<body style="background-color: black;">
    <center>
        <font style="color: white;">
<?php
if ($_SERVER["REQUEST_METHOD"]=="GET"){
    $naerm=htmlspecialchars($_GET['naerm']);
    if(empty($naerm)){
        echo"<h2>no name found</h2>";
    }
    else{
        echo "<h2>Your name is: $naerm</h2>";
    }
}
?>
</font>
</center>
</body>