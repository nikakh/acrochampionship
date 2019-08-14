<?php
$action = false;
$require_url = 'modules/login/basic.php';
$file_exists = false;
$res = false;

if(isset($_POST['login_url'])) {
	$require_url = 'modules/login/basic.php';
	
	if(isset($_POST['login_submit'])) {
		$require_url = 'modules/login/includes/step_1.php';
	}
}

if(empty($_SESSION['judge']) && empty($_SESSION['super_judge']) && empty($_SESSION['admin'])) {
	$require_url = 'modules/login/basic.php';
} else if(!empty($_SESSION['super_judge']) && empty($_SESSION['judge']) && empty($_SESSION['admin']) && empty($_SESSION['super_judge'])) {
	$require_url = 'modules/super_judge/basic.php';
} else if(empty($_SESSION['super_judge']) && !empty($_SESSION['judge']) && empty($_SESSION['admin']) && empty($_SESSION['super_judge'])) {
	$require_url = 'modules/casual_judge/basic.php';
} else if(empty($_SESSION['super_judge']) && empty($_SESSION['judge']) && !empty($_SESSION['admin']) && empty($_SESSION['super_judge'])) {
	$require_url = 'modules/admin/basic.php';
} else if(!empty($_SESSION['table']) && empty($_SESSION['judge']) && empty($_SESSION['admin']) && empty($_SESSION['super_judge'])) {
	$require_url = 'modules/table/basic.php';
}

if(isset($_POST['login_submit'])) {
	$require_url = 'modules/login/includes/step_1.php';
}

if(isset($_POST['login_url'])) {
	$require_url = 'modules/login/basic.php';
	
	if(isset($_POST['login_submit'])) {
		$require_url = 'modules/login/includes/step_1.php';
	}
}

if(isset($_POST['logout'])) {
	$require_url = 'modules/logout/basic.php';
}

if(empty($_SESSION['table']) && empty($_SESSION['judge']) && empty($_SESSION['admin']) && empty($_SESSION['super_judge'])) {
	$require_url = 'modules/login/basic.php';
}

if(file_exists($require_url)) {
	@define('PAGE_URL', $require_url);
} else {
	@define('PAGE_URL', 'modules/login/basic.php');
}
	
if(!empty(PAGE_URL)) {
	$module = explode('/',$require_url)[1];
	
	if(file_exists('modules/'.$module.'/styles/'.$module.'.css')) {
?>
		<link rel="stylesheet" href="modules/<?= $module?>/styles/<?= $module?>.css">
<?php
	}
	
	if(file_exists('modules/'.$module.'/scripts/'.$module.'.js')) {
?>
		<script type="text/javascript" src="modules/<?= $module?>/scripts/<?= $module?>.js" async></script>
<?php
	}
}