<?php /*?><?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';
$sportsmen_current = mysql :: select_one ('sportsmens',
										  "suka = 1");
?>
<div id="current_table_id_container" style="display: none">
<?php
	echo $sportsmen_current['id']; 
?>
	
	
</div><?php */?>