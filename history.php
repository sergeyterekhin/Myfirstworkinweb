<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang='ru'>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Рыболовный магазин</title>
	<link rel="stylesheet" type="text/css" href="stili/style2.css"/>
</head>

<?php 
require_once "functions/functions.php";
?>
<body>
<?php require_once "blocks/header.php" ?>
<div style=" margin-bottom:10%; margin-top:3%; margin-right: 10%; margin-left: 10%;">

<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect("localhost", "mysql", "mysql","fishingsitebase");
$conn->set_charset("utf-8");
$result = $conn->query('SELECT * FROM `ordercustomer`');
$stra=$_SESSION["str"]*5-4;
$countstr=1;
while($row = $result->fetch_assoc()){
$moneysum=0;
$rnd=0;
if($_SESSION["Id_User"]==$row["ID_customer2"])
if ($countstr>=$stra && $countstr<=($stra+4))
{
	$countstr++;
$result2 = $conn->query('SELECT * FROM `ordercustomer`');
while ($row2 = $result2->fetch_assoc())
{
	if( $row2["idforzakaz"]==$row["idforzakaz"]) $rnd++;
}
echo '<div id="kkhead">
<div id="khead"><ul><li>Номер заказа '.$row["idforzakaz"].'</li><ul></div>
<div class="shop2">';
for ( $i=1; $i<=$rnd; $i++){
$result2 = $conn->query('SELECT * FROM `product`');
while($row2 = $result2->fetch_assoc()){
if ($row["ID_product2"]==$row2["ID_Product"]){
echo '
<div class="tovar">
<img src="png/spin/'.$row2["Picture"].'">
<ul>
<li>'.$row2["Name"].'</li>
<li>'.$row2["Cost"]*$row["Quantity"].'₽</li>
<li>'.$row["Quantity"].' шт.</li>
</ul>
</div>

';
$moneysum=$moneysum+($row2["Cost"]*$row["Quantity"]);
}
}
if ($i!=$rnd) $row = $result->fetch_assoc();
}
echo '</div><p style="font-family: Century Gothic;">Итог: '.$moneysum.'₽</p></div>';
}
else
{
$countstr++;
$result2 = $conn->query('SELECT * FROM `ordercustomer`');
while ($row2 = $result2->fetch_assoc())	if( $row2["idforzakaz"]==$row["idforzakaz"]) $rnd++;
for ( $i=1; $i<=$rnd; $i++) if ($i!=$rnd) $row = $result->fetch_assoc();

}

}
mysqli_close($conn);	
if ($_SESSION["str"]==1) echo '<form method = "post"><center>'; else echo ' <form method = "post">
<center><button name="backstr" >⠀<<⠀</button>'; echo '⠀'.$_SESSION["str"].'⠀';
if ($countstr-1==$stra+4 || $countstr==1 || $countstr<$stra+4) echo '</center></form>'; else echo '<button name="nextstr" >⠀>>⠀</button></center></form>';
?>
</div>
</body>
</html>
