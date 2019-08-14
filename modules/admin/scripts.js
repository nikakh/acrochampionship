let count = 0;
let simple_row = {};
let table_arr = [];
let dot_used = false;
let checked_amount = 0;
let paused = false;
let current_table = '0';
let countries = ['AZE', 'UKR', 'GEO', 'USA', 'ISR', 'ARM'];
let id_for_current;


let say = (x) => {console.log(x);} 

let styles = "textarea {display:flex;align-items: center;height: 100px;border: none;resize:none} .finalist, .del_row{display:none;}.day_2_row_hide {display: none !important;}.table_block h3{color: #fff;margin-bottom: 30px;}.table_block{margin:auto;width:max-content;top:50px;display:block;position:relative;margin-left:300px;}.table_block h1{color:#fff;margin-bottom:30px;}.database{width:100%;color:#000;display:flex;flex-direction:column;}.database.thead{background-color:#F26430;z-index:5;display:flex;width:max-content;padding-right:9px;}.table{display:flex;flex-direction:column;}.tbody{/*border:1pxsolid#fff;*/border-radius:10px;border-top:none;display:flex;flex-direction:column;position:relative;margin-top:-10px;padding-top:10px;z-index:0;max-height:500px;background:rgba(255,255,255,0.05);width:max-content;}.tr,.trh{border-top:1px solid black;width:auto;display:flex;align-items:center;}.td,.th{text-align:center;;padding:10px;word-wrap:break-word;display:flex;align-items:center;justify-content:flex-start;text-align:left;flex-direction: column;}::-webkit-scrollbar{width:5px;position:fixed;}/*Track*/::-webkit-scrollbar-track{background:rgba(255,255,255,0.3);opacity:1;height:99%}/*Handle*/::-webkit-scrollbar-thumb{background:#F26430;}/*Handleonhover*/::-webkit-scrollbar-thumb:hover{background:#FF8A16;}.check{display:none}.check~label{display:none;}.before{content:'';display: none}.td:nth-child(3){width:30px!important;}.td:nth-child(4){width:150px!important;}.td:nth-child(5){width:150px!important;}.td:nth-child(6){width:60px!important;}.td:nth-child(7){width:60px!important;}.td:nth-child(8){width:60px!important;}.td:nth-child(9){width:60px!important;}.td:nth-child(10){width:60px!important;}.td:nth-child(11){width:70px!important;}.td:nth-child(12){width:70px!important;}.header{display:flex;justify-content:space-around;align-items:center;color:#fff;font-size:18px;}.header p{width:50%;margin:auto;color:#000}.header img{width:100px;height:auto;}hr{width:100%;margin-top:30px;margin-bottom:30px;}.td{display: flex;align-items: center;background: none;text-align: center;color: #000;position: relative;border: none;justify-content: center;}.td input {background: none;text-align: center;color: #000;border: none;width: 100%;}";
 
let event_1,r_id,national_federation,participant,event_2,diff_2,diff_1,A_2,A_1,E_2,E_1,P_2,P_1,score_2,score_1,total;

let cas_score_1_1,
	cas_score_1_2,
	cas_score_2_1,
	cas_score_2_2,
	cas_score_3_1,
	cas_score_3_2,
	cas_score_4_1,
	cas_score_4_2,
	cas_score_5_1,
	cas_score_5_2,
	cas_score_6_1,
	cas_score_6_2,
	cas_score_7_1,
	cas_score_7_2,
	cas_score_8_1,
	cas_score_8_2,
	return_judge_1,
	return_judge_2,
	return_judge_3,
	return_judge_4,
	return_judge_5,
	return_judge_6,
	return_judge_7,
	return_judge_8,
	final,
	rang,
	pause_db, 
	total_db,
	day_1_day_2,
	day_2_pause,
	day_2_rang,
	day_2_id,
	day_2_final,
	day_2_return_score,
	day_2_return_judge_1,
	day_2_return_judge_2,
	day_2_return_judge_3,
	day_2_return_judge_4,
	day_2_return_judge_5,
	day_2_return_judge_6,
	day_2_return_judge_7,
	day_2_return_judge_8,
	day_2_allow_to_show,
	day_2_name,
	day_2_sportsmen_category,
	day_2_country,
	day_1_allow_to_show,
	day_2_day_2;
	
let start_from_id = () => {
	if(paused) {	
		paused = false;
		let entered_id = $('#start_id').val();
		let day_chosen = $('.day_choose input[type="radio"]:checked').val();
		console.log(day_chosen);
		
		if(day_chosen == '0') {
			for(let row of $('.tr')){
				for(let column of $(row).find('.td')){
					let count = 0;
					if($(column).data('value') == 'id' && $(column).html() == entered_id){
						$('.tr').css('background-color', '');

						$(row).css('background-color', 'rgba(254, 241, 96, 0.6)');
						$('#current_sportsmen').html($(row).data('db_id'));
						get_ajax({'ADMIN_START_FROM' : $(row).data('db_id')},'/includes/basic/current_sportsmen.php','#admin_data','POST', 0);
						my_interval = setInterval(load_data, 1000);
						id_for_current =  $(row).data('db_id');
						let available = false;
						available = true;
						$('.sidebar').css('width', '0');
						$('.start_functions').removeClass('slideUp');
						setTimeout(function() {
							$('.start_functions').css('display', 'none');
						}, 300);
						break;
					}
					if(count == 5){ 
						count = 0;
						break;
					}
					count ++;
				}
			}
		} else {
			for(let row of $('.tr')){
				for(let column of $(row).find('.td')){
					let count = 0;
					if($(column).data('value') == 'id' && $(column).html() == entered_id) {
						$('.tr').css('background-color', '');
						$(row).css('background-color', 'rgba(254, 241, 96, 0.6)');
						
//						$('#current_sportsmen').html($(row).data('db_id'));
						let id_to_find = $(row).data('db_id');
						for(let row_in of $('.tr')) {
							if($(row_in).data('day_2') == id_to_find) {
								id_for_current = $(row_in).data('db_id');
							}
						}
						
						console.log(id_for_current + " THIS IS ME");
						
						get_ajax({'ADMIN_START_FROM' : id_for_current},'/includes/basic/current_sportsmen.php','#admin_data','POST', 0);
						my_interval = setInterval(load_data, 1000);
						let available = false;
						available = true;
						$('.sidebar').css('width', '0');
						$('.start_functions').removeClass('slideUp');
						setTimeout(function() {
							$('.start_functions').css('display', 'none');
						}, 300);
						break;
					}
					if(count == 5){ 
						count = 0;
						break;
					}
					count ++;
				}	
			}
		}
			
		
		console.log(entered_id + " ENTERED");
		console.log(id_for_current + "CURRENT");
		
		$('.admin_pause_block').fadeIn();
		get_ajax({'PAUSE' : 0, 'CURRENT_SPORTSMEN' : id_for_current, 'JUDGE_ID' : $('#judge_id').val(), 'all' : true},'/modules/admin/ajax/set_pause.php','#calc_value','POST', 0);
//		my_interval = setInterval(load_data, 1000);
		$('.admin_overlay').fadeIn();
		$('label').off();
		$('#add').off();
		$('#unset_filter').off();
		$('#add_submit').off();
		$('#sort').off();
		$('sortID').off();
		$('.td').off();
		$('#filter').off();
		$('#start_from_id').off();
		$('#startFrom').off();

		if(available) {
			swal({
				icon: 'success',
				title: 'SUCCESS',
				text: 'Row #' + entered_id + " Activated",
				button: {
					text: 'OK',
					className: 'btn-success'
				}
			}).then(function() {
				$('#current_sportsmen').html(entered_id);
				$('.admin_overlay').fadeIn();
			});
		} else {
			let wrapper = document.createElement('div');
			let title = document.createElement('h2');
			let text = document.createElement('p');
			$(text).html('Row #' + entered_id + " is not available");
			$(title).css({'color':'red','margin-bottom': '15px'});
			title.innerHTML = "ERROR";
			wrapper.appendChild(title);
			wrapper.appendChild(text);
			swal({
				icon: 'error',
				content: wrapper,
				titleColor: 'red',
				button: {
					text: 'OK',
					className: 'btn-error'
				}
			});
		}
	}
}

let delete_row = () => {
	$('#delete').on('click', () => {
		let str = '';
		let arr = document.getElementsByClassName('check');
		for(let x of arr) {
			setTimeout(() => {
				if(x.checked) {
					let id = ($(x).parents('.tr').data('db_id'));
					str += id + ',';
					console.log(str);
					$(x).parents('.tr').remove();
					get_ajax({'CURRENT_SPORTSMEN' : $('#current_sportsmen').html(), 'all' : true, 'delete_id_all' : str},'/modules/admin/ajax/edit_data/delete.php','#calc_value','POST', 0);					
				}
			},10);		
		}
	});
	
	$('.del_row').off();
	$('.del_row').on('click', function() {
		let del_id = $(this);
		
		let ida = $(this).parents('.tr').data('db_id');
		swal ({
			title: 'Are you sure?',
			text: 'You will not be able to restore deleted data',
			buttons: ["Cancel", "Confirm"],
		});
		
		$('.swal-button--confirm').on('click', function() {
			console.log(ida);
			get_ajax({'CURRENT_SPORTSMEN' : $('#current_sportsmen').html(), 'all' : true, 'delete_id' : ida},'/modules/admin/ajax/edit_data/delete.php','#calc_value','POST', 0);
			$(del_id).parents('.tr').remove();
			load_data();
		});
	});
}

let mark_all = () => {
	$('#mark_all').off();
	
	$('#mark_all').on('click', () => {
		let checkboxes = $('.check');

		for(let y of checkboxes) {
			if($(y).prop('checked') == true){
				checked_amount ++;
			}
		}
		
		checked_amount < checkboxes.length ? count = 0 : count = 1;
		checked_amount = 0;
		
		if(count == 0) {
			for(let y of checkboxes) {
				$(y).prop('checked', 'true');
			}
			$('.before').fadeIn(1);
			count = 1;
		} else {
			for(let y of checkboxes) {
				$(y).prop('checked', '');
			}
			$('.before').fadeOut(1);
			count = 0;
		}
	});
}

let reset = () => {
	$('.reset');
	$('.reset').on('click', () => {
		let str = '';
		let arr = document.getElementsByClassName('check');
		for(let x of arr) {
			setTimeout(() => {
				if(x.checked) {
					let id = ($(x).parents('.tr').data('db_id'));
					str += id + ',';
					console.log(str);
					$(x).parents('.tr').remove();
					get_ajax({'CURRENT_SPORTSMEN' : $('#current_sportsmen').html(), 'all' : true, 'reset_all' : str},'/modules/admin/ajax/edit_data/reset.php','#calc_value','POST', 0);					
				}
			},10);		
		}
	});
}

let print = () => {
	$('#print').on('click', function() {
	  let divToPrint = document.getElementById('DivToPrint');
	  let newWin = window.open('','Print-Window','_top');

	  newWin.document.open();

	  newWin.document.write('<html><body onload="window.print()">'
							+ "<style>" + styles + "</style>"
							+ divToPrint.innerHTML +
							'</body></html>');

	  newWin.document.close();

	  setTimeout(function(){newWin.close();},300);
	});
}

let get_full_data = () => {
	simple_row = {};
	table_arr = [];
	let rows = $('.tr');
	let row_cells = $(rows).find('.td');
	console.log($(rows).length)
	for(let row of rows) {	
		for(let col of $(row).find('.td')){
			
			if($(col).data('value') == 'id') {
				r_id = ($(col).parents('.tr').attr('id').replace("row_",''));			
			}
			
			if($(col).data('value') == 'super_score') {
					score_1 = ($(col).find('.input_db').eq(0).val());
					score_2 = ($(col).find('.input_db').eq(1).val());
			}
			
			
			if($(col).data('value') == 'total') {
				$(col).find('.input_db').val(+score_1 + (+score_2));	
				total = +score_1 + (+score_2);		
			}
			
//			if($(col).data('value') == 'name') {
//				participant = ($(col).html());			
//			}
//			
//			if($(col).data('value') == 'sportsmen_category') {
//				national_federation = ($(col).html());			
//			}
//			
//			if($(col).data('value') == 'action') {
//				if($(col).find('div').eq(0).data('event') == 'BALANCE') {
//					event_1 = ($(col).find('div').eq(0).html());
//					event_2 = ($(col).find('div').eq(1).html());
//				}
//				else if($(col).find('div').eq(0).data('event') == 'DYNAMIC') {
//					event_1 = ($(col).find('div').eq(0).html());
//					event_2 = ($(col).find('div').eq(1).html());
//				}
//			}
//			
//			if($(col).data('value') == 'difficulity') {
//				if($(col).find('.input_db').eq(0).data('event') == 'BALANCE') {
//					diff_1 = ($(col).find('.input_db').eq(0).html());
//					diff_2 = ($(col).find('.input_db').eq(1).html());
//				}
//				else if($(col).find('.input_db').eq(0).data('event') == 'DYNAMIC') {
//					diff_1 = ($(col).find('.input_db').eq(0).html());
//					diff_2 = ($(col).find('.input_db').eq(1).html());
//				}
//			}
			
//			if($(col).data('value') == 'total_a') {
//				if($(col).find('.input_db').eq(0).data('event') == 'BALANCE') {
//					A_1 = ($(col).find('.input_db').eq(0).html());
//					A_2 = ($(col).find('.input_db').eq(1).html());
//				}
//				else if($(col).find('.input_db').eq(0).data('event') == 'DYNAMIC') {
//					A_1 = ($(col).find('.input_db').eq(0).html());
//					A_2 = ($(col).find('.input_db').eq(1).html());
//				}
//			}
//			
//			if($(col).data('value') == 'total_e').input_db .input_db{
//				if($(col).find('.input_db').eq(0).data('event') == 'BALANCE') {
//					E_1 = ($(col).find('.input_db').eq(0).html());
//					E_2 = ($(col).find('.input_db').eq(1).html());
//				}
//				else if($(col).find('.input_db').eq(0).data('event') == 'DYNAMIC') {
//					E_1 = ($(col).find('.input_db').eq(0).html());
//					E_2 = ($(col).find('.input_db').eq(1).html());
//				}
//			}
//			
//			if($(col).data('value') == 'penalty') {
//				if($(col).find('.input_db').eq(0).data('event') == 'BALANCE') {
//					P_1 = ($(col).find('.input_db').eq(0).html());
//					P_2 = ($(col).find('.input_db').eq(1).html());
//				}
//				else if($(col).find('.input_db').eq(0).data('event') == 'DYNAMIC') {
//					P_1 = ($(col).find('.input_db').eq(0).html());
//					P_2 = ($(col).find('.input_db').eq(1).html());
//				}
//			}
			

			
//			if($(col).data('value') == 'cas_score_1') {
//				if($(col).find('input[type="hidden"]').eq(0).data('event') == 'BALANCE') {
//					cas_score_1_1 = ($(col).find('input[type="hidden"]').eq(0).val());
//					cas_score_1_2 = ($(col).find('input[type="hidden"]').eq(1).val());
//				}
//				else if($(col).find('input[type="hidden"]').eq(0).data('event') == 'DYNAMIC') {
//					cas_score_1_1 = ($(col).find('input[type="hidden"]').eq(0).val());
//					cas_score_1_2 = ($(col).find('input[type="hidden"]').eq(1).val());
//				}
//			}
//			
//			if($(col).data('value') == 'cas_score_2') {
//				if($(col).find('input[type="hidden"]').eq(0).data('event') == 'BALANCE') {
//					cas_score_2_1 = ($(col).find('input[type="hidden"]').eq(0).val());
//					cas_score_2_2 = ($(col).find('input[type="hidden"]').eq(1).val());
//				}
//				else if($(col).find('input[type="hidden"]').eq(0).data('event') == 'DYNAMIC') {
//					cas_score_2_1 = ($(col).find('input[type="hidden"]').eq(0).val());
//					cas_score_2_2 = ($(col).find('input[type="hidden"]').eq(1).val());
//				}
//			}
//			
//			if($(col).data('value') == 'cas_score_3') {
//				if($(col).find('input[type="hidden"]').eq(0).data('event') == 'BALANCE') {
//					cas_score_3_1 = ($(col).find('input[type="hidden"]').eq(0).val());
//					cas_score_3_2 = ($(col).find('input[type="hidden"]').eq(1).val());
//				}
//				else if($(col).find('input[type="hidden"]').eq(0).data('event') == 'DYNAMIC') {
//					cas_score_3_1 = ($(col).find('input[type="hidden"]').eq(0).val());
//					cas_score_3_2 = ($(col).find('input[type="hidden"]').eq(1).val());
//				}
//			}
//			
//			if($(col).data('value') == 'cas_score_4') {
//				if($(col).find('input[type="hidden"]').eq(0).data('event') == 'BALANCE') {
//					cas_score_4_1 = ($(col).find('input[type="hidden"]').eq(0).val());
//					cas_score_4_2 = ($(col).find('input[type="hidden"]').eq(1).val());
//				}
//				else if($(col).find('input[type="hidden"]').eq(0).data('event') == 'DYNAMIC') {
//					cas_score_4_1 = ($(col).find('input[type="hidden"]').eq(0).val());
//					cas_score_4_2 = ($(col).find('input[type="hidden"]').eq(1).val());
//				}
//			}
//			
//			if($(col).data('value') == 'cas_score_5') {
//				if($(col).find('input[type="hidden"]').eq(0).data('event') == 'BALANCE') {
//					cas_score_5_1 = ($(col).find('input[type="hidden"]').eq(0).val());
//					cas_score_5_2 = ($(col).find('input[type="hidden"]').eq(1).val());
//				}
//				else if($(col).find('input[type="hidden"]').eq(0).data('event') == 'DYNAMIC') {
//					cas_score_5_1 = ($(col).find('input[type="hidden"]').eq(0).val());
//					cas_score_5_2 = ($(col).find('input[type="hidden"]').eq(1).val());
//				}
//			}
//			
//			if($(col).data('value') == 'cas_score_6') {
//				if($(col).find('input[type="hidden"]').eq(0).data('event') == 'BALANCE') {
//					cas_score_6_1 = ($(col).find('input[type="hidden"]').eq(0).val());
//					cas_score_6_2 = ($(col).find('input[type="hidden"]').eq(1).val());
//				}
//				else if($(col).find('input[type="hidden"]').eq(0).data('event') == 'DYNAMIC') {
//					cas_score_6_1 = ($(col).find('input[type="hidden"]').eq(0).val());
//					cas_score_6_2 = ($(col).find('input[type="hidden"]').eq(1).val());
//				}
//			}
//			
//			if($(col).data('value') == 'cas_score_7') {
//				if($(col).find('input[type="hidden"]').eq(0).data('event') == 'BALANCE') {
//					cas_score_7_1 = ($(col).find('input[type="hidden"]').eq(0).val());
//					cas_score_7_2 = ($(col).find('input[type="hidden"]').eq(1).val());
//				}
//				else if($(col).find('input[type="hidden"]').eq(0).data('event') == 'DYNAMIC') {
//					cas_score_7_1 = ($(col).find('input[type="hidden"]').eq(0).val());
//					cas_score_7_2 = ($(col).find('input[type="hidden"]').eq(1).val());
//				}
//			}
//			
//			if($(col).data('value') == 'cas_score_8') {
//				if($(col).find('input[type="hidden"]').eq(0).data('event') == 'BALANCE') {
//					cas_score_8_1 = ($(col).find('input[type="hidden"]').eq(0).val());
//					cas_score_8_2 = ($(col).find('input[type="hidden"]').eq(1).val());
//				}
//				else if($(col).find('input[type="hidden"]').eq(0).data('event') == 'DYNAMIC') {
//					cas_score_8_1 = ($(col).find('input[type="hidden"]').eq(0).val());
//					cas_score_8_2 = ($(col).find('input[type="hidden"]').eq(1).val());
//				}
//			}
//			
//			if($(col).data('value') == 'return_score') {
//				return_score = ($(col).find('input[type="hidden"]').eq(0).val());
//			}
//			
//			if($(col).data('value') == 'return_judge_1') {
//				return_judge_1 = ($(col).find('input[type="hidden"]').eq(0).val());
//			}
//			
//			if($(col).data('value') == 'return_judge_2') {
//				return_judge_2 = ($(col).find('input[type="hidden"]').eq(0).val());
//				
//			}
//			
//			if($(col).data('value') == 'return_judge_3') {
//				return_judge_3 = ($(col).find('input[type="hidden"]').eq(0).val());
//			}
//			
//			if($(col).data('value') == 'return_judge_4') {
//				return_judge_4 = ($(col).find('input[type="hidden"]').eq(0).val());
//			}
//			
//			if($(col).data('value') == 'return_judge_5') {
//				return_judge_5 = ($(col).find('input[type="hidden"]').eq(0).val());
//			}
//			
//			if($(col).data('value') == 'return_judge_6') {
//				return_judge_6 = ($(col).find('input[type="hidden"]').eq(0).val());
//			}
//			
//			if($(col).data('value') == 'return_judge_7') {
//				return_judge_7 = ($(col).find('input[type="hidden"]').eq(0).val());
//			}
//			
//			if($(col).data('value') == 'return_judge_8') {
//				return_judge_8 = ($(col).find('input[type="hidden"]').eq(0).val());
//			}
//			
//			if($(col).data('value') == 'final') {
//				final = ($(col).find('input[type="hidden"]').eq(0).val());
//			}
//			
//			if($(col).data('value') == 'rang') {
//				rang = ($(col).find('input[type="hidden"]').eq(0).val());
//			}
//			
//			if($(col).data('value') == 'pause') {
//				pause_db = ($(col).find('input[type="hidden"]').eq(0).val());
//			}
			
			
//			if($(col).data('value') == 'day_1_day_2') {
//				day_1_day_2 = ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_pause') {
//				day_2_pause= ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_rang') {
//				day_2_rang= ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_id') {
//				day_2_id= ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_final') {
//				day_2_final= ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_return_score') {
//				day_2_return_score = ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_return_judge_1') {
//				day_2_return_judge_1 = ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_return_judge_2') {
//				day_2_return_judge_2= ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_return_judge_3') {
//				day_2_return_judge_3 = ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_return_judge_4') {
//				day_2_return_judge_4 = ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_return_judge_5') {
//				day_2_return_judge_5 = ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_return_judge_6') {
//				day_2_return_judge_6 = ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_return_judge_7') {
//				day_2_return_judge_7 = ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_return_judge_8') {
//				day_2_return_judge_8 = ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_allow_to_show') {
//				day_2_allow_to_show = ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_name') {
//				day_2_name = ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_sportsmen_category') {
//				day_2_sportsmen_category = ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_country') {
//				day_2_country = ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_2_day_2') {
//				day_2_day_2 = ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
//			if($(col).data('value') == 'day_1_allow_to_show') {
//				day_1_allow_to_show = ($(col).find('input[type="hidden"]').eq(0).val());			
//			}
//			
		
			simple_row = {
				'id': r_id,
//				'participant': participant,
//				'national_federation': national_federation,
//				'event_1' : event_1,
//				'event_2' : event_2,
//				'diff_1' : diff_1,
//				'diff_2' : diff_2,
//				'A_1' : A_1,
//				'A_2' : A_2,
//				'E_1' : E_1,
//				'E_2' : E_2,
//				'P_1' : P_1,
//				'P_2' : P_2,
				'score_1' : score_1,
//				'score_2' : score_2,
				'total' : total
//				'cas_score_1_1' : cas_score_1_1,
//				'cas_score_1_2' : cas_score_1_2,
//				'cas_score_2_1' : cas_score_2_1,
//				'cas_score_2_2' : cas_score_2_2,
//				'cas_score_3_1' : cas_score_3_1,
//				'cas_score_3_2' : cas_score_3_2,
//				'cas_score_4_1' : cas_score_4_1,
//				'cas_score_4_2' : cas_score_4_2,
//				'cas_score_5_1' : cas_score_5_1,
//				'cas_score_5_2' : cas_score_5_2,
//				'cas_score_6_1' : cas_score_6_1,
//				'cas_score_6_2' : cas_score_6_2,
//				'cas_score_7_1' : cas_score_7_1,
//				'cas_score_7_2' : cas_score_7_2,
//				'cas_score_8_1' : cas_score_8_1,
//				'cas_score_8_2' : cas_score_8_2,
//				'return_judge_1' : return_judge_1,
//				'return_judge_2' : return_judge_2,
//				'return_judge_3' : return_judge_3,
//				'return_judge_4' : return_judge_4,
//				'return_judge_5' : return_judge_5,
//				'return_judge_6' : return_judge_6,
//				'return_judge_7' : return_judge_7,
//				'return_judge_8' : return_judge_8,
//				'day_1_allow_to_show' : day_1_allow_to_show,
//				'final' : final,
//				'rang' : rang,
//				'pause_db' :  pause_db,
//				'day_1_day_2' : day_1_day_2,
//				'day_2_pause' : day_2_pause,
//				'day_2_rang' : day_2_rang,
//				'day_2_id' : day_2_id,
//				'day_2_final' : day_2_final,
//				'day_2_return_score' : day_2_return_score,
//				'day_2_return_judge_1' : day_2_return_judge_1,
//				'day_2_return_judge_2' : day_2_return_judge_2,
//				'day_2_return_judge_3' : day_2_return_judge_3,
//				'day_2_return_judge_4' : day_2_return_judge_4,
//				'day_2_return_judge_5' : day_2_return_judge_5,
//				'day_2_return_judge_6' : day_2_return_judge_6,
//				'day_2_return_judge_7' : day_2_return_judge_7,
//				'day_2_return_judge_8' : day_2_return_judge_8,
//				'day_2_allow_to_show' : day_2_allow_to_show,
//				'day_2_name' : day_2_name,
//				'day_2_sportsmen_category' : day_2_sportsmen_category,
//				'day_2_country' : day_2_country,
//				'day_2_day_2' : day_2_day_2
			};
			
		}	
		table_arr.push(simple_row);
	}
	
	console.log(table_arr);
	return(table_arr);
}

let sort_by_rank = () => {
	let j = 0;
	let list = get_full_data();	
	let newList;
	if(current_table != 1){
		newList = list.sort(compare);
	} else {
		newList = list.sort(compare_score);
	}
	console.log(current_table);
	console.log(newList);
	for(let item of newList) {
		setTimeout(function () {
			if(!$('#row_' + item.id).hasClass('day_2_row_hide') ){
				if($('#row_' + item.id).length){
					$("#row_" + item.id).css('order', j);
					j++;
				}
			}
		}, 10);
	}
	
}

let sort_by_id = () => {
	let k = 0;
	let list = get_full_data();	
	let newList = list.sort(compare_id);
	for(let item of newList) {
		$('#row_'+item.id).css('order', k);	
		k++;
	//	console.log(item.id);
	}
}

function compare(a, b) {
	  // Use toUpperCase() to ignore character casing
    const totalA = +a.total;
    const totalB = +b.total;

    let comparison = 0;
    if (totalA > totalB) {
      comparison = -1;
    } else if (totalB > totalA) {
      comparison = 1;
    }
    return comparison;
}

function compare_score(a, b) {
	  // Use toUpperCase() to ignore character casing
    const score1 = +a.score_1;
    const score2 = +b.score_1;

    let comparison = 0;
    if (score1 > score2) {
      comparison = -1;
    } else if (score2 > score1) {
      comparison = 1;
    }
    return comparison;
}

let filter = (country,category,final) => {
	
	if(!country) {
		country = '';
	}
	
	if(!category) {
		category = '';
	}
	
	if(!final && final != 0) {
		final = '';
	}
	
	let arguments = [country,category,final];
	
	console.log(arguments);
	
	let data = $('.for_filter');
	let count = 0;
	let arr = [];
	
	for(let arg of arguments) {
		if(arg != '') {
			arr.push(arg);
		}
	}
	
	if(arr.length != 0) {
		for(let x of data) {
			let a = $(x).data('country').replace(" ",'');
			let b = $(x).data('category').replace(" ",'');
			let c = $(x).parents('.tr').data('final');
			
			for(let j of arr) {
				if(j) {
					if(j.toString().toLowerCase().replace(" ",'') != a.toLowerCase().replace(" ",'') && '' + j.toString().toLowerCase().replace(" ",'') != b.toLowerCase().replace(" ",'') && j.toString() != c.toString()) {
						$(x).parents('.tr').css('display', 'none');
					} else if(j.toString().toLowerCase().replace(" ",'') == a.toLowerCase().replace(" ",'') || j.toString().toLowerCase().replace(" ",'') == b.toLowerCase().replace(" ",'') || j.toString() == c.toString()) {
						count++;
					}
				}
			}
//			say(count + " " + arr.length);
			console.log(count + " " + arr.length);
			if(count == arr.length) {
				$(x).parents('.tr').css('display', 'flex');
				say('good')
			} else {
				$(x).parents('.tr').css('display', 'none');
				say('bad');
			}
			
			let round_title =  current_table == "1" ?  "FINAL ROUND" : "QUALIFYING ROUND";
			$('#filter_title').html(round_title + " " + country + " " + category);
			
			count = 0;
		}
	}
}

let trigger_filter = () => {
	$('#filter_submit').on('click', () => {
		let country = $('.countries input[type="radio"]:checked').val();
		let category = $('.categories input[type="radio"]:checked').val();
		console.log(country + " "  + category + " " + current_table);
		filter(country,category,current_table);
	});
}

function compare_id(a, b) {
	  // Use toUpperCase() to ignore character casing
    const totalA = +a.id;
    const totalB = +b.id;

    let comparison = 0;
    if (totalA > totalB) {
      comparison = 1;
    } else if (totalB > totalA) {
      comparison = -1;
    }
    return comparison;
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
        return false;
    } 
	if(dot_used && charCode == 46) {
		return false;
	}
	if(charCode == 46){
		dot_used = true;
	}
    return true;
}
 
let dropdown = () => {
	$('.toClick').on('click', (e) => {
		if($(e.target).parent().find('.db_functions').css('display') == 'none'){	
			$('.db_functions').slideUp();
			$('.sidebar').css('width', '0');
			$('.add_options').removeClass('slideUp');	
			$('.add_options').slideUp();	
			$('.filter_options').removeClass('slideUp');	
			$('.filter_options').slideUp();	
			$('.sidebar').css('width', '0');
			$('.start_functions').removeClass('slideUp');
			setTimeout(function() {
				$('.start_functions').css('display', 'none');
			}, 300);
			$(e.target).parent().find('.db_functions').slideDown();
		} else {
			$('.db_functions').slideUp();
			$('.sidebar').css('width', '0');
			$('.add_options').removeClass('slideUp');	
			$('.filter_options').removeClass('slideUp');	
			$('.start_functions').removeClass('slideUp');
			setTimeout(function() {
				$('.add_options').css('display', 'none');
				$('.filter_options').css('display', 'none');
				$('.start_functions').css('display', 'none');
			}, 300);
		}
	});
} 

let addRow = () => {
	let name = $('#add_name').val();
	let nf = $('#add_nf').val();
	let cn = $('#add_cn').val();
	let ct = $('#add_ct').val();
	let ev1 = $('#ev1').val();
	let ev2 = $('#ev2').val();
	
	console.log(+$('.tr:last-of-type').data('db_id') + 1);
	
	if(name.length && nf.length && cn.length && ct.length && ev1.length && ev2.length) {
		get_ajax({
			'name': name, 
			'country' : cn,
			'sportsmen_category' : ct,
			'action_1' : ev1,
			'action_2' : ev2,
			'id' : +$('.tr:last-of-type').data('db_id') + 1
		},'/modules/admin/ajax/edit_data/add.php','#admin_data', 'POST',0);
	}
	
//	if(name.length > 0 && nf.length > 0) {
//		let all = get_full_data();
//		let arr = [];
//		let dbs = [];
//		let i = 0;
//		
//		for(let x of all) {
//			arr.push(i);
//			dbs.push(x.id);
//			i++;
////			say(x.id);
//		}

//		let number = Math.max(...arr) + 1;	 
//		let db_id = Math.max(...dbs) + 1;	
//		
//		if(number == 0) {
//			number = 1;
//		}
//		
//		if(db_id == 0) {
//			db_id = 1;
//		}
//		
//		if(+number < 0 || !number || number == '') {
//			number = 0;
//		} 
//		
//		if(+db_id < 0 || !db_id || db_id == '') {
//			db_id = 0;
//		} 
//		
//		number += 1;
//		
//		let row = `
//					<div data-db_id=${db_id} style="order: ${number}" class="tr" id="row_${number}">
//					  <input id="c${number}" class="col_padding check" type="checkbox"/>
//					  <label for="c${number}">
//						  <div class="before"></div>
//					  </label>
//					  <div class="td line_max_3" data-db_id=${db_id} data-value="id">${number}</div>
//					  <div contenteditable="true" class="td line_max_3" data-value="Participant">${name}</div>
//					  <div data-country="${cn}" data-category="${ct}" contenteditable="true" class="for_filter td line_max_3" data-value="National_federation">${nf}</div>
//					  <div contenteditable="true" class="td line_max_3" data-value="Event"><div class="col_padding">${ev1}</div><div>${ev2}</div></div>
//					  <div contenteditable="true" class="td line_max_3" data-value="Diff"><div class="col_padding">0</div><div>0</div></div>
//					  <div contenteditable="true" class="td line_max_3" data-value="A"><div class="col_padding">0</div><div>0</div></div>
//					  <div contenteditable="true" class="td line_max_3" data-value="E"><div class="col_padding">0</div><div>0</div></div>
//					  <div contenteditable="true" class="td line_max_3" data-value="P"><div class="col_padding">0</div><div>0</div></div>
//					  <div contenteditable="true" class="td line_max_3" data-value="Score"><div class="col_padding">0</div><div>0</div></div>
//					  <div contenteditable="true" class="td line_max_3" data-value="Total">${0}</div>
//					  <div contenteditable="true" class="none td line_max_3" data-value="cas_score_1">
//							<input data-event="${ev1}" type="hidden" value="0">
//							<input data-event="${ev2}" type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="cas_score_2">
//							<input data-event="${ev1}" type="hidden" value="0">
//							<input data-event="${ev2}" type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="cas_score_3">
//							<input data-event="${ev1}" type="hidden" value="0">
//							<input data-event="${ev2}" type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="cas_score_4">
//							<input data-event="${ev1}" type="hidden" value="0">
//							<input data-event="${ev2}" type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="cas_score_5">
//							<input data-event="${ev1}" type="hidden" value="0">
//							<input data-event="${ev2}" type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="cas_score_6">
//							<input data-event="${ev1}" type="hidden" value="0">
//							<input data-event="${ev2}" type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="cas_score_7">
//							<input data-event="${ev1}" type="hidden" value="0">
//							<input data-event="${ev2}" type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="cas_score_8">
//							<input data-event="${ev1}" type="hidden" value="0">
//							<input data-event="${ev2}" type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="return_score">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="return_judge_1">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="return_judge_2">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="return_judge_3">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="return_judge_4">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="return_judge_5">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="return_judge_6">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="return_judge_7">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="return_judge_8">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="allow_to_show">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="final">
//							<input type="hidden" value="1">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="rang">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="pause">
//							<input type="hidden" value="1">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_1_day_2">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_pause">
//							<input type="hidden" value="1">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_rang">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_id">
//							<input type="hidden" value="${db_id}">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_final">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_return_score">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_return_judge_1">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_return_judge_2">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_return_judge_3">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_return_judge_4">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_return_judge_5">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_return_judge_6">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_return_judge_7">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_return_judge_8">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_allow_to_show">
//							<input type="hidden" value="0">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_name">
//							<input type="hidden" value="${name}">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_sportsmen_category">
//							<input type="hidden" value="${ct}">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_country">
//							<input type="hidden" value="${cn}">
//						</div>
//
//						<div contenteditable="true" class="none td line_max_3" data-value="day_2_day_2">
//							<input type="hidden" value="0">
//						</div>
//						<div class="admin_overlay" style="display: none;"></div>
//
//					</div>`;

//		$('.tbody').append(row);
		
	
		$('.sidebar').css('width', 0);
		setTimeout(function() {
			$('.add_options').css('display', 'none');
		}, 300);
		
//		$('#filter_submit').off();
//		$('#filter_submit').on('click', () => {
//			let country = $('.countries input[type="radio"]:checked').val();
//			let category = $('.categories input[type="radio"]:checked').val();
//			filter(country,category);
//
//		});
//	
//		$('#unset_filter').off();
//		$('#unset_filter').on('click', unset_filter);
//		
//		mark_all();
//		
//		$('label').off();
//		$('label').on('click', (e)=> {
//			console.log($(e.target).find('.before').css('width'));
//			$(e.target).find('.before').fadeToggle();
//		});
//		
		$('#add_name').val('');
		$('#add_nf').val('');
		
//		$('#add_submit').off();
//		$('#add_submit').on('click', addRow);
//		
//		$('#save').off();
//		$('#save').on('click', function() {
//			get_ajax({'full_data' : get_full_data()},'/modules/admin/ajax/save_data.php','#admin_data','POST', 0);	
//		});
//	} else {
//		alert("Write correct information");
//	}
//}
	
	
}

let unset_filter  = () => {
	$('.tr').css('display', 'flex');
	let radio =$('.filter_options input[type = "radio"]');
	for(let x of radio) {
		$(x).prop('checked', false);
	}
	
	if(current_table == '0') {
		$('#filter_title').html('QUALIFYING ROUND RESULTS');
	} else {
		$('#filter_title').html('FINAL ROUND RESULTS');
	}
	sort_by_id();
}

let my_interval;

let check_one = () => {
	$('.tr label').off();
	$('.tr label').on('click', (e)=> {
//		console.log($(e.target).find('.before').css('width'));
		$(e.target).find('.before').fadeToggle();
		if($(e.target).find('input[type="checkbox]').prop('checked')){
			$(e.target).find('input[type="checkbox]').prop('checked', '');
		} else {
			$(e.target).find('input[type="checkbox]').prop('checked', 'true');
		}
	});
}

let final_sportsmen = () => {
	for(let f of $('.finalist')) {
		if($(f).data('final') == 1) {
			$(f).css('background', 'green');
			$(f).html('PASSED');
			$(f).parents('.tr').css('display','none');
		} else {
			$(f).css('background', 'red');
			$(f).html('NOT PASSED');
		}
	}
	
	$('.finalist').off();
	$('.finalist').on('click', function() {
		let fin = 0;
		row = $(this).parents('.tr').data('db_id');
		
		if($(this).data('final') == 0) {
			$(this).data('final', 1);
			$(this).parents('.tr').data('final', 1);
			fin = 1;
			$(this).css('background', 'green');
			$(this).html('PASSED');

		} else {
			$(this).css('background', 'red');
			$(this).html('NOT PASSED');

			$(this).data('final', 0);
			$(this).parents('.tr').data('final', 0);

			fin = 0;
		}
		
		get_ajax({'id' : row,
				  'final' : fin},
				  'modules/admin/ajax/edit_data/final.php','#admin_data','POST', 0);	
	});
}

let switch_tables = () => {
	$('.tab_table').off();
	$('.tab_table').on('click', function() {
		if($(this).attr('id') == 'toFinal') {
			$('#filter_title').html("FINAL ROUND RESULTS");
			current_table = '1';
			for(let row of $('.tr')) {
				$(row).css('display', 'none');
				if($(row).data('final') == 1) {
					$(row).css('display', 'flex');
				}
			}
		} else {
			$('#filter_title').html("QUALIFYING ROUND RESULTS");
			current_table = '0';
			for(let row of $('.tr')) {
				$(row).css('display', 'flex');
				if($(row).hasClass('day_2_row_hide')) {
					$(row).css('display', 'none');
				}
				if($(row).data('final') == 1) {
					$(row).css('display', 'none');
				}
			}
		}
	});
}

let show_rating = () => {
	$('.show_rating').off();
	$('.show_rating').on('click',function() {
	 let show = true;	
	 alert("clicked");
//	  $.ajax({
//		  type: 'POST',
//		  url: '/modules/table/basic.php',
//		  data: {'SHOW': show},
//		  success: function(data){
//			  console.log(data);
//					  $('#scoreboard_12').html(data);
//				  }
//		  });
	});
}
	
let load_data = () => {
		if(!id_for_current) {
			id_for_current = $('#current_sportsmen').html();
		}
		
		get_ajax({'CURRENT_SPORTSMEN' : id_for_current},'/modules/admin/ajax/admin_data.php','#admin_data','POST', 1);	
		
		let count = 0;
		
		for(let row of $('.tr')) {
			for(let column of $(row).find('.td')){
				if($(column).data('value') == 'id' && $(column).data('db_id') == id_for_current) {
					$('.tr').css('background-color', '');
					for(let r_row of $('.tr')) {
						if($(r_row).attr('id').replace('row_','') == $(row).data('day_2')){
							$(r_row).css('background-color', 'rgba(254, 241, 96, 0.6)');
							available = true;
							break;}
					}
				}
				if(count == 5){ 
					count = 0;
					break;
				}
				count ++;
			}
		}
	}

$(document).ready(function() {	
	my_interval = setInterval(load_data, 1000);
}); 


$(window).on('load', () => {
	
	setTimeout(function() {
	
	$('.bg').css('height', $(window).innerHeight() + 'px');
	
	check_one();
//		
//	$('#save').on('click', () => {
//		get_ajax({'full_data' : get_full_data()},'/modules/admin/ajax/save_data.php','#admin_data','POST', 0);	
//	});
//	
	$('#start').on('click', function() {
		if(paused) {
			$('.admin_pause_block').fadeIn();
			get_ajax({'PAUSE' : 0, 'CURRENT_SPORTSMEN' : $('#current_sportsmen').html(), 'JUDGE_ID' : $('#judge_id').val(), 'all' : true},'/modules/admin/ajax/set_pause.php','#calc_value','POST', 0);
			my_interval = setInterval(load_data, 1000);
			$('.admin_overlay').fadeIn();
			paused = false;
			$('label').off();
			$('#add').off();
			$('#unset_filter').off();
			$('#add_submit').off();
			$('#sort').off();
			$('sortID').off();
			$('.td').off();
			$('#filter').off();
			$('#start_from_id').off();
			$('#startFrom').off();
		}
	});
			
//	delete_row();
//	mark_all();
//	print();
	trigger_filter();
	dropdown();

	
	$('#admin_pause').on('click', function() {
		$('.admin_pause_block').fadeOut();
		
		if(!paused) {
			paused = true;
			get_ajax({'PAUSE' : 1, 'CURRENT_SPORTSMEN' : $('#current_sportsmen').html(), 'all' : true},'/modules/admin/ajax/set_pause.php','#calc_value','POST', 0);
//			setTimeout(function() {
			clearInterval(my_interval);
			$('.admin_overlay').fadeOut();
//			}, 100);		
			
			switch_tables();
			let count = 0;
			
			let entered_id = $('#start_id').val();
			for(let row of $('.tr')){
				for(let column of $(row).find('.td')){
					console.log("IM in");
					if($(column).data('value') == 'id' && $(column).data('db_id') == $('#current_sportsmen').html()){
						$('.tr').css('background-color', '');
						$(row).css('background-color', 'rgba(254, 241, 96, 0.6)');
						available = true;
						break;
					}
					if(count == 5){ 
						count = 0;
						break;
					}
					count ++; 
				} 
			}
			
			$('label').off();
			$('label').on('click', (e)=> {
			//	alert('hi');
		//		console.log($(e.target).find('.before').css('width'));
				$(e.target).find('.before').fadeToggle();
			});

			show_rating();
			reset();
			delete_row();
			mark_all();
			print();
			final_sportsmen();
			
			$('#add').off();
			$('#add').on('click', function() {
		//		console.log('hi');
				if($('.sidebar').width() > 0) {
					$('.sidebar').css('width', '0');
					$('.add_options').removeClass('slideUp');
					setTimeout(function() {
						$('.add_options').css('display', 'none');
					}, 300);

				} else {
					$('.add_options').css('display', 'block');
					setTimeout(function() {
						$('.sidebar').css('width', '300px');
						$('.add_options').addClass('slideUp');
					}, 10);
		//			console.log(':(');
				}
			});

			$('#unset_filter').off();
			$('#unset_filter').on('click', unset_filter);

			$('#sort').off();
			$('#sort').on('click',sort_by_rank);

			$('sortID').off();
			$('#sortID').on('click', sort_by_id);

			$('.td input').off();
			$('.td input').on('keypress',function(e){
				let current = $(e.target).parent().data('value');
				if(current == 'Diff' || current == 'A' || current == 'E' || current == 'P' || current == 'Score' || current == 'Total') {
					if($(e.target).val().indexOf('.') == -1) {
						dot_used = false;
					}
					if(!isNumber(e)) {
						return false;
					}
				}	
			});

			$('#filter').off();
			$('#filter').on('click', function() {
		//		console.log('hi');
				if($('.sidebar').width() > 0) {
					$('.sidebar').css('width', '0');
					$('.filter_options').removeClass('slideUp');
					setTimeout(function() {
						$('.filter_options').css('display', 'none');
					}, 300);

				} else {
					$('.filter_options').css('display', 'block');
					setTimeout(function() {
						$('.sidebar').css('width', '300px');
						$('.filter_options').addClass('slideUp');
					}, 10);
		//			console.log(':(');
				}
			});

			$('#add_submit').off();
			$('#add_submit').on('click', addRow);

			$('#start_from_id').off();
			$('#start_from_id').on('click', start_from_id);

			$('#startFrom').off();
			$('#startFrom').on('click', function(){//		console.log('hi');
		if($('.sidebar').width() > 0) {
			$('.sidebar').css('width', '0');
			$('.start_functions').removeClass('slideUp');
			setTimeout(function() {
				$('.start_functions').css('display', 'none');
			}, 300);

		} else {
			$('.start_functions').css('display', 'block');
			setTimeout(function() {
				$('.sidebar').css('width', '300px');
				$('.start_functions').addClass('slideUp');
			}, 10);
	//			console.log(':(');
		}
	});
			
			$('.input_db').off();
			$('.input_db').on('change', function() {
				let value = $(this).val();
				let data = $(this).parent().data('value');
				let row;
				
				if(data == 'name' || data == 'action'){
					value = "'" + value +"'";
				}
				
				if($(this).data('sportsmen')) {
					row = $(this).data('sportsmen');
				} else {
					row =  $(this).parents('.tr').data('db_id');
				}	
				
				if(data == 'sportsmen_category'){
					let country = $(this).val().split(" ")[0];
					let category = value.replace(country + " ",'');
					if(countries.includes(country)) {
						value = "'" + country + "','" + category +"'";
					} else {
						alert("SUCH COUNTRY DOES NOT EXIST");
						return false;
					}
				}
				
				console.log(row + " " + data + ' ' + value);
				
				get_ajax({'row_id' : row,
						  'column' : data,
						  'value' : value},
						  'modules/admin/ajax/edit_data/edit.php','#admin_data','POST', 0);			
			});
			
			$('.input_db').on('keypress',function(e){
				let current = $(e.target).parent().data('value');
				if(current == 'difficulty' || current == 'total_a' || current == 'total_e' || current == 'penalty' || current == 'super_score' || current == 'total') {
					if($(e.target).val().indexOf('.') == -1) {
						dot_used = false;
					}
					if(!isNumber(e)) {
						return false;
					}
				}	
			});
			
//			$('.restart').off();
//			$('.restart').on('click', function() {
//				console.log(paused);
//				if(paused) {
//					get_ajax({'restart' : 1} ,'includes/basic/force_restart.php','#admin_data','POST',0);
//				}
//			}); 
		}
	});
		
 }, 10);
});
