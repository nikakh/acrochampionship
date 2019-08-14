<?php
@define('MESSAGE', 'Task has been add!');
$result_code = 0;
$user_exists = false;
$refresh_url = '?act=add&res='.$result_code;

if(isset($_POST['name']) 
	&& isset($_POST['email'])
	&& isset($_POST['text'])
	) {
	$name = $_POST['name'];
	$email = trim($_POST['email']);
	$text = $_POST['text'];
	if(mysql :: check_user_exists('users',"name = '".$name."' AND email = '".$email."' AND admin = '0'")) {
		$user_exists = true;
	}

	if($user_exists) {
		$add_task = mysql :: insert('tasks',
									"user_name, user_email, task_description, done",
									"".$name."', '".$email."', '".$text."'".', '."'0''");
			
		if ($add_task) {
			$result_code = 1;
			@define('MESSAGE', 'Task has been add!');
			$refresh_url = '?act=add&res='.$result_code;
		}
	}
}
?>
<meta http-equiv="refresh" content="0.1; url=<?=$refresh_url?>">