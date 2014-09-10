<?
include("db_connect.php");
include("check.php");

if($_GET["name"]){
	
	mysql_query("INSERT INTO projects SET name = '".mysql_real_escape_string($_GET["name"])."', user_id = ".intval($_COOKIE['user_id'])) or die();
	
	$row = mysql_query("SELECT id FROM projects WHERE user_id = ".intval($_COOKIE['user_id'])." ORDER BY id DESC LIMIT 1");
	$res = mysql_fetch_assoc($row);
	$json_response =  json_encode($res["id"]);
	echo $json_response;
}
?>