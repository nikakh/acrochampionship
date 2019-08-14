<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';

if(!empty($_POST)) {
	if(!empty($_POST['datas']['delete_id']) || !empty($_POST['datas']['delete_id_all'])) {
		if(empty($_POST['datas']['delete_id'])) {
			$_POST['datas']['delete_id'] = trim($_POST['datas']['delete_id_all']);
			$delete_ids = $_POST['datas']['delete_id_all'];
			$delete_ids = substr($delete_ids, 0, -1);
			for($i = 0; $i < count(explode(',', $delete_ids)); $i++) {
				$check = mysql :: select_one('sportsmens',
											"id = ".explode(',', $delete_ids)[$i]);
				
				if($check) {
					mysql :: delete('sportsmens',
								    "id = ".$check['id']);
					
					$day_2 = mysql :: select_one('sportsmens',
												 "day_2 = ".$check['id']);

					if($day_2) {
						mysql :: delete('sportsmens',
									   "id = ".$day_2['id']);
					}
				}
			}
		} else if(empty($_POST['datas']['delete_id_all'])) {
			$_POST['datas']['delete_id'] = trim($_POST['datas']['delete_id']);
			$delete_ids = $_POST['datas']['delete_id'];
			$check = mysql :: select_one('sportsmens',
									"id = ".$delete_ids);
			if($check) {
				mysql :: delete('sportsmens',
							    "id = ".$delete_ids);
				
				$day_2 = mysql :: select_one('sportsmens',
											 "day_2 = ".$delete_ids);
				
				if($day_2) {
					mysql :: delete('sportsmens',
								   "id = ".$day_2['id']);
				}
			}
		}
	}
}