<?php
if(!isset($_GET['hash'])) {
	require 'includes/list.php';
}elseif(isset($_GET['hash']) && !isset($_POST['edit_submit'])) {
	require 'includes/step_0.php';
}else{
	require 'includes/step_1.php';
}