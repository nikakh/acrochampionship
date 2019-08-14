<script src="https://maxcdn.bootsdivapcdn.com/bootsdivap/3.4.0/js/bootsdivap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootsdivapcdn.com/bootsdivap/3.4.0/css/bootsdivap.min.css">

<script type="text/javascript" src="/scripts/swal.js" defer></script>

<link rel="stylesheet" href="/styles/basic.css">
<link rel="stylesheet" href="/modules/admin/styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/modules/admin/scripts.js"></script>

<style>
#pause {
	display: none!important;
}
</style>
<script>

</script>

<div class="bg">
	<div id="nav">
		<div class="sidebar">
			<div class="add_options">
				<input class="add_input"  type="text" id='add_name' placeholder="Name(s)">
				<input class="add_input" type="text" id='add_nf' placeholder="National Federation">
				<input class="add_input" type="text" id='add_cn' placeholder="Country">
				<input class="add_input" type="text" id='add_ct' placeholder="Category">
				<input class="add_input" type="text" id='ev1' placeholder="Exercise 1">
				<input class="add_input" type="text" id='ev2' placeholder="Exercise 2">
				<div class="add_submit nav_btn" id='add_submit'>Add</div>	
			</div>
			<div class="filter_options">
				<div class="checkgroup">
					<div class="nav_btn f_drop">	
						<h3>Country</h3>
						<div class="countries">
							<label>
								<input type="radio" name="country" value="GEO">
								<span>GEO</span>
							</label>
							<label>
								<input type="radio" name="country" value="USA">
								<span>USA</span>
							</label>
							<label>
								<input type="radio" name="country" value="AZE">
								<span>AZE</span>
							</label>
							<label>
								<input type="radio" name="country" value="UKR">
								<span>UKR</span>
							</label>
							<label>
								<input type="radio" name="country" value="ISR">
								<span>ISR</span>
							</label>	
							<label>
								<input type="radio" name="country" value="ARM">
								<span>ARM</span>
							</label>	
						</div>
					</div>
					<div class="nav_btn f_drop">
						<h3>Categories</h3>
						<div class="categories">
							<label>
								<input type="radio" name="category" value="9-16">
								<span>9-16</span>
							</label>
							<label>
								<input type="radio" name="category" value="wg 9-16">
								<span>WG 9-16</span>
							</label>
							<label>
								<input type="radio" name="category" value="mg 10-18">
								<span>MG 10-18</span>
							</label>
							<label>
								<input type="radio" name="category" value="mg 9-16">
								<span>MG 9-16</span>
							</label>
							<label>
								<input type="radio" name="category" value="mp 9-16">
								<span>MP 9-16</span>
							</label>
							<label>
								<input type="radio" name="category" value="mp 11-19">
								<span>MP 11-19</span>
							</label>	
							<label>
								<input type="radio" name="category" value="mp-seniors">
								<span>MP SENIORS</span>
							</label>	
							<label>
								<input type="radio" name="category" value="mxp 11-19">
								<span>MXP 11-19</span>
							</label>
							<label>
								<input type="radio" name="category" value="mxp-seniors">
								<span>MXP SENIORS</span>
							</label>
							<label>
								<input type="radio" name="category" value="mxp 9-16">
								<span>MXP 9-16</span>
							</label>	
							<label>
								<input type="radio" name="category" value="mxp 10-18">
								<span>MXP 10-18</span>
							</label>
							<label>
								<input type="radio" name="category" value="wg 10-18">
								<span>WG 10-18</span>
							</label>	
							<label>
								<input type="radio" name="category" value="wg-SENIORS">
								<span>WG SENIORS</span>
							</label>	
							<label>
								<input type="radio" name="category" value="wg 11-19">
								<span>WG 11-19</span>
							</label>
							<labeL>
								<input type="radio" name="category" value="wg 9-16">
								<span>WG 9-16</span>
							</label>	
							<labeL>
								<input type="radio" name="category" value="wp 9-16">
								<span>WP 9-16</span>
							</label>
							<labeL>
								<input type="radio" name="category" value="wp 10-18">
								<span>WP 10-18</span>
							</label>	
							
						</div>
					</div>
				</div>
				<div class="filter_submit nav_btn" id='filter_submit'>Filter</div>	
				<div class="unset_filter nav_btn" id='unset_filter'>Unset Filter</div>	
			</div>	
			<div class="start_functions">
				<div class="day_choose">
					<div>
						<input id="day_1" type="radio" name="day" value="0" checked><label for="day_1">Round 1</label>
					</div>
					<div>
						<input id="day_2" type="radio" name="day" value="1"><label for="day_2">Round 2</label>	
					</div>
				</div>
				<input type="text"  class="add_input" id="start_id" placeholder="Input start ID">
				<div class="nav_btn add_submit" id="start_from_id">Go</div>
			</div>
		</div>
		<div class="tables col_padding">
			<div id="toQual" class="tab_table">
				<div class="folder_icon col_padding">
					<img src="/images/list.png" alt="list icon">
				</div>
				<h4 class="col_padding" style="text-align: center;">Qualifying round</h4>
			</div>
			<div id = "toFinal" class="tab_table">
				<div class="folder_icon col_padding">
					<img src="/images/list.png" alt="list icon">
				</div>
				<h4 class="col_padding">Final</h4>
			</div>
		</div>
		<div class="button_group col_padding">
			<div class="nav_btn reset">
				<div class="col_padding" id="reset">
					RESET
				</div>
			</div>
<!--
			<div class="nav_btn show_rating">
				<div class="col_padding" id="show_rating">
					show rating
				</div>
			</div>
			<div class="nav_btn scores">
				<div class="col_padding" id="table_scores">
					REFRESH SCOREBOARD
				</div>
			</div>
-->
			
			<div class="nav_btn restart">
				<div class="col_padding">
					FORCE RESTART
				</div>
			</div>
			<div class="add_remove nav_btn">
				<div class="col_padding toClick">
					Add/Remove
				</div>
				<div class="db_functions">
					<div class="col_padding nav_btn" id="mark_all">Mark all</div>
					<div class="col_padding nav_btn" id="delete">Delete Marked</div>
					<div class="col_padding nav_btn" id="add">Add row</div>
<!--					<div class="col_padding nav_btn" id="save">Save Changes</div>	-->
				</div>
			</div>
					
			<div class="nav_btn manipulation">
				<div class="col_padding toClick">
					Manipulation
				</div>
				<div class="db_functions">
					<div class="col_padding nav_btn" id="admin_pause">Pause</div>
					<div class="col_padding nav_btn" id="start">Resume</div>
					<div class="col_padding nav_btn" id="startFrom" title="Mark one row, to start from it.">Start from:</div>
				</div>
			</div>
					
					
			<div class="nav_btn filters">
				<div class="col_padding toClick">
					Filters
				</div>
				<div class="db_functions">
					<div class="col_padding nav_btn filter_btn" id="sort">Sort by Rank</div>
					<div class="col_padding nav_btn filter_btn" id="sortID">Sort by ID</div>
					<div class="col_padding nav_btn filter_btn" id="filter">Filter by:</div>
				</div>
			</div>	
			
			<div class="col_padding nav_btn" id="print">Print</div>
		</div> 
	</div>
	<div class="nav_back"></div>
	
	
	<div class="table_block" id="DivToPrint">
	<div class="admin_pause_block">
		<div>
			<h3 class="col_double_padding">
				The programm is running,
				To change anything press <strong style="color: green">PAUSE</strong> button
			</h3>
		</div>
	</div>
		<div class="header">
			<img src="/images/logo1.jfif" alt="">
			<p>The First International Tournament in Acrobatic Gymnastics “GURGENIDZE ACRO CUP” 10-14 August 2019 Tbilisi.   Georgia</p>
			<img src="/images/logo2.jfif" alt="">
		</div>
		<hr>
		<h1>TABLE 1</h1>
		<h3 id="filter_title">QUALIFYING ROUND RESULTS</h3>
		<div class="database">
		  <div class="thead">
			<div class="trh">
			  <div></div>
			  <div class="col_double_padding"></div>
			  <div class="td line_max_3" data-value="id">#</div>
			  <div class="td line_max_3" data-value="Participant">Participant(s)</div>
			  <div class="td line_max_3" data-value="Natioanl_federation">National Federation</div>
			  <div class="td line_max_3" data-value="Event">Event</div>
			  <div class="td line_max_3" data-value="Diff">Diff</div>
			  <div class="td line_max_3" data-value="A">A</div>
			  <div class="td line_max_3" data-value="E">E</div>
			  <div class="td line_max_3" data-value="P">P</div>
			  <div class="td line_max_3" data-value="Score">Score</div>
			  <div class="td line_max_3" data-value="Total">Total</div>
			</div>
		  </div>
		  <div class="tbody" id="admin_data"></div>
		</div>
	</div>
	<div class="clear"></div>
</div>