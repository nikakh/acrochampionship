'use strict'

let k = 0;
let new_block;
let row_set = new Set();
let set_length = 0;

//		$('.box_body').eq(0).remove();	


//		setTimeout(function(){
//		},200);

current_admin_sportsmen = $('#current_table_id_container').html();
get_ajax({'CURRENT_SPORTSMEN' : current_admin_sportsmen},'/modules/rating/ajax/rating_table.php','#ajax_rating','POST',1);

$('#rate').css('display','block');
for(let i of $('.r_row')) {
	if($('.r_category').data('category_name') == $(i).data('category_val')) {
		$(i).css('display', 'flex').addClass('active');
//			console.log($(i));
//			if(k % 3 == 0) {
//				new_block =  document.createElement('div');
//				$(new_block).addClass('box_body');
//				console.log('block created');
//			}
//
//				$(new_block).append(i);
//				console.log('row added');
//
//			//if( k % 3 == 2 || k == $('.r_row.active').length - 1 ){
//				$('#ra0').append(new_block);
//				console.log('row dropped');
//			//}
//			k++;
//			//$('.contestant_place').eq(counter).html(counter);
//			console.log("length:" + $(i).length);
	} else {
		$(i).css('display', 'none');
		//console.log("asd: " + i);
	}
}

	full_info = $('.r_row.active');
	k = 0;
	new_block;		
	for(let row of $('.r_row.active')) {
		row_set.add($(row).find('.name').html());
		if(k % 3 == 0) {
			new_block =  document.createElement('div');
			$(new_block).addClass('box_body');
			console.log("created");
		}

			if(set_length < row_set.size) {
				$(new_block).append($(row));
				console.log($(new_block));
				console.log("added");
				set_length = row_set.size;
			}

		if( k % 3 == 2 || k == $('.r_row.active').length - 1 ){
			$('#ra0').append($(new_block));
			console.log("appended");
		}
		k++;
	}

	for(let block of $('.box_body')){
		if($(block).html() == '') {
			$(block).remove();
		}
	}

	console.log(row_set);
	row_set.clear();
	$('.removed').remove();

	set_length = 0;

	$('#ra0.owl-carousel').owlCarousel({
		loop: true,
		nav: false,		
		navElement: 'div class="col_padding" role="presentation"',
		navContainerClass: 'ol2',
		navClass: [
			'ol3',
			'ol4'
		],
		dots:false,
		dotsClass: 'ol5 col_padding',
		dotClass: 'ol6',
		smartSpeed: 1000,
		mouseDrag:false,
		autoplay: true,
		autoplayTimeout: 8000,
		items: 1,
		margin:50
	});




for(let i = 0; i < $('.owl-item:not(.cloned) .r_row.active .contestant_place').length; i++) {
	place_counter++;
	$('.owl-item:not(.cloned) .r_row.active .contestant_place').eq(i).html(place_counter);
}