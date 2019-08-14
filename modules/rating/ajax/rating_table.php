<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';

$sportmsen_in = mysql :: select_one('sportsmens',
									'suka = 1');

?> 
<img class="col_padding" src="/images/logo1.jfif" alt="logo" style="width: 10vw;">
<h1 class="col_padding r_category" style="font-size: 5vh" class="category_name_rating" data-category_name="<?= $sportmsen_in['sportsmen_category'] ?>"><?= $sportmsen_in['sportsmen_category'] ?></h1>
<h1 class="col_padding r_action" style="font-size: 5vh" class="category_name_rating" data-action="<?= $sportmsen_in['action'] ?>"><?= $sportmsen_in['action'] ?></h1>
<img class="col_padding" src="/images/logo2.jfif" alt="logo"  style="width: 10vw">
<script>
	



</script>