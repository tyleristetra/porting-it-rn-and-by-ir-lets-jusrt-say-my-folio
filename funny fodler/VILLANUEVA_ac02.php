<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: black;">
    <h1 style="color: white;">funny pyramid</h1>
    <form method="post" style="color: white;">
    <label for="berg">give num: </label>
    <input type="berg" id="berg" name="berg" required>
    <input type="submit" value="triangle">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
            $berg=intval($_POST['berg']);
            if ($berg>0){
                for($iced=1; $iced<=$berg; $iced++){
                    for($niced=$berg; $niced>$iced; $niced--){
                        echo"&nbsp&nbsp";
                    } 
                    for ($brick=1; $brick<=$iced; $brick++){
                        echo"<font color='white'>[] </font>";
                    }
                    echo "<br>";
                }
            }
            else{
                "<h2><font color='white'>not that number</font></h2>";
            }
        }
    ?>
</body>
</html>