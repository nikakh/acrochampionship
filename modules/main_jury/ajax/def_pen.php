<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/current_sportsmen.php';
//mysql :: connect();
if($_POST) {
	if(isset($_POST['datas']['ID'])) {
		$ID = $_POST['datas']['ID'];
	}
	
	if(isset($_POST['datas']['PENALTY'])) {
		$PENALTY = $_POST['datas']['PENALTY'];
	}
	
	if(isset($_POST['datas']['DIFFICULTY'])) {
		$DIFFICULTY = $_POST['datas']['DIFFICULTY'];
	}
	
	if(!$DIFFICULTY) {
		$DIFFICULTY = 0;
	}
	
	if(!$PENALTY) {
		$PENALTY = 0;
	}

	 mysql :: update('sportsmens', 
					"difficulty = ".$DIFFICULTY.", penalty = ".$PENALTY."",
				    "id = '".$_POST['datas']['CURRENT_SPORTSMEN']."'");
}