<?
include("db_connect.php");
include("check.php");




$res = mysql_query("SELECT * FROM projects WHERE user_id = ".intval($_COOKIE['user_id']));

for ($i=0; $row = mysql_fetch_assoc($res);$i++){
	$project[$i] = $row;
	$res2 = mysql_query("SELECT * FROM tasks WHERE project_id = ".$row['id']);
	while($row_task = mysql_fetch_assoc($res2)){
		$project[$i]["task"][] = $row_task;
	}	
	
	
}




?>