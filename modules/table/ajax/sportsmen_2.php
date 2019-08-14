<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';

$cur_id = mysql :: select_one('sportsmens',
							  "suka = 1 ");
$cur_id = $cur_id['id'];
$sportmsen = mysql :: select_one('sportsmens',
							 	 "id = '".$cur_id."'");

$sportmsen_in = mysql :: select_one('sportsmens',
							 	 	"id = '".$cur_id."'");

$sportsmen_day_2 = mysql :: select_one('sportsmens',
									  "day_2 = ".$sportmsen['id']);

$sportmsens = mysql :: select('sportsmens',
							  "sportsmen_category = '".$sportmsen_in['sportsmen_category']."'",
							  "total DESC");

$place = 1;
foreach($sportmsens as $sportmsens) {
	if($sportmsens['id'] == $sportmsen_in['id']) {
		break;
	}
	$place++;
}

		$A_arr = [$sportmsen['cas_score_1'],$sportmsen['cas_score_2'],$sportmsen['cas_score_3'],$sportmsen['cas_score_4']];
		$E_arr = [$sportmsen['cas_score_5'],$sportmsen['cas_score_6'],$sportmsen['cas_score_7'],$sportmsen['cas_score_8']];
							     

		$A_score_1 = (array_sum($A_arr) - (max($A_arr) + min($A_arr))) / 2;
		$E_score_1 = (array_sum($E_arr) - (max($E_arr) + min($E_arr)));
		$A_score_2 = 0;
		$E_score_2 = 0;
		if($sportsmen_day_2) {		
			$A_arr_2 = [$sportsmen_day_2['cas_score_1'],$sportsmen_day_2['cas_score_2'],$sportsmen_day_2['cas_score_3'],$sportsmen_day_2['cas_score_4']];
			$E_arr_2 = [$sportsmen_day_2['cas_score_5'],$sportsmen_day_2['cas_score_6'],$sportsmen_day_2['cas_score_7'],$sportsmen_day_2['cas_score_8']];

			$A_score_2 = (array_sum($A_arr_2) -(max($A_arr_2) + min($A_arr_2))) / 2;
			$E_score_2 = (array_sum($E_arr_2) -(max($E_arr_2) + min($E_arr_2))) / 2;
		}
	
	
	$total_1 =  $A_score_1 + $E_score_1 + $sportsmens['difficulty'] -  $sportsmens['penalty'];
	$total_2 =  $A_score_2 + $E_score_2 + $sportsmen_day_2['difficulty'] -  $sportsmen_day_2['penalty']
?>
	<div class="federation">
		<img src="https://scontent.ftbs6-1.fna.fbcdn.net/v/t1.0-9/33980228_1871163019571684_4810207567286370304_n.jpg?_nc_cat=106&_nc_oc=AQnJkoAkfXtzdHj0Sc60tvh7DPlixG1zFfue4g0f8wb0xIJKKXmpf_O7R-DKaSFDZFE&_nc_ht=scontent.ftbs6-1.fna&oh=e08bbabe3efce6a3be940d5e5faf60c1&oe=5DB9CE31" alt="">

		<h1 class="page_title">United Georgian Gymnastics Federation</h1>
	</div>

	<div class="category">
 
		<h1 class="page_title">Category</h1>
		<div class="category_name">
			<h1 class="page_title sportsmen_category" data-category="<?= $sportmsen['sportsmen_category']?>"><?= $sportmsen['sportsmen_category']?></h1>
		</div>

	</div> 

	<div class="contestants">
<?php
	if(strlen($sportmsen['name']) > 55) {
		$font_size = '6vh';
	} else {
		$font_size = '7vh';
	}
		if(count(explode(',', $sportmsen['name']))) {
			for($i = 0; $i < count(explode(',', $sportmsen['name'])); $i++) {
?>
				<h1 class="page_title" style="font-size:<?= $font_size ?> "><?= explode(',', $sportmsen['name'])[$i] ?></h1>
<?php
			}
		} else {
?>
				<h1 class="page_title" style="font-size: <?= $font_size ?>"><?= $sportmsen['name'] ?></h1>
<?php
		}
?>
	</div>

	<div class="scores_div">

		<div class="country">
			<img src="countries/<?= $sportmsen['country'] ?>.jpg" alt="<?= $sportmsen['country'] ?>">
			<h1 class="page_title"><?= $sportmsen['country'] ?></h1>
		</div>

		<div class="scores">

			<div class="e">
				<h1 class="big_title">E</h1>
				<h1 class="score_title"><?= $E_score_1 ?></h1>
			</div>

			<div class="a">
				<h1 class="big_title">A</h1>
				<h1 class="score_title"><?= $A_score_1 ?></h1>
			</div>

			<div class="diff">
				<h1 class="big_title">Difficulty</h1>
				<h1 class="score_title"><?= $sportmsen['difficulty'] ?></h1>
			</div>

			<div class="cjp">
				<h1 class="big_title">Penalty</h1>
				<h1 class="score_title"><?= $sportmsen['penalty'] ?></h1>
			</div>

		</div> 

		<div class="total_score">
			<div class="total">
				<h1 class="pass_title"><?= $sportmsen['action']?></h1>
				<h1 class="pass_score"><?= $A_score_1 + $E_score_1 + $sportmsen['difficulty'] - $sportmsen['penalty']?></h1>
			</div>
<?php
			if($sportmsen_dey_2) {
?>

				<div class="total">
					<h1 class="pass_title"><?= $sportmsen_dey_2['action']?></h1>
					<h1 class="pass_score"><?= $A_score_2 + $E_score_2 + $sportmsen_dey_2['difficulty'] - $sportmsen_dey_2['penalty']?></h1>
				</div>
<?php
			}
?>
			<div class="total">
				<h1 class="pass_title">Total</h1>
				<h1 class="pass_score"><?= $total_1 + $total_2?></h1>
			</div>

		</div>

	</div>

	<div class="place">
		<h1>Place: <span class="result"><?= $place ?></span></h1>
	</div>