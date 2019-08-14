<?php
require_once 'require.php';
//unset($_SESSION['restart']);
$_SESSION['restart'] = false;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!--		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">-->
		<link rel="shortcut icon" type="image/png" href="/images/logo.png"/>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" defer></script>
		<script src="/includes/bootstrap-sweetalert-master/dist/sweetalert.js" defer></script>
		<link rel="stylesheet" href="styles/basic.css">
		<script src="scripts/basic.js"></script>
<?php
		require_once 'includes/view/nav.php'; 
		require_once 'page_url.php'; 	
?>
		<title><?= bsc :: get_bsc('web_site_name')?></title>
	</head>
	<body>
		<style>
			#text {
				display: none;
			}
		</style>
		<div id="current_sportsmen" style="display: none"></div>
		<input type="hidden" value="1" id="current_table_id">
		<div id="pause"></div>
<?php 			
//	$sportsmens_in = mysql :: select_one('sportsmens',
//									"restart = 1");

		if(PAGE_URL) {
			require_once PAGE_URL;
		}
		
//		if(empty($_SESSION['restart']) ){
//			$_SESSION['restart'] = 1;
//		} else {
//			$_SESSION['restart']++;
//		}
//
//		if($_SESSION['restart'] >= 2) {
//			$_SESSION['restart'] = 1;
//			$sportsmens = mysql :: select('sportsmens');
//			foreach($sportsmens as $sportsmens) {
//				mysql :: update('sportsmens',
//								"restart = 0",
//								"id = ".$sportsmens['id']);
//			}
//		} else {
//			$sportsmens = mysql :: select('sportsmens');
//			foreach($sportsmens as $sportsmens) {
//				mysql :: update('sportsmens',
//								"restart = 1",
//								"id = ".$sportsmens['id']);
//			}
//		}
//			
//		$restart = mysql :: select_one('sportsmens',
//									   "restart = 1");
			
			//if($restart) {
?>
<!--				<h1>RESTART</h1>		-->
<?php
			//} else {
				?>
<!--		<h1>DONT</h1>-->
		<?php
			//}
?>
<!--
		<script>
			$('.restart').on('click', function() {
				//location.reload();
				$('head').append('<meta http-equiv="refresh" content="0">');
				
			});
		</script>
-->
	</body>
</html>