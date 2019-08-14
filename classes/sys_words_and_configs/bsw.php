<?php
class bsw
{
	public static function set_bsw($name,$value)
	{
		$sel_bsw_for_check = mysql :: select_one('bsw',
									  			 "name = '".$name."'");
		if(!$sel_bsw_for_check) {
			$insert_bsw = mysql :: insert('bsw',
										  "name, configuration",
								   		  "".$name."', '".$value."");
			if($insert_bsw) {
				$result = true;
			}else{
				$result = false;
			}
		}else{
			$result = false;
		}
		return $result;
	}

	public static function get_bsw($name)
	{
		$get_bsw = mysql :: select_one('bsw',
									   "name = '".$name."'");
		if($get_bsw) {
			$result = $get_bsw['configuration'];
		}else{
			$result = false;
		}
		return $result;
	}

	public static function update_bsw($name = '',$value = '')
	{
		$sel_bsw_for_check = mysql :: select_one('bsw',
									   			 "name = '".$name."' ");
		if($sel_bsw_for_check) {
			$update_bsw = mysql :: update('bsw',
										  "name = '".$name."' AND configuration = '".$value."'");

		}else{
			$insert_bsw = mysql :: insert('bsw',
										  "name, configuration",
								   		  "".$name."', '".$value."");
		}
	}
}