<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang='ru'>

<head>
<?php 
require_once "functions/functions.php";
$news=getProduct();
?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Рыболовный магазин</title>
	<link rel="stylesheet" type="text/css" href="stili/style2.css"/>
</head>

<body>
<?php require_once "blocks/header.php" ?>

 

<div style="margin-right: 10%; margin-left: 10%; margin-top:1%;">
<div class="shop">

<?php
for ($i=0;$i<count($news);$i++)
if($_SESSION["vibor"]==$news[$i]["ID_Categoriy"]) echo '
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
?>
</div>
</div>
</body>
</html>