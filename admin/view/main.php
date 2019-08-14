<?php
if(isset($_GET['res'])) {
	if($_GET['res'] == '0') {
		@define('MESSAGE', 'Error Please Try Again!');
		@define('RES_CLASS', 'fail');
	}elseif($_GET['res'] == '1') {
		@define('MESSAGE', 'Succes!');
		@define('RES_CLASS', 'ok');
	}
?>
 	<div class="<?= RES_CLASS?>" style="font-size: 20px;font-weight: bolder;width: 370px; margin: auto;"><?= MESSAGE ?></div>
<?php
}
 ?>