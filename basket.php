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
<div class="titlez">Корзина</div>
<div style="margin-right: 10%; margin-left: 10%;">
<?php
if(strlen($_SESSION["Users"])<3)
{
echo '<div class="titlez" style="margin-top:15%;">Пройдите регистрацию, чтобы совершать покупки</div>';
}
else
{
if (count($_SESSION["arra"])<1)
{
echo '<div class="titlez" style="margin-top:15%;">Вы ещё ничего не добавили в корзину :(</div>';
}
else
{
echo '
<div id="khead">
<ul>
<li><div class="Ktovar_2" style="height:20px;">Наименование</div></li>
<li style="height:20px; width:4.5%;"></li>
<li><div class="Ktovar_3" style="height:20px;">цена</div></li>
<li ><div class="Ktovar_4" style="height:20px;">количество</div></li>
<li ><div class="Ktovar_5" style="height:20px;">свойства</div></li>
</ul>
</div>';

$_SESSION["money"]=0;
for ($i=0;$i<count($news);$i++)
{	
for($j=0;$j<count($_SESSION["arra"]);$j++)
{
	if($_SESSION["arra"][$j]==$news[$i]["ID_Product"])
{
echo '
<form method = "post">
<div id="korzinaa">
<div class="korzina">
<img src="png/spin/'.$news[$i]["Picture"].'">
<div class="Ktovar_2">'.$news[$i]["Name"].'</div>
<div class="Ktovar_3">'.$news[$i]["Cost"]*$_SESSION["howmuch"][$news[$i]["ID_Product"]].'₽</div>
<div class="Ktovar_4">
<INPUT type="number" name="'.$news[$i]["ID_Product"].'" value="'.$_SESSION["howmuch"][$news[$i]["ID_Product"]].'" min="1" max="50">
<button name="accept" value="'.$news[$i]["ID_Product"].'">&#128504;</button>
</div>
<div class="Ktovar_5"><button style="height:22px;width: 15px; background-color: white;	
border: 0px dashed white;" name="delete" value="'.$news[$i]["ID_Product"].'">	&#10060;</button> 
<button name="i" value='.$news[$i]["ID_Product"].' style="height:22px;width: 15px; background-color: white;	
border: 0px dashed white;">	
&#10067;</button></div>
</div>
</div>
</form>';
//echo $_POST[$news[$i]["ID_Product"]];	
$_SESSION["money"]=$_SESSION["money"]+(floatval($news[$i]["Cost"])*floatval($_SESSION["howmuch"][$news[$i]["ID_Product"]]));	
}
//else {echo 'arra='.$_SESSION["arra"][$i].' id='.$news[$i]["ID_Product"].';   '; }
}
}
echo '
<form method = "post">
<div class="flex-container2">
<div class="flex-item2"><button name="clear">Очистить Корзину</button></div>
<div class="flex-item2"><p>Итог: '.$_SESSION["money"].'.00₽</p><BR><button name="verefication" style="font-weight: bold;">Подтвердить</button></div>
</div></form>';
}
}
?>
<!--конец-->
</body>
</html>
