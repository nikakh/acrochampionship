<link rel="stylesheet" href="/styles/basic.css">
<link rel="stylesheet" href="/modules/table/styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/modules/rating/owlcarousel/dist/owl.carousel.min.js"></script>
<script src="/modules/table/scripts.js" defer></script>
<script src="/scripts/basic.js"></script>

<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';
	$sportsmen_current = mysql :: select_one ('sportsmens',
										 	  "suka = 1");
?>


<style>
	#pause {
		display: none!important;
	}
</style>
<div id="rate" style="display: none">
	<?php //require($_SERVER['DOCUMENT_ROOT'].'/modules/rating/ajax/rating.php') ?>
</div>

<div id="current_table_id_container" style="display: none">
<?php
	echo $sportsmen_current['id'];
?>
	
	
</div>

<div class="scoreboard" id="scoreboard">

</div>



<div class="nav_btn show_rating" style="position: absolute;left: 0; bottom: 0; z-index: 1000; cursor: pointer;">
	<div class="col_padding" id="show_rating" style="width: 100px;">
		
	</div>
</div>
<div class="nav_btn scores"  style="position: absolute;left: 100px;; bottom: 0; height: 20px; z-index: 1000; cursor: pointer; width: 100px;">
	<div class="col_padding" id="table_scores" style="width: 100px;">
		
	</div>
</div>

<script>
$(document).ready(function() {
	
	
	localStorage.setItem('x', false);
	$('#show_rating').off();
	$('#show_rating').click(function() {
		console.log("123");
		localStorage.setItem('x', true);
		current_admin_sportsmen = $('#current_table_id_container').html();
		console.log(current_admin_sportsmen);
		get_ajax({'CURRENT_SPORTSMEN' : current_admin_sportsmen},'/modules/rating/ajax/rating.php','#rate','POST',1);
	});

	$('#table_scores').click(function() {
		localStorage.setItem('x', false);
		console.log("123");
		current_admin_sportsmen = $('#current_table_id_container').html();
		console.log(current_admin_sportsmen);
		get_ajax({'CURRENT_SPORTSMEN' : current_admin_sportsmen},'/modules/rating/ajax/rating.php','#rate','POST',1);
	});
	
	setInterval(function() {
		if(localStorage.getItem('x') == 'false') {
			$('#rate').css('cssText','display: none !important');
		} else {
			$('#rate').css('cssText','display: block !important');

		}
	},1000);;
	 $(window).bind('storage', function (e) {
		current_admin_sportsmen = $('#current_table_id_container').html();
		console.log(current_admin_sportsmen);
		get_ajax({'CURRENT_SPORTSMEN' : current_admin_sportsmen},'/modules/rating/ajax/rating.php','#rate','POST',1);
	 });
});

</script>