<?php
class bsc
{
	public static function set_bsc($name,$value)
	{
		$sel_bsc_for_check = mysql :: select_one('bsc',
									  			 "name = '".$name."'");
		if(!$sel_bsc_for_check) {
			$insert_bsc = mysql :: insert('bsc',
										  "name, configuration",
								   		  "".$name."', '".$value."");
			if($insert_bsc) {
				$result = true;
			}else{
				$result = false;
			}
		}else{
			$result = false;
		}
		return $result;
	}

	public static function get_bsc($name, $value = '')
	{
		$get_bsc = mysql :: select_one('bsc',
									   "name = '".$name."'");
		if($get_bsc) {
			$result = $get_bsc['configuration'];
		}else{
			
			$get_bsc = self :: set_bsc($name,$value);
			
			$get_bsc = mysql :: select_one('bsc',
									   "name = '".$name."'");
			if($get_bsc) {
				$result = $get_bsc['configuration'];
			} else {
				$result = false;
			}
		}
		return $result;
	}

	public static function update_bsc($name = '',$value = '')
	{
		$sel_bsc_for_check = mysql :: select_one('bsc',
									   			 "name = '".$name."' ");
		if($sel_bsc_for_check) {
			$update_bsc = mysql :: update('bsc',
										  "name = '".$name."' AND configuration = '".$value."'");

		}else{
			$insert_bsc = mysql :: insert('bsc',
										  "name, configuration",
								   		  "".$name."', '".$value."");
		}
	}
}