<?
include("home.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Главная</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="js/script.js" type="text/javascript"></script>
	

</head>

<body>
	<header>
		<h1>SIMPLE TODO LISTS</h1>
		<p>FROM RUBY GARAGE</p>
	</header>﻿		
	
	
	<section id="12">
			<?if($project):?>
			<? foreach($project as $item):?><article id="project<?=$item['id']?>">
				<div class="h2" id="h2project<?=$item['id']?>">
					<img class="p_img" src="img/project.jpg">
					<h2><?=$item["name"]?></h2>
					<a id="updateProject" href='#' data='{"id":<?=$item['id']?>,"name":"<?=$item['name']?>"}'><img class="u_pr" src="img/update_project.jpg"></a>
					<p >|</p>
					<a class="deleteProject" href='#' data='{"id":<?=$item['id']?>}'><img class="d_pr" src="img/delete_project.jpg"></a>
				</div>
				<div class="form">
					<img src="img/task.jpg">
					<form action="add_task.php" method="post" class='addtaskform'>
						<input name="name" maxlength="150" size="70" value="" class="addtask" placeholder="Start typing here to create a task...">
						<input name="project_id" type="hidden" value="<?=$item['id']?>">
						<input type="image" src="img/add_task.jpg">
						
					</form>
				</div>
				<table>
					<?if($item["task"]):?><? foreach($item["task"] as $item2):?>
						<tr id="task<?=$item2["id"]?>">
							<td class="name"><?=$item2["name"]?>
							</td>
							<td class="status"><?=$item2["status"]?>
							</td>
							<td class="deadline"><?=$item2["deadline"]?>
							</td>
							<td class="prioritise"><?=$item2["prioritise"]?>
							</td>
							<td class="img">
							<div>
								<a class="upTaskData" href='#' data='{"project_id":<?=$item['id']?>,"id":<?=$item2["id"]?>,"name":"<?=$item2['name']?>","status":"<?=$item2['status']?>","deadline":"<?=$item2['deadline']?>","prioritise":"<?=$item2['prioritise']?>"}'>
									<img src="img/update.jpg">
								</a>
								|
								<a id="delTask" href='#' data='{"id":<?=$item2["id"]?>,"project_id":<?=$item["id"]?>}'>
									<img src="img/delete.jpg">
								</a>
							</div>
							</td>
							<div class="clear"></div>
						</tr>
						
						<? endforeach;?><? endif;?>
						
					
				</table>
				
				
				
				
			</article><? endforeach;?>
			<? endif;?>
			
			
				
			
	</section>
	<a href="#openModal2" id="addProject"><img src="img/add_project.jpg"></a>

	
	
<div id="modal_form1">
    <span id="modal_close1">X</span> 
        <form id="addUpdateProject">
				<input type="hidden" value="" name="id">
				Project Name: <input name="name" value=""><br>
				<input type="submit">
			</form>
</div>
<div id="overlay1"></div> 

<div id="modal_form2">
    <span id="modal_close2">X</span> 
        <form id="upTask">
			<input type="hidden" value="" name="id">
			<input type="hidden" value="" name="project_id">
			Name: <input name="name" value=""><br>
			Status:<input type="radio" name="status" value="active">- active  <input type="radio" name="status" value="done">- done<br>
			Deadline:<input name="deadline" value=""><br>
			Prioritise:<input type="radio" name="prioritise" value="high">- high   
			<input type="radio" name="prioritise" value="medium">- medium   
			<input type="radio" name="prioritise" value="low">- low<br>
			
			<input type="submit">
		</form>
</div>
<div id="overlay2"></div> 
	

	
	
﻿	<footer>
	</footer>
</body>
</html>	