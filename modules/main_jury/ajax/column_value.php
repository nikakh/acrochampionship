<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';

$sportsmen = mysql :: select_one('sportsmens',
								 "id = '".$_POST['datas']['CURRENT_SPORTSMEN']."'");

?>
<?php /*?>
<div class="table_cell">
	<div class="col_padding column_name">
		<h4>ID</h4>
	</div>
	<div class="col_padding column_value" id="part_id">
		<?= $sportsmen['id'] ?>
	</div>
</div>
<?php */?>
<div class="table_cell col_6">
	<div class="col_padding column_name">
		<h4>Name</h4>
	</div>
	<div class="col_padding column_value">
		<?= $sportsmen['name'] ?>
	</div>
</div>
<div class="table_cell col_2">
	<div class="col_padding column_name">
		<h4>Country</h4>
	</div>
	<div style="display: flex;align-items: center">
		<div style="width: 40%; margin-left: auto"  class="col_padding">
			<img src="/countries/<?= $sportsmen['country'] ?>.jpg" alt="">
		</div>
		<div style="margin-right: auto;" class="col_padding column_value">
			<?= $sportsmen['country'] ?>
		</div>
	</div>
	
</div>
<div class="table_cell col_2">
	<div class="col_padding column_name">
		<h4>Category</h4>
	</div>
	<div class="col_padding column_value">
		<?= $sportsmen['sportsmen_category'] ?>
	</div>
</div>
<div class="table_cell col_2">
	<div class="col_padding column_name">
		<h4>Excercise</h4>
	</div>
	<div class="col_padding column_value">
		<?= $sportsmen['action'] ?>
	</div>
</div>