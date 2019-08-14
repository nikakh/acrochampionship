<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';

$sportsmen = mysql :: select_one('sportsmens',
								 "id = '".$_POST['datas']['CURRENT_SPORTSMEN']."'");
?>
<?php /*?>
<div class="column col_padding">
	<div class="category col_padding">
		<h4>ID</h4>
	</div>
	<div class="val col_padding">
		<h5><?= $sportsmen['id'] ?></h4>
	</div>
</div>
<?php */?>
<div class="col_3 col_padding">
	<div class="category col_padding">
		<h4><?= $sportsmen['country'] ?></h4>
	</div>
	<div class="val col_padding">
		<img src="countries/<?= $sportsmen['country']?>.jpg" alt="<?= $sportsmen['country']?>">
	</div>
</div>

<div class="col_3 col_padding">
	<div class="category col_padding">
		<h4>Exercise</h4>
	</div>
	<div class="val col_padding">
		<h5><?= $sportsmen['action'] ?></h5>
	</div>
</div>

<div class="col_3 col_padding">
	<div class="category col_padding">
		<h4>Category</h4>
	</div>
	<div class="val col_padding">
		<h5><?= $sportsmen['sportsmen_category'] ?></h5>
	</div>
</div>
	
<div class="col_12 col_padding">
	<div class="category col_padding">
		<h4>Participant</h4>
	</div>
	<div class="val col_padding sporstmen_name">
		<h5><?= $sportsmen['name'] ?></h5>
	</div>
</div>