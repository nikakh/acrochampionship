<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';

$sportsmens = mysql :: select('sportsmens');

if(!$_POST['datas']['rating']) {
	echo 1;
foreach($sportsmens as $sportsmens) {
	mysql :: update('sportsmens',
				  "suka = 0",
				  "id = ".$sportsmens['id']);
}

mysql :: update('sportsmens',
			    "suka = 1",
			    "id = ".$_POST['datas']['CURRENT_SPORTSMEN']);
} else {
	echo 2;
	mysql :: update('sportsmens',
					"suka = 2",
					"id = ".$_POST['datas']['CURRENT_SPORTSMEN']);
}