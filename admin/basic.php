<?php
//require_once 'require.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title>123</title>
<?php 
	//require_once 'view/nav.php';
?>
</head>
<body> 
<?php
if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
	if(!isset($_GET['act']) || (isset($_GET['act']) && $_GET['act'] != 'add' && $_GET['act'] != 'logout')) {
		require 'includes/edit/basic.php';
	}elseif(isset($_GET['act']) && $_GET['act'] == 'add') {
		require 'includes/add/basic.php';
	}elseif(isset($_GET['act']) && $_GET['act'] == 'logout') {
		require 'logout.php';
	}
	require_once 'view/main.php';
}else{	
?>
	<meta http-equiv="refresh" content="0.1; url=">
<?php
}
?>
</body>
</html>