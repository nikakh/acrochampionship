<?php
$result_code = 0;
$user_exists = false;
$refresh_url = 'modules/table/basic.php'; 

if(isset($_POST['name']) && isset($_POST['password'])) {
	$name = $_POST['name'];
	//$password = password :: get_password($_POST['password'], 3);
	$password = $_POST['password'];
	
	$user_exists = mysql :: check_user_exists('users',"name = '".$name."' AND password = '".$password."'");
	
	$get_admin = mysql :: select_one('users',
									 "admin = 1");
	
	$get_super_judge = mysql :: select_one('users',
										 	"super_judge = 1");
	
	$get_table = mysql :: select_one('users',
									 "table_a = 1");
	
	$get_user = mysql :: select_one('users',
									"name = '".$name."' AND password = '".$password."'");

	if($name == $get_super_judge['name'] && $password == $get_super_judge['password']) {
		unset($_SESSION['admin']);
		unset($_SESSION['judge']);
		unset($_SESSION['table']);
		$_SESSION['super_judge'] = $get_super_judge['id'];
		$refresh_url = 'modules/super_judge/basic.php';
	} else if($name == $get_admin['name'] && $password == $get_admin['password']) {
		$_SESSION['admin'] = $get_admin['id'];
		unset($_SESSION['super_judge']);
		unset($_SESSION['judge']);
		unset($_SESSION['table']);
		$refresh_url = 'modules/admin/basic.php';
	} else if($get_user && $name == $get_user['name'] && $password == $get_user['password'] && $get_user['super_judge'] == 0 && $get_user['admin'] == 0 && $get_user['table_a'] == 0) {
		unset($_SESSION['admin']);
		unset($_SESSION['super_judge']);
		unset($_SESSION['table']);
		$_SESSION['judge'] = $get_user['id'];
		$refresh_url = 'modules/casual_judge/basic.php';
	} else if($get_user && $name == $get_table['name'] && $password == $get_table['password']) {
		unset($_SESSION['admin']);
		unset($_SESSION['super_judge']);
		unset($_SESSION['judge']);
		$_SESSION['table'] = true;
		$refresh_url = 'modules/table/basic.php';
	} else {
		unset($_SESSION['admin']);
		unset($_SESSION['super_judge']);
		unset($_SESSION['judge']);
		unset($_SESSION['table']);
		$refresh_url = 'moduasdles/tabasde/basic.php';
	}
	
	if(!$get_user) {
		unset($_SESSION['admin']);
		unset($_SESSION['super_judge']);
		unset($_SESSION['judge']);
		unset($_SESSION['table']);
		$refresh_url = 'modasdules/tabasdale/basic.php';
	}
} 

if(file_exists($refresh_url)) {
	$result = 1;
?>
<!--	<script src="/modules/casual_judge/scripts.js" defer></script>-->
	<script src="/scripts/basic.js" defer></script>
	<link rel="stylesheet" href="/styles/basic.css">
	<link rel="stylesheet" href="/modules/casual_judge/styles.css">
	<link rel="stylesheet" href="/includes/bootstrap-sweetalert-master/dist/sweetalert.css">
<?php
	require($refresh_url);
} else {
	$result = 0;
}
?>
<input type="hidden" id="login_result" value="<?= $result ?>">