<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';

if(!empty($_POST)) {
	if(!empty($_POST['datas']['update_id']) || !empty($_POST['datas']['update_id_all'])) {
		if(empty($_POST['datas']['update_id'])) {
			$_POST['datas']['update_id'] = trim($_POST['datas']['update_id_all']);
			$update_ids = $_POST['datas']['update_id_all'];
			$update_ids = substr($update_ids, 0, -1);
			for($i = 0; $i < count(explode(',', $update_ids)); $i++) {
				$check = mysql :: select_one('sportsmens',
											"id = ".explode(',', $update_ids)[$i]);
				
				if($check) {
					mysql :: update('sportsmens',
								    "cas_score = 0, cas_score_1 = 0, cas_score_2 = 0, cas_score_3 = 0, cas_score_4 = 0, cas_score_5 = 0, cas_score_6 = 0, cas_score_7 = 0, cas_score_8 = 0, difficulty = 0, penalty = 0, name = 'Name', sportsmen_category = 'Category', country = 'Country', action = 'Action 1'",
									"id = ".$check['id']);
					
					$day_2 = mysql :: select_one('sportsmens',
												 "day_2 = ".$check['id']);

					if($day_2) {
						mysql :: update('sportsmens',
								    "cas_score = 0, cas_score_1 = 0, cas_score_2 = 0, cas_score_3 = 0, cas_score_4 = 0, cas_score_5 = 0, cas_score_6 = 0, cas_score_7 = 0, cas_score_8 = 0, difficulty = 0, penalty = 0, name = 'Name', sportsmen_category = 'Category', country = 'Country', action = 'Action 2'",
									"id = ".$check['id']);
					}
				}
			}
		} else if(empty($_POST['datas']['update_id_all'])) {
			$_POST['datas']['update_id'] = trim($_POST['datas']['update_id']);
			$update_ids = $_POST['datas']['update_id'];
			$check = mysql :: select_one('sportsmens',
									"id = ".$update_ids);
			if($check) {
				mysql :: update('sportsmens',
								    "cas_score = 0, cas_score_1 = 0, cas_score_2 = 0, cas_score_3 = 0, cas_score_4 = 0, cas_score_5 = 0, cas_score_6 = 0, cas_score_7 = 0, cas_score_8 = 0, difficulty = 0, penalty = 0, name = 'Name', sportsmen_category = 'Category', country = 'Country', action = 'Action 1'",
									"id = ".$check['id']);
				
				$day_2 = mysql :: select_one('sportsmens',
											 "day_2 = ".$update_ids);
				
				if($day_2) {
					mysql :: update('sportsmens',
								    "cas_score = 0, cas_score_1 = 0, cas_score_2 = 0, cas_score_3 = 0, cas_score_4 = 0, cas_score_5 = 0, cas_score_6 = 0, cas_score_7 = 0, cas_score_8 = 0, difficulty = 0, penalty = 0, name = 'Name', sportsmen_category = 'Category', country = 'Country', action = 'Action 2'",
									"id = ".$check['id']);
				
				}
			}
		}
	}
}