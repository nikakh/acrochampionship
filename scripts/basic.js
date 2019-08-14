'use strict';

var current_table_id;

function get_ajax(datas,ajax_file_url,div_id,method,html = 1,succesfunction = 0) {
	$.ajaxSetup({cache: false});
	
	$.ajax({
		'type': method,
		'url': ajax_file_url,
		'data': {'datas': datas},
		'success': function(data) {
			if(!succesfunction) {
				if(html === 1) {
					$(div_id).html(data);
//					console.log(div_id);
				} else {
					
				}
			} else {
				swal({
				  title: "Success!",
				  text: false,
				  showCancelButton: true,
				  confirmButtonClass: "btn-success",
				  confirmButtonText: "OK!",
				  closeOnConfirm: true
				});
			}
		}
	}); 
}

setInterval(function () {
	get_ajax({'true' : 'true'},'includes/basic/current_sportsmen.php','#current_sportsmen','POST', 1);
}, 1000);

setInterval(function () {
	get_ajax({'CURRENT_SPORTSMEN' : $('#current_sportsmen').html(), 'JUDGE_ID' : $('#judge_id').val()},'includes/basic/pause.php','#pause','POST', 1);
}, 3000);

$(document).ready(function() {
	var dasd = 2;
	get_ajax({'CURRENT_SPORTSMEN' : $('#current_sportsmen').html(), 'JUDGE_ID' : $('#judge_id').val()},'includes/basic/pause.php','#pause','POST', 1);
	
	
	
	$('#table_scores').on('click', function() { 
		$('#current_table_id').val($('#current_sportsmen').html());
		current_table_id = $('#current_table_id').val();
		get_ajax({'CURRENT_SPORTSMEN' : current_table_id},'/modules/table/id.php','#scoreboard','POST', 1);
	});

	$('#force_restart').on('click', function() {
		get_ajax({'restart' : 1},'/includes/basic/force_restart.php','#scoreboard','POST', 0);
	});
	
	//get_ajax({'PAUSE' : 1, 'CURRENT_SPORTSMEN' : $('#current_sportsmen').html(), 'all' : true},'/modules/admin/ajax/set_pause.php','#calc_value','POST', 0);
//	window.onbeforeunload = function() {
//        return false;
//	};  
});
