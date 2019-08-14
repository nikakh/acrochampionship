<?php
class module
{
	public static function set_module($name,$dir = '',$uploads = 1,$styles = 1,$scripts = 1,$steps = 3,$steps_scripts = 1, $steps_styles = 1,$widget = 1,$form = 0,$post_name = 'submit') {
		if($name) {
			if(!$dir) {
				$dir = $_SERVER['DOCUMENT_ROOT'].'/work/beejee/modules';
			}

			if(is_dir($dir)) {
				if($widget === 1) {
					if(!file_exists($dir.'/'.$name)) {
						mkdir($dir.'/'.$name, 777, true);
					}

					if(!file_exists($dir.'/'.$name.'/basic.php')) {
						fopen($dir.'/'.$name.'/basic.php', "x+");
					}

					if($scripts === 1) {
						if(!file_exists($dir.'/'.$name.'/scripts.js')) {
							fopen($dir.'/'.$name.'/scripts.js', "w");
						}
					}

					if($styles === 1) {
						if(!file_exists($dir.'/'.$name.'/styles.css')) {
							fopen($dir.'/'.$name.'/styles.css', "w");
						}
					}

					if($uploads === 1) {
						if(!file_exists($dir.'/'.$name.'/uploads')) {
							mkdir($dir.'/'.$name.'/uploads', 777, true);
						}
					}

					if($steps != 0) {

						if(!file_exists($dir.'/'.$name.'/includes')) {
							mkdir($dir.'/'.$name.'/includes', 777, true);
						}

						for ($i=0; $i <= $steps ; $i++) { 
							if(!file_exists($dir.'/'.$name.'/includes/step_'.$i.'.php')) {
									fopen($dir.'/'.$name.'/includes/step_'.$i.'.php', "w");
							}
						}

						if($steps_scripts === 1) {
							if(!file_exists($dir.'/'.$name.'/includes/scripts')) {
								mkdir($dir.'/'.$name.'/includes/scripts', 777, true);
							}

							for ($k=0; $k <= $steps ; $k++) {
								if($steps_scripts <= $steps) {
									if(!file_exists($dir.'/'.$name.'/includes/scripts/step_'.$k.'.js')) {
											fopen($dir.'/'.$name.'/includes/scripts/step_'.$k.'.js', "w");
									}
								}
							}
						}

						if($steps_styles === 1) {
							if(!file_exists($dir.'/'.$name.'/includes/styles')) {
								mkdir($dir.'/'.$name.'/includes/styles', 777, true);
							}

							for ($j=0; $j <= $steps ; $j++) {
								if($steps_styles <= $steps) {
									if(!file_exists($dir.'/'.$name.'/includes/styles/step_'.$j.'.css')) {
											fopen($dir.'/'.$name.'/includes/styles/step_'.$j.'.css', "w");
									}
								}
							}
						}
					}

					mysql :: create_table($name,'','',4);

				}else{
					if(!file_exists($dir.'/'.$name.'/basic.php')) {
						fopen($dir.'/'.$name.'/basic.php', "w");
					}

					if($scripts === 1) {
						if(!file_exists($dir.'/'.$name.'/scripts.js')) {
							fopen($dir.'/'.$name.'/scripts.js', "w");
						}
					}

					if($styles === 1) {
						if(!file_exists($dir.'/'.$name.'/styles.css')) {
							fopen($dir.'/'.$name.'/styles.css', "w");
						}
					}

					if($uploads === 1) {
						if(!file_exists($dir.'/'.$name.'/uploads')) {
							mkdir($dir.'/'.$name.'/uploads', 777, true);
						}
					}

					if($steps != 0) {

						if(!file_exists($dir.'/'.$name.'/includes/')) {
							mkdir($dir.'/'.$name.'/includes/');
						}

						for ($i=0; $i <= $steps ; $i++) { 
							if(!file_exists($dir.'/'.$name.'/includes/step_'.$i.'.php')) {
								fopen($dir.'/'.$name.'/includes/step_'.$i.'.php', "w");
							}
						}

						if($steps_scripts === 1) {
							for ($k=0; $k <= $steps_scripts ; $k++) {
								if($steps_scripts <= $steps) {
									if(!file_exists($dir.'/'.$name.'/includes/scripts/step_'.$k.'.js')) {
											fopen($dir.'/'.$name.'/includes/scripts/step_'.$k.'.js', "w");
									}
								}
							}
						}

						if($steps_styles === 1) {
							for ($j=0; $j <= $steps_styles ; $j++) {
								if($steps_styles <= $steps) {
									if(!file_exists($dir.'/'.$name.'/includes/styles/step_'.$j.'.css')) {
											fopen($dir.'/'.$name.'/includes/styles/step_'.$j.'.css', "w");
									}
								}
							}
						}
					}
				}
			}
		}
	}
}