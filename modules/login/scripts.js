'use strict'

let is_focused;

if($('#email').val() != '' && $('#pwd').val() != '') {
	$('#login_form').submit();
} else {
	alert('Please fill all the required fields');
}

function parse_array(arr) {
	let primary = arr.split(':');
	let secondary = new Map();
	for(let item of primary) {
		let divided = item.split(",");
		secondary.set(divided[0].replace(" ",""),divided[1].replace(" ",""));
	} 
	return(secondary);
}

function login(map) {
	let log = $('#email').val();
	let pas = $('#pwd').val();
	let keys = [...map.keys()];
	console.log(log);
	console.log(map);
	console.log(map.get(log));
	console.log(pas);
	console.log(log == map.get(log));
	if(keys.includes(log) && map.get(log) == pas){
		return true;
	} else {
		return false;
	}
	
}


setTimeout(function() {
	
	$('input').focusin(function() {
		$('.logo_div').hide(300);
		is_focused = true;
	});
	
}, 500);

$(window).on('load', function() {
	let full_data = [];
	full_data = $('#users_data').val();
	console.log(full_data);
	let data_array = parse_array(full_data);
	
	$('.form_button').on('click', function(e){
		if(login(data_array)) {
			$('#login_form').submit()
		} else {
			swal({
				title: "Incorrect username or password",
				type: 'error',
				button: {
					text: 'ok',
					className: 'btn-error'
				}
			});
		}
	});
});


