<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';

$sportsmens = mysql :: select('sportsmens');
							 
//echo count($sportsmens);
$i = 1;
foreach($sportsmens as $sportsmens) {
//	if($sportsmens['final'] == 1) {
//		mysql :: update('sportsmens',
//					   "action = 'COMBINED'",
//					   "id = ".$sportsmens['id']);
//	}
//	
	$display_none = '';
	$sportsmen_day_2 = mysql :: select_one('sportsmens',
					 						"day_2 != 0 AND name = '".$sportsmens['name']."'");
	
	//var_dump($sportsmen_day_2);
	$A_arr = [$sportsmens['cas_score_1'],$sportsmens['cas_score_2'],$sportsmens['cas_score_3'],$sportsmens['cas_score_4']];
	$E_arr = [$sportsmens['cas_score_5'],$sportsmens['cas_score_6'],$sportsmens['cas_score_7'],$sportsmens['cas_score_8']];
	
	$A_score_1 = (array_sum($A_arr) -(max($A_arr) + min($A_arr))) / 2;
	$E_score_1 = (array_sum($E_arr) -(max($E_arr) + min($E_arr))) ;
	
	if(!$A_score_1) {
		$A_score_1 = 0;
	}
	
	if(!$E_score_1) {
		$E_score_1 = 0;
	}
	$A_score_2 = '0.0';
	$E_score_2 = '0.0';
	if($sportsmen_day_2) {
		
		
		$A_arr_2 = [$sportsmen_day_2['cas_score_1'],$sportsmen_day_2['cas_score_2'],$sportsmen_day_2['cas_score_3'],$sportsmen_day_2['cas_score_4']];
		$E_arr_2 = [$sportsmen_day_2['cas_score_5'],$sportsmen_day_2['cas_score_6'],$sportsmen_day_2['cas_score_7'],$sportsmen_day_2['cas_score_8']];
		
		$A_score_2 = (array_sum($A_arr_2) -(max($A_arr_2) + min($A_arr_2))) / 2;
		$E_score_2 = (array_sum($E_arr_2) -(max($E_arr_2) + min($E_arr_2))) ;
	}
	
	
	$total_1 =  $A_score_1 + $E_score_1 + $sportsmens['difficulty'] -  $sportsmens['penalty'];
	$total_2 =  $A_score_2 + $E_score_2 + $sportsmen_day_2['difficulty'] -  $sportsmen_day_2['penalty'];
	
	if($sportsmen_day_2) {
		$TOTAL = $total_1 + $total_2;
	} else {
		$TOTAL = $total_1;
	}
	
	mysql :: update('sportsmens',
				    "final_total = ".$TOTAL,
				    "id = ".$sportsmens['id']);
//	if($sportsmen_day_2) {
//		$sportsmens['id'] = $sportsmen_day_2['id'];
//	} else {
//		$sportsmens['id'] = $sportsmens['id'];
//	}
//	$sportsmen_day_2_display = mysql :: select_one('sportsmens',
//					 								"day_2 = ".$sportsmens['id']);
	if($sportsmens['day_2'] != '0') {
		$display_none = 'day_2_row_hide';
	} else {
		$display_none = 'day_1_row_hide';
	}
?> 	
	<div data-day_2="<?= $sportsmens['day_2'] ?>" data-final="<?= $sportsmens['final'] ?>" data-db_id="<?= $sportsmens['id'] ?>" style="order: <?= $i ?>" class="tr <?= $display_none ?>" id="row_<?= $i ?>">
<!--		<div class="mdl">-->
		<input id="c<?= $i ?>" class="col_padding check" type="checkbox"/>
		<label for="c<?= $i ?>">
			<div class="before"></div>
		</label>

<!--		</div>-->
		<div class="td line_max_3" data-value="id" data-db_id="<?= $sportsmens['id'] ?>"><?= $i ?></div>
		<div class="td line_max_3" data-value="name">
			<textarea class="input_db" value="<?= $sportsmens['name'] ?>"><?= $sportsmens['name'] ?></textarea>
		</div>
		<div  class="td line_max_3 for_filter" data-country="<?= $sportsmens['country']?>" data-category="<?= $sportsmens['sportsmen_category']?>" data-value="sportsmen_category">
			<input class="input_db" value="<?= $sportsmens['country'].' '.$sportsmens['sportsmen_category']?>">
		</div>
		<div class="td line_max_3" data-value="action" >
			<input class="input_db" value="<?= $sportsmens['action'] ?>" data-event="<?= $sportsmens['action']?>" class="col_padding">
<?php
			if($sportsmens['final'] == 0) {
?>
				<input class="input_db" value="<?= $sportsmen_day_2['action'] ?>" data-event="<?= $sportsmen_day_2['action'] ?>" data-sportsmen="<?= $sportsmen_day_2['id'] ?>">
<?php
			}
?>
		</div>
		<div class="td line_max_3" data-value="difficulty">
			<input class="input_db" value="<?= $sportsmens['difficulty']?>" data-event="<?= $sportsmens['action'] ?>" class="col_padding">
<?php
			if($sportsmens['final'] == 0) {
?>
				<input class="input_db" value="<?= $sportsmen_day_2['difficulty']?>" data-event="<?= $sportsmen_day_2['action']?>" data-sportsmen="<?= $sportsmen_day_2['id'] ?>">
<?php
			}
?>
		</div>
		
		<div class="td line_max_3" data-value="total_a">
			<input class="input_db" value="<?= $A_score_1 ?>" data-event="<?= $sportsmens['action'] ?>" class="col_padding" >
<?php
			if($sportsmens['final'] == 0) {
?>
				<input class="input_db" value="<?= $A_score_2 ?>" data-event="<?= $sportsmen_day_2['action']?>" data-sportsmen="<?= $sportsmen_day_2['id'] ?>">
<?php
			}
?>
		</div>
		
		<div class="td line_max_3" data-value="total_e">
			<input class="input_db" value="<?= $E_score_1 ?>" data-event="<?= $sportsmens['action'] ?>" class="col_padding" >
			<?php
			if($sportsmens['final'] == 0) {
?>
				<input class="input_db" value="<?= $E_score_2 ?>" data-event="<?= $sportsmen_day_2['action']?>" data-sportsmen="<?= $sportsmen_day_2['id'] ?>">
<?php
			}
?>
<?php /*?>			<?= $sportsmen_day_2['id']?>
<?php */?>		</div>
		
		<div class="td line_max_3" data-value="penalty">
			<input class="input_db" value="<?= $sportsmens['penalty'] ?>" data-event="<?= $sportsmens['action'] ?>" class="col_padding">
<?php
			if($sportsmens['final'] == 0) {
?>
				<input class="input_db" value="<?= $sportsmen_day_2['penalty']?>" data-event="<?= $sportsmen_day_2['action']?>" data-sportsmen="<?= $sportsmen_day_2['id'] ?>">
<?php
			}
?>
		</div>
		
		
		
		<div class="td line_max_3" data-value="super_score">
			<input class="input_db" value="<?= $A_score_1 + $E_score_1 + $sportsmens['difficulty'] -  $sportsmens['penalty'] ?>" data-event="<?= $sportsmens['action'] ?>" class="col_padding">
<?php
			if($sportsmens['final'] == 0) {
?>
				<input class="input_db" value="<?= $A_score_2 + $E_score_2 + $sportsmen_day_2['difficulty'] -  $sportsmen_day_2['penalty'] ?>" data-event="<?= $sportsmen_day_2['action']?>" data-sportsmen="<?= $sportsmen_day_2['id'] ?>">
<?php
			}
?>
		</div>
<?php
	if($sportsmens['final'] == 0) {

?>
		<div class="td line_max_3" data-value="total">
			<input class="input_db" value="<?= $TOTAL ?>">
		</div>
		
<?php
	} 
?>
<!--		 ------------------------------------------------------------------------------------------------>
<?php /*?>		<div class="none td line_max_3" data-value="cas_score_1">
			<input data-event="<?= $sportsmens['action'] ?>" type="hidden" value="<?= $sportsmens['cas_score_1'] ?>">
			<input data-event="<?= $sportsmen_day_2['action']?>" type="hidden" value="<?= $sportsmen_day_2['cas_score_1'] ?>">
		</div>
		
		<div class="none td line_max_3" data-value="cas_score_2">
			<input data-event="<?= $sportsmens['action'] ?>" type="hidden" value="<?= $sportsmens['cas_score_2'] ?>">
			<input data-event="<?= $sportsmen_day_2['action']?>" type="hidden" value="<?= $sportsmen_day_2['cas_score_2'] ?>">
		</div>
		
		<div class="none td line_max_3" data-value="cas_score_3">
			<input data-event="<?= $sportsmens['action'] ?>" type="hidden" value="<?= $sportsmens['cas_score_3'] ?>">
			<input data-event="<?= $sportsmen_day_2['action']?>" type="hidden" value="<?= $sportsmen_day_2['cas_score_3'] ?>">
		</div>
		
		<div class="none td line_max_3" data-value="cas_score_4">
			<input data-event="<?= $sportsmens['action'] ?>" type="hidden" value="<?= $sportsmens['cas_score_4'] ?>">
			<input data-event="<?= $sportsmen_day_2['action']?>" type="hidden" value="<?= $sportsmen_day_2['cas_score_4'] ?>">
		</div>
		
		<div class="none td line_max_3" data-value="cas_score_5">
			<input data-event="<?= $sportsmens['action'] ?>" type="hidden" value="<?= $sportsmens['cas_score_5'] ?>">
			<input data-event="<?= $sportsmen_day_2['action']?>" type="hidden" value="<?= $sportsmen_day_2['cas_score_5'] ?>">
		</div>
		
		<div class="none td line_max_3" data-value="cas_score_6">
			<input data-event="<?= $sportsmens['action'] ?>" type="hidden" value="<?= $sportsmens['cas_score_6'] ?>">
			<input data-event="<?= $sportsmen_day_2['action']?>" type="hidden" value="<?= $sportsmen_day_2['cas_score_6'] ?>">
		</div>
		
		<div class="none td line_max_3" data-value="cas_score_7">
			<input data-event="<?= $sportsmens['action'] ?>" type="hidden" value="<?= $sportsmens['cas_score_7'] ?>">
			<input data-event="<?= $sportsmen_day_2['action']?>" type="hidden" value="<?= $sportsmen_day_2['cas_score_7'] ?>">
		</div>
		
		<div class="none td line_max_3" data-value="cas_score_8">
			<input data-event="<?= $sportsmens['action'] ?>" type="hidden" value="<?= $sportsmens['cas_score_8'] ?>">
			<input data-event="<?= $sportsmen_day_2['action']?>" type="hidden" value="<?= $sportsmen_day_2['cas_score_8'] ?>">
		</div>
		
		<div class="none td line_max_3" data-value="return_score">
			<input type="hidden" value="<?= $sportsmens['return_score'] ?>">
		</div>

		<div class="none td line_max_3" data-value="return_judge_1">
			<input type="hidden" value="<?= $sportsmens['return_judge_1'] ?>">
		</div>

		<div class="none td line_max_3" data-value="return_judge_2">
			<input type="hidden" value="<?= $sportsmens['return_judge_2'] ?>">
		</div>

		<div class="none td line_max_3" data-value="return_judge_3">
			<input type="hidden" value="<?= $sportsmens['return_judge_3'] ?>">
		</div>

		<div class="none td line_max_3" data-value="return_judge_4">
			<input type="hidden" value="<?= $sportsmens['return_judge_4'] ?>">
		</div>

		<div class="none td line_max_3" data-value="return_judge_5">
			<input type="hidden" value="<?= $sportsmens['return_judge_5'] ?>">
		</div>

		<div class="none td line_max_3" data-value="return_judge_6">
			<input type="hidden" value="<?= $sportsmens['return_judge_6'] ?>">
		</div>

		<div class="none td line_max_3" data-value="return_judge_7">
			<input type="hidden" value="<?= $sportsmens['return_judge_7'] ?>">
		</div>

		<div class="none td line_max_3" data-value="return_judge_8">
			<input type="hidden" value="<?= $sportsmens['return_judge_8'] ?>">
		</div>

		<div class="none td line_max_3" data-value="final">
			<input type="hidden" value="<?= $sportsmens['final'] ?>">
		</div>

		<div class="none td line_max_3" data-value="rang">
			<input type="hidden" value="<?= $sportsmens['rang'] ?>">
		</div>

		<div class="none td line_max_3" data-value="pause">
			<input type="hidden" value="<?= $sportsmens['pause'] ?>">
		</div>

		<div class="none td line_max_3" data-value="day_2">
			<input type="hidden" value="<?= $sportsmens['day_2'] ?>">
		</div>

		<div class="none td line_max_3" data-value="allow_to_show">
			<input type="hidden" value="<?= $sportsmen['allow_to_show'] ?>">
		</div>

		<div class="none td line_max_3" data-value="name">
			<input type="hidden" value="<?= $sportsmen['name'] ?>">
		</div>

		<div class="none td line_max_3" data-value="sportsmen_category">
			<input type="hidden" value="<?= $sportsmen['sportsmen_category'] ?>">
		</div>

		<div class="none td line_max_3" data-value="country">
			<input type="hidden" value="<?= $sportsmen['country'] ?>">
		</div>

		<div class="none td line_max_3" data-value="current">
			<input type="hidden" value="<?= $sportsmen['current'] ?>">
		</div>
<!--	<?php */?>
		
<?php
		if($sportsmens['final'] != 0) {
			$color == 'green';
		} else {
			$color == 'red';
		}
?>		
		
		<span class="del_row" id="del_<?= $i ?>" style="color: red; font-weight: bold">X</span>
		<div style="background:<?= $color ?>" class="finalist" data-final="<?= $sportsmens['final'] ?>">NOT PASSED</div>
		<div class="admin_overlay"></div>
</div>
<?php
	$i++;
}