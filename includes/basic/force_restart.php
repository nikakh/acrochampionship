<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';

//	$sportsmens_in = mysql :: select_one('sportsmens',
//									"restart = 1");
//if(empty($_POST['datas']['restart'])) {
//	$sportsmens = mysql :: select('sportsmens');
//	foreach($sportsmens as $sportsmens) {
//		mysql :: update('sportsmens',
//						"restart = 1",
//						"id = ".$sportsmens['id']);
//		echo $sportsmens['restart'].'<br>';
//	}
//	
//	$sportsmens = mysql :: select('sportsmens');
//	foreach($sportsmens as $sportsmens) {
//		mysql :: update('sportsmens',
//						"restart_all = 1",
//						"id = ".$sportsmens['id']);
//	}
//
//	$sportsmens_in = mysql :: select_one('sportsmens',
//									"restart = 1");
////} else {
////	$_SESSION['restart']++;
//}
////
//$sportsmens = mysql :: select('sportsmens');
//foreach($sportsmens as $sportsmens) {
//	mysql :: update('sportsmens',
//					"restart = 0",
//					"id = ".$sportsmens['id']);
//}