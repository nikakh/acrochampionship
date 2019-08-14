<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/current_sportsmen.php';
//mysql :: connect();
if($_POST) {
	if(isset($_POST['datas']['ID'])) {
		$ID = $_POST['datas']['ID'];
	}
	
	if(isset($_POST['datas']['A1'])) {
		$A1 = $_POST['datas']['A1'];
	}
	
	if(isset($_POST['datas']['A2'])) {
		$A2 = $_POST['datas']['A2'];
	}
	
	if(isset($_POST['datas']['A3'])) {
		$A3 = $_POST['datas']['A3'];
	}
	
	if(isset($_POST['datas']['A4'])) {
		$A4 = $_POST['datas']['A4']; 
	}
	
	if(isset($_POST['datas']['E1'])) {
		$E1 = $_POST['datas']['E1'];
	}
	
	if(isset($_POST['datas']['E2'])) {
		$E2 = $_POST['datas']['E2'];
	}
	
	if(isset($_POST['datas']['E3'])) {
		$E3 = $_POST['datas']['E3'];
	}
	
	if(isset($_POST['datas']['E4'])) {
		$E4 = $_POST['datas']['E4'];
	}
	
	if(isset($_POST['datas']['A'])) {
		$A = $_POST['datas']['A'];
	}
	
	if(isset($_POST['datas']['ID'])) {
		$E = $_POST['datas']['E'];
	}
	
	if(isset($_POST['datas']['PENALTY'])) {
		$PENALTY = $_POST['datas']['PENALTY'];
	}
	
	if(isset($_POST['datas']['DIFFICULTY'])) {
		$DIFFICULTY = $_POST['datas']['DIFFICULTY'];
	}
	
	if(isset($_POST['datas']['TOTAL'])) {
		$TOTAL = $_POST['datas']['TOTAL'];
	}

	 mysql :: update('sportsmens', 
					"super_score = '".$TOTAL."', difficulty = '".$DIFFICULTY."', penalty = '".$PENALTY."'",
				    "id = '".$_POST['datas']['CURRENT_SPORTSMEN']."'");
}