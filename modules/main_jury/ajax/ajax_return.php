<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/current_sportsmen.php';

if(!empty($_POST['datas']['judge_id'])) {
	$return_score = 1;
	$return_judge = $_POST['datas']['judge_id'];

	mysql :: update('sportsmens', 
					"return_score = '".$return_score."', return_judge_".$return_judge." = 1, cas_score_".$_POST['datas']['judge_id']." = 0 ",
				    "id = '".$_POST['datas']['CURRENT_SPORTSMEN']."'");
}