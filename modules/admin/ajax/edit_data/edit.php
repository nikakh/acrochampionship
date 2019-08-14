<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';

var_dump($_POST);
if(!empty($_POST)) {
	echo 33333;
	if(!empty($_POST['datas']['row_id']) && !empty($_POST['datas']['column'])) {
		if(count(explode(',', $_POST['datas']['value'])) && $_POST['datas']['column'] == 'sportsmen_category') {
			//for($i = 0; $i < count(explode(',', $_POST['datas']['value'])); $i++) {
				mysql :: update('sportsmens',
						"country = ".explode(',', $_POST['datas']['value'])[0]."",
					    "id = ".$_POST['datas']['row_id']);
				
				mysql :: update('sportsmens',
						"sportsmen_category = ".explode(',', $_POST['datas']['value'])[1]."",
					    "id = ".$_POST['datas']['row_id']);
			//}	
		} else {
		
			mysql :: update('sportsmens',
							$_POST['datas']['column']." = ".$_POST['datas']['value']."",
							"id = ".$_POST['datas']['row_id']);
		}
		
		if($_POST['datas']['column'] == 'name') {
			$day_2 = mysql :: select_one('sportsmens',
										 "day_2 = ".$_POST['datas']['row_id']);
			var_dump($day_2);
			mysql :: update('sportsmens',
						"name = ".$_POST['datas']['value']."",
					    "id = ".$day_2['id']);
		}
		
	}
}