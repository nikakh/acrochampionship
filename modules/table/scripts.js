let current_admin_sportsmen;

$(window).on('load', function() {

	
	//	setTimeout(function() {
	//		current_admin_sportsmen = $('#current_table_id_container').html();
	//		get_ajax({'CURRENT_SPORTSMEN' : current_admin_sportsmen},'/modules/rating/ajax/rating.php','#rate','POST',1);
	////		divide_sportsmens();
	//	},4000);
	
	current_admin_sportsmen = $('#current_table_id_container').html();
	get_ajax({'CURRENT_SPORTSMEN' : current_admin_sportsmen},'/modules/rating/ajax/rating.php','#rate','POST',1);
	
//	setInterval(function() {
//		get_ajax({'true' : 'true'},'includes/basic/current_sportsmen.php','#current_sportsmen','POST', 1);
//	},20000)
	
	$('.nav input').val('');
	
    setInterval(function() {
		current_admin_sportsmen = $('#current_table_id_container').html();
		get_ajax({'CURRENT_SPORTSMEN' : current_admin_sportsmen},'/modules/table/ajax/sportsmen.php','#scoreboard','POST',1);
	}, 1000);
	
	
});

