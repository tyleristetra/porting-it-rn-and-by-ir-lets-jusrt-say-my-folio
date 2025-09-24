 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cahrk</title>
 </head>
 <body style="background-color: black;">
    <h1 style="color: white;">number checker</h1>
    <form method="post" style="color: white;">
        <label for="berg">give num: </label>
        <input type="berg" id="berg" name="berg" required>
        <input type="submit" value="check">
    </form>
    <?php 
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $berg=intval($_POST['berg']);
        if($berg%2==0){
            echo "<h2><font color='white'>$berg is even</font><h2>";
        }
        else{
            echo "<h2><font color='white'>$berg is odd</font><h2>";
        }
    }
    ?>
 </body>
 </html>