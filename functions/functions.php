<?php
$mysqli=false;
$_SESSION["inform"]="";
define('DB_HOST', "localhost");
define('DB_USER', "mysql");
define('DB_PASS', "mysql");
define('DB_NAME', "fishingsitebase");

function allproduct(){
global $mysqli;
connectDB();
$result=$mysqli->query("SELECT * FROM `product`");
while (($row = $result->fetch_assoc()) != false)
$counttovar++;
closeDB();
return $counttovar++;
}

function connectDB(){
	global $mysqli;
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS,DB_NAME);
	$mysqli->query("SET NAMES `utf-8`");
}

function closeDB(){
global $mysqli;
$mysqli->close();
}

function getProduct() {
global $mysqli;
connectDB();
$result=$mysqli->query("SELECT * FROM `product` ORDER BY `ID_Product`");
closeDB();
return resultToArray ($result);
}


function resultToArray ($result) {
$array=array ();
while (($row = $result->fetch_assoc()) != false)
$array[]=$row;
return $array;
}

if(isset($_POST['delete'])){
$deltv=$_POST['delete'];
for($j=0;$j<count($_SESSION["arra"]);$j++)
{
if($_SESSION["arra"][$j]!=$deltv)	
$art[]=$_SESSION["arra"][$j];
}
unset($_SESSION["arra"]);
$_SESSION["arra"]=$art;
}

if(isset($_POST["i"])){ 
	$_SESSION["pgp"]=$_POST["i"];
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=pageproduct.php">';
	 }

if(isset($_POST["opp"])){ 
	$_SESSION["pgp"]=$_POST["opp"];
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=pageproduct.php">';
	 }
if(isset($_POST['v1'])){  $_SESSION["vibor"]=$_POST['v1'];}

if(isset($_POST['backstr'])) { if ($_SESSION["str"]>1) $_SESSION["str"]=$_SESSION["str"]-1; }
if(isset($_POST['nextstr'])) { $_SESSION["str"]=$_SESSION["str"]+1; }

if(isset($_POST['clear'])) { unset($_SESSION["arra"]); unset($_SESSION["howmuch"]); }
if(isset($_POST['regv'])){ $_SESSION["registration"]=$_POST['regv'];}
if(isset($_POST['register'])){ $_SESSION["registration"]=$_POST['register'];}
if(isset($_POST['wrbv'])){
if($_POST['UserName']!="" && $_POST['Surname']!="" && $_POST['Midlname']!="")
{
if(strlen($_POST['login2'])>10){ 
if(strlen($_POST['password2'])>7){
$registration=1;
writecustomerDB();
}
else
{
$_SESSION["inform"]="пароль должен содержать минимум 8 символов!";	
}
}
else{
$_SESSION["inform"]="номер телефона должен содержать 11-12 символов!";
}
}
else
{
$_SESSION["inform"]="Пожалуйста, заполните все поля!";	
}
}


function writecustomerDB(){
$UserName=$_POST['UserName'];
$Surname=$_POST['Surname'];
$Midlname=$_POST['Midlname'];
$login=$_POST['login2'];
$password=$_POST['password2'];
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO customer VALUES (NULL,'$login', '$UserName', '$Surname', '$Midlname', '$password')";
if (mysqli_query($conn, $sql)) {
      $_SESSION["inform"]="Пользователь был создан!";
} else {
      $_SESSION["inform"]="Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}

if(isset($_POST['go'])){ enterlogin();}

function pageproduct($quer){
global $mysqli;
connectDB();
$sql="SELECT * FROM `product` WHERE `ID_Product` = '$quer' ";
$result = $mysqli -> query($sql);
 while ($row = $result -> fetch_assoc()) {
 echo '
<img src="png/spin/'.$row['Picture'].'">
		</div>
		<div class="pageproducts-item">
		<div id="harakter">
		<center><b>Характеристики</b></center>';
if ($row['DlinaSl']!=NULL) echo '<p>Длина в сложенном виде: '.$row['DlinaSl'].'см</p>';
if ($row['DlinaRab']!=NULL) echo '<p>Длина рабочая: '.$row['DlinaRab'].'cм</p>';
		if ($row['Ves']!=NULL) echo '<p>Вес: '.$row['Ves'].'г</p>';
		if ($row['Material']!=NULL) echo '<p>Материал: '.$row['Material'].'</p>';
		if ($row['Firma']!=NULL) echo '<p>Фирма: '.$row['Firma'].'</p>';
		if ($row['Model']!=NULL) echo '<p>Модель: '.$row['Model'].'</p>';
echo '	</div>
		</div>
	</div>
		<div class="pageproducts-item">
		<b >'.$row['Name'].'</b>
		<p id="cost">'.$row['Cost'].' ₽</p>
		<p><form method = "post"><button name="buy_product" value="'.$row["ID_Product"].'">В корзину</button></form></p>
		<p id="description">'.$row['Description'].'</p>
		</div>
 ';
 }
closeDB();
}

function enterlogin(){
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);
$conn->set_charset("utf-8");
$result = $conn->query('SELECT * FROM `customer`');
while($row = $result->fetch_assoc())	
if($row["phonenumber"]==$_POST['login'] && $row["password"]==$_POST['password'])
{
$_SESSION["Id_User"]=$row["ID_Customer"];		
$_SESSION["Users"]="".$row["UserName"]." ".$row["Midlname"]."";
$_SESSION["inform"]="вы ".$_SESSION["Users"]." вошли!";
mysqli_close($conn);
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=main.php">';
return 0;	
}
mysqli_close($conn);
$_SESSION["inform"]="Неправильный логин или пароль!";
}

if(isset($_POST['buy_product'])){ 
for($i=0;$i<count($_SESSION["arra"]);$i++)
if($_SESSION["arra"][$i]==$_POST['buy_product']) return;
$_SESSION["arra"][]=$_POST['buy_product'];
$_SESSION["howmuch"][$_POST['buy_product']]=1;
}


if(isset($_POST['accept']))
{
$_SESSION["howmuch"][$_POST['accept']]=$_POST[$_POST['accept']];
}

if(isset($_POST['verefication']))
{
$ID_Customer2=$_SESSION["Id_User"];	
$today = date("F j, Y, g:i a");
$idforuser="".$_SESSION["Id_User"]."".rand(100000, 999999)."";
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

for($i=0;$i<count($_SESSION["arra"]);$i++)
{
$ID_product2=$_SESSION["arra"][$i];
$Quantity=$_SESSION["howmuch"][$_SESSION["arra"][$i]];
$sql = "INSERT INTO ordercustomer VALUES (NULL, ".$ID_Customer2.", ".$ID_product2.", ".$Quantity.", '$today', '$idforuser')";
if (mysqli_query($conn, $sql)) {
      $_SESSION["inform"]="Заказ был оформлен!";
} else {
      $_SESSION["inform"]="Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
unset($_SESSION["arra"]); 
unset($_SESSION["howmuch"]);
$_SESSION["inform"]=$idforuser;
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=end.php">';
echo $_SESSION["inform"];	
}

?>