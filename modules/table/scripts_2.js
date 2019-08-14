let current_admin_sportsmen;
let counter = 0;
let place_counter = 0;
let full_info = $('.r_row.active');
function divide_sportsmens () {


}


$(window).on('load', function() {
//	setInterval(function() {
//		get_ajax({'true' : 'true'},'includes/basic/current_sportsmen.php','#current_sportsmen','POST', 1);
//	},20000)
	
	$('.nav input').val('');
	
//	setTimeout(function() {
//		current_admin_sportsmen = $('#current_table_id_container').html();
//		get_ajax({'CURRENT_SPORTSMEN' : current_admin_sportsmen},'/modules/rating/ajax/rating.php','#rate','POST',1);
//	},4000)
//	
    setInterval(function() {
		current_admin_sportsmen = $('#current_table_id_container').html();
		get_ajax({'CURRENT_SPORTSMEN' : current_admin_sportsmen},'/modules/table/ajax/sportsmen.php','#scoreboard','POST',1);
	}, 1000);
});