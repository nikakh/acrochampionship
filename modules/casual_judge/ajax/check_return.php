<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/mysql/mysql.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/includes/basic/current_sportsmen.php';

if($_POST) {
	if(isset($_POST['datas']['VALUE'])) {
		$VALUE = (int)$_POST['datas']['VALUE'];
	}
	
	if(isset($_POST['datas']['JUDGE_ID'])) {
		$JUDGE_ID = (int)$_POST['datas']['JUDGE_ID'];
	}

	$sportsmen = mysql :: select_one('sportsmens',
									 "id = '".$_POST['datas']['CURRENT_SPORTSMEN']."'");
							  
	if($sportsmen['return_score'] == 1 && $sportsmen['return_judge_'.$JUDGE_ID] == 1) {
		mysql :: update('sportsmens',
						"cas_score_".$JUDGE_ID." = 0",
					    "id = '".$_POST['datas']['CURRENT_SPORTSMEN']."'");
?>
<script>

	swal({
		title: "Please enter your score again",
		text: false,
		showCancelButton: true,
		confirmButtonClass: "btn-success",
		confirmButtonText: "OK!",
		closeOnConfirm: true
	}).then(function() {
		clearInterval(return_interval);
		interval_state = false;
	});
			

</script>
0.0
<?php
	} else {
		echo '0.0';
	}
}