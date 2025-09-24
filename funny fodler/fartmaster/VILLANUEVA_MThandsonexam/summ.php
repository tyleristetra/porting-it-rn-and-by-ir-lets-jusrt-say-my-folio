<?php
$funnyname=[
    'p1'=>'Laptop',
    'p2'=>'Smartphone',
    'p3'=>'Tablet',
    'p4'=>'Monitor',
    'p4'=>'Headphones'
];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=htmlspecialchars($_POST['name']);
    $email=htmlspecialchars($_POST['email']);
    $thingies=$_POST['p'];
    $monies=$_POST['q'];
    $dosh=0;
    $allitems=[];
    foreach($thingies as $thongies=>$thingie){
        list($thing,$bands)=explode(':',$thingie);
        $monie=isset($monies[$thongies])?(int)$monies[$thongies]:1;
        $allitems[]=$funnyname[$thing]."-P $bands each (amount: $monie)";
        $dosh+=$bands*$monie;
    }
    $dis=0;
    if($dosh>=10000&&$dosh<=49999){
        $dis=5;
    }
    elseif($dosh>=50000&&$dosh<=99999999){
        $dis=10;
    }
    elseif($dosh>=100000000){
        $dis=100;
    }
$moneygone=($dosh*$dis)/100;
$moneyrealgone=$dosh-$moneygone;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>summary</title>
</head>
<body style="background-color: black;">

<center>
<h2 style="color: white;">order summary</h2>
<div style="margin: 100px; background-color: cadetblue; padding: 90px; border-radius: 30px;">
<h3>customer info</h3>
<p><strong>name: </strong><?php echo $name; ?></p>
<p><strong>email: </strong><?php echo $email; ?></p>
<div>
    <ul>
        <?php if(!empty($allitems)):?>
        <?php foreach($allitems as $scammed):?>
            <li><?php echo $scammed; ?></li>
        <?php endforeach; ?>
        <?php else: ?>
            <li>huh?</li>
        <?php endif; ?>
    </ul>
</div>
<p><strong>total: <?php echo number_format($dosh,2);?></strong></p>
<p><strong>total: <?php echo $moneygone;?></strong></p>
<p><strong>total after discount (<?php echo $dis ?> percent): <?php echo number_format($moneyrealgone);?></strong></p>
<a href="ord.html">go back</a>
</div>
</center>
</body>
</html>