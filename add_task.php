<?
include("db_connect.php");
include("check.php");



mysql_query("INSERT INTO tasks SET name = '".mysql_real_escape_string($_POST['name'])."', project_id = (SELECT id FROM projects WHERE id = ".intval($_POST['project_id'])." AND user_id = ".intval($_COOKIE['user_id'])."), deadline = ADDDATE(NOW(), INTERVAL 1 day)") or die();

$row = mysql_query("SELECT * FROM tasks WHERE project_id = (SELECT id FROM projects WHERE id = ".intval($_POST['project_id'])." AND user_id = ".intval($_COOKIE['user_id']).") ORDER BY id DESC LIMIT 1");


$res = mysql_fetch_assoc($row);

$json_response =  json_encode($res);
echo $json_response;
	
	



?>