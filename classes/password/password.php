<?php
class password {
	public static function get_password($password,$mode = 3)
	{
		$return_password = $password;
		if($mode === 3) {
			$password = md5($password);
			$password = sha1($password);
			$password = md5($password);
			$password = trim($password);
			$password = substr($password, 0, 18);
		}elseif($mode === 2) {
			$password = sha1($password);
			$password = trim($password);
			$password = substr($password, 0, 18);
		}elseif($mode === 1) {
			$password = md5($password);
			$password = trim($password);
			$password = substr($password, 0, 18);
		}elseif($mode === 0) {
			$password = md5($password);
			$password = trim($password);
		}elseif ($mode = 4) {
			$password = $return_password;
		}
		return $password;
	}
}