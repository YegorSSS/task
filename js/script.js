jQuery(document).ready(function() {


	function addProjectData(){
		$("a#addProject").click(function(event){
			
			$("#addUpdateProject [name='id']").val("");
			$("#addUpdateProject [name='name']").val("");
			
			event.preventDefault();
			$('#overlay1').fadeIn(400, 
            function(){ 
                $('#modal_form1') 
                    .css('display', 'block') 
                    .animate({opacity: 1, top: '50%'}, 200); 
			
		});
		});
	};
	
	function updateProjectData(){
		$("a#updateProject").click( function(event){ 
			
			var d = $.parseJSON($(this).attr('data'));
			
			$("#addUpdateProject [name='id']").val(d["id"]);
			$("#addUpdateProject [name='name']").val(d["name"]);
			
			event.preventDefault(); 
			$('#overlay1').fadeIn(400, 
            function(){ 
                $('#modal_form1') 
                    .css('display', 'block') 
                    .animate({opacity: 1, top: '50%'}, 200); 
			
			});
			
		});
	};
	
    $('#modal_close1, #overlay1').click( function(){ 
        close(1);
    });
	
	$('#modal_close2, #overlay2').click( function(){ 
        close(2);
    });
	
	$("#addUpdateProject").submit(function(){ 
		
		var name = $("#addUpdateProject [name='name']").val();
		var id = $("#addUpdateProject [name='id']").val();
		
		if(id)
		{
			$.post("update_project.php",{name: name, id: id});
			
			$("div#h2project"+id).html("<img class='p_img' src='img/project.jpg'><h2>"+ name +"</h2><a id='updateProject' href='#' data='{\"id\":"+id+", \"name\":\""+name+"\"}'><img class='u_pr' src='img/update_project.jpg'></a><p>|</p><a class='deleteProject' href='#' data='{\"id\":" +id+ "}'><img class='d_pr' src='img/delete_project.jpg'></a>");
			
							updateProjectData();
							
							$('#modal_close1, #overlay1').click( function(){ 
								close(1);
							});
							
							deleteProject();
							
		}
		else
		{
			$.getJSON(
				'add_project.php',
				{"name": name},
				function(id){
				
					$("section").append("<article id='project"+id+"'><div class='h2' id='h2project" +id+ "'><img class='p_img' src='img/project.jpg'><h2>" +name+ "</h2><a id='updateProject' href='#' data='{\"id\":" +id+ ", \"name\":\""+name+"\"}'><img class='u_pr' src='img/update_project.jpg'></a><p >|</p><a class='deleteProject' href='#' data='{\"id\":" +id+ "}'><img class='d_pr' src='img/delete_project.jpg'></a></div><div class='form'><img src='img/task.jpg'><form action='add_task.php' method='post' id='formproject" +id+ "' class='addtaskform'><input name='name' maxlength='150' size='70' value='' class='addtask' placeholder='Start typing here to create a task...'><input type='image' src='img/add_task.jpg'><input name='project_id' type='hidden' value='" +id+ "'></form></div><table><div class='clear'></tr></table></article>");
				
							$("a#addProject").click(function(event){
								event.preventDefault(); 
								$('#overlay1').fadeIn(400, 
									function(){ 
										$('#modal_form1') 
											.css('display', 'block') 
											.animate({opacity: 1, top: '50%'}, 200);
									
								});
							});
							
							updateProjectData();
							
							$('#modal_close1, #overlay1').click( function(){ 
								close(1);
							});
							
							deleteProject();
							addTask(id);
							
				});
				
		};
		close(1);
		return false;
    });
	
	function open(n){
		event.preventDefault();
        $('#overlay'+n).fadeIn(400,
            function(){ 
                $('#modal_form'+n) 
                    .css('display', 'block')
                    .animate({opacity: 1, top: '50%'}, 200); 
			
		});
	};
	
	function close(n){
		$('#modal_form'+n)
            .animate({opacity: 0, top: '45%'}, 200,
                function(){
                    $(this).css('display', 'none');
                    $('#overlay'+n).fadeOut(400);
                }
            );
	};
	
	function deleteProject(){
	
		$(".deleteProject").click(function(){
			var d = $.parseJSON($(this).attr('data'));
			
			$.get("delete_project.php",{"id": d["id"]})
			
			$("article#project" + d['id']).remove();
			
			return false;
		});
			
	};
	
	//////////////////task////////////////
	function upTaskData(){
		$(".upTaskData").click(function(event){
			
			var td = $.parseJSON($(this).attr('data'));
			
			$("#upTask [name='id']").val(td["id"]);
			$("#upTask [name='project_id']").val(td["project_id"]);
			$("#upTask [name='name']").val(td["name"]);
			$("#upTask [name='status']").val([td["status"]]);
			$("#upTask [name='deadline']").val(td["deadline"]);
			$("#upTask [name='prioritise']").val([td["prioritise"]]);
			
			event.preventDefault();
			$('#overlay2').fadeIn(400, 
				function(){ 
					$('#modal_form2') 
						.css('display', 'block') 
						.animate({opacity: 1, top: '50%'}, 200);
				
			});
			return false;
		});
		
	};

	function updateTask(){
		$("#upTask").submit(function(){
			
			var id = $("#upTask [name='id']").val();
			var project_id = $("#upTask [name='project_id']").val();
			var name = $("#upTask [name='name']").val();
			var status = $("#upTask [name='status']:checked").val();
			var deadline = $("#upTask [name='deadline']").val();
			var prioritise = $("#upTask [name='prioritise']:checked").val();
			
			$.post("update_task.php", {"id":id, "project_id": project_id, "name": name, "status": status, "deadline": deadline, "prioritise": prioritise});
			
			close(2);
			
			$("tr#task"+id).html("<td class=\"name\">"+name+"</td> <td class=\"status\">"+status+"</td> <td class=\"deadline\">"+deadline+"</td> <td class=\"prioritise\">"+prioritise+"</td> <td class=\"img\"> <div> <a class=\"upTaskData\" href='#' data='{\"project_id\":"+project_id+",\"id\":"+id+",\"name\":\""+name+"\",\"status\":\""+status+"\",\"deadline\":\""+deadline+"\",\"prioritise\":\""+prioritise+"\"}'><img src=\"img/update.jpg\"></a>|<a id='delTask' href='#' data='{\"id\":"+id+",\"project_id\":"+project_id+"}'><img src=\"img/delete.jpg\"></a> </div> </td> <div class=\"clear\"></div> ");
			
			delTask();
			updateTask();
			upTaskData();
			
			return false;
			
		});
	};
		
	function addTask(id){
	
		$(".addtaskform").submit(function(){
			
			var project_id = $("[name='project_id']", this).val();
			var name = $("[name='name']", this).val();
			
			if(!id || id == project_id){
			
			$.post("add_task.php",{"project_id": project_id, "name": name}, function(data){
				
				$("article#project"+data["project_id"]+" table").append("<tr id='task"+data["id"]+"'><td class=\"name\">"+data["name"]+"</td> <td class=\"status\">"+data["status"]+"</td> <td class=\"deadline\">"+data["deadline"]+"</td> <td class=\"prioritise\">"+data["prioritise"]+"</td> <td class=\"img\"> <div> <a class=\"upTaskData\" href='#' data='{\"project_id\":"+data["project_id"]+",\"id\":"+data["id"]+",\"name\":\""+data["name"]+"\",\"status\":\""+data["status"]+"\",\"deadline\":\""+data["deadline"]+"\",\"prioritise\":\""+data["prioritise"]+"\"}'><img src=\"img/update.jpg\"></a>|<a id='delTask' href='#' data='{\"id\":"+data["id"]+",\"project_id\":"+data["project_id"]+"}'><img src=\"img/delete.jpg\"></a> </div> </td> <div class=\"clear\"></div> </tr>");
				
				delTask();
				updateTask();
				upTaskData();
				
			},"json");
			
			};
			
			return false;
			
		});
		
	};
	
	function delTask(){
		$("a#delTask").click(function(){
			
			var dd = $.parseJSON($(this).attr('data'));
			
			$.get("del_task.php", {"id":dd["id"],"project_id":dd["project_id"]});
			
			$("tr#task" + dd['id']).remove();
			
			return false;
			
		});
	};
	
	
	addTask();
	delTask();
	updateTask();
	upTaskData();
	deleteProject();
	updateProjectData();
	addProjectData();
	
	
	
});

