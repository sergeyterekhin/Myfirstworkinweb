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
<div class="flex-container">

<div class="flex-item" style="right:-40px; font-size: 120%;">
<ul style="list-style-type: none;">
<li>ул. Доватора, 11</li>
<li>Новосибирск</li>
</ul>
</div>

<div class="flex-item" style="bottom:-10px; left:-60px;"><a href="main.php"><img src="png/marka.png" width="200" height="70"></a></div>
<div class="flex-item"></div>
</div>	

<?php
if ($_SESSION["registration"]==1) echo '
<center style="padding-top:7%"><div id="panel">Вход</div></center>		
<center><form method = "post" id="mainform">
Номер телефона:
<INPUT type="text" name="login" autocomplete="off" value="" style=" background:white;"><BR>
Пароль:
<INPUT type="password" name="password" autocomplete="off" value="" style=" background-color:white;"><BR>
<button name="regv" value="0">Регистрация</button>
<button name="regv" value="3">Забыли пароль?</button>
<button name="go"> Войти </button>
</form>
</center>';
if ($_SESSION["registration"]==0) echo '
<center style="padding-top:7%"><div id="panel">Регистрация</div></center>		
<center><form method = "post" id="mainform">
Фамилия:
<INPUT type="text" name="Surname" autocomplete="off" value="" style=" background-color:white;"><BR>
Имя:
<INPUT type="text" name="UserName" autocomplete="off" value="" style=" background-color:white;"><BR>
Отчество:
<INPUT type="text" name="Midlname" autocomplete="off" value="" style=" background-color:white;"><BR>
Номер телефона:
<INPUT type="text" name="login2" autocomplete="off" value="" style=" background:white;"><BR>
Пароль:
<INPUT type="password" name="password2" value="" style=" background-color:white;"><BR>
<button name="regv" value="1">Назад</button>
<button name="wrbv">Зарегистрироваться</button>
</form>
</center>';
?>
<center style="color: blue;"><?php 
echo " ".$_SESSION["inform"]." ";
?></center>
</body>
</html>