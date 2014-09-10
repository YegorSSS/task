<?php
include("db_connect.php");
session_start();


if($_POST["login"]){
	$login = mysql_real_escape_string($_POST["login"]);
	
	$row = mysql_query("SELECT id, login, pass FROM users WHERE login = '".$login."'");
	$res = mysql_fetch_assoc($row);
	
	
	$pass = md5($_POST["pass"]);
	if($res["pass"] === $pass){
		
		
		
		$hash = md5(uniqid(rand(),true));
		
		mysql_query("UPDATE users SET hash = '".$hash."' WHERE login = '".$login."'");
		
		setcookie("hash", $hash);
		setcookie("user_id", $res["id"]);
	}
	
header("Location: index.php");
exit();
	
	
}











   
?>