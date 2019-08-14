<?php
if(isset($_SESSION['judge'])) {
	$judge = mysql :: select_one('users',
									 "id = '".$_SESSION['judge']."'");
	
	$sportsmen = mysql :: select_one('sportsmens',
									 "id = '".CURRENT_SPORTSMEN."'");
?>

<script type="text/javascript" src="/scripts/swal.js" defer></script>
<script type="text/javascript" src="/modules/casual_judge/scripts.js" defer></script>
<link rel="stylesheet" href="/styles/basic.css">
<!--<link rel="stylesheet" href="/modules/casual_judge/styles.css">-->

<div class="before_pause"></div>
<div class="low_level_jury">
	<div class="col_double_padding" style="pointer-events: none;">
		<h4 class="page_title judge_name"><?= $judge['judge_category'] ?></h4>
	</div>
	
	<div class="contestant col_padding" id="ajax_on_ready">
		
	</div>
	
	<div class="calculator">
		<div id="calc_value">
			0.0
		</div>
		
		<div class="calc_numbers col_9 no_padding">
			<div class="col_4">
				<div class="calc_button" data-value="7">
					7
				</div>
			</div>
			
			<div class="col_4">
				<div class="calc_button" data-value="8">
					8
				</div>
			</div>
			
			<div class="col_4">
				<div class="calc_button" data-value="9">
					9
				</div>
			</div>
			
			<div class="col_4">
				<div class="calc_button" data-value="4">
					4
				</div>
			</div>
			
			<div class="col_4">
				<div class="calc_button" data-value="5">
					5
				</div>
			</div>
			
			<div class="col_4">
				<div class="calc_button" data-value="6">
					6
				</div>
			</div>
			
			<div class="col_4">
				<div class="calc_button" data-value="1">
					1
				</div>
			</div>
			
			<div class="col_4">
				<div class="calc_button" data-value="2">
					2
				</div>
			</div>
			
			<div class="col_4">
				<div class="calc_button" data-value="3">
					3
				</div>
			</div>
			
			<div class="col_4">
				<div class="calc_button" data-value=".">
					.
				</div>
			</div>
			
			<div class="col_8">
				<div class="calc_button"  data-value="0">
					0
				</div>
			</div>
		</div>
		<div class="action_buttons col_3 no_padding">
			<div class="col_12">
				<div class="action_button calc_button" id="delete">
					Delete
				</div>
			</div>
			
			<div class="col_12">
				<div class="action_button" id="clear">
					C
				</div>
			</div>
			
			<div class="col_12">
				<div class="action_button" id="enter">
					Enter
				</div>
			</div>
		</div>
		
		<div class="clear"></div>
		
	</div>
</div>
<input type="hidden" id="judge_id" value="<?= $_SESSION['judge'] ?>">
<?php
}