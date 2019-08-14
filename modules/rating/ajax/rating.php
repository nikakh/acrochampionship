<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';
?>
<link rel="stylesheet" href="/modules/rating/owlcarousel/dist/assets/owl.carousel.min.css">
<script src="/modules/rating/owlcarousel/dist/owl.carousel.js"></script>
<link rel="stylesheet" href="/modules/rating/owlcarousel/dist/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="/styles/basic.css"> 
<link rel="stylesheet" href="/modules/rating/styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

<script src="/modules/rating/scripts.js" defer></script>
<?php
	$sportmsen = mysql :: select('sportsmens',
								 "suka = 1",
								 'super_score DESC');

	$sportmsen_in = mysql :: select_one('sportsmens',
							 	 	 	'suka = 1');
?>  

<div class="rating">
	<div class="rating_header content_div col_padding" id="ajax_rating">
		<img class="col_padding" src="/images/logo1.jfif" alt="logo" style="width: 10vw;">
		<h1 class="col_padding r_category" style="font-size: 5vh" class="category_name_rating" data-category_name="<?= $sportmsen_in['sportsmen_category'] ?>"><?= $sportmsen_in['sportsmen_category'] ?></h1>
		<h1 class="col_padding r_action" style="font-size: 5vh" class="category_name_rating" data-action="<?= $sportmsen_in['action'] ?>"><?= $sportmsen_in['action'] ?></h1>
		<img class="col_padding" src="/images/logo2.jfif" alt="logo"  style="width: 10vw">
	</div>
	<div class="rating_box content_div col_padding">
		<div class="box_head">
			<h4 style="text-align: center;" class="r_place col_1">Place</h4>
			<h4 style="text-align: center;" class="r_country col_2">Country</h4>
			<h4 class="name col_7">Name</h4>
			<h4 style="text-align: center;" class="r_points col_2">Points</h4>
			<div class="clear"></div>
		</div>
		<div id="ra0" class="owl-carousel"></div>
<?php

					$sportmsen = mysql :: select('sportsmens',
												 "id != 0 AND final = 1",
												 'super_score DESC');
			
?>
					<div class="box_body removed" style="display: none">
<?php
					$i = 1;
					foreach($sportmsen as $sportmsen) {
						
?>

							<div class="r_row" data-category_val="<?= $sportmsen['sportsmen_category'] ?>" data-action="<?= $sportmsen['action'] ?>">
								<div style="text-align: center;" class="col_1 contestant_place">
								</div>
								<div style="text-align: center;" class="r_country col_2">
									<div class="col_12 no_padding country_with_img">
										<img src="countries/<?= $sportmsen['country'] ?>.jpg" alt="<?= $sportmsen['country'] ?>">
									</div>
								<?php /*?>	<div class="col_4 no_padding"><?= $sportmsen['country'] ?></div><?php */?>
								</div>
								<div class="name col_7"><?= $sportmsen['name']?></div>
<?php
							
							$sportsmen_day_2 = mysql :: select_one('sportsmens',
									  					"id = '".$sportmsen['id']."' AND final = 1");
						
							$A_arr = [$sportmsen['cas_score_1'],$sportmsen['cas_score_2'],$sportmsen['cas_score_3'],$sportmsen['cas_score_4']];
							$E_arr = [$sportmsen['cas_score_5'],$sportmsen['cas_score_6'],$sportmsen['cas_score_7'],$sportmsen['cas_score_8']];


							$A_score_1 = (array_sum($A_arr) - (max($A_arr) + min($A_arr))) / 2;
							$E_score_1 = (array_sum($E_arr) - (max($E_arr) + min($E_arr)));
							$A_score_2 = 0;
							$E_score_2 = 0;
							if($sportsmen_day_2) {		
								$A_arr_2 = [$sportsmen_day_2['cas_score_1'],$sportsmen_day_2['cas_score_2'],$sportsmen_day_2['cas_score_3'],$sportsmen_day_2['cas_score_4']];
								$E_arr_2 = [$sportsmen_day_2['cas_score_5'],$sportsmen_day_2['cas_score_6'],$sportsmen_day_2['cas_score_7'],$sportsmen_day_2['cas_score_8']];

								$A_score_2 = (array_sum($A_arr_2) -(max($A_arr_2) + min($A_arr_2))) / 2;
								$E_score_2 = (array_sum($E_arr_2) -(max($E_arr_2) + min($E_arr_2)));
							}
								$show_1 = $A_score_1 + $E_score_1 + $sportmsen['difficulty'] - $sportmsen['penalty'];
								 if($sportsmen_day_2) {
									 $show_1 = $show_1 + $A_score_2 + $E_score_2 + $sportmsen_day_2['difficulty'] - $sportmsen_day_2['penalty'];
								 }
?>
								<div style="text-align: center;" class="points col_2"><?= $sportsmen_day_2['super_score'] ?></div>
								<div class="clear"></div>
							</div>			

<?php
						$i++;
						}
?>
					</div>
	</div>
</div>

<script>
var place_counter1 = 0;
var k1 = 0;
var new_block;
var row_set = new Set();
var set_length = 0;

	//		$('.box_body').eq(0).remove();	

	
//		setTimeout(function(){
//		},200);
	
	console.log("alive");
	
	
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
		 k1 = 0;
		 new_block;		
		for(let row of $('.r_row.active')) {
			row_set.add($(row).find('.name').html());
			if(k1 % 3 == 0) {
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
			
			if( k1 % 3 == 2 || k1 == $('.r_row.active').length - 1 ){
				$('#ra0').append($(new_block));
				console.log("appended");
			}
			k1++;
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
		place_counter1++;
		$('.owl-item:not(.cloned) .r_row.active .contestant_place').eq(i).html(place_counter1);
	}
	
	
	current_admin_sportsmen = $('#current_table_id_container').html();
	get_ajax({'CURRENT_SPORTSMEN' : current_admin_sportsmen},'/modules/rating/ajax/rating_table.php','#ajax_rating','POST',1);
</script>