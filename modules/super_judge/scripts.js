'use strict';

let current_admin_sportsmen;

class NewRecord {
	constructor(name, country, category, balanced = false, dynamic = false, combined = false, a1, a2, a3, a4, e1, e2, e3, e4, diff, pen, total) {
		this.name = name;
		this.country = country;
		this.category = category;
		this.balanced = balanced;
		this.dynamic = dynamic;
		this.combined = combined;
		this.a1 = a1;
		this.a2 = a2;
		this.a3 = a4;
		this.a4 = a4;
		this.e1 = e1;
		this.e2 = e2;
		this.e3 = e3;
		this.e4 = e4;
		this.diff = diff;
		this.pen = pen;
		this.total = total;
	}
}

let chosen = 1;
let all_checked = false;
let A;
let E;
let PENALTY;
let DIFFICULTY;
let juries = new Map();
let query_object = {};
let KEYCODES = [49,50,51,52,53,54,55,56,57,48,46];
let s_dot_used = false;

juries.set('A1',false);
juries.set('A2',false);
juries.set('A3',false);
juries.set('A4',false);
juries.set('E1',false);
juries.set('E2',false);
juries.set('E3',false);
juries.set('E4',false);

let say = (a) => {console.log(a)};

let a_arr = new Array();
let e_arr = new Array();
let red = (a,b) => a + b;

let formula_1 = (arr) => (arr.reduce(red,0) - (Math.max(...arr) + Math.min(...arr))) / 2;
let formula_2 = (arr) => (arr.reduce(red,0) - (Math.max(...arr) + Math.min(...arr)));

let calculate_scores = () => {
	//CALCULATION with formula
	let a = $('.a span');
	for(let x  of a) {
		a_arr.push(+x.innerHTML);
	}
	
	// say(a_arr);
	
	let e = $('.e span');
	for(let x of e) {
		e_arr.push(+x.innerHTML);
	}
	
	// say(e_arr);
	
	A =  +formula_1(a_arr);
	
	// say(A);
//	console.log(A)
	E = +formula_2(e_arr);
//	console.log(E);
	
	// say(E);
	
	setTimeout(() => {
		PENALTY = +$('#penalty').val();
		DIFFICULTY = +$('#diff').val();
		
	   	// say(PENALTY);
	   	// say(DIFFICULTY);
		
		let result = A + E + DIFFICULTY - PENALTY;
		
		// say(result);
		
		A = E = DIFFICULTY = PENALTY = 0;
		a_arr = [];
		e_arr = [];
		a = [];
		e = [];
		
		// say(result.toFixed(2));
		
		$('#total').html(result.toFixed(2));
		return result;
	}, 10);
}

let prevent_letters = () => {
	$('#penalty').on('input', (e) => {
//		if(!$(e.target).val().substr(-1).match(/\d+/g) && $(e.target).val().substr(-1) != '.') {
//			$(e.target).val($(e.target).val().substr(0, $(e.target).val().length - 1));
//			
//		}
		calculate_scores();
	});
	
	$('#penalty').on('keypress',function(e){
		if($(e.target).val().indexOf('.') == -1) {
			s_dot_used = false;
		}
		if(!isNumber(e)) {
			return false;
		}
	});
	
	$('#diff').on('input', (e) => {
//		if(!$(e.target).val().substr(-1).match(/\d+/g) && $(e.target).val().substr(-1) != '.') {
//			$(e.target).val($(e.target).val().substr(0, $(e.target).val().length - 1));
//		};		
		calculate_scores();
	});
	
	$('#diff').on('keypress',function(e){
		if($(e.target).val().indexOf('.') == -1) {
			s_dot_used = false;
		}
		if(!isNumber(e)) {
			return false;
		}
	});
	
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
        return false;
    } 
	if(s_dot_used && charCode == 46) {
		return false;
	}
	if(charCode == 46){
		s_dot_used = true;
	}
    return true;
}
 
let s_pad_click = () => {
	$('#penalty').on('click',() => {
		chosen = 1;
	});
	
	$('#diff').on('click',() => {
		chosen = 2;
	});
	
	$('.pad_btn').on('click', (e) => {
		let x = '';
		
		if($(e.target).data("value") || $(e.target).data("value") == 0 || $(e.target).data("value") == '.') {
			x = $(e.target).data("value");	
		}
	
		if(chosen == 1) {
			if(!$('#penalty').val()) {
				$('#penalty').val('');
				if($(e.target).data('value') == '.'){ 
					return false;
				}	
			}
			
			if($('#penalty').val().length == 5 && $(e.target).data('value') == '.') {
				return false;
			}

			if($('#penalty').val().indexOf('.') == -1) {
				s_dot_used = false;
			} else {
				s_dot_used = true;
			}
			
			if($(e.target).data('value') == '.' && s_dot_used){ 
				return false;
			}	

			
			if($('#penalty').val().length < 6) {
				$('#penalty').val($('#penalty').val() + x);
			}
			
			if($(e.target).attr('id') == "delete"){ 
				$('#penalty').val($('#penalty').val().substr(0, $('#penalty').val().length - 1));
			}
			
			if($(e.target).attr('id') == "clear") {
				$('#penalty').val('');
			}
			
			if($(e.target).attr('id') == 'Enter') {
				document.getElementById("diff").focus();		
				chosen = 2;
				return 0;
			}
		}
		
		if(chosen == 2) {
			if(!$('#diff').val()) {
				$('#diff').val('');
				if($(e.target).data('value') == '.'){ 
					return false;
				}	
			}
			
			if($('#diff').val().length == 5 && $(e.target).data('value') == '.') {
				return false;
			}
			
			if($('#diff').val().indexOf('.') == -1) {
				s_dot_used = false;
			} else {
				s_dot_used = true;
			}
			
			if($(e.target).data('value') == '.' && s_dot_used){ 
				return false;
			}	
			
			if($('#diff').val().length < 6) {
				$('#diff').val($('#diff').val() + x);
			}
			
			if($(e.target).attr('id') == "delete"){ 
				$('#diff').val($('#diff').val().substr(0,$('#diff').val().length - 1));
			}
			
			if($(e.target).attr('id') == "clear") {
				$('#diff').val('');
				$('#diff').attr('required','false');
			}
			
			if($(e.target).attr('id') == 'Enter') {
				document.getElementById("penalty").focus();		
				chosen = 1;
			}
		}
		
		calculate_scores();

	});
}
	
let validation = () => {
	let counter = 0;
	let valid = false;
	
	let a_s = $('.a span');
	let e_s = $('.e span');
	for(let az of a_s) {
		if(+$(az).html() != 0){
			counter++;
		}
	}
	
	for(let ez of e_s) {
		if(+$(ez).html() != 0){
			counter++;
		}
	}
	
	if(counter == 8){
		valid = true;
	}
	
	counter = 0;
	
	return valid;
}
current_admin_sportsmen = $('#current_table_id_container').html();
console.log(current_admin_sportsmen);

let submit_form = (e) => {
    e.preventDefault();

	if(validation()) {
		let a = $('.a span')
		for(let x  of a) {
			a_arr.push(+(x.innerHTML));
		}

		let e_2 = $('.e span')
		for(let x  of e_2) {
			e_arr.push(+(x.innerHTML));
		}

		query_object = {
			"ID" : +$('#current_sportsmen').html().trim(),
			"A1" :  +$('.a span').eq(0).html(), 
			"A2" :  +$('.a span').eq(1).html(), 
			"A3" :  +$('.a span').eq(2).html(), 
			"A4" :  +$('.a span').eq(3).html(), 
			"E1" :  +$('.e span').eq(0).html(), 
			"E2" :  +$('.e span').eq(1).html(), 
			"E3" :  +$('.e span').eq(2).html(), 
			"E4" :  +$('.e span').eq(3).html(), 
			"A" : formula_1(a_arr),
			"E" : formula_2(e_arr),
			"Difficulty" :  +$('#diff').val(), 
			"Penalty": +$('#penalty').val(),
			"TOTAL" : +$('#total').html()

		};	 	
		
		swal({
		  title: "Success!",
		  text: false,
		  showCancelButton: true,
		  confirmButtonClass: "btn-success",
		  confirmButtonText: "OK!",
		  closeOnConfirm: true,
		  className:'success_submit'
		});
		
		
		$('.success_submit .swal-button--confirm').on('click', function() {
			get_ajax({'PAUSE' : 1, 'CURRENT_SPORTSMEN' : $('#current_sportsmen').html()},'/modules/admin/ajax/set_pause.php','#calc_value','POST', 0);
			
			$('#pause').fadeIn();
			a_arr = [];
			e_arr = [];
			$('#diff').val('');
			$('#penalty').val('');
			$('#total').html('0.00');
			
			current_admin_sportsmen = $('#current_table_id_container').html();
//			console.log(current_admin_sportsmen);
//			get_ajax({'CURRENT_SPORTSMEN' : current_admin_sportsmen, 'rating' : true},'/modules/table/id.php','#rate','POST',0);
//			get_ajax({'CURRENT_SPORTSMEN' : current_admin_sportsmen, 'show_scoreboard' : true},'/modules/rating/ajax/rating.php','#rate','POST',1);
			
			get_ajax({'true' : 'true'},'includes/basic/current_sportsmen.php','#current_sportsmen','POST', 1);
		});


	} else {
		swal({
		  title: "Fail!",
		  text: "Please Wait for other judges to submit their score!",
		  showCancelButton: true,
		  confirmButtonClass: "btn-error",
		  confirmButtonText: "ok!",
		  closeOnConfirm: true
		});
	}
	
	validation();
}

let return_score = () => {
	$('.return').off();
	$('.return').on('click', function() {
		let return_obj = {
		'A1' : false,
		'A2' : false,
		'A3' : false,
		'A4' : false,
		'A1' : false,
		'A2' : false,
		'A3' : false,
		'A4' : false
	}
	if($(this).data('id') == 'E'){			
		clicked_jury = $(this).data('id') + (+$(this).data('judge_id') - 4);
	} else {
		clicked_jury = $(this).data('id') + $(this).data('judge_id');
	}
	console.log(clicked_jury);
	return_obj[clicked_jury] = true;
	console.log(return_obj);
		
	
	});
}

let s_check_length = () => {
	$('#diff').on('input', (e) => {
		let input = $(e.target);
		if($(e.target).val() >= 6) {
		 input.val(input.val().substr(0,6));
		}
	});
};



$(window).on('load',() => {
	console.log(query_object);
	s_check_length();
	prevent_letters();
	s_pad_click();
	return_score();
	$('#submit').on('click',submit_form);

});

$(document).ready(function() {
	setInterval(function() {
		get_ajax({'true' : true},'/modules/main_jury/ajax/table_id.php','#current_table_id_container','POST');
	},500);
	
	setInterval(function() {
		get_ajax({'CURRENT_SPORTSMEN' : $('#current_sportsmen').html()},'/modules/main_jury/ajax/column_value.php','#table','POST');
	},1000);
	
	setInterval(function() {
		get_ajax({'ID' : query_object.ID,
		  'A1' : query_object.A1,
		  'A2' : query_object.A2,
		  'A3' : query_object.A3,
		  'A4' : query_object.A4, 
		  'E1' : query_object.E1, 
		  'E2' : query_object.E2,  
		  'E3' : query_object.E3, 
		  'E4' : query_object.E4,
		  'A' : query_object.A,
		  'E' : query_object.E,
		  'DIFFICULTY' : query_object.Difficulty,
		  'PENALTY' : query_object.Penalty,
		  'TOTAL' : query_object.TOTAL,
		  'CURRENT_SPORTSMEN' : $('#current_sportsmen').html()},'/modules/main_jury/ajax/ajax_main_judge.php','#low_juries','POST');
		//console.log(query_object);
	},1000);
	
	$('#submit').on('click', function() {
		setTimeout(function() {
			// console.log(query_object.TOTAL);
			get_ajax({'ID' : query_object.ID,
				  'A1' : query_object.A1,
				  'A2' : query_object.A2,
				  'A3' : query_object.A3,
				  'A4' : query_object.A4, 
				  'E1' : query_object.E1, 
				  'E2' : query_object.E2,  
				  'E3' : query_object.E3, 
				  'E4' : query_object.E4,
				  'A' : query_object.A,
				  'E' : query_object.E,
				  'DIFFICULTY' : query_object.Difficulty,
				  'PENALTY' : query_object.Penalty,
				  'TOTAL' : query_object.TOTAL,
				  'CURRENT_SPORTSMEN' : $('#current_sportsmen').html()},'/modules/main_jury/ajax/ajax_scores_insert.php','#ajax_load_div','POST');
					setTimeout(function(){
						console.log(query_object);
					},1000);
			},20);
	});
});