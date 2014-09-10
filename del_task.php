<?
include("db_connect.php");
include("check.php");


mysql_query("DELETE FROM tasks WHERE id = ".intval($_GET["id"])." AND project_id = (SELECT id FROM projects WHERE id = ".$_GET['project_id']." AND user_id = ".intval($_COOKIE['user_id']).")") or die();


?>