<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';


if(!empty($_POST)) {
	echo '1<br>';
	$id = $_POST['datas']['id'] + 1;
	mysql :: insert('sportsmens',
				    "id,name,country,sportsmen_category,action,day_2",
				    $_POST['datas']['id'].", '".$_POST['datas']['name']."', '".$_POST['datas']['country']."', '".$_POST['datas']['sportsmen_category']."', '".$_POST['datas']['action_1']."', 0");
	
	mysql :: insert('sportsmens',
				    "id,name,country,sportsmen_category,action,day_2",
				    $id.", '".$_POST['datas']['name']."', '".$_POST['datas']['country']."', '".$_POST['datas']['sportsmen_category']."', '".$_POST['datas']['action_2']."', ".$_POST['datas']['id']);
	
	
}
var_dump($_POST);