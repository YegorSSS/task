<?
if($_COOKIE['user_id'] and $_COOKIE['hash']){
	$row = mysql_query("SELECT * FROM users WHERE id = ".intval($_COOKIE['user_id'])." LIMIT 1");
	
	$user = mysql_fetch_assoc($row);
	
	if ($user['hash'] !== $_COOKIE["hash"]){
		header("Location: regform.php#log");
		exit();
	}
} else{
	header("Location: regform.php#log");
	exit();
}


?>