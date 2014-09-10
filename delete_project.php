<?
include("db_connect.php");
include("check.php");



mysql_query("DELETE FROM tasks WHERE project_id = (SELECT id FROM projects WHERE user_id = ".intval($_COOKIE['user_id'])." AND id = ".intval($_GET["id"]).")") or die();
mysql_query("DELETE FROM projects WHERE id =".intval($_GET["id"])." AND user_id = ".intval($_COOKIE['user_id'])) or die();



?>