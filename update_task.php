<?
include("db_connect.php");
include("check.php");

mysql_query("UPDATE tasks SET name = '".mysql_real_escape_string($_POST["name"])."', status = '".mysql_real_escape_string($_POST["status"])."', deadline = '".mysql_real_escape_string($_POST["deadline"])."', prioritise = '".mysql_real_escape_string($_POST["prioritise"])."' WHERE id = ".intval($_POST["id"])." AND project_id = (SELECT id FROM projects WHERE user_id = ".intval($_COOKIE['user_id'])." AND id = ".intval($_POST['project_id']).")") or die("!!!");

?>