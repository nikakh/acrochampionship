<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';

$sportsmens = mysql :: select('sportsmens',
							 "id != 0",
							 'id ASC');

//foreach($sportsmens as $sportsmens) {
//	mysql :: update('sportsmens',
//				    "current = 0",
//				    "id = '".$sportsmens['id']."'");
//}

if(!empty($_POST['datas']['ADMIN_START_FROM'])) {
	foreach($sportsmens as $sportsmens) {
		mysql :: update('sportsmens',
						"current = 0",
						"id = '".$sportsmens['id']."'");
		
		mysql :: update('sportsmens',
					"pause = 0",
					"id = '".$sportsmens['id']."'");
	}
	
	mysql :: update('sportsmens',
				    "current = 1",
				    "id = '".$_POST['datas']['ADMIN_START_FROM']."'");
	
	@define('CURRENT_SPORTSMEN', $_POST['datas']['ADMIN_START_FROM']);
	$admin_current = true;
}

$sportsmens = mysql :: select('sportsmens',
							 "id != 0",
							 'id ASC');

$sel_ad_cur = mysql :: select_one('sportsmens',
								 "current = 1");
if(!$sel_ad_cur) {
	foreach($sportsmens as $sportsmens) {
		if(empty($sportsmens['cas_score_1'])
		   || empty($sportsmens['cas_score_2'])
		   || empty($sportsmens['cas_score_3'])
		   || empty($sportsmens['cas_score_4'])
		   || empty($sportsmens['cas_score_5'])
		   || empty($sportsmens['cas_score_6'])
		   || empty($sportsmens['cas_score_7'])
		   || empty($sportsmens['cas_score_8'])
		   || empty($sportsmens['penalty'])
		   || empty($sportsmens['difficulty'])) {
			@define('CURRENT_SPORTSMEN', $sportsmens['id']);
			break;
		}
	}
} else {
	if(!empty($sel_ad_cur['cas_score_1'])
	    && !empty($sel_ad_cur['cas_score_2'])
	    && !empty($sel_ad_cur['cas_score_3'])
	    && !empty($sel_ad_cur['cas_score_4'])
	    && !empty($sel_ad_cur['cas_score_5'])
	    && !empty($sel_ad_cur['cas_score_6'])
	    && !empty($sel_ad_cur['cas_score_7'])
	    && !empty($sel_ad_cur['cas_score_8'])
	    && !empty($sel_ad_cur['penalty'])
	    && !empty($sel_ad_cur['difficulty'])) {
		$sportsmens = mysql :: select('sportsmens',
									 "id > '".(int)$sel_ad_cur['id']."'",
									 'id ASC');

		foreach($sportsmens as $sportsmens) {
			if(empty($sportsmens['cas_score_1'])
			   || empty($sportsmens['cas_score_2'])
			   || empty($sportsmens['cas_score_3'])
			   || empty($sportsmens['cas_score_4'])
			   || empty($sportsmens['cas_score_5'])
			   || empty($sportsmens['cas_score_6'])
			   || empty($sportsmens['cas_score_7'])
			   || empty($sportsmens['cas_score_8'])
			   || empty($sportsmens['penalty'])
			   || empty($sportsmens['difficulty'])) {
				@define('CURRENT_SPORTSMEN', $sportsmens['id']);
				break;
			}
		}
	} else {
		@define('CURRENT_SPORTSMEN', $sel_ad_cur['id']);
	}
}
echo CURRENT_SPORTSMEN;