<?
include("db_connect.php");
include("check.php");

if($_POST["id"]){
	
	mysql_query("UPDATE projects SET name = '".mysql_real_escape_string($_POST["name"])."' WHERE id = ".intval($_POST["id"])." AND user_id = ".intval($_COOKIE['user_id'])) or die();
} 

?>