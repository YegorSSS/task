<?php
include("db_connect.php");




if(!preg_match("/^[a-zA-Zа-яА-Я0-9]+$/",$_POST['login']))
{
	exit("Username can consist only of letters and numbers");
}	
	
	
$query = mysql_query("SELECT COUNT(id) FROM users WHERE login='".$_POST['login']."'");
if(mysql_result($query, 0) > 0)
{
	exit("login already exists");
}

$login = $_POST['login'];
$pass = md5($_POST['pass']);

mysql_query("INSERT INTO users SET login='".$login."', pass='".$pass."'");


header("Location: regform.php#log");

exit();
	

		
		

?>