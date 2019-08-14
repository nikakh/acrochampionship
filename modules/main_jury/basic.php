<link rel="stylesheet" href="/styles/basic.css">
<link rel="stylesheet" href="/modules/main_jury/styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/modules/main_jury/scripts.js"></script>
<script src="/scripts/basic.js"></script> 

<div class="bg">
	<div class="content_div">
		<form action="/" id="main_jury_form" class="lg_12 lp_12 sm_0 md_0 xs_0 mj0">
			<h1 class="page_title col_padding">Main</h1>
			<div class="col_6">
				<div class="table">
		<!--		LOOP-->
					<div class="table_cell">
						<div class="col_padding column_name">
							<h4>ID</h4>
						</div>
						<div class="col_padding column_value" id="part_id">
							1
						</div>
					</div>
					<div class="table_cell">
						<div class="col_padding column_name">
							<h4>COLUMN</h4>
						</div>
						<div class="col_padding column_value">
							Column Value
						</div>
					</div>
		<!--		LOOP-->	
				</div>
			</div>
			<div class="col_6">
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
							<h5 class="page_title_h1">A<?= $i ?></h5>
							<span>0.00</span>
						</div>
					</div>
<?php 
				}			

				for($i = 1; $i < 5 ; $i++) {
?>
					<div id="E<?= $i ?>" class="low_jury">
						<div class="return"  data-id="E<?= $i ?>">Return</div>
						<div class="low_point e">
							<h5 class="page_title_h1">E<?= $i ?></h5>
							<span>0.00</span>
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