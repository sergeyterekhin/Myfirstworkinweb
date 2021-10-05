<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang='ru'>

<head>
<?php 
require_once "functions/functions.php";
?>	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Рыболовный магазин</title>
	<link rel="stylesheet" type="text/css" href="stili/style2.css"/>
</head>

<body>
<?php require_once "blocks/header.php";?>
<div style="margin-right: 10%; margin-left: 10%; margin-top: 2%; margin-bottom:6%;">
	<div class="pageproducts">
		<div class="pageproducts2"> 
			<div class="pageproducts-item" style=" width:450px; height:450px; padding:10px;">
	<?php 
$search_res=pageproduct($_SESSION["pgp"]);
?>
	
	</div>
</div>
</body>
</html>
