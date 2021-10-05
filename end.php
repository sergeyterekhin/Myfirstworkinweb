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

<body>
<?php require_once "blocks/header.php" ?>
<div style=" margin-left:10%; margin-top:10%; margin-bottom:20%; margin-right:10%;">
<center><img src="png/gg.png" style="width:10%; height:10%;">
<p class="acc">ващ заказ был оформлен!</p>
<p class="acc">Номер заказа: <?php echo $_SESSION["inform"]; ?></p>
<p class="acc">Мы свяжимся с вами, когда заказ будет готов</p>
<p class="acc">Если возникли вопросы, то свяжитесь с нами по номеру</p>
<p class="acc" style="color:blue; text-decoration:underline;">+7 (913) 708-59-24</p>
</center>

</div>
</body>
</html>
