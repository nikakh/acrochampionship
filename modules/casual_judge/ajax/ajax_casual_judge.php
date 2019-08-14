<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/current_sportsmen.php';

if($_POST) {
	if(isset($_POST['datas']['VALUE'])) {
		$VALUE = $_POST['datas']['VALUE'];
	}
	
	if(isset($_POST['datas']['JUDGE_ID'])) {
		$JUDGE_ID = $_POST['datas']['JUDGE_ID'];
	}

	 mysql :: update('sportsmens', 
					  "cas_score_".$JUDGE_ID." = ".$VALUE.", return_judge_".$JUDGE_ID." = 0",
					  "id = '".$_POST['datas']['CURRENT_SPORTSMEN']."'");
}