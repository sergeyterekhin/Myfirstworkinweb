<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang='ru'>

<head>
	<head>
<?php 
require_once "functions/functions.php";
$news=getProduct();
$co=allproduct();
?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Рыболовный магазин</title>
	<link rel="stylesheet" type="text/css" href="stili/style2.css"/>
</head>

<body>
<?php require_once "blocks/header.php" ?>
<div style="margin-right: 10%; margin-left: 10%; margin-top: 2%;">
<p class="newproduct">Новые товары</p>
<div class="shop3"><?php
for ($i=0;$i<5;$i++)
echo '
<div class="tovar">
<form method="post">
<button id="pages" name="opp" value="'.$news[$i]["ID_Product"].'"><img src="png/spin/'.$news[$i]["Picture"].'"></button>
</form>
<ul>
<li>'.$news[$i]["Name"].'</li>
<li>'.$news[$i]["Cost"].'₽</li><form method = "post">
<li><button name="buy_product" value="'.$news[$i]["ID_Product"].'">В корзину</button></form></li>
</ul>
</div> '
?></div>
<p class="newproduct">Вам могут понравиться</p>
<div class="shop3" style="flex-wrap: wrap;"><?php
for ($i=0;$i<10;$i++){
$rn=random_int(0, $co-1);
echo '
<div class="tovar">
<form method="post">
<button id="pages" name="opp" value="'.$news[$rn]["ID_Product"].'"><img src="png/spin/'.$news[$rn]["Picture"].'"></button>
</form>
<ul>
<li>'.$news[$rn]["Name"].'</li>
<li>'.$news[$rn]["Cost"].'₽</li><form method = "post">
<li><button name="buy_product" value="'.$news[$rn]["ID_Product"].'">В корзину</button></form></li>
</ul>
</div> ';
}
?></div>
<p class="newproduct">Наиболее популярные</p>
<div class="shop3"><?php
for ($i=0;$i<5;$i++){
$rn=random_int(0, $co-1);
echo '
<div class="tovar">
<form method="post">
<button id="pages" name="opp" value="'.$news[$rn]["ID_Product"].'"><img src="png/spin/'.$news[$rn]["Picture"].'"></button>
</form>
<ul>
<li>'.$news[$rn]["Name"].'</li>
<li>'.$news[$rn]["Cost"].'₽</li><form method = "post">
<li><button name="buy_product" value="'.$news[$rn]["ID_Product"].'">В корзину</button></form></li>
</ul>
</div> ';
}
?></div>
</div>
</body>
</html>
