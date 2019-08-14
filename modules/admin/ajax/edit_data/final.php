<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';

var_dump($_POST);
if(!empty($_POST)) {
	if(!empty($_POST['datas']['id'])) {
		mysql :: update('sportsmens',
						"final = ".$_POST['datas']['final']."",
						"id = ".$_POST['datas']['id']);
		
		$day_2 = mysql :: select_one('sportsmens',
									 "day_2 = ".$_POST['datas']['id']);
		if($day_2) {
			mysql :: update('sportsmens',
							"final = ".$_POST['datas']['final']."",
							"id = ".$_POST['datas']['id']);	
		}
	}
}