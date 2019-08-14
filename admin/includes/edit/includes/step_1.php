<?php
$result_code = 0;
$user_exists = false;
$refresh_url = '?res='.$result_code;
$done = 0;
if(isset($_POST['user_name']) 
	&& isset($_POST['user_email'])
	&& isset($_POST['task_description'])
	&& isset($_POST['id'])
	) {
	$name = $_POST['user_name'];
	$email = $_POST['user_email'];
	$text = $_POST['task_description'];
	$id = $_POST['id'];

	if(isset($_POST['done'])) {
		$done = 1;
	}
	
	$edit_task = mysql :: update('tasks',
								"user_name = '".$name."', user_email = '".$email."', task_description = '".$text."', done = '".$done."'",
								"id = '".$id."'");
			
	if ($edit_task) {
		$result_code = 1;
		$refresh_url = '?res='.$result_code;
	}
}
?>
<meta http-equiv="refresh" content="0.1; url=<?=$refresh_url?>">