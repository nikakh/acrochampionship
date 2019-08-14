'use strict';

let ca_calc_start_1 = true;
let val = 0;
let c_dot_used;
let check_return_val = true;
let JUDGE_ID;
let current_sportsmen_id;
let return_interval;
let interval_state;

let check_length = () => {
	$('#calc_value').on('input', (e) => {
		let input = $(e.target);
		if($(e.target).val() >= 6) {
		 input.val(input.val().substr(0,6));
		}
	});
};

$('#calc_value').on('keypress', (e) => {
	let toReplace = e.keyCode;
	if(!KEYCODES.includes(e.keyCode)){
//			console.log(toReplace);
		setTimeout(() => {	
			$(e.target).val($(e.target).val().replace(String.fromCharCode(e.keyCode),''));
		}, 1);
	}
});

$('#calc_value').on('input', (e) => {
	if(!$(e.target).val().substr(-1).match(/\d+/g) && $(e.target).val().substr(-1) != '.') {
		$(e.target).val($(e.target).val().substr(0, $(e.target).val().length - 1));
	}		
	//calculate_scores();
});

let pad_click = () => {

	$('.calc_button').on('click', (e) => {
		let x = '';
		
		check_return_val = false;
		
		if($('#calc_value').html() == '0.0') {
			$('#calc_value').html('0.0');
			if($(e.target).data('value') == '.'){ 
				return false;
			}	
		}

		if($('#calc_value').html().length == 5 && $(e.target).data('value') == '.') {
			return false;
		}

		if($('#calc_value').html().indexOf('.') == -1) {
			c_dot_used = false;
		} else {
			c_dot_used = true;
		}

		if($(e.target).data('value') == '.' && c_dot_used){ 
			return false;
		}

		if(ca_calc_start_1) {
			$('#calc_value').html('');
			ca_calc_start_1 = false;
		}
		
		val = $('#calc_value').html();

		if($(e.target).data("value") || $(e.target).data("value") == 0) {
			x = $(e.target).data("value");	
		}
		
		if(val.length < 6) {
			$('#calc_value').html($('#calc_value').html() + x);
			val = $('#calc_value').html();
		}

		$(this).text(function(index, text){
			return text.replace(/(\s+)?.$/, '');
		});
		
		if(check_return_val) {
			current_sportsmen_id = $('#current_sportsmen').html();
			return_interval = setInterval(function() {
				current_sportsmen_id = $('#current_sportsmen').html();
				get_ajax({'VALUE' : val, 'JUDGE_ID' : JUDGE_ID, 'CURRENT_SPORTSMEN' : current_sportsmen_id },'/modules/casual_judge/ajax/check_return.php','#calc_value','POST', 1);
			}, 1000);
		} else {
			clearInterval(return_interval);
		}
		
	});		
};

let delete_input = () => {
	$('#delete').click(function() {
		$('#calc_value').text(function(index, text){
        	return text.replace(/(\s+)?.$/, '');
		});
		
		if($('#calc_value').html() == 0) {
			$('#calc_value').html('0.0');
			ca_calc_start_1 = true; 
		}
	});
};

let clear = () => {
	$('#clear').click(function() {
		$('#calc_value').html('0.0');
		ca_calc_start_1 = true; 
	});
};

$(window).on('load', function() {
	check_length();
	pad_click();
	delete_input();
	clear();
	console.log(current_sportsmen_id);
});

function check_return_foo() {

}

$(document).ready(function() {

	setInterval(function () {
		get_ajax({'true' : 'true'},'includes/basic/current_sportsmen.php','#current_sportsmen','POST', 1);
	}, 1000);
	
	JUDGE_ID = $('#judge_id').val();
	
	setInterval(function() {
		current_sportsmen_id = $('#current_sportsmen').html();
		get_ajax({'VALUE' : val, 'JUDGE_ID' : JUDGE_ID, 'CURRENT_SPORTSMEN' : current_sportsmen_id },'/modules/casual_judge/ajax/ajax_on_ready.php','#ajax_on_ready','POST', 1);
	},1200);
	
	if(check_return_val) {
		current_sportsmen_id = $('#current_sportsmen').html();
		return_interval = setInterval(function() {
			current_sportsmen_id = $('#current_sportsmen').html();
			get_ajax({'VALUE' : val, 'JUDGE_ID' : JUDGE_ID, 'CURRENT_SPORTSMEN' : current_sportsmen_id },'/modules/casual_judge/ajax/check_return.php','#calc_value','POST', 1);
		}, 1000);
		interval_state = true;
	} else {
		clearInterval(return_interval);
	}
	
//	setInterval(function() {
//		if($('#casual_judge_true').val() == 'return_true') {
//			if(interval_state == true) {
//				swal({
//				  title: "Please enter your score again",
//				  text: false,
//				  showCancelButton: true,
//				  confirmButtonClass: "btn-success",
//				  confirmButtonText: "OK!",
//				  closeOnConfirm: true
//				}).then(function() {
//					clearInterval(return_interval);
//					interval_state = false;
//				});
//			}
//		}
//	},1000)


	$('#enter').on('click', function() {
		get_ajax({'VALUE' : val, 'JUDGE_ID' : JUDGE_ID, 'CURRENT_SPORTSMEN' : current_sportsmen_id},'/modules/casual_judge/ajax/ajax_casual_judge.php','#ajax_load_div_casual','POST');
		$('#calc_value').html('0.0');
		val = '0.0';
		ca_calc_start_1 = true;
		check_return_val = false;
		swal({
		  title: "Success!",
		  text: false,
		  showCancelButton: true,
		  confirmButtonClass: "btn-success",
		  confirmButtonText: "OK!",
		  closeOnConfirm: true,
		  closeOnClickOutside: false
		})
		.then(function() {
			JUDGE_ID = $('#judge_id').val();
			get_ajax({'PAUSE' : 1, 'CURRENT_SPORTSMEN' : $('#current_sportsmen').html(), 'JUDGE_ID': JUDGE_ID},'/modules/admin/ajax/set_pause.php','#calc_value','POST', 0);
			setInterval(return_interval, 1000);
			$('.before_pause').fadeIn(800);
			setTimeout(function() {
				$('.before_pause').css('display','none');
			},2000);
			
			check_return_val = true;
		
			if(check_return_val) {
				current_sportsmen_id = $('#current_sportsmen').html();
				return_interval = setInterval(function() {
					current_sportsmen_id = $('#current_sportsmen').html();
					get_ajax({'VALUE' : val, 'JUDGE_ID' : JUDGE_ID, 'CURRENT_SPORTSMEN' : current_sportsmen_id },'/modules/casual_judge/ajax/check_return.php','#calc_value','POST', 1);
				}, 1000);

			} else {
				clearInterval(return_interval);
			}
		});	
	});

});