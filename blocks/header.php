<div class="flex-container">

<div class="flex-item" style="right:-40px; font-size: 120%;">
<ul style="list-style-type: none;">
<li>ул. Доватора, 11</li>
<li>Новосибирск</li>
</ul>
</div>

<div class="flex-item" style="bottom:-10px; "><a href="main.php"><img src="png/marka.png" width="200" height="70"></a></div>
<?php
if(strlen($_SESSION["Users"])<3){ echo '
<form method = "post" action = "http://localhost/Ribolovniy/registration.php">
<div class="flex-item" style="bottom:-6px; right:10px; font-size: 100%;">
<ul style="list-style-type: none;">
<li>Войдите, чтобы</li>
<li>Совершать покупки</li>
<li><button name="register" value="0" style="font-family: Century Gothic;">Зарегистрироваться</button> <button name="register" value="1" style="font-family: Century Gothic;">Войти</button></li>
</ul>
</div>
</form>';
}
else
{
	echo '
<form method = "post" action ="">
<div class="flex-item" style="bottom:-6px; right:10px; font-size: 100%;">
<ul style="list-style-type: none;">
<li>Добро пожаловать,</li>
<li>'.$_SESSION["Users"].'!</li>
<li><button name="history" style="font-family: Century Gothic;">История</button> <button style="font-family: Century Gothic;" name="logout" value"">Выйти</button></li>
</ul>
</div>
</form>	';
}
?>

</div>
<form action = "http://localhost/Ribolovniy/spining.php" method = "post">
<div id="menu">
<ul>
<li><a href="main.php">Главная</a>
<li><a href="#">Каталог</a>
<ul>
<li><button name="v1" value="9">Активный отдых</button></li>
<li><button name="v1" value="3">Кемпинговая мебель</button></li>
<li><button name="v1" value="4">Палатки</button></li>
<li><button name="v1" value="5">Лодки</button></li>

<li><a>Снасти</a>
<ul>
<li><button name="v1" value="6">Воблер</button></li>
<li><button name="v1" value="7">Блесна</button></li>
<li><button name="v1" value="8">Силикон</button></li>
</ul>
</li>

<li><button name="v1" value="1">Спининги</button></li>
<li><button name="v1" value="2">Удочки</button></li>
</ul>
</li>

<li><a href="inform.php">Информация</a></li>
<li><a href="shop.php">Магазин</a></li>
<li><a href="basket.php" style="background:#A52A2A;">Корзина</a></li>
</ul>
</div>
</form>
<?php
if(isset($_POST['logout']))
{
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=main.php">'; 
	unset($_SESSION["arra"]); 
	unset($_SESSION["howmuch"]); 
	$_SESSION["Users"]="0"; 
	$_SESSION["Id_User"]=-1;
}
if(isset($_POST['history']))
{
$_SESSION["str"]=1;
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=history.php">';
}
?>