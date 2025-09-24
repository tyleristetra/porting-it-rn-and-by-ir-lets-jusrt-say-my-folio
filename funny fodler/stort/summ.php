<?php
$funnyname=[
    'p1'=>'Laptop 1',
    'p2'=>'Laptop 2',
    'p3'=>'Laptop 3',
    'p4'=>'Laptop 4',
    'p5'=>'Laptop 5',
    'p6'=>'none'
];
if($_SERVER["REQUEST_METHOD"]=="POST"){
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
        $dis=10;
    }
    elseif($dosh>=50000&&$dosh<=99999999){
        $dis=50;
    }
    elseif($dosh>=100000000){
        $dis=100;
    }
$moneygone=($dosh*$dis)/100;
$moneyrealgone=$dosh-$moneygone;

$format=isset($_GET['fartmat'])?$_GET['fartmat']:'xml';
    if ($format === 'json') {
        header('Content-Type: application/json; charset=UTF-8');
        $data = [
            'purchase' => [
                'items'        => $allitems,
                'price'           => $dosh,
                'quantity'        => $monies,
                'subtotal'        => $dosh,
                'discountPercent' => $dis,
                'total'           => $moneyrealgone
            ]
        ];
        echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        exit;
    }


 header('Content-Type: text/xml; charset=UTF-8');
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    echo "<purchase>\n";
    echo "  <items>\n";
     foreach ($thingies as $thongies => $thingie) {
        list($thing, $bands)=explode(':', $thingie);
        $monie=isset($monies[$thongies])?(int)$monies[$thongies]:1;
        echo "<item>\n";
        echo "      <name>" . htmlspecialchars($funnyname[$thing]) . "</name>\n";
        echo "      <price>" . htmlspecialchars($bands) . "</price>\n";
        echo "      <quantity>" . htmlspecialchars($monie) . "</quantity>\n";
        echo"</item>\n";
    }
    echo "  </items>\n";
    echo "  <price>" . $dosh . "</price>\n";
    echo "  <subtotal>" . $dosh . "</subtotal>\n";
    echo "  <discountPercent>" . $dis . "</discountPercent>\n";
    echo "  <total>" . $moneyrealgone . "</total>\n";
    echo "</purchase>";
    exit;
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
<div style="margin: 100px; background-color: white; padding: 90px; border-radius: 30px;">
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