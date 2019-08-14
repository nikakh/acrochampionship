<?php
if(!empty($_SESSION['super_judge'])) {
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="/styles/basic.css">
<link rel="stylesheet" href="/modules/super_judge/styles.css">
<script type="text/javascript" src="/scripts/swal.js" defer></script>



<script src="/modules/super_judge/scripts.js"></script>
<script src="/scripts/basic.js"></script> 


<div class="bg">
	<div class="content_div">
		<form action="/" id="main_jury_form" class="lg_12 lp_12 sm_0 md_0 xs_0 mj0">
			<h1 class="page_title col_padding">Main</h1>
			<div class="col_8">
				<div class="table" id="table"></div>
			</div>
			<div class="col_4">
				<div class="col_padding col_6">
					<input class="main_score" type="text" id="penalty" required="true" maxlength="6">
					<label>Penalty</label>
				</div> 
				<div class="col_padding col_6">
					<input class="main_score" type="text" id="diff" required="true">
					<label>Difficulty</label>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			
			<div class="low_juries col_padding" id="low_juries">
<?php
				for($i = 1; $i < 5 ; $i++) {
?>
					<div id="A<?= $i ?>" class="low_jury">
						<div class="return" data-id="A<?= $i ?>">Return</div>
						
						<div class="a low_point">
							<h5 class="page_title_h1">A_<?= $i ?></h5>
							<span>...</span>
						</div>
					</div>
<?php 
				}			

				for($i = 1; $i < 5 ; $i++) {
?>
					<div id="E<?= $i ?>" class="low_jury">
						<div class="return"  data-id="E<?= $i ?>">Return</div>
						<div class="low_point e">
							<h5 class="page_title_h1">E_<?= $i ?></h5>
							<span>...</span>
						</div>
					</div>
<?php
				}			
?>
			</div>
			
			<div class="col_padding bottom">
				<div class="pad">
					<div class="left_side">
<?php
					for($i = 9; $i > 0; $i--) {
?>
						<div class="pad_btn" id="n<?= $i ?>" data-value="<?= $i?>">
							<h1><?= $i ?></h1>
						</div>
<?php	
					}					
?>
					</div>
					<div class="middle">
						<div class="pad_btn" id="delete">
								<p>Delete</p>
						</div>
						<div class="pad_btn" id="dot" data-value=".">
							<h1>.</h1>
						</div>
						<div class="pad_btn" id="n0" data-value="0">
							<h1>0</h1>
						</div>
					</div>
					<div class="right_side">
						<div class="pad_btn" id="clear">
							<h1>C</h1>
						</div>					
						<div class="pad_btn" id="Enter" >
							<h1>Enter</h1>
						</div>
					</div>
				</div>
				<div class="main_score total_score">
					<h3>Total:</h3>
					<h1 id="total">0.00</h1>
					<div id="submit">SUBMIT</div>
				</div>
			</div>
			<div class="clear"></div>
		</form>
		<div class="clear"></div>
	</div>
	<div id="ajax_load_div"></div>
</div>
<div id="current_table_id_container" style="display: none"></div>
<?php
}