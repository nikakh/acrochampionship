'use strict';

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
let valid = false;
let all_checked = false;
let A;
let E;
let PENALTY;
let DIFFICULTY;
let juries = new Map();
let query_object = {};
let KEYCODES = [49,50,51,52,53,54,55,56,57,48,46];

juries.set('A1',false);
juries.set('A2',false);
juries.set('A3',false);
juries.set('A4',false);
juries.set('E1',false);
juries.set('E2',false);
juries.set('E3',false);
juries.set('E4',false);


let a_arr = new Array();
let e_arr = new Array();
let red = (a,b) => a + b;

let formula_1 = (arr) => (arr.reduce(red,0) - (Math.max(...arr) + Math.min(...arr))) / 2;
let formula_2 = (arr) => (arr.reduce(red,0) - (Math.max(...arr) + Math.min(...arr)));

let calculate_scores = () => {
	//CALCULATION with formula
	let a = $('.a span')
	for(let x  of a) {
		a_arr.push(+(x.innerHTML));
	}
	
	let e = $('.e span')
	for(let x  of e) {
		e_arr.push(+(x.innerHTML));
	}
	A =  formula_1(a_arr);
//	console.log(A)
	E = formula_2(e_arr);
//	console.log(E);
	setTimeout(() => {
		PENALTY = +$('#penalty').val();
		DIFFICULTY = +$('#diff').val();
		let result = A + E + DIFFICULTY - PENALTY;
		A = E = DIFFICULTY = PENALTY = 0;
		a_arr = [];
		e_arr = [];
		a = [];
		e = [];
		$('#total').html(result.toFixed(2));
		return result;
	}, 10);
}

let prevent_letters = () => {
	$('#penalty').on('keypress', (e) => {
		let toReplace = e.keyCode;
		if(!KEYCODES.includes(e.keyCode)){
//			console.log(toReplace);
			setTimeout(() => {	
				let newVal = +$(e.target).val().replace(String.fromCharCode(e.keyCode),'');
				$(e.target).val(newVal);
			}, 1);
		}
	});
	
	$('#penalty').on('input', (e) => {
		if(!$(e.target).val().substr(-1).match(/\d+/g) && $(e.target).val().substr(-1) != '.') {
			$(e.target).val($(e.target).val().substr(0, $(e.target).val().length - 1));
			
		}
		calculate_scores();
	});
			
	$('#diff').on('keypress', (e) => {
		let toReplace = e.keyCode;
		if(!KEYCODES.includes(e.keyCode)){
//			console.log(toReplace);
			setTimeout(() => {	
				$(e.target).val($(e.target).val().replace(String.fromCharCode(e.keyCode),''));
			}, 1);
		}
	});
	
	$('#diff').on('input', (e) => {
		if(!$(e.target).val().substr(-1).match(/\d+/g) && $(e.target).val().substr(-1) != '.') {
			$(e.target).val($(e.target).val().substr(0, $(e.target).val().length - 1));
		};		
		calculate_scores();
	});
}

let pad_click = () => {
	$('#penalty').on('click',() => {
		chosen = 1;
	});
	
	$('#diff').on('click',() => {
		chosen = 2;
	});
	
	$('.pad_btn').on('click', (e) => {
		let x = '';
		
		if($(e.target).data("value") || $(e.target).data("value") == 0) {
			x = $(e.target).data("value");	
		}
	
		if(chosen == 1) {
			if(!$('#penalty').val()) {
				$('#penalty').val('');
			}
			
			if($('#penalty').val().length < 6) {
				$('#penalty').val($('#penalty').val() + x);
			}
			
			if($(e.target).attr('id') == "delete"){ 
				$('#penalty').val($('#penalty').val().substr(0,$('#penalty').val().length - 1));
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
	if($('#penalty').val().length > 0 && $('#diff').val().length > 0) {
		valid = true;
	} 	
	
	for(let z of juries.keys()) {
		if(juries.get(z)) {
			counter ++;
		}
	}
	
	if(counter == 8) {
		all_checked = true;
	}
	
	if(valid && all_checked) {
		return true;
	} else {
		return false;
	}
}

let submit_form = (e) => {
    e.preventDefault();
/*	if(validation()) {
		$('main_jury_form').submit();
		calculate_scores();
		//request//
		//request//
		//request//
		//request// 
	} else {
		calculate_scores();
	}*/
	let a = $('.a span')
	for(let x  of a) {
		a_arr.push(+(x.innerHTML));
	}
	
	let e_2 = $('.e span')
	for(let x  of e_2) {
		e_arr.push(+(x.innerHTML));
	}
	
	query_object = {
		"ID" : +$('#part_id').html().trim(),
		"A1" :  $('.a span').eq(0).html(), 
		"A2" :  $('.a span').eq(1).html(), 
		"A3" :  $('.a span').eq(2).html(), 
		"A4" :  $('.a span').eq(3).html(), 
		"E1" :  $('.e span').eq(0).html(), 
		"E2" :  $('.e span').eq(0).html(), 
		"E3" :  $('.e span').eq(0).html(), 
		"E4" :  $('.e span').eq(0).html(), 
		"A" : formula_1(a_arr),
		"E" : formula_2(e_arr),
		"Difficulty" :  $('#diff').val(), 
		"Penalty": $('#penalty').val(),
		"TOTAL" : $('#total').html()
		
	};	 
	a_arr = [];
	e_arr = [];
}

let return_score = () => {
	$('.return').on('click', (e) => {
		let r_id = $(e.target).data("id");
		juries.set(r_id, false);
		//request//
		//request//
		//request//
		//request//
	});
}

let check_length = () => {
	$('#diff').on('input', (e) => {
		let input = $(e.target);
		if($(e.target).val() >= 6) {
		 input.val(input.val().substr(0,6));
		}
	});
};



$(window).on('load',() => {
	check_length();
	prevent_letters();
	pad_click();
	return_score();
	$('#submit').on('click',submit_form);

});

$(document).ready(function() {
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
		  'CURRENT_SPORTSMEN' : $('#current_sportsmen').html()},'/modules/main_jury/ajax/ajax_score_insert.php','#low_juries','POST');
		console.log(query_object);
	},2000);
	
	$('#submit').on('click', function() {
		setTimeout(function() {
			console.log(query_object.TOTAL);
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
				console.log(query_object);
			},20);
	});
});